<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Http\Resources\BookCollection;
use App\Http\Resources\BookResource;
use App\Http\Resources\StoreCollection;
use App\Models\Book;
use App\Repositories\Eloquent\BookRepository;

class BookController extends Controller
{
    private $repository;

    public function __construct(BookRepository $bookRepository)
    {
        $this->repository = $bookRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new BookCollection($this->repository->all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookRequest $request)
    {
        return new BookResource($this->repository->store($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return new BookResource($book->load('stores'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        return new BookResource($this->repository->update($book, $request->all()));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        if(!$this->repository->delete($book))
            return response()->json([], 409);

        return response()->json([], 204);
    }

    /**
     * Display Related Stores Resource.
     */
    public function stores(Book $book)
    {
        return new StoreCollection($book->stores);
    }
}
