<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Index Page</title>
		<link rel="stylesheet" href="{{asset('css/app.css')}}">
	</head>
	<body>
		<div class="container">
		<br />
		@if (\Session::has('success'))
		<div class="alert alert-success">
			<p>{{ \Session::get('success') }}</p>
		</div><br />
		@endif
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
					<td>{{$produk['id_kategori']}}</td>
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
	</body>
</html>
