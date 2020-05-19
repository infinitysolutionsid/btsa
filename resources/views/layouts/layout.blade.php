@inject('Member','\App\MemberModel')
@inject('WarningModel','\App\WarningDB')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title') | BTSA LOGISTICS SYSTEM</title>
    <meta name="title" content="BTSA LOGISTICS SYSTEM">
    <meta name="language" content="English">
    <meta name="author" content="Bintang Jeremia Tobing">
    <!-- ================= Favicon ================== -->
    <!-- Standard -->
    <link rel="shortcut icon"
        href="{!! url('https://res.cloudinary.com/btsa-co-id/image/upload/v1541503574/jscsstxtfiledll/icon/starlogo.ico')!!}">
    <!-- Retina iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="144x144" href="{!! url ('http://placehold.it/144.png/000/fff')!!}">
    <!-- Retina iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="114x114" href="{!! url ('http://placehold.it/114.png/000/fff')!!}">
    <!-- Standard iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="72x72" href="{!! url ('http://placehold.it/72.png/000/fff')!!}">
    <!-- Standard iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="57x57" href="{!! url ('http://placehold.it/57.png/000/fff')!!}">
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/ae026c985d.js" crossorigin="anonymous"></script>
    <script type="text/javascript"
        src="{!!url('https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/js/tempusdominus-bootstrap-4.min.js')!!}">
    </script>
    <link rel="stylesheet"
        href="{!!url('https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/css/tempusdominus-bootstrap-4.min.css')!!}" />
    <link rel="stylesheet" href="{!!asset('css/index.css')!!}">
    <style>
        .tab {
            margin-left: 40px;
        }

    </style>
</head>
<!-- Styles -->
<link href="{!! asset('css/lib/weather-icons.css')!!}" rel="stylesheet" />
<link href="{!! asset('css/lib/owl.carousel.min.css')!!}" rel="stylesheet" />
<link href="{!! asset('css/lib/owl.theme.default.min.css')!!}" rel="stylesheet" />
<link href="{!! asset('css/lib/font-awesome.min.css')!!}" rel="stylesheet">
<link href="{!! asset('css/lib/themify-icons.css')!!}" rel="stylesheet">
<link href="{!! asset('css/lib/menubar/sidebar.css')!!}" rel="stylesheet">
<link href="{!! asset('css/lib/bootstrap.min.css')!!}" rel="stylesheet">
{{-- <link href="{!!asset('css/lib/datatable/dataTables.bootstrap.min.css')!!}" rel="stylesheet" />
        <link href="{!!asset('css/lib/datatable/buttons.bootstrap.min.css')!!}" rel="stylesheet" /> --}}
<link rel="stylesheet" type="text/css"
    href="{!!url('https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css')!!}">

<link href="{!! asset('css/lib/helper.css')!!}" rel="stylesheet">
<link href="{!! asset('css/style.css')!!}" rel="stylesheet">
</head>

<body>
    <?php
        date_default_timezone_set("Asia/Jakarta");
        $timeNow = date('H:i');
        $Hour = date('H');
    ?>
    @include('layouts.sidebar')
    <!-- /# sidebar -->
    @include('layouts.header')
    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 p-r-0 title-margin-right">
                        <div class="page-header">
                            <div class="page-title">
                                <h1>@if(($Hour >= 01) && ($Hour<=11)) {{'Selamat pagi'}} @elseif(($Hour>=11) && ($Hour
                                        <=15)) {{'Selamat siang'}} @elseif(($Hour>=15)&& ($Hour<=18)) {{'Selamat sore'}}
                                                @else{{'Selamat malam'}} @endif <strong>
                                                {{Auth::user()->nama_lengkap}}.</strong></h1>
                                <p class="text-muted">Jabatan anda adalah
                                    {{Auth::user()->jabatan}}, {{Auth::user()->role}}
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                    <li class="breadcrumb-item active">@yield('title')</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                </div>

                <!-- /# row -->
                <section id="main-content">
                    @yield('content')
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="footer">
                                <p>©Copyright 2019 - Management Infinity Solutions. - <a
                                        href="https://infinitysolutions.co.id">infinitysolutions.co.id</a></p>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <div id="search">
        <button type="button" class="close">×</button>
        <form>
            <input type="search" value="" placeholder="type keyword(s) here" />
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
    </div>
    <!-- jquery vendor -->
    {{-- <script src="{!!asset('js/lib/data-table/dataTables.buttons.min.js')!!}"></script>
        <script src="{!!asset('js/lib/data-table/dataTables.min.js')!!}"></script>
        <script src="{!!asset('js/lib/data-table/datatables-init.js')!!}"></script> --}}
    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })

    </script>
    <script src="{!!asset('js/lib/jquery.min.js')!!}"></script>
    <script type="text/javascript">
        function warningnotice_approve() {
            document.getElementById("approve_btnwarningnotice").submit();
        }

    </script>
    <script src="{!!asset('js/lib/jquery.nanoscroller.min.js')!!}"></script>
    <!-- nano scroller -->
    <script src="{!!asset('js/lib/menubar/sidebar.js')!!}"></script>
    <script src="{!!asset('js/lib/preloader/pace.min.js')!!}"></script>
    <!-- sidebar -->
    <script src="{!!asset('js/lib/bootstrap.min.js')!!}"></script>


    <script src="{!!asset('js/lib/circle-progress/circle-progress.min.js')!!}"></script>
    <script src="{!!asset('js/lib/circle-progress/circle-progress-init.js')!!}"></script>

    <script src="{!!asset('js/lib/morris-chart/raphael-min.js')!!}"></script>
    <script src="{!!asset('js/lib/morris-chart/morris.js')!!}"></script>
    <script src="{!!asset('js/lib/morris-chart/morris-init.js')!!}"></script>

    <!--  flot-chart js -->
    <script src="{!!asset('js/lib/flot-chart/jquery.flot.js')!!}"></script>
    <script src="{!!asset('js/lib/flot-chart/jquery.flot.resize.js')!!}"></script>
    <script src="{!!asset('js/lib/flot-chart/flot-chart-init.js')!!}"></script>
    <!-- // flot-chart js -->


    <script src="{!!asset('js/lib/vector-map/jquery.vmap.js')!!}"></script>
    <!-- scripit init-->
    <script src="{!!asset('js/lib/vector-map/jquery.vmap.min.js')!!}"></script>
    <!-- scripit init-->
    <script src="{!!asset('js/lib/vector-map/jquery.vmap.sampledata.js')!!}"></script>
    <!-- scripit init-->
    <script src="{!!asset('js/lib/vector-map/country/jquery.vmap.world.js')!!}"></script>
    <!-- scripit init-->
    <script src="{!!asset('js/lib/vector-map/country/jquery.vmap.algeria.js')!!}"></script>
    <!-- scripit init-->
    <script src="{!!asset('js/lib/vector-map/country/jquery.vmap.argentina.js')!!}"></script>
    <!-- scripit init-->
    <script src="{!!asset('js/lib/vector-map/country/jquery.vmap.brazil.js')!!}"></script>
    <!-- scripit init-->
    <script src="{!!asset('js/lib/vector-map/country/jquery.vmap.france.js')!!}"></script>
    <!-- scripit init-->
    <script src="{!!asset('js/lib/vector-map/country/jquery.vmap.germany.js')!!}"></script>
    <!-- scripit init-->
    <script src="{!!asset('js/lib/vector-map/country/jquery.vmap.greece.js')!!}"></script>
    <!-- scripit init-->
    <script src="{!!asset('js/lib/vector-map/country/jquery.vmap.iran.js')!!}"></script>
    <!-- scripit init-->
    <script src="{!!asset('js/lib/vector-map/country/jquery.vmap.iraq.js')!!}"></script>
    <!-- scripit init-->
    <script src="{!!asset('js/lib/vector-map/country/jquery.vmap.russia.js')!!}"></script>
    <!-- scripit init-->
    <script src="{!!asset('js/lib/vector-map/country/jquery.vmap.tunisia.js')!!}"></script>
    <!-- scripit init-->
    <script src="{!!asset('js/lib/vector-map/country/jquery.vmap.europe.js')!!}"></script>
    <!-- scripit init-->
    <script src="{!!asset('js/lib/vector-map/country/jquery.vmap.usa.js')!!}"></script>
    <!-- scripit init-->
    <script src="{!!asset('js/lib/vector-map/vector.init.js')!!}"></script>

    <script src="{!!asset('js/lib/weather/jquery.simpleWeather.min.js')!!}"></script>
    <script src="{!!asset('js/lib/weather/weather-init.js')!!}"></script>
    <script src="{!!asset('js/lib/owl-carousel/owl.carousel.min.js')!!}"></script>
    <script src="{!!asset('js/lib/owl-carousel/owl.carousel-init.js')!!}"></script>
    <script src="{!!asset('js/scripts.js')!!}"></script>

    <script type="text/javascript" charset="utf8"
        src="{!!url('https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.js')!!}"></script>
    <!-- scripit init-->
    {{-- TINY MCE --}}
    <script src="https://cdn.tiny.cloud/1/8ll77vzod9z7cah153mxwug6wu868fhxsr291kw3tqtbu9om/tinymce/5/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea',
            branding: false,
            menubar: false,
            setup: function (editor) {
                editor.on('change', function (e) {
                    editor.save();
                });
            }
        });

    </script>
    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })

    </script>


</body>

</html>
