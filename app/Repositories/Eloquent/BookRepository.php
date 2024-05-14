<?php

namespace App\Repositories\Eloquent;

use App\Models\Book;
use App\Repositories\BookRepositoryInterface;
use Illuminate\Support\Collection;

class BookRepository extends BaseRepository implements BookRepositoryInterface
{

    /**
     * BookRepository constructor.
     *
     * @param Book $model
     */
    public function __construct(Book $model)
    {
        parent::__construct($model);
    }

    /**
     * @return Collection
     */
    public function all(): Collection
    {
        return $this->model->with('stores')->get();
    }

    /**
     * @return Book
     */
    public function store(array $params): Book
    {
        return $this->model->create($params);
    }

    /**
     * @return Book
     */
    public function update(Book $book, array $params): Book
    {
        $book->update($params);

        if (array_key_exists('store_ids', $params))
            $book->stores()->sync($params['store_ids']);

        return $book->fresh()->load('stores');
    }

    public function delete(Book $book): bool
    {
        return $book->delete();
    }
}
