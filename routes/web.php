<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\CategoryController;

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

Route::get('/', function () {
    return view('frontend.index');
});

// For User Routes
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/user/dashboard', function () {
        return view('dashboard');
    })->name('user.dashboard');
});
// For Admin Routes
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'authadmin'
])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('backend.admin.index');
    })->name('admin.dashboard');
});

// Category route
Route::group(['prefix'=> 'admin', 'middleware'=>['auth:sanctum', config('jetstream.auth_session'), 'verified', 'authadmin']], function(){
    Route::get("/categories", [CategoryController::class, "AllCategories"])->name("view.category");
    Route::post("/category/store", [CategoryController::class, "StoreCategory"])->name("store.category");
    Route::get("/category/edit/{id}", [CategoryController::class, "EditCategory"])->name("edit.category");
    Route::post("/category/update/{id}", [CategoryController::class, "UpdateCategory"])->name("update.category");
    Route::get("/category/delete/{id}", [CategoryController::class, "DeleteCategory"])->name("delete.category");
});


