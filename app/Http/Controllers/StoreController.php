<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStoreRequest;
use App\Http\Requests\UpdateStoreRequest;
use App\Http\Resources\BookCollection;
use App\Http\Resources\StoreCollection;
use App\Http\Resources\StoreResource;
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
        return new StoreCollection($this->repository->all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStoreRequest $request)
    {
        return new StoreResource($this->repository->store($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Store $store)
    {
        return new StoreResource($store);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStoreRequest $request, Store $store)
    {
        return new StoreResource($this->repository->update($store, $request->all()));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Store $store)
    {
        if(!$this->repository->delete($store))
            return response()->json([], 409);

        return response()->json([], 204);
    }

    /**
     * Display Related Books Resource.
     */
    public function books(Store $store)
    {
        return new BookCollection($store->books);
    }
}
