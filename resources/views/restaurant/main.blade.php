<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" rel="stylesheet"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" > --}}

    <!-- Bootstrap Css -->
    @vite('public/css/bootstrap.min.css')
    <!-- Icons Css -->
    @vite('public/css/icons.min.css')
    <!-- App Css-->
    @vite('public/css/app.min.css')

    @vite('public/css/font-awesome.min.css')
    @vite('public/css/card-product.css')

</head>
<body>

<div id="layout-wrapper">

    {{------------------------------- header-------------------------------- --}}
    @include('restaurant.body.header')
    {{------------------------------- sidebar-------------------------------- --}}
    @include('restaurant.body.sidebar')


    <div class="main-content">

        @yield('main')


    </div>

</div>




        <!-- JAVASCRIPT -->


    @vite('public/libs/jquery/jquery.min.js')
    @vite('public/libs/bootstrap/js/bootstrap.bundle.min.js')
    @vite('public/libs/metismenu/metisMenu.min.js')
    @vite('public/libs/simplebar/simplebar.min.js')
    @vite('public/libs/node-waves/waves.min.js')
    @vite('public/js/handlebars.js')


    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script> --}}
</body>
</html>
