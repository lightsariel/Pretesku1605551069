@extends('layout3')
@section('title', 'KRS')
@section('body')
<div class="container">
	<h2>Input Nilai</h2>
	<label>Tahun Ajaran : {{ $openkrs->tahun_ajaran }}</label><br>
	<label>Semester &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $openkrs->semester }}</label> 
	<div class="table-responsive">
		<table class="table">
			<thead>
				<tr class="success">
					<th>No</th>
					<th>NIM</th>
					<th>Nama</th>
					<th>Nilai</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach($krss as $i => $krs)
				<tr class="active">			
					<td>{{ $i+1 }}</td>
					<td>{{ $krs->mahasiswa->nim }}</td>
					<td>{{ $krs->mahasiswa->nama }}</td>
					<td>{{ $krs->nilai->nilai_huruf }}</td>
					<td style="width:200px;">
						<form action="/edit_nilai" method="POST">
							{{ csrf_field() }}
							<input type="hidden" name="id_krs" value="{{ $krs->id }}">
							<select name="nilai">
									<option>Edit Nilai</option>
								@foreach($nilais as $nilai)
								 <option value="{{ $nilai->id}}">{{ $nilai->nilai_huruf }}</option>
								@endforeach
							</select>
							<button class="edit_nilai btn btn-primary">Submit</button>

						</form>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection

@section('script')

@endsection
