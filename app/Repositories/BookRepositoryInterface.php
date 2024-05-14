<?php
namespace App\Repositories;

use App\Models\Book;
use Illuminate\Support\Collection;

interface BookRepositoryInterface
{
    public function all(): Collection;
    public function store(array $params): Book;
    public function update(Book $store, array $params): Book;
    public function delete(Book $store): bool;
}
