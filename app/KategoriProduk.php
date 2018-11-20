<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KategoriProduk extends Model
{
    protected $table = 'kategori_produk';
    protected $fillable = ['nama_kategori'];
}
