@extends('layouts.app')

@section('content')
		<div class="container">
			<h2>Mengedit Data Produk</h2>
			<!-- <br /> -->
			@if ($errors->any())
				<div class="alert alert-danger">
					<ul>
						@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
				<!-- <br /> -->
			@endif
			@if (\Session::has('success'))
				<div class="alert alert-success">
					<p>{{ \Session::get('success') }}</p>
				</div><br />
			@endif
			<form method="post" action="{{action('ProdukController@update',$id)}}" enctype="multipart/form-data">
			{{csrf_field()}}
				<div class="row">
					<div class="col-md-4"></div>
					<div class="form-group col-md-4">
						<label for="nama_produk">Nama produk:</label>
						<input type="text" class="form-control" name="nama_produk" value="{{$produk->nama_produk}}">
					</div>
				</div>
				<div class="row">
					<div class="col-md-4"></div>
					<div class="form-group col-md-4">
						<label for="id_kategori">ID kategori:</label>
						<!-- <input type="text" class="form-control" name="id_kategori" value="{{$produk->id_kategori}}"> -->
						<select name="id_kategori" id="id_kategori" class="form-control input-sm">
						@foreach($data_kategori as $kategori)
							<option value="{{ $kategori->id_kategori }}" {{ $kategori->id_kategori === $produk->id_kategori ? 'selected' : ''}}>{{ $kategori->nama_kategori }}</option>
						@endforeach
						</select>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4"></div>
					<div class="form-group col-md-4">
						<label for="harga">Harga:</label>
						<input type="text" class="form-control" name="harga" value="{{$produk->harga}}">
					</div>
				</div>
				<div class="row">
					<div class="col-md-4"></div>
					<div class="form-group col-md-4">
						<label for="deskripsi">Deskripsi:</label>
						<textarea class="form-control" name="deskripsi" rows="3">{{$produk->deskripsi}}</textarea>
						<!-- value="{{$produk->deskripsi}}" -->
					</div>
				</div>
				<div class="row">
					<div class="col-md-4"></div>
					<div class="form-group col-md-4">
						<label for="gambar">Gambar:</label>
						<p>{{$produk->gambar}}</p>
						<!-- <input type="text" class="form-control" name="gambar" value="{{$produk->gambar}}"> -->
						<input type="file" class="form-control" name="gambar" id="gambar" value="{{$produk->gambar}}">
					</div>
				</div>
				<div class="row">
					<div class="col-md-4"></div>
					<div class="form-group col-md-2">
						<button type="submit" class="btn btn-success">Tambah Produk</button>
					</div>
					<div class="form-group col-md-2">
						<a href="{{ URL::previous() }}" class="btn btn-primary">Cancel</a>
					</div>
				</div>
			</form>
		</div>
@endsection
