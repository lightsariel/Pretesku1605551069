@extends('layout_index')

@section('body')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <center><h1 style="font-size:500%; margin-bottom:5%;">ROLE</h1></center>
            </div>
        </div>
        <ul class="nav row">
            <li class="col-md-4">
                <a href="/profil_mhs" style="color:black;"><center>
                    <h1 style="font-size:1000%" class="glyphicon glyphicon-user"></h1>
                    <h1>MAHASISWA</h1>
                </center></a>
            </li>
            <li class="col-md-4">
                <a href="/profil_dosen" style="color:black;"><center>
                    <h1 style="font-size:1000%" class="glyphicon glyphicon-user"></h1>
                    <h1>DOSEN</h1>
                </center></a>
            </li>
            <li class="col-md-4">
                <a href="/profil_admin" style="color:black;"><center>
                    <h1 style="font-size:1000%" class="glyphicon glyphicon-user"></h1>
                    <h1>ADMIN</h1>
                </center></a>
            </li>
        </ul>
    </div>
@endsection
@section('script')
@endsection