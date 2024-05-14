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
}
