<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Toko Online</title>
		<link rel="stylesheet" href="{{asset('css/app.css')}}">
	</head>
	<body>
		<div class="container">
			<h2>Membuat Produk Baru</h2><br />
			@if ($errors->any())
				<div class="alert alert-danger">
					<ul>
						@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div><br />
			@endif
			@if (\Session::has('success'))
				<div class="alert alert-success">
					<p>{{ \Session::get('success') }}</p>
				</div><br />
			@endif
			<form method="post" action="{{action('ProdukController@update',$id)}}">
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
						<input type="text" class="form-control" name="id_kategori" value="{{$produk->id_kategori}}">
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
						<input type="text" class="form-control" name="deskripsi" value="{{$produk->deskripsi}}">
					</div>
				</div>
				<div class="row">
					<div class="col-md-4"></div>
					<div class="form-group col-md-4">
						<label for="gambar">Gambar:</label>
						<input type="text" class="form-control" name="gambar" value="{{$produk->gambar}}">
					</div>
				</div>
				<div class="row">
					<div class="col-md-4"></div>
					<div class="form-group col-md-4">
						<button type="submit" class="btn btn-success"
						left:38px">Tambah Produk</button>
					</div>
				</div>
			</form>
		</div>
	</body>
</html>
