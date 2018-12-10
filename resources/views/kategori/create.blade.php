@extends('layouts.app')

@section('content')
		<div class="container">
			<h2>Membuat Kategori Produk</h2>
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
			<form method="post" action="{{url('kategori')}}">
			{{csrf_field()}}
				<div class="row">
					<div class="col-md-4"></div>
					<div class="form-group col-md-4">
						<label for="nama_kategori">Nama kategori:</label>
						<input type="text" class="form-control" name="nama_kategori">
					</div>
				</div>
				<div class="row">
					<div class="col-md-4"></div>
					<div class="form-group col-md-2">
						<button type="submit" class="btn btn-success">Tambah Kategori Produk</button>
					</div>
					<div class="form-group col-md-2">
						<a href="{{ URL::previous() }}" class="btn btn-primary">Cancel</a>
					</div>
				</div>
			</form>
		</div>
@endsection
