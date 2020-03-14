<div class="table-responsive">
    <table class="table" id="acceptRequestSpecialists-table">
        <thead>
            <tr>
                <th>Note</th>
        <th>Recommendation</th>
        <th>Rating</th>
        <th>Doctor Id</th>
        <th>Request Id</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($acceptRequestSpecialists as $acceptRequestSpecialists)
            <tr>
                <td>{{ $acceptRequestSpecialists->note }}</td>
            <td>{{ $acceptRequestSpecialists->recommendation }}</td>
            <td>{{ $acceptRequestSpecialists->rating }}</td>
            <td>{{ $acceptRequestSpecialists->doctor_id }}</td>
            <td>{{ $acceptRequestSpecialists->request_id }}</td>
                <td>
                    {!! Form::open(['route' => ['acceptRequestSpecialists.destroy', $acceptRequestSpecialists->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('acceptRequestSpecialists.show', [$acceptRequestSpecialists->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('acceptRequestSpecialists.edit', [$acceptRequestSpecialists->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
