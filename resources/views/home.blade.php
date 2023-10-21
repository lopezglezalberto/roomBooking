@extends('layouts.app')

@section('titulo')

    <title>Rooms Booking </title>
@endsection

@section('encabezado')

        <!-- Bootstrap -->

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

@endsection

@section('content')

    <div class="col-md-12 col-sm-12 col-xs-9">
        <div class="x_panel">
            <div class="x_title">
                <h2>Registrar Muestreo de Plasma</h2>

                <div class="clearfix"></div>
            </div>
            <div class="x_content">

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box">
                            {!! Form::open(['route' => 'bookings.store']) !!}

                                @include('bookings.fields.blade.php')

                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>



@endsection