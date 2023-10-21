<div class="table-responsive">
    <table class="table" id="rooms-table">
        <thead>
        <tr>
            <th>Name</th>
        <th>Price Per Nigth</th>
        <th>Short Description</th>
        <th>Description</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($rooms as $rooms)
            <tr>
                <td>{{ $rooms->name }}</td>
            <td>{{ $rooms->price_per_nigth }}</td>
            <td>{{ $rooms->short_description }}</td>
            <td>{{ $rooms->description }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['rooms.destroy', $rooms->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('rooms.show', [$rooms->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('rooms.edit', [$rooms->id]) }}"
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
