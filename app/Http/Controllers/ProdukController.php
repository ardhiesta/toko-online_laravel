<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produk;
use App\KategoriProduk;
use Illuminate\Support\Facades\Input;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_produk = Produk::simplePaginate(10);//all()->toArray();
        $data_kategori = KategoriProduk::all();
		return view('produk.index', compact('data_produk', 'data_kategori'));
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
        $data_kategori = KategoriProduk::all();
        return view('produk.create', compact('data_kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Input::hasFile('gambar')){
            $produk = new Produk;
            $produk->nama_produk = $request->nama_produk;
            $produk->id_kategori = $request->id_kategori;
            $produk->harga = $request->harga;
            $produk->deskripsi = $request->deskripsi;
            //$produk->gambar = $request->gambar;
            $file = Input::file('gambar');
            $file->move('uploads', $file->getClientOriginalName());
            $produk->gambar = $file->getClientOriginalName();
            $produk->save();
            return redirect('produk')->with('success', 'Produk telah ditambahkan');
        }
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
        $produk = Produk::find($id);
        $data_kategori = KategoriProduk::all();
		return view('produk.edit',compact('produk','id', 'data_kategori'));
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
        $produk = Produk::find($id);
		// $this->validate(request(), [
		// 	'nama_kategori' => 'required'
		// ]);
        $produk->nama_produk = $request->get('nama_produk');
        $data_kategori = KategoriProduk::find($request->get('id_kategori'));
        // $produk->id_kategori = $request->get('id_kategori');
        // $produk->kategori->id_kategori = $data_kategori->id_kategori;
        // $produk->kategori->nama_kategori = $data_kategori->nama_kategori;
        $produk->kategori()->associate($data_kategori);
        $produk->harga = $request->get('harga');
        $produk->deskripsi = $request->get('deskripsi');
        if(Input::hasFile('gambar')){
            $file = Input::file('gambar');
            $file->move('uploads', $file->getClientOriginalName());
            $produk->gambar = $file->getClientOriginalName();
        }
        $produk->save();
		return redirect('produk')->with('success','Data produk berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produk = Produk::find($id);
		$produk->delete();
		return redirect('produk')->with('success','Produk berhasil dihapus');
    }
}
