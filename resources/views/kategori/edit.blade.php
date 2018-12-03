<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Toko Online</title>
		<link rel="stylesheet" href="{{asset('css/app.css')}}">
	</head>
	<body>
		<div class="container">
			<h2>Edt Kategori Produk</h2><br />
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
			<form method="post" action="{{action('KategoriProdukController@update',$id)}}">
			{{csrf_field()}}
				<div class="row">
					<div class="col-md-4"></div>
					<div class="form-group col-md-4">
						<label for="nama_kategori">Nama kategori:</label>
						<input type="text" class="form-control" name="nama_kategori" value="{{$kategori->nama_kategori}}">
					</div>
				</div>
				<!--div class="row">
					<div class="col-md-4"></div>
					<div class="form-group col-md-4">
						<label for="price">Harga:</label>
						<input type="text" class="form-control" name="price">
					</div>
				</div-->
				<div class="row">
					<div class="col-md-4"></div>
					<div class="form-group col-md-4">
						<button type="submit" class="btn btn-success"
						left:38px">Edit Produk</button>
					</div>
				</div>
			</form>
		</div>
	</body>
</html>
