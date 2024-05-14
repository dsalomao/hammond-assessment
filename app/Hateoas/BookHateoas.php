<?php

namespace App\Hateoas;

use App\Models\Book;
use GDebrauwer\Hateoas\Link;
use GDebrauwer\Hateoas\Traits\CreatesLinks;

class BookHateoas
{
    use CreatesLinks;

    public function list() : ?Link
    {
        return $this->link('book.list');
    }

    public function create() : ?Link
    {
        return $this->link('book.create');
    }

    public function update(Book $book) : ?Link
    {
        return $this->link('book.update', ['book' => $book]);
    }

    public function self(Book $book) : ?Link
    {
        return $this->link('book.show', ['book' => $book]);
    }

    public function delete(Book $book) : ?Link
    {
        return $this->link('book.destroy', ['book' => $book]);
    }

    public function stores(Book $book) : ?Link
    {
        return $this->link('book.stores', ['book' => $book]);
    }
}
