<?php

namespace App\Http\Controllers;

use App\Models\StoredProduct;
use App\Http\Requests\StoreStoredProductRequest;
use App\Http\Requests\UpdateStoredProductRequest;

class StoredProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStoredProductRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(StoredProduct $storedProduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StoredProduct $storedProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStoredProductRequest $request, StoredProduct $storedProduct)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StoredProduct $storedProduct)
    {
        //
    }
}
