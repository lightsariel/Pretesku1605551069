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
                    <a style="color:gray" href="">Sistem KRS</a>
                </div>
                <ul class="nav navbar-nav pull-right">
                    <li><a href="/login">Login</a></li>
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