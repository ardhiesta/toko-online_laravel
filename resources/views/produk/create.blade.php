@extends('layouts.app')

@section('content')
		<div class="container">
			<h2>Membuat Produk Baru</h2>
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
			<form method="post" action="{{url('produk')}}" enctype="multipart/form-data">
			{{csrf_field()}}
				<div class="row">
					<div class="col-md-4"></div>
					<div class="form-group col-md-4">
						<label for="nama_produk">Nama produk:</label>
						<input type="text" class="form-control" name="nama_produk">
					</div>
				</div>
				<div class="row">
					<div class="col-md-4"></div>
					<div class="form-group col-md-4">
						<label for="id_kategori">Kategori:</label>
						<!-- <input type="text" class="form-control" name="id_kategori"> -->
						<select name="id_kategori" id="id_kategori" class="form-control input-sm">
						@foreach($data_kategori as $kategori)
							<option value="{{ $kategori->id_kategori }}">{{ $kategori->nama_kategori }}</option>
						@endforeach
						</select>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4"></div>
					<div class="form-group col-md-4">
						<label for="harga">Harga:</label>
						<input type="text" class="form-control" name="harga">
					</div>
				</div>
				<div class="row">
					<div class="col-md-4"></div>
					<div class="form-group col-md-4">
						<label for="deskripsi">Deskripsi:</label>
						<textarea class="form-control" name="deskripsi" rows="3"></textarea>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4"></div>
					<div class="form-group col-md-4">
						<label for="gambar">Gambar:</label>
						<input type="file" class="form-control" name="gambar" id="gambar">
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
