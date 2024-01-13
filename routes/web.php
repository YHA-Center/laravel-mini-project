<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('customer.list');
});

Route::get('/home', [CustomerController::class, 'home'])->name('customer.home');
Route::get('/createPage', [CustomerController::class, 'createPage'])->name('customer.createPage');
Route::post('/create', [CustomerController::class, 'create'])->name('customer.create');
Route::get('/edit/{id}', [CustomerController::class, 'edit'])->name('customer.edit');
// Route::post('/update/{id}', [CustomerController::class, 'update'])->name('customer.update');
Route::post('/update', [CustomerController::class, 'update'])->name('customer.update');
Route::get('/delete/{id}', [CustomerController::class, 'delete'])->name('customer.delete');

