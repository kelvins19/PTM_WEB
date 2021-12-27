<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Admin\AdProductController;
use App\Http\Controllers\Admin\AdPelangganController;
use App\Http\Controllers\Admin\AdRakController;
use App\Http\Controllers\Admin\AdMerkController;
use App\Http\Controllers\Admin\AdMerkKategoriController;
use App\Http\Controllers\Admin\AdMerkSubKategoriController;
use App\Http\Controllers\Admin\AdUserController;

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

Route::get('/', [ProductController::class, 'index'])->name('products');

Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post'); 
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post'); 
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['prefix' => 'admin'], function () {
    Route::get('', [AuthController::class, 'dashboard'])->name('admin'); 

    Route::group(['prefix' => 'product'], function () {
        Route::get('', [AdProductController::class, 'index'])->name('admin.product');
        Route::get('view/{id}', [AdProductController::class, 'viewProductDetail'])->name('admin.product.detail');
        Route::get('edit/{id}', [AdProductController::class, 'edit'])->name('admin.product.edit');
        Route::get('delete/{id}', [AdProductController::class, 'delete'])->name('admin.product.delete');
        Route::post('update/{id}', [AdProductController::class, 'update'])->name('admin.product.update');

        Route::get('add', [AdProductController::class, 'add'])->name('admin.product.add');
        Route::post('create', [AdProductController::class, 'createNewProduct'])->name('admin.product.create');
    });

    Route::group(['prefix' => 'users'], function () {
        Route::get('', [AdUserController::class, 'index'])->name('admin.users');
        Route::get('edit/{id}', [AdUserController::class, 'edit'])->name('admin.users.edit');
        Route::get('delete/{id}', [AdUserController::class, 'delete'])->name('admin.users.delete');
        Route::post('update/{id}', [AdUserController::class, 'update'])->name('admin.users.update');
    });

    Route::group(['prefix' => 'pelanggan'], function () {
        Route::get('', [AdPelangganController::class, 'index'])->name('admin.pelanggan'); 
        Route::get('edit/{id}', [AdPelangganController::class, 'edit'])->name('admin.pelanggan.edit');
        Route::get('delete/{id}', [AdPelangganController::class, 'delete'])->name('admin.pelanggan.delete');
        Route::post('update/{id}', [AdPelangganController::class, 'update'])->name('admin.pelanggan.update');

        Route::get('add', [AdPelangganController::class, 'add'])->name('admin.pelanggan.add');
        Route::post('create', [AdPelangganController::class, 'createNewPelanggan'])->name('admin.pelanggan.create');
    });

    Route::group(['prefix' => 'rak'], function () {
        Route::get('', [AdRakController::class, 'index'])->name('admin.rak'); 
        Route::get('edit/{id}', [AdRakController::class, 'edit'])->name('admin.rak.edit');
        Route::get('delete/{id}', [AdRakController::class, 'delete'])->name('admin.rak.delete');
        Route::post('update/{id}', [AdRakController::class, 'update'])->name('admin.rak.update');

        Route::get('add', [AdRakController::class, 'add'])->name('admin.rak.add');
        Route::post('create', [AdRakController::class, 'createNewRak'])->name('admin.rak.create');
    });

    Route::group(['prefix' => 'merk'], function () {
        Route::get('', [AdMerkController::class, 'index'])->name('admin.merk'); 
        Route::get('edit/{id}', [AdMerkController::class, 'edit'])->name('admin.merk.edit');
        Route::get('delete/{id}', [AdMerkController::class, 'delete'])->name('admin.merk.delete');
        Route::post('update/{id}', [AdMerkController::class, 'update'])->name('admin.merk.update');

        Route::get('add', [AdMerkController::class, 'add'])->name('admin.merk.add');
        Route::post('create', [AdMerkController::class, 'createNewMerk'])->name('admin.merk.create');
    });

    Route::group(['prefix' => 'merk-kategori'], function () {
        Route::get('', [AdMerkKategoriController::class, 'index'])->name('admin.merk-kategori'); 
        Route::get('edit/{id}', [AdMerkKategoriController::class, 'edit'])->name('admin.merk-kategori.edit');
        Route::get('delete/{id}', [AdMerkKategoriController::class, 'delete'])->name('admin.merk-kategori.delete');
        Route::post('update/{id}', [AdMerkKategoriController::class, 'update'])->name('admin.merk-kategori.update');

        Route::get('add', [AdMerkKategoriController::class, 'add'])->name('admin.merk-kategori.add');
        Route::post('create', [AdMerkKategoriController::class, 'createNewMerkKategori'])->name('admin.merk-kategori.create');
    });

    Route::group(['prefix' => 'merk-subkategori'], function () {
        Route::get('', [AdMerkSubKategoriController::class, 'index'])->name('admin.merk-subkategori'); 
        Route::get('edit/{id}', [AdMerkSubKategoriController::class, 'edit'])->name('admin.merk-subkategori.edit');
        Route::get('delete/{id}', [AdMerkSubKategoriController::class, 'delete'])->name('admin.merk-subkategori.delete');
        Route::post('update/{id}', [AdMerkSubKategoriController::class, 'update'])->name('admin.merk-subkategori.update');

        Route::get('add', [AdMerkSubKategoriController::class, 'add'])->name('admin.merk-subkategori.add');
        Route::post('create', [AdMerkSubKategoriController::class, 'createNewMerkSubKategori'])->name('admin.merk-subkategori.create');
    });
    
});


