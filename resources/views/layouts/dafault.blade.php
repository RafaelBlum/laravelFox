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
    <link rel="stylesheet" href="{{asset("themes/plugins/themify-icons/themify-icons.css")}}">
    <link rel="stylesheet" href="{{asset('themes/default.css')}}">
    <link rel="stylesheet" href="{{asset('themes/css/nav.css')}}">
    <link rel="stylesheet" href="{{asset('themes/plugins/iziToast/css/iziToast.css')}}">

    @stack('style')
    <title>@yield('title', 'LaraFox')</title>
</head>
<body>
    <!-- ===================== # NAVBAR # ===================== -->
    @include('layouts.partials.navbar')

    <div class="container">

        <div class="m-5">
            @include('flash::message')
            @include('sweetalert::alert')

            @yield('content')
        </div>
    </div>

    @include('layouts.partials.footer')

    <script src="{{asset("themes/plugins/jquery/jquery.min.js")}}"></script>
    <script src="{{asset("themes/plugins/bootstrap/bootstrap.min.js")}}"></script>
    <script src="{{asset("themes/plugins/iziToast/js/iziToast.js")}}"></script>
    @include('vendor.lara-izitoast.toast')
    <script>
        {{-- ALERT MENSAGEM SISTEM --}}
        $('div.alert').not('.alert-error').delay(3000).fadeOut(550);
    </script>
    @stack('script')
</body>
</html>
