<?php

use App\Http\Controllers\UserController;
use App\Livewire\Admin\Auth\Login;
use App\Livewire\Admin\Auth\Post;
use App\Livewire\Admin\Auth\Register;
use App\Livewire\Admin\Category\Create;
use App\Livewire\Admin\Category\Edit;
use App\Livewire\Admin\Category\Index;
use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\Product\Create as ProductCreate;
use App\Livewire\Admin\Product\Edit as ProductEdit;
use App\Livewire\Admin\Product\Index as ProductIndex;
use Illuminate\Support\Facades\Route;

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

Route::group(['middleware' => 'guests'], function () {
    Route::get('/login', Login::class)->name('login');
    Route::get('/register', Register::class)->name('register');
});
//admin controllers

Route::group(['prefix' => 'admin', 'middleware' => 'admin.auth'], function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');

    //category controllers
    Route::group(['prefix' => 'category'], function () {
        Route::get('/index', Index::class)->name('category.index');
        Route::get('/create', Create::class)->name('category.create');
        Route::get('/{category}/edit', Edit::class)->name('category.edit');
    });
    Route::group(['prefix' => 'product'], function () {
        Route::get('/index', ProductIndex::class)->name('product.index')->middleware('role:Admin');
        Route::get('/create', ProductCreate::class)->name('product.create');
        Route::get('/{product}/edit', ProductEdit::class)->name('product.edit');
    });
    Route::group(['prefix' => 'user'], function () {
        Route::get('/index', ProductIndex::class)->name('product.index')->middleware('role:Admin');
        Route::get('/create', ProductCreate::class)->name('product.create');
        Route::get('/{product}/edit', ProductEdit::class)->name('product.edit');
    });
});


Route::get('/posts', Post::class);
Route::get('/', function () {
    return view('welcome');
});
