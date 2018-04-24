@extends('layout')
@section('title', 'KRS')
@section('body')
<div class="container">
	<h2>List Mahasiswa
		<a href="{{ route('mahasiswa.create') }}">
			<button type="button" class="btn btn-success" style="float:right;">Tambah Mahasiswa</button>
		</a>
	</h2>
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
					<td style="width:140px;">
						<a href="{{ route('mahasiswa.edit',$mahasiswa->id) }}">
							<button class="btn btn-primary">Edit</button>
						</a>
						<button type="button" data-id="{{ $mahasiswa->id }}" class="hapus btn btn-danger" 
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
				<h4 class="modal-title">&nbsp;&nbsp;&nbsp;Hapus Mahasiswa Ini?</h4>
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
			var link = 'mahasiswa/' + id;
			$('#delete-form').attr("action", link);
		});
	</script>
@endsection
