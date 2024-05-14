<?php

namespace App\Hateoas;

use App\Models\Store;
use GDebrauwer\Hateoas\Link;
use GDebrauwer\Hateoas\Traits\CreatesLinks;

class StoreHateoas
{
    use CreatesLinks;

    public function list() : ?Link
    {
        return $this->link('store.list');
    }

    public function create() : ?Link
    {
        return $this->link('store.create');
    }

    public function update(Store $store) : ?Link
    {
        return $this->link('store.update', ['store' => $store]);
    }

    public function self(Store $store) : ?Link
    {
        return $this->link('store.show', ['store' => $store]);
    }

    public function delete(Store $store) : ?Link
    {
        return $this->link('store.destroy', ['store' => $store]);
    }

    public function books(Store $store) : ?Link
    {
        return $this->link('store.books', ['store' => $store]);
    }
}
