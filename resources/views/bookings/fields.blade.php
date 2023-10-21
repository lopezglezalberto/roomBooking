
<div class="col-md-8 col-sm-8 col-xs-12">

    <section class="panel">
        <div class="panel-body">

            <div class="form-group col-sm-6">
                {!! Form::label('arrival_date', 'Arrive date *:') !!}
                {!! Form::date('arrival_date', null, ['class' => 'form-control']) !!}
                <div class="text-danger" id="_arrival_date">{{ $errors->first('arrival_date') }}</div>
            </div>

            <div class="form-group col-sm-6">
                {!! Form::label('departure_date', 'Departure date *:') !!}
                {!! Form::date('departure_date', null, ['class' => 'form-control']) !!}
                <div class="text-danger" id="_departure_date">{{ $errors->first('departure_date') }}</div>
            </div>

            <div class="form-group col-xs-12">
                <label for="fullname">Available rooms * :</label>
                <select class="select2_room form-control" name="id_room" required="" id="id_room">

                    <option value=""> Select the room...</option>
                    @foreach($rooms as $room)
                        <option value="{{ $room->id }}"> {{ $room->name }} </option>
                    @endforeach
                </select>
                <div class="text-danger" id="_id_room">{{ $errors->first('id_room') }}</div>
            </div>

            <div class="form-group col-sm-12">
                {!! Form::label('full_name', 'First and last name *:') !!}
                {!! Form::text('full_name', null, ['class' => 'form-control','maxlength' => 200,'maxlength' => 200]) !!}
                <div class="text-danger" id="_full_name">{{ $errors->first('full_name') }}</div>
            </div>

            <div class="form-group col-sm-6">
                {!! Form::label('email', 'Email *:') !!}
                {!! Form::email('email', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100]) !!}
                <div class="text-danger" id="_email">{{ $errors->first('email') }}</div>
            </div>

            <div class="form-group col-sm-6">
                {!! Form::label('phone', 'Phone number *:') !!}
                <input type="text" class="form-control" id="phone" data-inputmask="'mask': '(999) 99 999999'">
                <div class="text-danger" id="_phone">{{ $errors->first('phone') }}</div>
            </div>

            <div class="form-group col-sm-12">
                {!! Form::label('note', 'Note:') !!}
                <textarea id="note" name="note" class="form-control" rows="10"></textarea>
            </div>

        </div>
    </section>
</div>


<div class="col-md-4 col-sm-4 col-xs-12">

    <section class="panel">
        <div class="panel-body">
            <h3 class="green"> Room Detail</h3>
            <br />

            <div class="project_detail">

                <p class="title">Short description</p>
                <p id="short">-</p>
                <p class="title">Price per nigth:</p>
                <p id="price">0</p>
            </div>
            <br />
        </div>

    </section>

    <section class="panel">
        <div class="panel-body">
            <h3 class="green"> Booking balance</h3>
            <br />

            <div class="project_detail">

                <p class="title">Price for:</p>
                <p id="days"> 0 </p>
                <p class="title">Amount payable</p>
                <p id="amount"> 0 </p>
            </div>
            <br />

            <div class="text-center mtop20">
                <a id="save_form" class="btn btn-sm btn-primary">Save</a>
            </div>
        </div>

    </section>

</div>