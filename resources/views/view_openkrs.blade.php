@extends('layout')
@section('title', 'KRS')
@section('body')
<div class="container">
	<h2>Atur Registrasi KRS</h2>
	<form action="{{ route('openkrs.update', 1) }}" method="POST">
        {{ csrf_field() }}
        {{ method_field("PUT") }}
		<div class="form-group">
			<label>Semester:</label>
            <select class="form-control" name="semester">
                <option value="Ganjil" @if($openkrs->semester=="Ganjil") {{"selected"}} @endif>Ganjil</option>
                <option value="Genap"  @if($openkrs->semester=="Genap") {{"selected"}} @endif>Genap</option>
            </select>
        </div>
		<div class="form-group">
			<label>Tahun Ajaran:</label>
            <input type="number" class="form-control" placeholder="Masukkan Tahun Ajaran" 
            name="tahun_ajaran" value="{{ $openkrs->tahun_ajaran }}">
		</div>
		<div class="form-group">
			<label>Status Aktif:</label>
            <select class="form-control" name="status">
                <option value="Aktif" @if($openkrs->status=="Aktif") {{"selected"}} @endif>Aktif</option>
                <option value="Tidak Aktif"  @if($openkrs->status=="Tidak Aktif") {{"selected"}} 
				@endif>Tidak Aktif</option>
            </select>
        </div>
		<button type="submit" class="btn btn-success">Submit</button>
	</form>  

	@if($errors->has('semester'))
		<div class="col-sm-12 alert alert-warning" role="alert" style="margin-bottom:px;">
			@foreach($errors->get('semester', ':message') as $error) {{$error}} @endforeach
		</div>
	@endif
	@if($errors->has('tahun_ajaran'))
		<div class="col-sm-12 alert alert-warning" role="alert" style="margin-bottom:0px;">
			@foreach($errors->get('tahun_ajaran', ':message') as $error) {{$error}} @endforeach
		</div>
	@endif
	@if($errors->has('status'))
		<div class="col-sm-12 alert alert-warning" role="alert" style="margin-bottom:15px;">
			@foreach($errors->get('status', ':message') as $error) {{$error}} @endforeach
		</div>
	@endif
</div>
@endsection