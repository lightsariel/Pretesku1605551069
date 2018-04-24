@extends('layout2')
@section('title', 'KRS')
@section('body')
<div>
	<p></p>
</div>
<div class="container">
	<h2>Profil Mahasiswa
	</h2>
	<ul class="nav row">
		<li class="col-md-4">
			<a href="/profil_mhs" style="color:black; background-color:gray"><center>
				<h1 style="font-size:1000%" class="glyphicon glyphicon-user"></h1>
				<h1>MAHASISWA</h1>
			</center></a>
		</li>
		<li class="col-md-8">
			<form>
				<div class="form-group">
					<label class="control-label col-sm-2" for="email">NIM  :</label>
					<div class="col-sm-10">
						<label  for="email">{{$mahasiswa->nim}}</label>
					</div>
	
				<div class="form-group">
					<label class="control-label col-sm-2" for="email">Nama  :</label>
					<div class="col-sm-10">
						<label  for="email">{{$mahasiswa->nama}}</label>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="email">Alamat  :</label>
					<div class="col-sm-10">
						<label  for="email">{{$mahasiswa->alamat}}</label>
					</div>
				</div>
				<p
			</form>
		</li>
	</ul>
	
</div>


@endsection

@section('script')
@endsection
