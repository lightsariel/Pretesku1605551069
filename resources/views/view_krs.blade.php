@extends('layout2')
@section('title', 'KRS')
@section('body')
<div class="container">
	<h2>Data KRS
	</h2>
	<form action="{{ route('krs.store') }}" method="POST">
		{{ csrf_field() }}
		<select class="form-control" name="tahun_ajaran">
			<option value="all">--Semua Tahun Ajaran--</option>
			@foreach($tahuns as $tahun)
			<option value="{{$tahun}}">{{$tahun}}</option>
			@endforeach
		</select>
		<select class="form-control" name="semester">
			<option value="all">--Semua Semester--</option>
			<option value="Ganjil">Ganjil</option>
			<option value="Genap">Genap</option>
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
				</tr>
				@endforeach
				@endif
			</tbody>
		</table>
	</div>
</div>
@endsection

@section('script')
	<script>
		$(document).on("click", ".hapus", function () {
			var id = $(this).data('id');
			var link = 'krs/' + id;
			$('#delete-form').attr("action", link);
		});
	</script>
@endsection
