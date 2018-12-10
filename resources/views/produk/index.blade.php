@extends('layouts.app')

@section('content')
		<div class="container">
		<h2>Data Produk</h2>
		<!-- <br /> -->
		@if (\Session::has('success'))
		<div class="alert alert-success">
			<p>{{ \Session::get('success') }}</p>
		</div>
		<!-- <br /> -->
		@endif
		<div class="row">
			<div class="col-sm">
				<a href="{{action('ProdukController@create')}}" class="btn btn-primary">Tambah Produk</a>
			</div>
			<!-- <div class="col-sm">
				<form action="/search" method="POST" role="search">
					{{ csrf_field() }}
					<div class="input-group">
						<input type="text" class="form-control" name="q"
							placeholder="Cari produk"> <span class="input-group-btn">
							<button type="submit" class="btn btn-default">
								<span class="glyphicon glyphicon-search">Submit</span>
							</button>
						</span>
					</div>
				</form>
			</div> -->
			<div class="col-sm">
				{{ $data_produk->links() }}
			</div>
		</div>
		<br />
		<table class="table table-striped">
			<thead>
				<tr>
					<th>ID</th>
					<th>Nama Produk</th>
					<th>Kategori</th>
					<th>Harga</th>
					<th>Deskripsi</th>
					<th>Gambar</th>
					<th colspan="2">Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach($data_produk as $produk)
				<tr>
					<td>{{$produk['id_produk']}}</td>
					<td>{{$produk['nama_produk']}}</td>
					<td>{{$produk->kategori->nama_kategori}}</td>
					<td>{{$produk['harga']}}</td>
					<td>{{$produk['deskripsi']}}</td>
					<td>{{$produk['gambar']}}</td>
					<td><a href="{{action('ProdukController@edit', $produk['id_produk'])}}" class="btn
					btn-warning">Edit</a></td>
					<td>
						<form action="{{action('ProdukController@destroy', $produk['id_produk'])}}"
						method="post">
							{{csrf_field()}}
							<input name="_method" type="hidden" value="DELETE">
							<button class="btn btn-danger" type="submit">Delete</button>
						</form>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		</div>
@endsection
