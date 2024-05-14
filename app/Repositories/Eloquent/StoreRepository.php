<?php

namespace App\Repositories\Eloquent;

use App\Models\Store;
use App\Repositories\StoreRepositoryInterface;
use Illuminate\Support\Collection;

class StoreRepository extends BaseRepository implements StoreRepositoryInterface
{

    /**
     * StoreRepository constructor.
     *
     * @param Store $model
     */
    public function __construct(Store $model)
    {
        parent::__construct($model);
    }

    /**
     * @return Collection
     */
    public function all(): Collection
    {
        return $this->model->with('books')->get();
    }

    /**
     * @return Store
     */
    public function store(array $params): Store
    {
        return $this->model->create($params);
    }

    /**
     * @return Store
     */
    public function update(Store $store, array $params): Store
    {
        $store->update($params);

        if (array_key_exists('book_ids', $params))
            $store->books()->sync($params['book_ids']);

        return $store->fresh()->load('books');
    }

    public function delete(Store $store): bool
    {
        return $store->delete();
    }
}
