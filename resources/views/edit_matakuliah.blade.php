@extends('layout')
@section('title', 'KRS')
@section('body')
<div class="container">
	<h2>Edit Matakuliah</h2>
	<form action="{{ route('matakuliah.update', $matakuliah->id) }}" method="POST">
        {{ csrf_field() }}
        {{ method_field("PUT") }}
        <input type="hidden" value="{{ $matakuliah->id }}" name="id">
		<div class="form-group">
			<label>Kode Mata Kuliah:</label>
            <input type="text" class="form-control" placeholder="Masukkan Kode Mata Kuliah" 
            name="kode_mk" value="{{ $matakuliah->kode_mk }}">
		</div>
		<div class="form-group">
			<label>Nama Mata Kuliah:</label>
            <input type="text" class="form-control" placeholder="Masukkan Nama Mata Kuliah" 
            name="nama_mk" value="{{ $matakuliah->nama_mk }}">
		</div>
		<div class="form-group">
			<label>SKS:</label>
            <input type="number" class="form-control" placeholder="Masukkan sks" 
            name="sks" value="{{ $matakuliah->sks }}">
		</div>
		<button type="submit" class="btn btn-success">Submit</button>
	</form>  

	@if($errors->has('kode_mk'))
		<div class="col-sm-12 alert alert-warning" role="alert" style="margin-bottom:px;">
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
</div>
@endsection