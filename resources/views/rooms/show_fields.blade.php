<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $rooms->name }}</p>
</div>

<!-- Price Per Nigth Field -->
<div class="col-sm-12">
    {!! Form::label('price_per_nigth', 'Price Per Nigth:') !!}
    <p>{{ $rooms->price_per_nigth }}</p>
</div>

<!-- Short Description Field -->
<div class="col-sm-12">
    {!! Form::label('short_description', 'Short Description:') !!}
    <p>{{ $rooms->short_description }}</p>
</div>

<!-- Description Field -->
<div class="col-sm-12">
    {!! Form::label('description', 'Description:') !!}
    <p>{{ $rooms->description }}</p>
</div>

