@extends('layout3')
@section('title', 'KRS')
@section('body')
<div class="container">
	<h2>Input Nilai
	
	</h2>
	<div class="table-responsive">
		<table class="table">
			<thead>
				<tr class="success">
					<th>No</th>
					<th>Kode Mata Kuliah</th>
					<th>Nama Mata Kuliah (Kelas)</th>
					<th>SKS</th>
					<th>Jumlah Mahasiswa</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach($mktawars as $i => $mktawar)
				<tr class="active">
					<td>{{ $i+1 }}</td>
					<td>{{ $mktawar->matakuliah->kode_mk }}</td>
					<td>{{ $mktawar->matakuliah->nama_mk }} {{$mktawar->kelas}}</td>
					<td>{{ $mktawar->matakuliah->sks }}</td>
					<td>{{ $mktawar->jumlah_mhs }}</td>
					<td style="width:140px;">
						<a href="/input_nilai/{{$mktawar->id}}" >
							<button type="submit" class="btn btn-info">Lihat</button>
						</a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection

@section('script')
	<script>
		$(document).on("click", ".hapus", function () {
			var id = $(this).data('id');
			var link = 'matakuliah/' + id;
			$('#delete-form').attr("action", link);
		});
	</script>
@endsection
