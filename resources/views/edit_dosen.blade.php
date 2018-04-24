@extends('layout')
@section('title', 'KRS')
@section('body')
<div class="container">
	<h2>Edit Dosen</h2>
	<form action="{{ route('dosen.update', $dosen->id) }}" method="POST">
        {{ csrf_field() }}
        {{ method_field("PUT") }}
        <input type="hidden" value="{{ $dosen->id }}" name="id">
		<div class="form-group">
			<label>NIP:</label>
            <input type="number" class="form-control" placeholder="Masukkan nip" 
            name="nip" value="{{ $dosen->nip }}">
		</div>
		<div class="form-group">
			<label>Nama:</label>
            <input type="text" class="form-control" placeholder="Masukkan Nama" 
            name="nama" value="{{ $dosen->nama }}">
		</div>
		<button type="submit" class="btn btn-success">Submit</button>
	</form>  

	@if($errors->has('nip'))
		<div class="col-sm-12 alert alert-warning" role="alert" style="margin-bottom:px;">
			@foreach($errors->get('nip', ':message') as $error) {{$error}} @endforeach
		</div>
	@endif
	@if($errors->has('nama'))
		<div class="col-sm-12 alert alert-warning" role="alert" style="margin-bottom:0px;">
			@foreach($errors->get('nama', ':message') as $error) {{$error}} @endforeach
		</div>
	@endif
</div>
@endsection