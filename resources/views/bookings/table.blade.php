<div class="table-responsive">
    <table class="table" id="bookings-table">
        <thead>
        <tr>
            <th>Arrival Date</th>
        <th>Departure Date</th>
        <th>Rooms Id</th>
        <th>Full Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Note</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($bookings as $booking)
            <tr>
                <td>{{ $booking->arrival_date }}</td>
            <td>{{ $booking->departure_date }}</td>
            <td>{{ $booking->rooms_id }}</td>
            <td>{{ $booking->full_name }}</td>
            <td>{{ $booking->email }}</td>
            <td>{{ $booking->phone }}</td>
            <td>{{ $booking->note }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['bookings.destroy', $booking->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('bookings.show', [$booking->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('bookings.edit', [$booking->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
