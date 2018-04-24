@extends('layout')
@section('title', 'KRS')
@section('body')
<div class="container">
	<h2>Tambah Mata Kuliah Tawaran</h2>
	<form action="{{ route('mktawar.store') }}" method="POST">
		{{ csrf_field() }}
		<div class="form-group">
			<label>Mata Kuliah:</label>
			<select name="id_mk" class="form-control"> 
				<option>--Semua Mata Kuliah--</option>
				@foreach($matakuliahs as $matakuliah)
					<option value="{{ $matakuliah->id }}">{{ $matakuliah->nama_mk }} </option>
				@endforeach
			</select>
		</div>
		<div class="form-group">
			<label>Dosen:</label>
			<select name="id_dosenpengampu" class="form-control">
				<option>--Semua Dosen--</option> 
				@foreach($dosens as $dosen)
					<option value="{{ $dosen->id }}">{{ $dosen->nama }} </option>
				@endforeach
			</select>
		</div>
		<div class="form-group">
			<label>Kelas:</label>
			<select class="form-control" name="kelas">
				<option>(ada)</option>
				<option>A</option>
				<option>B</option>
				<option>C</option>
				<option>D</option>
				<option>E</option>
				<option>F</option>
				<option>G</option>
				<option>H</option>
			</select>
        </div>
        <div class="form-group">
			<label>Semester:</label>
            <select class="form-control" name="semester">
				<option>--Semua Semester--</option>
                <option value="Ganjil">Ganjil</option>
                <option value="Genap">Genap</option>
            </select>
        </div>
        <div class="form-group">
			<label>Tahun Ajaran:</label>
			<input type="number" class="form-control" placeholder="Masukkan Tahun Ajaran" name="tahun_ajaran">
		</div>

		@if($errors->has('id_mk'))
			<div class="col-sm-12 alert alert-warning" role="alert" style="margin-bottom:0px;">
				@foreach($errors->get('id_mk', ':message') as $error) {{$error}} @endforeach
			</div>
		@endif
		@if($errors->has('id_dosenpengampu'))
			<div class="col-sm-12 alert alert-warning" role="alert" style="margin-bottom:0px;">
				@foreach($errors->get('id_dosenpengampu', ':message') as $error) {{$error}} @endforeach
			</div>
		@endif
		@if($errors->has('kelas'))
			<div class="col-sm-12 alert alert-warning" role="alert" style="margin-bottom:15px;">
				@foreach($errors->get('kelas', ':message') as $error) {{$error}} @endforeach
			</div>
        @endif
        @if($errors->has('semester'))
        <div class="col-sm-12 alert alert-warning" role="alert" style="margin-bottom:0px;">
            @foreach($errors->get('semester', ':message') as $error) {{$error}} @endforeach
        </div>
        @endif
        @if($errors->has('tahun_ajaran'))
            <div class="col-sm-12 alert alert-warning" role="alert" style="margin-bottom:15px;">
                @foreach($errors->get('tahun_ajaran', ':message') as $error) {{$error}} @endforeach
            </div>
        @endif
		
		<button type="submit" class="btn btn-success">Submit</button>
	</form>  
</div>
@endsection