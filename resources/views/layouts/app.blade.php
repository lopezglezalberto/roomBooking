<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">

    <link href="{{ asset('asset/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/fonts/css/font-awesome.min.css') }}" rel="stylesheet">

    <link href="{{ asset('asset/css/animate.min.css') }}" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="{{ asset('asset/css/custom.css') }}" rel="stylesheet">

    <link href="{{ asset('asset/css/icheck/flat/green.css') }}" rel="stylesheet" />


    <link href="{{ asset('asset/js/datatables/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('asset/js/datatables/buttons.bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('asset/js/datatables/fixedHeader.bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('asset/js/datatables/responsive.bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('asset/js/datatables/scroller.bootstrap.min.css') }}" rel="stylesheet" type="text/css" />

    <script src="{{ asset('/asset/ckeditor/ckeditor.js') }}"></script>

    <script src="{{ asset('asset/js/jquery.min.js') }}"></script>

    <!--[if lt IE 9]>
    <script src="{{ asset('asset/assets/js/ie8-responsive-file-warning.js') }}"></script>
    <![endif]-->


    <!-- editor -->
    {{--<link href="{{ asset('asset/font-awesome/4.5.0/css/font-awesome.css') }}" rel="stylesheet">--}}
    <link href="{{ asset('asset/css/editor/external/google-code-prettify/prettify.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/editor/index.css') }}" rel="stylesheet">
    <!-- select2 -->
    <link href="{{ asset('asset/css/select/select2.min.css') }}" rel="stylesheet">
    <!-- switchery -->
    <link rel="stylesheet" href="{{ asset('asset/css/switchery/switchery.min.css') }}" />


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="{{ asset('asset/js/5shiv.min.js') }}"></script>
    <script src="{{ asset('asset/js/respond.min.js') }}"></script>
    <![endif]-->

    <style>
        td.details-control {
            background: url('{{ asset('details_open.png') }}') no-repeat center center;
            cursor: pointer;
            vertical-align: middle;
        }
        tr.shown td.details-control {
            background: url('{{ asset('details_close.png') }}') no-repeat center center;
        }

    </style>

    @yield('titulo')

    <style>

        #contenido {
            color: black/*/!*#636b6f*!/*/;
        }

        .nav{
            color: black;
        }

        body div {
            color: black;
            width: auto;
        }

        .table td  {
            text-align: center;
        }

        .table th  {
            text-align: center;
        }


        .lds-ellipsis {
            display: inline-block;
            position: relative;
            width: 120px;
            height: 120px;

        }
        .lds-ellipsis div {
            position: absolute;

            top: 33px;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background: white;
            animation-timing-function: cubic-bezier(0, 1, 1, 0);
        }
        .lds-ellipsis div:nth-child(1) {
            left: 8px;
            animation: lds-ellipsis1 0.6s infinite;
        }
        .lds-ellipsis div:nth-child(2) {
            left: 8px;
            animation: lds-ellipsis2 0.6s infinite;
        }
        .lds-ellipsis div:nth-child(3) {
            left: 32px;
            animation: lds-ellipsis2 0.6s infinite;
        }
        .lds-ellipsis div:nth-child(4) {
            left: 56px;
            animation: lds-ellipsis3 0.6s infinite;
        }
        @keyframes lds-ellipsis1 {
            0% {
                transform: scale(0);
            }
            100% {
                transform: scale(1);
            }
        }
        @keyframes lds-ellipsis3 {
            0% {
                transform: scale(1);
            }
            100% {
                transform: scale(0);
            }
        }
        @keyframes lds-ellipsis2 {
            0% {
                transform: translate(0, 0);
            }
            100% {
                transform: translate(24px, 0);
            }
        }

        .loader {

            margin: 0 auto;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100vh;
            color: black;
            /*background: black;*/
            background-color: rgba(0, 0, 0, .7);
            /*opacity: 0.50;*/
            /*background-color: transparent;*/
            display: flex;
            justify-content: center;
            align-items: center;
            vertical-align: middle;

            z-index: 100000;
        }
    </style>

    @yield('encabezado')

</head>

<body class="nav-md">

<div class="container body">

    <div style="display: none;" id="contenedor_loader">
        <div class="loader" id="loader">
            <div>
                <div class="lds-ellipsis">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </div>
        </div>
    </div>

    <div class="main_container">

       {{-- <div class="col-md-3 left_col">
            <div class="left_col scroll-view">

                <div class="clearfix"></div>

                <!-- menu prile quick info -->
                <div class="profile">
                    <div class="profile_pic">
                        <img src="{{ asset('uploads/avatars/default.png') }}" alt="..." class="img-circle profile_img">
                    </div>
                    <div class="profile_info">
                        <span>Welcome to</span>
                        <span class="label"><strong>Rooms booking</strong></span>
                    </div>
                </div>
                <!-- /menu prile quick info -->

                <br />

                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu" >

                    <div class="menu_section">
                        <h3>General</h3>
                        <ul class="nav side-menu">
                            <li><a href="{{ route('home') }}"><i class="fa fa-home"></i> Booking </a></li>
                        </ul>
                    </div>

                    --}}{{--<div class="menu_section">
                        <h3>Bancos de Sangre</h3>

                        <ul class="nav side-menu">
                            <li><a><i class="fa fa-hospital-o"></i> de los Bancos <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu" style="display: none">
                                    @can('banco_sangre.index')
                                        <li><a href="{{ route('bancoSangres.index') }}"> Cartera de Bancos </a></li>
                                    @endcan
                                    @can('banco_sangre.create')
                                        <li><a href="{{ route('bancoSangres.create') }}"> Registrar Banco </a></li>
                                    @endcan
                                </ul>
                            </li>
                        </ul>
                        <ul class="nav side-menu">
                            <li><a><i class="fa fa-calculator"></i> Conciliaciones <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu" style="display: none">
                                    @can('conciliaciones.index_todos_con')
                                        <li><a href="{{ route('conciliaciones.index_todos_con') }}"> Inventario General en Bancos </a></li>
                                    @endcan
                                    @can('conciliaciones.index')
                                        <li><a href="{{ route('conciliaciones.index') }}"> Conciliaciones </a></li>
                                    @endcan
                                    @can('conciliaciones.create')
                                        <li><a href="{{ route('conciliaciones.create') }}"> Registar Conciliaci&oacute;n </a></li>
                                    @endcan
                                </ul>
                            </li>
                        </ul>
                    </div>--}}{{--

                </div>
                <!-- /sidebar menu -->

                <!-- /menu footer buttons -->
                --}}{{--<div class="sidebar-footer hidden-small pull-right">

                    <a  href="{{ route('verifyBackups.index') }}" data-toggle="tooltip" data-placement="top" title=" Salva Base Datos">
                        <span class="fa fa-database" aria-hidden="true"></span>
                    </a>
                    <a href="{{ route('home.show_confirguracion') }}" data-toggle="tooltip" data-placement="top" title="Configuraci&oacute;n General">
                        <span class="fa fa-gears" aria-hidden="true"></span>
                    </a>
                    <a href="{{ route('trazas.index') }}" data-toggle="tooltip" data-placement="top" title="Trazas">
                        <span class="fa fa-list-ol" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" href="{{ route('logout') }}"

                       title="Cerrar Sesi&oacute;n"  onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div>--}}{{--
                <!-- /menu footer buttons -->
            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">

            <div class="nav_menu">
                <nav class="" role="navigation">
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>
                </nav>
            </div>

        </div>--}}
        <!-- /top navigation -->


        <!-- page content -->


        <div style="margin: 4%" role="main" id="contenido">
            <div class="">
                <div class="row">

                    @yield('content')
                </div>
            </div>

            <!-- footer content -->

            {{--<footer>
                <div class="copyright-info">
                    <p class="pull-right">Rooms Booking</p>
                </div>
                <div class="clearfix"></div>
            </footer>--}}
            <!-- /footer content -->
        </div>
        <!-- /page content -->

    </div>

</div>

<!-- /datepicker -->
<!-- /footer content -->

<script src="{{ asset('asset/js/bootstrap.min.js') }}"></script>

<!-- bootstrap progress js -->
<script src="{{ asset('asset/js/progressbar/bootstrap-progressbar.min.js') }}"></script>
<script src="{{ asset('asset/js/nicescroll/jquery.nicescroll.min.js') }}"></script>

<!-- icheck -->
<script src="{{ asset('asset/js/icheck/icheck.min.js') }}"></script>

<script src="{{ asset('asset/js/select/select2.full.js') }}"></script>

<script src="{{ asset('asset/js/custom.js') }}"></script>

<!-- daterangepicker -->
<script type="text/javascript" src="{{ asset('asset/js/moment/moment.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('asset/js/datepicker/daterangepicker.js') }}"></script>

<!-- ion_range -->
<link rel="stylesheet" href="{{ asset('asset/css/normalize.css') }}" />
<link rel="stylesheet" href="{{ asset('asset/css/ion.rangeSlider.css') }}" />
<link rel="stylesheet" href="{{ asset('asset/css/ion.rangeSlider.skinFlat.css') }}" />

<!-- select2 -->

<!-- pace -->
<script src="{{ asset('asset/js/pace/pace.min.js') }}"></script>

<script src="https://www.google.com/recaptcha/api.js"></script>

<!-- select2 -->
<script>

    $(document).ready(function() {

        $(".select2_room").select2({
            placeholder: "Select the room",
            allowClear: true
        });

    });
</script>

<!-- /select2 -->

<!-- Datatables-->
<script src="{{ asset('asset/js/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('asset/js/datatables/dataTables.bootstrap.js') }}"></script>
<script src="{{ asset('asset/js/datatables/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('asset/js/datatables/buttons.bootstrap.min.js') }}"></script>
<script src="{{ asset('asset/js/datatables/jszip.min.js') }}"></script>

<script src="{{ asset('asset/js/datatables/vfs_fonts.js') }}"></script>
<script src="{{ asset('asset/js/datatables/buttons.html5.min.js') }}"></script>
<script src="{{ asset('asset/js/datatables/buttons.print.min.js') }}"></script>
<script src="{{ asset('asset/js/datatables/dataTables.fixedHeader.min.js') }}"></script>
<script src="{{ asset('asset/js/datatables/dataTables.keyTable.min.js') }}"></script>
<script src="{{ asset('asset/js/datatables/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('asset/js/datatables/responsive.bootstrap.min.js') }}"></script>
<script src="{{ asset('asset/js/datatables/dataTables.scroller.min.js') }}"></script>

<!-- PNotify -->
<script type="text/javascript" src="{{ asset('asset/js/notify/pnotify.core.js') }}"></script>
<script type="text/javascript" src="{{ asset('asset/js/notify/pnotify.buttons.js') }}"></script>
<script type="text/javascript" src="{{ asset('asset/js/notify/pnotify.nonblock.js') }}"></script>


<script src="{{ asset('asset/js/input_mask/jquery.inputmask.js') }}"></script>

<script>
    $(document).ready(function() {
        $(":input").inputmask();
    });
</script>


<script>
    $(document).ready(function() {

        if (JSON.parse("{!! toJsJson( \Illuminate\Support\Facades\Cache::has('message') ) !!}")) {

            if (JSON.parse("{!! toJsJson( \Illuminate\Support\Facades\Cache::get('type') ) !!}") == 'success') {

                $(function () {

                    new PNotify({
                        title: JSON.parse("{!! toJsJson( \Illuminate\Support\Facades\Cache::get('title') ) !!}"),
                        text: JSON.parse("{!! toJsJson( \Illuminate\Support\Facades\Cache::get('message') ) !!}"),
                        type: 'success',
                        sound: true
                    });
                });
            }

            if (JSON.parse("{!! toJsJson( \Illuminate\Support\Facades\Cache::get('type') ) !!}") == 'danger') {

                $(function () {

                    new PNotify({
                        title: JSON.parse("{!! toJsJson( \Illuminate\Support\Facades\Cache::get('title') ) !!}"),
                        text: JSON.parse("{!! toJsJson( \Illuminate\Support\Facades\Cache::get('message') ) !!}"),
                        type: 'error',
                        sound: true
                    });
                });
            }
            JSON.parse("{!! toJsJson(\Illuminate\Support\Facades\Cache::flush() ) !!}");
        }
    });
</script>

@yield('script')

</body>

</html>
