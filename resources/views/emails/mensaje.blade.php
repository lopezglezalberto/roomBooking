<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Bootstrap core CSS -->

    <link href="{{ asset('asset/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/fonts/css/font-awesome.min.css') }}" rel="stylesheet">

    <link href="{{ asset('asset/css/animate.min.css') }}" rel="stylesheet">


    <link href="{{ asset('asset/js/datatables/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('asset/js/datatables/buttons.bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('asset/js/datatables/fixedHeader.bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('asset/js/datatables/responsive.bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('asset/js/datatables/scroller.bootstrap.min.css') }}" rel="stylesheet" type="text/css" />

    <script src="{{ asset('asset/js/jquery.min.js') }}"></script>

    <link href="{{ asset('asset/css/editor/external/google-code-prettify/prettify.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/editor/index.css') }}" rel="stylesheet">

    <!-- switchery -->
    <link rel="stylesheet" href="{{ asset('asset/css/switchery/switchery.min.css') }}" />

    <style>
        body {
            background: none;
        }
    </style>
</head>


<body>

<!-- page content -->
<div class="right_col">
    <div class="">

        <div class="page-title">
            <div class="title_left">
                <h4>
                    Booking confirmation
                </h4>
            </div>

        </div>
        <div class="clearfix"></div>

        <div class="row">

            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_content">

                        <div class="row">
                            <!-- CONTENT MAIL -->
                                <div class="col-sm-9 mail_view">
                                    <div class="inbox-body">
                                        <div class="col-xs-12" style="padding-top: 5%">
                                            <div class="mail_heading row">
                                                <div class="col-md-4 text-right">
                                                    <p class="date">Booking date: {!! convertDate(date('Y-m-d')) !!}</p>
                                                </div>
                                                <div class="col-md-12">
                                                    <p><strong> Dear(a) {{ $full_name }}.  </strong></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12" style="padding-top: 5%;">
                                            <div class="view-mail">
                                                <p>
                                                    Thanks for the reservation! </p>

                                                <h4>Booking Details</h4>

                                                <table class="tabla table-bordered" cellpadding="0" cellspacing="0" style="width: 100%">

                                                    <tbody>
                                                        <tr>
                                                            <td style="width: 50%"><strong>Room</strong></td>
                                                            <td style="width: 50%">{{ $room }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width: 50%"><strong>Arrive date</strong></td>
                                                            <td style="width: 50%">{{ $departure_date }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width: 50%"><strong>Departure date</strong></td>
                                                            <td style="width: 50%">{{ $arrival_date }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width: 50%"><strong>Departure date</strong></td>
                                                            <td style="width: 50%">{{ $amount }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>


                                        <div class="col-xs-12" style="padding-top: 5%;">
                                            <div class="view-mail">
                                                <p>
                                                    <strong>Thank you!</strong>
                                                </p>
                                            </div>

                                            <div class="col-xs-12" style="padding-top: 5%;">
                                                <div class="view-mail">
                                                    <p>This notification is issued by our Reservation System. <br><br></p>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>

                            <!-- /CONTENT MAIL -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /page content -->


<script src="{{ asset('asset/js/bootstrap.min.js') }}"></script>

<!-- bootstrap progress js -->
<script src="{{ asset('asset/js/progressbar/bootstrap-progressbar.min.js') }}"></script>
<script src="{{ asset('asset/js/nicescroll/jquery.nicescroll.min.js') }}"></script>

<!-- icheck -->
<script src="{{ asset('asset/js/icheck/icheck.min.js') }}"></script>

<!-- pace -->
<script src="{{ asset('asset/js/pace/pace.min.js') }}"></script>

<script src="{{ asset('asset/js/custom.js') }}"></script>
</body>

</html>
