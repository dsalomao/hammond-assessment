<?php
namespace App\Repositories;

use App\Models\Store;
use Illuminate\Support\Collection;

interface StoreRepositoryInterface
{
    public function all(): Collection;
    public function store(array $params): Store;
    public function update(Store $store, array $params): Store;
    public function delete(Store $store): bool;
}
