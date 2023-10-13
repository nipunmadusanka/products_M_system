<?php

use App\Http\Controllers\Product;
use App\Http\Controllers\userdata;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [Product::class, "index"])->name('pages.login.index');
Route::post('/userRegister', [Product::class, "userRegister"])->name('pages.login.userRegister');
Route::get('/dashboard', [Product::class, "dashboard"])->name('pages.login.dashboard');
Route::post('/login', [Product::class, "login"])->name('pages.login');
Route::get('/viewproduct', [Product::class, "viewproduct"])->name('pages.viewProduct.viewProduct');
Route::post('/addproduct', [Product::class, "addproduct"])->name('pages.addproduct');
Route::get('/logout', [Product::class, "logout"])->name('pages.logout');
Route::put('/product/{id}/edit', [Product::class, "editproduct"])->name('pages.editproduct');
Route::delete('/product/{product}/destroy', [Product::class, "destroyproduct"])->name('pages.destroy');


