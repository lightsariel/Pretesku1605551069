@extends('layout')
@section('title', 'KRS')
@section('body')
<div class="container">
	<h2>List Mata Kuliah Tawaran
		<a href="{{ route('mktawar.create') }}">
			<button type="button" class="btn btn-success" style="float:right;">Tambah MK Tawar</button>
		</a>
	</h2>
	<form action="{{ route('mktawar.index') }}" method="GET">
		<select class="form-control" name="tahun_ajaran">
			<option value="">--Semua Tahun Ajaran--</option>
			@foreach($tahuns as $tahun)
			<option value="{{$tahun}}">{{$tahun}}</option>
			@endforeach
		</select>
		<select class="form-control" name="semester">
			<option value="">--Semua Semester--</option>
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
					<th>Kode Mata Kuliah</th>
					<th>Nama Mata Kuliah</th>
					<th>Dosen</th>
                    <th>Kelas</th>
                    <th>Semester</th>
                    <th>Tahun Ajaran</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach($mktawars as $i => $mktawar)
				<tr class="active">
					<td>{{ $i+1 }}</td>
					<td>{{ $mktawar->matakuliah->kode_mk }}</td>
					<td>{{ $mktawar->matakuliah->nama_mk }}</td>
					<td>{{ $mktawar->dosen->nama}}</td>
                    <td>{{ $mktawar->kelas }}</td>
                    <td>{{ $mktawar->semester }}</td>
                    <td>{{ $mktawar->tahun_ajaran }}</td>
					<td style="width:140px;">
						<a href="{{ route('mktawar.edit',$mktawar->id) }}">
							<button class="btn btn-primary">Edit</button>
						</a>
						<button type="button" data-id="{{ $mktawar->id }}" class="hapus btn btn-danger" 
						data-toggle="modal" data-target="#modal-hapus">Hapus</button>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>

<!-- Modal Hapus -->
<div id="modal-hapus" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<center>	
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">&nbsp;&nbsp;&nbsp;Hapus Mata Kuliah Tawar Ini?</h4>
			</div>
			<div class="modal-body">
				<form action="" method="POST" id="delete-form">
					{{ csrf_field() }}
					{{ method_field('DELETE') }}
					<button type="submit" class="btn btn-danger">Hapus</button>
					<button class="btn btn-info" data-dismiss="modal">&nbsp;Batal&nbsp;</button>	
				</form>
			</div>
			</center>
		</div>
	</div>
</div>
@endsection

@section('script')
	<script>
		$(document).on("click", ".hapus", function () {
			var id = $(this).data('id');
			var link = 'mktawar/' + id;
			$('#delete-form').attr("action", link);
		});
	</script>
@endsection
