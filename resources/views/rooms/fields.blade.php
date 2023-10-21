<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 200,'maxlength' => 200]) !!}
</div>

<!-- Price Per Nigth Field -->
<div class="form-group col-sm-6">
    {!! Form::label('price_per_nigth', 'Price Per Nigth:') !!}
    {!! Form::number('price_per_nigth', null, ['class' => 'form-control']) !!}
</div>

<!-- Short Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('short_description', 'Short Description:') !!}
    {!! Form::text('short_description', null, ['class' => 'form-control','maxlength' => 500,'maxlength' => 500]) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

