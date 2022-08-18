<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{asset('themes/images/config/fox.png')}}">
    <!-- ===================== # CSS # ===================== -->
    <link rel="stylesheet" href="{{asset("themes/plugins/bootstrap/bootstrap.min.css")}}">
    <link rel="stylesheet" href="{{asset('themes/default.css')}}">
    <link rel="stylesheet" href="{{asset('themes/css/cover-style.css')}}">

    <title>@yield('title', CONF_SITE_NAME)</title>
</head>
<body class="text-center">
    <!-- ===================== # NAVBAR # ===================== -->
    <div class="container w-100 h-100 p-3 mx-auto">
        <main role="main" class="cover">
            <img src="{{asset('themes/images/config/studio2.png')}}" alt="studio laravel" width="240">
            <p class="lead">{{CONF_DESCRIPTION}}</p>
            <p class="lead">
                <a href="{{route('home')}}" class="btn info">Entrar</a>
            </p>

            <footer class="mt-auto mt-lg-5">
                <div>
                    <p>Cover template for <a href="https://getbootstrap.com/docs/4.6/examples/" target="_blank">Bootstrap</a>,
                        by customized <a href="{{CONF_GITHUB}}" target="_blank">{{CONF_DEV_NAME}}</a>.</p>
                </div>
            </footer>
        </main>
    </div>
@stack('script')

<script src="{{asset("themes/plugins/jquery/jquery.min.js")}}"></script>
<script src="{{asset("themes/plugins/bootstrap/bootstrap.min.js")}}"></script>
</body>
</html>
