@extends('layout')
@section('title', 'KRS')
@section('body')
<div class="container">
	<h2>Tambah Dosen</h2>
	<form action="{{ route('dosen.store') }}" method="POST">
		{{ csrf_field() }}
		<div class="form-group">
			<label>NIP:</label>
			<input type="number" class="form-control" placeholder="Masukkan NIP" name="nip">
		</div>
		<div class="form-group">
			<label>Nama:</label>
			<input type="text" class="form-control" placeholder="Masukkan Nama" name="nama">
		</div>


		@if($errors->has('nip'))
			<div class="col-sm-12 alert alert-warning" role="alert" style="margin-bottom:0px;">
				@foreach($errors->get('nip', ':message') as $error) {{$error}} @endforeach
			</div>
		@endif
		@if($errors->has('nama'))
			<div class="col-sm-12 alert alert-warning" role="alert" style="margin-bottom:0px;">
				@foreach($errors->get('nama', ':message') as $error) {{$error}} @endforeach
			</div>
		@endif
		
		<button type="submit" class="btn btn-success">Submit</button>
	</form>  
</div>
@endsection