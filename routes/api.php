<?php

use Illuminate\Http\Request;
use App\Produk;
use App\KategoriProduk;
use App\Http\Resources\ProdukCollection;
use App\Http\Resources\KategoriCollection;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/*Route::get('/produk', function () {
    return new ProdukCollection(Produk::all());
});*/

Route::get('/produk', 'ApiProdukController@index');

Route::get('/produk/kategori/{id}', 'ApiProdukController@showByKategori');

Route::get('/produk/nama/{nama}', 'ApiProdukController@showByNama');

Route::get('/produk/{id}', 'ApiProdukController@showById');

Route::get('/kategori', 'ApiKategoriProdukController@index');

/*Route::get('/kategori', function () {
    return new KategoriCollection(KategoriProduk::all());
});*/
