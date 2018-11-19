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
			</tbody>
		</table>
		</div>
	</body>
</html>
