@extends('layout')
@section('title', 'KRS')
@section('body')
<div class="container">
	<h2>Tambah Matakuliah</h2>
	<form action="{{ route('matakuliah.store') }}" method="POST">
		{{ csrf_field() }}
		<div class="form-group">
			<label>Kode Mata Kuliah:</label>
			<input type="text" class="form-control" placeholder="Masukkan Kode Mata Kuliah" name="kode_mk">
		</div>
		<div class="form-group">
			<label>Nama Mata Kuliah:</label>
			<input type="text" class="form-control" placeholder="Masukkan Nama Mata Kuliah" name="nama_mk">
		</div>
		<div class="form-group">
			<label>SKS:</label>
			<input type="number" class="form-control" placeholder="Masukkan SKS" name="sks">
		</div>


		@if($errors->has('kode_mk'))
			<div class="col-sm-12 alert alert-warning" role="alert" style="margin-bottom:0px;">
				@foreach($errors->get('kode_mk', ':message') as $error) {{$error}} @endforeach
			</div>
		@endif
		@if($errors->has('nama_mk'))
			<div class="col-sm-12 alert alert-warning" role="alert" style="margin-bottom:0px;">
				@foreach($errors->get('nama_mk', ':message') as $error) {{$error}} @endforeach
			</div>
		@endif
		@if($errors->has('sks'))
			<div class="col-sm-12 alert alert-warning" role="alert" style="margin-bottom:15px;">
				@foreach($errors->get('sks', ':message') as $error) {{$error}} @endforeach
			</div>
		@endif
		
		<button type="submit" class="btn btn-success">Submit</button>
	</form>  
</div>
@endsection