
<?php
    use Illuminate\Support\Facades\Auth;
    use App\dosen;
    $dosen = dosen::where('id_user', Auth::user()->id)->first();
    $dosen = $dosen->nama;
?>
<!DOCTYPE html>
<html>
    <head>
        <title>@yield('title')</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="{{asset('style/css/bootstrap.min.css')}}">
    </head>
    <body>
        <!-- header -->
        <nav class="navbar navbar-default">
            <div class="container">
                <div class="navbar-header navbar-brand" >
                    <a style="color:gray" href="">Selamat Datang <b>{{$dosen}}</b></a>
                </div>
                <ul class="nav navbar-nav pull-right">
                    <li><a href="/profil_dosen">Profil Dosen</a></li>
                    <li><a href="/view_approve_krs">Approve KRS</a></li>
                    <li><a href="/nilai_mk">Input Nilai</a></li>
                    <li class="active"><a href="/">Keluar</a></li>
                </ul>
            </div>	
        </nav>
        <!-- header -->

        <!-- content -->
        <div class="content">
            @section('body')
                @show
        </div>
        <!-- content -->

        <!-- script -->
		<script src="http://code.jquery.com/jquery-latest.js"></script>
        <script src="{{asset('style/js/bootstrap.min.js')}}"></script>
        @section('script')
            @show
        <!-- script -->
    </body>
</html>