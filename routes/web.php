<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {return view('shop.index');});

Route::get('/manager', function () {return view('dashboard.index');})->name('manager');


Route::get('/shop', function () {return view('shop.index');});

Route::group(['prefix'=> 'admin', 'middleware'=>['admin:admin']], function(){
	Route::get('/login', [AdminController::class, 'loginForm']);
	Route::post('/login',[AdminController::class, 'store'])->name('admin.login');
});


Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
    return view('admin.index');
})->name('admin.dashboard');


Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    return view('dashboard.index');
})->name('manager.dashboard');

Route::prefix('brand')->group(function () {
    Route::get('/list-add', [\App\Http\Controllers\Dashboard\Ecommerce\BrandController::class, 'brandsListAdd'])->name('brands.list-add'); 
    Route::get('/chart-list', [\App\Http\Controllers\Dashboard\Ecommerce\BrandController::class, 'brandsChartList'])->name('brands.chart-list');
    Route::get('/grid-detail', [\App\Http\Controllers\Dashboard\Ecommerce\BrandController::class, 'brandsGridDetail'])->name('brands.grid-detail');
    Route::post('/store', [\App\Http\Controllers\Dashboard\Ecommerce\BrandController::class, 'storeBrand'])->name('brand.store');
    Route::get('/edit/{id}', [\App\Http\Controllers\Dashboard\Ecommerce\BrandController::class, 'editBrand'])->name('brand.edit');
    Route::post('/update/{id}', [\App\Http\Controllers\Dashboard\Ecommerce\BrandController::class, 'updateBrand'])->name('brand.update');
    Route::get('/archive/{id}', [\App\Http\Controllers\Dashboard\Ecommerce\BrandController::class, 'archiveBrand'])->name('brand.archive');
    Route::get('/restore/{id}', [\App\Http\Controllers\Dashboard\Ecommerce\BrandController::class, 'restoreBrand'])->name('brand.restore');
    Route::get('/delete/{id}', [\App\Http\Controllers\Dashboard\Ecommerce\BrandController::class, 'deleteBrand'])->name('brand.delete');
});

Route::prefix('category')->group(function () {
    Route::get('/list-add', [\App\Http\Controllers\Dashboard\Ecommerce\CategoryController::class, 'categoriesListAdd'])->name('categories.list-add'); 
    Route::get('/chart-list', [\App\Http\Controllers\Dashboard\Ecommerce\CategoryController::class, 'categoriesChartList'])->name('categories.chart-list');
    Route::get('/grid-detail', [\App\Http\Controllers\Dashboard\Ecommerce\CategoryController::class, 'categoriesGridDetail'])->name('categories.grid-detail');
    Route::post('/store', [\App\Http\Controllers\Dashboard\Ecommerce\CategoryController::class, 'storeCategory'])->name('category.store');
    Route::get('/edit/{id}', [\App\Http\Controllers\Dashboard\Ecommerce\CategoryController::class, 'editCategory'])->name('category.edit');
    Route::post('/update/{id}', [\App\Http\Controllers\Dashboard\Ecommerce\CategoryController::class, 'updateCategory'])->name('category.update');
    Route::get('/archive/{id}', [\App\Http\Controllers\Dashboard\Ecommerce\CategoryController::class, 'archiveCategory'])->name('category.archive');
    Route::get('/restore/{id}', [\App\Http\Controllers\Dashboard\Ecommerce\CategoryController::class, 'restoreCategory'])->name('category.restore');
    Route::get('/delete/{id}', [\App\Http\Controllers\Dashboard\Ecommerce\CategoryController::class, 'deleteCategory'])->name('category.delete');
});
    

