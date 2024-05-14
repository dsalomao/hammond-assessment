<?php
namespace App\Repositories;

use Illuminate\Support\Collection;

interface StoreRepositoryInterface
{
    public function all(): Collection;
}
