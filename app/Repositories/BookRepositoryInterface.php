<?php
namespace App\Repositories;

use Illuminate\Support\Collection;

interface BookRepositoryInterface
{
    public function all(): Collection;
}
