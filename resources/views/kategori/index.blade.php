@extends('layouts.app')

@section('content')
		<div class="container">
		<h2>Data Kategori Produk</h2>
		<!-- <br /> -->
		@if (\Session::has('success'))
		<div class="alert alert-success">
			<p>{{ \Session::get('success') }}</p>
		</div>
		<!-- <br /> -->
		@endif
		<div class="row">
			<div class="col-sm">
				<a href="{{action('KategoriProdukController@create')}}" class="btn btn-primary">Tambah Kategori</a>	
			</div>
			<div class="col-sm">
				<a href="{{action('ProdukController@index')}}" >Produk</a>
			</div>
			<div class="col-sm">
				{{ $data_kategori->links() }}
			</div>
		</div>
		<br />
		<table class="table table-striped">
			<thead>
				<tr>
					<th>ID</th>
					<th>Nama</th>
					<th colspan="2">Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach($data_kategori as $kategori)
				<tr>
					<td>{{$kategori['id_kategori']}}</td>
					<td>{{$kategori['nama_kategori']}}</td>
					<td><a href="{{action('KategoriProdukController@edit', $kategori['id_kategori'])}}" class="btn
					btn-warning">Edit</a></td>
					<td>
						<form action="{{action('KategoriProdukController@destroy', $kategori['id_kategori'])}}"
						method="post">
							{{csrf_field()}}
							<input name="_method" type="hidden" value="DELETE">
							<button class="btn btn-danger" type="submit">Delete</button>
						</form>
					</td>
				</tr>
				@endforeach
				<!-- <script>
					$(".delete").on("submit", function(){
						return confirm("Anda yakin menghapus data ini?");
					});
				</script> -->
			</tbody>
		</table>
		</div>
@endsection