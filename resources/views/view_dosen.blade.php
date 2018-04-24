@extends('layout')
@section('title', 'KRS')
@section('body')
<div class="container">
	<h2>List Dosen
		<a href="{{ route('dosen.create') }}">
			<button type="button" class="btn btn-success" style="float:right;">Tambah dosen</button>
		</a>
	</h2>
	<div class="table-responsive">
		<table class="table">
			<thead>
				<tr class="success">
					<th>No</th>
					<th>NIP</th>
					<th>Nama</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach($dosens as $i => $dosen)
				<tr class="active">
					<td>{{ $i+1 }}</td>
					<td>{{ $dosen->nip }}</td>
					<td>{{ $dosen->nama }}</td>
					<td style="width:140px;">
						<a href="{{ route('dosen.edit',$dosen->id) }}">
							<button class="btn btn-primary">Edit</button>
						</a>
						<button type="button" data-id="{{ $dosen->id }}" class="hapus btn btn-danger" 
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
				<h4 class="modal-title">&nbsp;&nbsp;&nbsp;Hapus Dosen Ini?</h4>
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
			var link = 'dosen/' + id;
			$('#delete-form').attr("action", link);
		});
	</script>
@endsection
