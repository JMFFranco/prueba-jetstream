<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return /*view('welcome');*/[
        "mensaje" => "Bienvenido a mi app"
    ];
});

Route::get('/saludo', function () {
    return [
        "esatdo" => true,
        "mensaje" => "Hola, soy un saludo",
        "codigo" => 200
    ];
});
