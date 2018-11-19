<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Laravel 5.5 CRUD Tutorial</title>
		<link rel="stylesheet" href="{{asset('css/app.css')}}">
	</head>
	<body>
		<div class="container">
			<h2>Membuat Kategori Produk</h2><br />
			<form method="post">
				<div class="row">
					<div class="col-md-4"></div>
					<div class="form-group col-md-4">
						<label for="name">Nama kategori:</label>
						<input type="text" class="form-control" name="name">
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
						left:38px">Tambah Produk</button>
					</div>
				</div>
			</form>
		</div>
	</body>
</html>
