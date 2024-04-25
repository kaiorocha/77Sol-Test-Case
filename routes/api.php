<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'projects'], function () {
    Route::get('/', \App\Http\Controllers\Project\Index::class)->name('projects.index');
    Route::get('/{id}', \App\Http\Controllers\Project\Show::class)->name('projects.show');
    Route::post('/', \App\Http\Controllers\Project\Store::class)->name('projects.create');
    Route::put('/{id}', \App\Http\Controllers\Project\Update::class)->name('projects.update');
    Route::delete('/{id}', \App\Http\Controllers\Project\Delete::class)->name('projects.delete');
});

Route::group(['prefix' => 'customers'], function () {
    Route::get('/', \App\Http\Controllers\Customer\Index::class)->name('customers.index');
    Route::get('/{id}', \App\Http\Controllers\Customer\Show::class)->name('customers.show');
    Route::get('/{id}/projects', \App\Http\Controllers\Project\Index::class)->name('customers.projects');
    Route::post('/', \App\Http\Controllers\Customer\Store::class)->name('customers.create');
    Route::put('/{id}', \App\Http\Controllers\Customer\Update::class)->name('customers.create');
    Route::delete('/{id}', \App\Http\Controllers\Customer\Delete::class)->name('customers.delete');
});
