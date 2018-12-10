<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KategoriProduk;

class KategoriProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_kategori = KategoriProduk::simplePaginate(10);//::all()->toArray();
		return view('kategori.index', compact('data_kategori'));
    }
    
    public function __construct()
	{
		$this->middleware('auth');
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$kategori = new KategoriProduk;
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->save();
        return back()->with('success', 'Kategori produk telah ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kategori = KategoriProduk::find($id);
		return view('kategori.edit',compact('kategori','id'));
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
        $kategori = KategoriProduk::find($id);
		$this->validate(request(), [
			'nama_kategori' => 'required'
		]);
		$kategori->nama_kategori = $request->get('nama_kategori');
		$kategori->save();
		return redirect('kategori')->with('success','Kategori Produk berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		$kategori = KategoriProduk::find($id);
		$kategori->delete();
		return redirect('kategori')->with('success','Kategori Produk berhasil dihapus');
    }
}
