@extends('layout2')
@section('title', 'KRS')
@section('body')
<div class="container">
	<h2>Kartu Hasil Studi
	</h2>
	<form action="/khs" method="GET">
		<select class="form-control" name="tahun_ajaran">
			<option value="all">--Semua Tahun Ajaran--</option>
			@foreach($tahuns as $tahun2)
			<option @if($tahun == $tahun2) {{'selected'}} @endif value="{{$tahun2}}">{{$tahun2}}</option>
			@endforeach
		</select>
		<select class="form-control" name="semester">
			<option value="all">--Semua Semester--</option>
			<option @if($semester == 'Ganjil') {{'selected'}} @endif value="Ganjil">Ganjil</option>
			<option @if($semester == 'Genap') {{'selected'}} @endif value="Genap">Genap</option>
		</select>
		<button type="submit" class="btn btn-default">Tampilkan</button>
	</form>  
	<div class="table-responsive">
		<table class="table">
			<thead>
				<tr class="success">
					<th>No</th>
					<th>Tahun Ajaran</th>
					<th>Semester</th>
					<th>Kode Mata Kuliah</th>
					<th>Nama Mata Kuliah (Kelas)</th>
					<th>SKS</th>
					<th>Nilai</th>
					
					<th>N*K</th>
				</tr>
			</thead>
			<tbody>
				@if(count($krss)!=0)
				@foreach($krss as $i => $krs)
				<tr class="active">
					<td>{{ $i+1 }}</td>
					<td>{{ $krs->mktawar->tahun_ajaran }}</td>
					<td>{{ $krs->mktawar->semester }}</td>
					<td>{{ $krs->mktawar->matakuliah->kode_mk }}</td>
					<td>{{ $krs->mktawar->matakuliah->nama_mk }} {{ $krs->mktawar->kelas }}</td>
					
					<td>{{ $krs->mktawar->matakuliah->sks }}</td>
					<td>{{ $krs->nilai }}</td>
					<td>{{ $krs->sn }}</td>
				</tr>
				@endforeach
				<tr class="active">
					<td colspan="5"><b>Total SKS :</b></td>
					<td><b>{{ $total_sks }}</b></td>
					<td><b></b></td>
					<td><b>{{ $total_sn }}</b></td>
				</tr>
				@endif
			</tbody>
		</table>
	</div>
	@if(count($krss)!=0)
	<div class="row">
		<div class="col-md-10">
		</div>
		<div class="col-md-1">
			<label>IPS</label>
		</div>
		<div class="col-md-1">
			<lavel>:</label>
			<label style="float:right">{{ $ips }}</label>
		</div>
	</div>
	<div class="row">
		<div class="col-md-10">
		</div>
		<div class="col-md-1">
			<label>IPK</label>
		</div>
		<div class="col-md-1">
			<lavel>:</label>
			<label style="float:right">{{ $ipk }}</label>
		</div>
	</div>
	@endif
</div>
@endsection

@section('script')
@endsection
