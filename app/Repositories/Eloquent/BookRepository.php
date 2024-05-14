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

        return $book->fresh();
    }

    public function delete(Book $book): bool
    {
        return $book->delete();
    }
}
