<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produk;
use App\KategoriProduk;

class ApiProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_produk = Produk::with('kategori')->get()->toArray();
        // $kategori = KategoriProduk::with('quotes')->find($id)->quotes;
        return $data_produk; 
        // return $data_produk[0]['nama_produk'];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showById($id)
    {
        $data_produk = Produk::where('id_produk', $id)->get();
		return $data_produk; 
    }
    
    public function showByKategori($id)
    {
        $data_produk = Produk::where('id_kategori', $id)->get();
		return $data_produk; //view('kategori.index', compact('data_kategori'));
    }
    
    public function showByNama($nama)
    {
        $data_produk = Produk::where('nama_produk', 'LIKE', '%'.$nama.'%')->get();
		return $data_produk; 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
