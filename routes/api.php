<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\apiProductController ;
use App\Http\Controllers\apiCategoriesController;

Route::get('apiproducts', [apiProductController::class, 'index']);
Route::get('apiproducts_lasted', [apiProductController::class, 'products_lasted']);
Route::get('apiproducts_bestseller', [apiProductController::class, 'products_bestseller']);

Route::get('apiproducts/{id}', [apiProductController::class, 'show']);
Route::post('apiproducts', [apiProductController::class, 'store']);
Route::put('apiproducts/{id}', [apiProductController::class, 'update']);
Route::delete('apiproducts/{id}', [apiProductController::class, 'delete']);

Route::get('apicategories', [apiCategoriesController::class, 'index']);
Route::get('apicategories/{id}', [apiCategoriesController::class, 'show']);
Route::post('apicategories', [apiCategoriesController::class, 'store']);
Route::put('apicategories/{id}', [apiCategoriesController::class, 'update']);
Route::delete('apicategories/{id}', [apiCategoriesController::class, 'delete']);
