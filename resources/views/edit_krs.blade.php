@extends('layout2')
@section('title', 'KRS')
@section('body')
<div class="container">
	@if($openkrs->status=="Tidak Aktif")
		<h2>Registrasi KRS Belum Dibuka</h2>
	@elseif($openkrs->status=="Aktif")
	<h2>Registrasi KRS</h2>
	<form action="/konfirmasi_krs" method="POST">
		{{ csrf_field() }}
		<input type="hidden" name="tahun_ajaran" value="{{ $openkrs->tahun_ajaran }}">
		<input type="hidden"  name="semester" value="{{ $openkrs->semester }}">
		<label>Tahun Ajaran : {{ $openkrs->tahun_ajaran }}</label>
		@if(!empty($cek_krs->status))
			@if($cek_krs->status != 1)
			<button type="submit" class="btn btn-primary" 
				style="float:right;">Submit Registrasi KRS
			</button>  
			<button type="button" data-tahun="{{ $openkrs->tahun_ajaran }}" 
				data-semester="$openkrs->semester" class="tambah btn btn-success" data-toggle="modal" 
				data-target="#modal-tambah" style="float:right;">Tambah Mata Kulah
			</button>
			@endif
		@else 
		<button type="submit" class="btn btn-primary" 
			style="float:right;">Submit Registrasi KRS
		</button>  
		<button type="button" data-tahun="{{ $openkrs->tahun_ajaran }}" 
			data-semester="$openkrs->semester" class="tambah btn btn-success" data-toggle="modal" 
			data-target="#modal-tambah" style="float:right;">Tambah Mata Kulah
		</button>
		@endif
		<br>
		<label>Semester &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $openkrs->semester }}</label>
		<div class="table-responsive">
			<table class="table">
				<thead>
					<tr class="success">
						<th>No</th>
						<th>Kode Mata Kulah</th>
						<th>Nama Mata Kuliah</th>
						<th>SKS</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach($krss as $i => $krs)
					<input type="hidden" name="id_krs[]" value="{{ $krs->id }}">
					<tr class="active">
						<td>{{ $i+1 }}</td>
						<td @if($krs->status == 2) style="text-decoration:line-through" @endif>
								{{ $krs->mktawar->matakuliah->kode_mk }}
							</td>
						<td @if($krs->status == 2) style="text-decoration:line-through" @endif>
							{{ $krs->mktawar->matakuliah->nama_mk }}
						</td>
						<td>{{ $krs->mktawar->matakuliah->sks }}</td>						
						<td style="width:70px;">
							@if($cek_krs->status == 1)
							<button type="button" class="hapus btn btn-success">Approved</button>
							@elseif($cek_krs->status == 0)
							<button type="button" data-id="{{ $krs->id }}" class="hapus btn btn-danger" 
							data-toggle="modal" data-target="#modal-hapus">Hapus</button>
							@else($cek_krs->status == 1)
							<button type="button" class="hapus btn btn-info">Submitted</button>
							@endif
						</td>						
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</form>
	@endif
</div>

<div id="modal-hapus" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<center>	
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">&nbsp;&nbsp;&nbsp;Hapus Mata Kuliah Ini?</h4>
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

<div id="modal-tambah" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<center>	
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">&nbsp;&nbsp;&nbsp;Pilih Mata Kuliah</h4>
			</div>
			<div class="modal-body">
				<div class="table-responsive">
					<table class="table">
						<thead>
							<tr class="success">
								<th>No</th>
								<th>Kode MK</th>
								<th>Nama MK</th>
								<th>SKS</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($mktawar as $i => $mktawar)
							<form action="/store_krs" method="POST">
								{{ csrf_field() }}
								<tr class="active">
									<td>{{ $i+1 }}</td>
									<td>{{ $mktawar->matakuliah->kode_mk }}</td>
									<td>{{ $mktawar->matakuliah->nama_mk }}</td>
									<td>{{ $mktawar->matakuliah->sks}}</td>
									<td style="width:70px;">
									<input type="hidden" value="{{ $mktawar->id }}" 
									name="id_mktawar">
									<input type="hidden" value="{{ $id_mhs  }}" name="id_mhs">
									<button type="submit" class="btn btn-warning">Pilih</button>
									</td>
								</tr>
							</form>
							@endforeach
						</tbody>
					</table>
				</div>	
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
			var link = '/krs/' + id;
			$('#delete-form').attr("action", link);
		});
	</script>
@endsection
