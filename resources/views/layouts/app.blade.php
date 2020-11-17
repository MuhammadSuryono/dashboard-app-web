<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=yes">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@include('katana.title')</title>
    <link href="{{ asset('coreui/dist/css/style.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="shortcut icon" type="image/ico" href="https://multipay.mdd.co.id/assets/images/logo/logo.png">
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"/> --}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/select2-bootstrap4.min.css') }}">
    <link href="{{ asset('coreui/dist/vendors/@coreui/chartjs/css/coreui-chartjs.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ladda-bootstrap/0.9.4/ladda-themeless.min.css" integrity="sha256-TjItrlyA0mMF9H4FVsX+mDMloHbBTABevgNnudpLUwU=" crossorigin="anonymous" />
    @include('katana.asset.style')
    @yield('head-content')
</head>
<body class="c-app">
    @include('katana.sidebar')
    <div class="c-wrapper c-fixed-components">
        @include('katana.header')
        <div class="c-body">
            <main class="c-main">
                <div class="container-fluid">
                    <div class="fade-in">
                        @yield('content')
                        <div style="display: none;">@yield('hide-content')</div>
                    </div>
                </div>
            </main>
            <footer class="c-footer">
                <div><a href="{{ url('/') }}" target="_blank">{{ config('app.name', 'ETICKET') }}</a> © {{ date('Y') }} PT. Multi Daya Dinamika.</div>
                <div class="ml-auto">Powered by&nbsp;<a href="{{ 'http://multidaya.id/' }}" target="_blank">Multidaya</a></div>
            </footer>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/231b668aca.js" crossorigin="anonymous"></script>
    <script src="{{ asset('coreui/dist/vendors/@coreui/coreui/js/coreui.bundle.min.js') }}"></script>
    <script src="{{ asset('coreui/dist/vendors/@coreui/icons/js/svgxuse.min.js') }}"></script>
    <script src="{{ asset('coreui/dist/js/kasirku.js') }}"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.bootstrap4.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.colVis.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/notify.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ladda-bootstrap/0.9.4/ladda.jquery.min.js" integrity="sha256-bk6Wzc3vNoMpi2TDXYfaD8eY/KKjCjFefWd8RKt6Vw4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ladda-bootstrap/0.9.4/spin.min.js" integrity="sha256-ymTj9nazjwbtDroRF3byvIrTUrZywIGexbkHLDQr010=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ladda-bootstrap/0.9.4/ladda.min.js" integrity="sha256-Fe6rC+JykPQteSY0KWQS2k2CgnhDU3bGa17hdVf0+Po=" crossorigin="anonymous"></script>
    <script src="{{ asset('coreui/dist/vendors/@coreui/chartjs/js/coreui-chartjs.bundle.js') }}"></script>
    <script src="{{ asset('coreui/dist/js/charts.js') }}"></script>
    @include('katana.asset.script')
    @yield('foot-content')
    {{-- @stack('scripts') --}}
</body>
</html>