@extends('layout')
@section('title', 'KRS')
@section('body')
<div class="container">
	<h2>Tambah Mahasiswa</h2>
	<form action="{{ route('mahasiswa.store') }}" method="POST">
		{{ csrf_field() }}
		<div class="form-group">
			<label>NIM:</label>
			<input type="number" class="form-control" placeholder="Masukkan NIM" name="nim">
		</div>
		<div class="form-group">
			<label>Nama:</label>
			<input type="text" class="form-control" placeholder="Masukkan Nama" name="nama">
		</div>
		<div class="form-group">
			<label>Alamat:</label>
			<input type="text" class="form-control" placeholder="Masukkan Alamat" name="alamat">
		</div>

		@if($errors->has('nim'))
			<div class="col-sm-12 alert alert-warning" role="alert" style="margin-bottom:0px;">
				@foreach($errors->get('nim', ':message') as $error) {{$error}} @endforeach
			</div>
		@endif
		@if($errors->has('nama'))
			<div class="col-sm-12 alert alert-warning" role="alert" style="margin-bottom:0px;">
				@foreach($errors->get('nama', ':message') as $error) {{$error}} @endforeach
			</div>
		@endif
		@if($errors->has('alamat'))
			<div class="col-sm-12 alert alert-warning" role="alert" style="margin-bottom:15px;">
				@foreach($errors->get('alamat', ':message') as $error) {{$error}} @endforeach
			</div>
		@endif
		
		<button type="submit" class="btn btn-success">Submit</button>
	</form>  
</div>
@endsection