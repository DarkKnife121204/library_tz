<?php

use App\Http\Controllers\API\AuthorController;
use App\Http\Controllers\API\BookController;
use App\Http\Controllers\API\RentalController;
use App\Http\Controllers\API\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::resource('authors', AuthorController::class)->names('authors');

Route::get('authors/books/{author}',[AuthorController::class,'books'])->name('authors.books');

Route::resource('books', BookController::class)->names('books');

Route::get('books/author/{book}',[BookController::class,'author'])->name('books.author');

Route::get('books/rentals/{book}',[BookController::class,'rentals'])->name('books.rentals');

Route::get('books/users/{book}',[BookController::class,'users'])->name('books.users');

Route::resource('rentals', RentalController::class)->names('rentals');

Route::get('rentals/books/{rental}',[RentalController::class,'book'])->name('rentals.book');

Route::get('user/books/{user}',[UserController::class,'books'])->name('user.books');

