<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing');
});
Route::get('login', function () {
    return view('login', ["greeting" => "Hello"]);
});
Route::get('marketplace', function () {
    $products = [
        ["name" => "Product 1", "price" => 100, "id" => 1],
        ["name" => "Product 2", "price" => 200, "id" => 2],
        ["name" => "Product 3", "price" => 300, "id" => 3],
    ];
    return view('marketplace.index', ["products" => $products]);
});
Route::get('marketplace/{id}', function ($id) {
    // TODO fetch record with id and pass it as arg
    return view('marketplace.product', ["id" => $id]);
});

