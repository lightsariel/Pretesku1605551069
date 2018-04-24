@extends('layout3')
@section('title', 'KRS')
@section('body')
<div class="container">
	<form action="/approve_krs" method="POST">
		{{ csrf_field() }}
		<input type="hidden" name="status" value="{{ $status }}">
		<h2>Data KRS : {{ $mahasiswa->nama }}({{ $mahasiswa->nim }})</h2>
		<input type="hidden" name="id_mhs" value="{{ $mahasiswa->id }}">
		@if($status == 2) 
		<button type="submit" class="btn btn-danger" style="float:right;">Batal Approve KRS</button>
		@else
		<button type="submit" class="btn btn-primary" style="float:right;">Approve KRS Ini</button>
		@endif
		<br><br>
		<div class="table-responsive">
			<table class="table">
				<thead>
					<tr class="success">
						<th>No</th>
						<th>Kode Mata Kulah</th>
						<th>Nama Mata Kuliah</th>
						<th>SKS</th>
					</tr>
				</thead>
				<tbody>
					@foreach($krss as $i => $krs)
					<tr class="active">
						<td>{{ $i+1 }}</td>
						<td>{{ $krs->mktawar->matakuliah->nama_mk }}</td>
						<td>{{ $krs->mktawar->matakuliah->nama_mk }}</td>
						<td>{{ $krs->mktawar->matakuliah->sks }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</form>
</div>
@endsection

@section('script')
@endsection
