<!-- Arrival Date Field -->
<div class="col-sm-12">
    {!! Form::label('arrival_date', 'Arrival Date:') !!}
    <p>{{ $booking->arrival_date }}</p>
</div>

<!-- Departure Date Field -->
<div class="col-sm-12">
    {!! Form::label('departure_date', 'Departure Date:') !!}
    <p>{{ $booking->departure_date }}</p>
</div>

<!-- Rooms Id Field -->
<div class="col-sm-12">
    {!! Form::label('rooms_id', 'Rooms Id:') !!}
    <p>{{ $booking->rooms_id }}</p>
</div>

<!-- Full Name Field -->
<div class="col-sm-12">
    {!! Form::label('full_name', 'Full Name:') !!}
    <p>{{ $booking->full_name }}</p>
</div>

<!-- Email Field -->
<div class="col-sm-12">
    {!! Form::label('email', 'Email:') !!}
    <p>{{ $booking->email }}</p>
</div>

<!-- Phone Field -->
<div class="col-sm-12">
    {!! Form::label('phone', 'Phone:') !!}
    <p>{{ $booking->phone }}</p>
</div>

<!-- Note Field -->
<div class="col-sm-12">
    {!! Form::label('note', 'Note:') !!}
    <p>{{ $booking->note }}</p>
</div>

