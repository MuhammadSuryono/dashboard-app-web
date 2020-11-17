<!DOCTYPE html>
<!--
* CoreUI - Free Bootstrap Admin Template
* @version v3.0.0
* @link https://coreui.io
* Copyright (c) 2020 creativeLabs Łukasz Holeczek
* Licensed under MIT (https://coreui.io/license)
-->

<html lang="en">
<head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>SETUP-PASSWORD | {{ config('app.name', 'Laravel') }}</title>
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset ('coreui/src/assets/favicon/apple-icon-57x57.png')}}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{asset('coreui/src/assets/favicon/favicon-60x60.png')}}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{asset('coreui/src/assets/favicon/favicon-72x72.png')}}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('coreui/src/assets/favicon/favicon-76x76.png')}}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{asset('coreui/src/assets/favicon/favicon-114x114.png')}}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{asset('coreui/src/assets/favicon/favicon-120x120.png')}}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{asset('coreui/src/assets/favicon/favicon-144x144.png')}}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{asset('coreui/src/assets/favicon/favicon-152x152.png')}}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('coreui/src/assets/favicon/favicon-180x180.png')}}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{asset('coreui/src/assets/favicon/favicon-16x16.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('coreui/src/assets/favicon/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{asset('coreui/src/assets/favicon/favicon-96x96.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('coreui/src/assets/favicon/favicon-16x16.png')}}">
    <link rel="manifest" href="{{asset('coreui/src/assets/favicon/manifest.json')}}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{asset('coreui/src/assets/favicon/ms-icon-144x144.png')}}">
    <meta name="theme-color" content="#ffffff">
    <!-- Main styles for this application-->
{{--    <link href="{{asset('coreui/src/css/style.css')}}" rel="stylesheet">--}}
    <link href="{{ asset('coreui/dist/css/style.css') }}" rel="stylesheet">

    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        // Shared ID
        gtag('config', 'UA-118965717-3');
        // Bootstrap ID
        gtag('config', 'UA-118965717-5');
    </script>
</head>
<body class="c-app flex-row align-items-center">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="clearfix">
                <h1 class="float-left display-3 mr-4">Error!</h1>
            <h4 class="pt-3">{{ $message }}</h4>
            <a href="http://localhost:5000/" class="btn btn-primary"> Back to home</a>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('coreui/dist/vendors/@coreui/coreui/js/coreui.bundle.min.js') }}"></script>
<script src="{{ asset('coreui/dist/vendors/@coreui/icons/js/svgxuse.min.js') }}"></script>
</body>
</html>
