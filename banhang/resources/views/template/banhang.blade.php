<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ogani | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('banhang/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('banhang/css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('banhang/css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('banhang/css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('banhang/css/jquery-ui.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('banhang/css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('banhang/css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('banhang/css/style.css') }}" type="text/css">
</head>

<body>
     @include('template.banhang_parts.header')
     @if($errors->any())
        <h4 style="color:red;">{{$errors->first()}}</h4>
     @endif
    @yield('content')


    @include('template.banhang_parts.footer')

    <strong action="{{ asset('sanpham/timkiem') }}" >TIM SAN PHAM</strong>

    <!-- Js Plugins -->
    <script src="{{ asset('/banhang/js/jquery-3.3.1.min.js') }} "></script>
    <script src="{{ asset('/banhang/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/banhang/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('/banhang/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('/banhang/js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('/banhang/js/mixitup.min.js') }}"></script>
    <script src="{{ asset('/banhang/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('/banhang/js/main.js') }}"></script>

</body>

</html>