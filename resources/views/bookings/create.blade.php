@extends('layouts.app')

@section('titulo')

    <title>Rooms Booking </title>
@endsection

@section('encabezado')


@endsection

@section('content')

    <div class="col-md-12 col-sm-12 col-xs-9">
        <div class="x_panel">
            <div class="x_title">
                <h2>Register room reservation</h2>

                <div class="clearfix"></div>
            </div>
            <div class="x_content">

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box">
                            {!! Form::open(['route' => 'bookings.store', 'id' => 'demo-form']) !!}

                                @include('bookings.fields')

                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection

@section('script')

    <script>
        function onSubmit(token) {
            document.getElementById("demo-form").submit();
        }
    </script>

    <script type="text/javascript">

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        let path = JSON.parse("{!! toJsJson( asset('asset/ckeditor/plugins/agregar_acuerdo/agregar.png') )!!}");

        let editor = CKEDITOR.replace('note', {
            enterMode: CKEDITOR.ENTER_BR,
            entities: false
        });

        $('#id_room, #arrival_date, #departure_date').change(function(){

           $.ajax({
                type: 'POST',
                url: '{{ route('bookings.get_data_room') }}',
                beforeSend : function(){

                    $('#contenedor_loader').show();
                },
                data: {
                    id_room: $('#id_room option:selected').val().length ? $('#id_room option:selected').val(): null,
                    arrival_date: $('#arrival_date').val(),
                    departure_date: $('#departure_date').val()
                },

                success: function (data) {

                    $('#contenedor_loader').hide();

                    if (data.success != false) {

                        $('#price, #short, #days, #amount').empty();

                        $('#price').append(data.details.price_per_nigth);
                        $('#short').append(data.details.short_description);
                        $('#days').append(data.details.days);
                        $('#amount').append(data.details.total_amount);

                        limpiarErroresLocal();

                    } else {

                        limpiarErroresLocal();

                        $.each(data.errors, function (index, value) {
                            $('#_' + index).text(value);
                        });

                        $('#price, #short, #days, #amount').empty();

                        $('#price').append(0);
                        $('#short').append('-');
                        $('#days').append(0);
                        $('#amount').append(0);

                        $('#contenedor_loader').hide();
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {

                    alert(jqXHR.responseText);
                }

            });
        });

        $('#get_available').click(function (e) {

            $('#box_content').hide();

            $.ajax({
                type: 'POST',
                url: '{{ route('bookings.get_available') }}',
                beforeSend : function(){

                    $('#contenedor_loader').show();
                },
                data: {
                    arrival_date: $('#arrival_date').val(),
                    departure_date: $('#departure_date').val(),
                },

                success: function (data) {

                    $('#contenedor_loader').hide();

                    if ($.isEmptyObject(data.errors)) {

                        $("#id_room").empty();

                        for(var i=0; i < data.result.length; i++){
                            $('#id_room').append('<option value="'+ data.result[i].id +'">'+ data.result[i].text +'</option>');
                        }

                        $('.select2_room').val('');

                        $(".select2_room").select2({
                            placeholder: "Select the room...",
                            allowClear: true
                        });

                        if($.isEmptyObject(data.result)){

                            $(function () {

                                new PNotify({
                                    title: "Error!",
                                    text: "No available rooms found",
                                    type: 'error',
                                    sound: true
                                });
                            });
                        } else {

                            $(function () {

                                new PNotify({
                                    title: "Success!",
                                    text: "Available rooms found",
                                    type: 'success',
                                    sound: true
                                });
                            });
                        }

                    } else {

                        limpiarErrores();

                        $(function () {

                            new PNotify({
                                title: "Error!",
                                text: "There are validation errors",
                                type: 'error',
                                sound: true
                            });
                        });

                        $.each(data.errors, function (index, value) {
                            $('#_' + index).text(value);
                        });
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    $('#contenedor_loader').hide();
                    if(jqXHR.status == 419){
                        location.href = 'login';
                    } else {
                        alert(jqXHR.responseText);
                    }
                }
            });
        });

        function limpiarErrores(){
            $('#_id_room, #_arrival_date, #_departure_date, #_full_name, #_email, #_phone').text('');
        }

        function limpiarErroresLocal(){
            $('#_id_room, #_arrival_date, #_departure_date').text('');
        }

        $('#save_form').click(function (e) {

            $.ajax({
                type: 'POST',
                url: '{{ route('bookings.store') }}',
                beforeSend : function(){

                    $('#contenedor_loader').show();
                },
                data: {
                    id_room: $('#id_room option:selected').val().length ? $('#id_room option:selected').val(): null,
                    full_name: $('#full_name').val(),
                    email: $('#email').val(),
                    phone: $('#phone').val(),
                    note: CKEDITOR.instances['note'].getData(),
                    arrival_date: $('#arrival_date').val(),
                    departure_date: $('#departure_date').val()
                },

                success: function (data) {

                    $('#contenedor_loader').hide();

                    if ($.isEmptyObject(data.errors)) {

                        $(location).attr('href', "{{ route('home') }}");

                    } else {

                        limpiarErrores();

                        $.each(data.errors, function (index, value) {
                            $('#_' + index).text(value);
                        });
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    $('#contenedor_loader').hide();
                    if(jqXHR.status == 419){
                        location.href = 'login';
                    } else {
                        alert(jqXHR.responseText);
                    }
                }
            });
        });

    </script>

@endsection
