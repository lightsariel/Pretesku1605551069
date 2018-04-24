@extends('layout')
@section('title', 'KRS')
@section('body')
<div class="container">
	<h2>List Matakuliah
		<a href="{{ route('matakuliah.create') }}">
			<button type="button" class="btn btn-success" style="float:right;">Tambah Matakuliah</button>
		</a>
	</h2>
	<div class="table-responsive">
		<table class="table">
			<thead>
				<tr class="success">
					<th>No</th>
					<th>Kode Mata Kuliah</th>
					<th>Nama Mata Kuliah</th>
					<th>SKS</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach($matakuliahs as $i => $matakuliah)
				<tr class="active">
					<td>{{ $i+1 }}</td>
					<td>{{ $matakuliah->kode_mk }}</td>
					<td>{{ $matakuliah->nama_mk }}</td>
					<td>{{ $matakuliah->sks }}</td>
					<td style="width:140px;">
						<a href="{{ route('matakuliah.edit',$matakuliah->id) }}">
							<button class="btn btn-primary">Edit</button>
						</a>
						<button type="button" data-id="{{ $matakuliah->id }}" class="hapus btn btn-danger" 
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
				<h4 class="modal-title">&nbsp;&nbsp;&nbsp;Hapus Matakuliah Ini?</h4>
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
			var link = 'matakuliah/' + id;
			$('#delete-form').attr("action", link);
		});
	</script>
@endsection
