@extends('layout3')
@section('title', 'KRS')
@section('body')
<div class="container">
	@if($openkrs->status=="Tidak Aktif")
		<h2>Registrasi KRS Belum Dibuka</h2>
	@elseif($openkrs->status=="Aktif")
	<h2>Approve KRS Mahasiswa</h2>
	<div class="table-responsive">
		<table class="table">
			<thead>
				<tr class="success">
					<th>No</th>
					<th>NIM</th>
					<th>Nama</th>
					<th>Alamat</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach($mahasiswas as $i => $mahasiswa)
				<tr class="active">
					<td>{{ $i+1 }}</td>
					<td>{{ $mahasiswa->nim }}</td>
					<td>{{ $mahasiswa->nama }}</td>
					<td>{{ $mahasiswa->alamat }}</td>
					<td style="width:70px;">
						@if($mahasiswa->status == 0) 
						<button type="button" class="hapus btn btn-warning">Pending</button>
						@elseif($mahasiswa->status == 1)
						<a href="/edit_approve_krs/{{$mahasiswa->id}}/{{$mahasiswa->status}}">
							<button type="button" class="hapus btn btn-info">Lihat KRS</button>
						</a>
						@elseif($mahasiswa->status == 2)
						<a href="/edit_approve_krs/{{$mahasiswa->id}}/{{$mahasiswa->status}}">
							<button type="button" class="hapus btn btn-success">KRS Approved</button>
						</a>
						@endif
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	@endif
</div>


@endsection

@section('script')
@endsection
