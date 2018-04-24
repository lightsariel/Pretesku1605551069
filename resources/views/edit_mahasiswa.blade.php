@extends('layout')
@section('title', 'KRS')
@section('body')
<div class="container">
	<h2>Edit Mahasiswa</h2>
	<form action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method="POST">
        {{ csrf_field() }}
        {{ method_field("PUT") }}
        <input type="hidden" value="{{ $mahasiswa->id }}" name="id">
		<div class="form-group">
			<label>NIM:</label>
            <input type="number" class="form-control" placeholder="Masukkan NIM" 
            name="nim" value="{{ $mahasiswa->nim }}">
		</div>
		<div class="form-group">
			<label>Nama:</label>
            <input type="text" class="form-control" placeholder="Masukkan Nama" 
            name="nama" value="{{ $mahasiswa->nama }}">
		</div>
		<div class="form-group">
			<label>Alamat:</label>
            <input type="text" class="form-control" placeholder="Masukkan Alamat" 
            name="alamat" value="{{ $mahasiswa->alamat }}">
		</div>
		<button type="submit" class="btn btn-success">Submit</button>
	</form>  

	@if($errors->has('nim'))
		<div class="col-sm-12 alert alert-warning" role="alert" style="margin-bottom:px;">
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
</div>
@endsection