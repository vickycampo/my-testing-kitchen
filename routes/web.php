<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $person = [
        'name'=> 'Zura',
        'email'=> 'zura@example.com',
    ];
    dump($person);
    return view('welcome');
});

Route::get('/about', function () {  
    return view('about');
});
// funcion para todos los gets con un parametro id
// http://127.0.0.1:8000/product/12563
// funcion que acepta que el parametro category no este presente
Route::get("/product/{category?}", function (string $category = null ) {
    return "
        <h1>Product</h1>
        <p>Category: $category</p>";
})->whereAlpha("category"); // solo acepta letras

// function que establece que el id debe ser un numero
Route::get('/product/{id}', function (int $id) {  
    return "
        <h1>Product</h1>
        <p>Product ID: $id</p>";
})->whereNumber('id' ); // solo acepta numeros

// CHALLENGE, CREATE A ROUTE THAT ACCEPTS TWO PARAMETERS, THEY BOTH MUST BE NUMBERS, AND DISPLAY THE SUM OF THEM
Route::get('/sum/{num1}/{num2}', function (float $num1, float $num2) {  
    return "
        <h1>Sum</h1>
        <p>Sum: " . ($num1 + $num2) . "</p>";
})->whereNumber(['num1','num2']); // ONLY ACCEPSTS NUMBERS