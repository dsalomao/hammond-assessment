<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStoreRequest;
use App\Http\Requests\UpdateStoreRequest;
use App\Http\Resources\StoreCollection;
use App\Models\Store;
use App\Repositories\Eloquent\StoreRepository;

class StoreController extends Controller
{
    private $repository;

    public function __construct(StoreRepository $storeRepository)
    {
        $this->repository = $storeRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new StoreCollection($this->repository->all()->paginate());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStoreRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Store $store)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStoreRequest $request, Store $store)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Store $store)
    {
        //
    }
}
