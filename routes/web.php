<?php

use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\welcomeController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
Route::get('', [App\Http\Controllers\WelcomeController::class, 'welcome'])->name('welcome');

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

Auth::routes();


Route::prefix('admin')->group(function (){

Route::prefix('admin-home')->group(function () {
    Route::get('', [App\Http\Controllers\AdminHomeController::class, 'index'])->name('admin.home');
    Route::get('create', [App\Http\Controllers\AdminHomeController::class, 'create'])->name('admin.home.create');
    Route::post('store', [App\Http\Controllers\AdminHomeController::class, 'store'])->name('admin.home.store');
    Route::get('edit/{id}', [App\Http\Controllers\AdminHomeController::class, 'edit'])->name('admin.home.edit');
    Route::post('update', [App\Http\Controllers\AdminHomeController::class, 'update'])->name('admin.home.update');
    Route::post('delete', [App\Http\Controllers\AdminHomeController::class, 'delete'])->name('admin.home.delete');
});

Route::prefix('admin-about')->group(function () {
    Route::get('', [App\Http\Controllers\AdminaboutController::class, 'index'])->name('admin.about');
    Route::get('create', [App\Http\Controllers\AdminaboutController::class, 'create'])->name('admin.about.create');
    Route::post('store', [App\Http\Controllers\AdminaboutController::class, 'store'])->name('admin.about.store');
    Route::get('edit/{id}', [App\Http\Controllers\AdminaboutController::class, 'edit'])->name('admin.about.edit');
    Route::post('update', [App\Http\Controllers\AdminaboutController::class, 'update'])->name('admin.about.update');
    Route::post('delete', [App\Http\Controllers\AdminaboutController::class, 'delete'])->name('admin.about.delete');
});



    Route::prefix('Link')->group(function (){
        Route::get('', [App\Http\Controllers\AdminLinkController::class, 'index'])->name('admin.link');
        Route::get('status', [App\Http\Controllers\AdminLinkController::class, 'status'])->name('s2.status');
        Route::get('dt', [App\Http\Controllers\AdminLinkController::class, 'dt'])->name('admin.Link.dt');
        Route::post('store', [App\Http\Controllers\AdminLinkController::class, 'store'])->name('admin.link.store');
        Route::post('update', [App\Http\Controllers\AdminLinkController::class, 'update'])->name('admin.link.update');
        Route::post('delete', [App\Http\Controllers\AdminLinkController::class, 'delete'])->name('admin.link.delete');
    });


Route::prefix('product')->group(function (){
    Route::get('', [App\Http\Controllers\AdminproductController::class, 'index'])->name('admin.product');
    Route::get('getcategory', [App\Http\Controllers\AdminproductController::class, 'kategori'])->name('s2.kategori');
    Route::get('create', [App\Http\Controllers\AdminproductController::class, 'create'])->name('admin.product.create');
    Route::get('edit/{id}', [App\Http\Controllers\AdminproductController::class, 'edit'])->name('admin.product.edit');
    Route::post('store', [App\Http\Controllers\AdminproductController::class, 'store'])->name('admin.product.store');
    Route::post('update', [App\Http\Controllers\AdminproductController::class, 'update'])->name('admin.product.update');
    Route::post('delete', [App\Http\Controllers\AdminproductController::class, 'delete'])->name('admin.product.delete');
    Route::post('storecategory', [App\Http\Controllers\AdminproductController::class, 'storekategori'])->name('admin.product.kategori.store');
    Route::get('category/{id}', [App\Http\Controllers\AdminproductController::class, 'getkategori'])->name('admin.product.kategori.get');
    Route::post('updatecategory', [App\Http\Controllers\AdminproductController::class, 'updatekategori'])->name('admin.product.kategori.update');
});

Route::post('ubahpassword', [App\Http\Controllers\AdminUserController::class, 'ubahpassword'])->name('admin.user.ubahpassword');

});
