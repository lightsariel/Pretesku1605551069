@extends('layout')
@section('title', 'KRS')
@section('body')
<div class="container">
	<h2>Profil Admin
	</h2>
	<ul class="nav row">
		<li class="col-md-4" >
			<a href="/profil_admin" style="color:black; background-color:gray"><center>
				<h1 style="font-size:1000%" class="glyphicon glyphicon-user"></h1>
				<h1>ADMIN</h1>
			</center></a>
		</li>
		<li class="col-md-8">
				<form>
					<div class="form-group">
						<label class="control-label col-sm-2" for="email">NIP  :</label>
						<div class="col-sm-10">
							<label  for="email">{{$nip}}</label>
						</div>
		
					<div class="form-group">
						<label class="control-label col-sm-2" for="email">Nama  :</label>
						<div class="col-sm-10">
							<label  for="email">{{$nama}}</label>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2" for="email">Alamat  :</label>
						<div class="col-sm-10">
							<label  for="email">{{$alamat}}</label>
						</div>
					</div>
				</form>
			</li>
	</ul>
</div>
@endsection

@section('script')
@endsection
