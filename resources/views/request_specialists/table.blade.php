<div class="table-responsive">
    <table class="table" id="requestSpecialists-table">
        <thead>
            <tr>
                <th>Name</th>
        <th>Address</th>
        <th>Start Time</th>
        <th>End Time</th>
        <th>Number Of Hour</th>
        <th>Medical id</th>
        <th>User Id</th>
        <th>Doctor Id</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($requestSpecialists as $requestSpecialists)
            <tr>
                <td>{{ $requestSpecialists->name }}</td>
            <td>{{ $requestSpecialists->address }}</td>
            <td>{{ $requestSpecialists->start_time }}</td>
            <td>{{ $requestSpecialists->end_time }}</td>
            <td>{{ $requestSpecialists->number_of_hour }}</td>
            <td>{{ $requestSpecialists->medical_id }}</td>
            <td>{{ $requestSpecialists->user_id }}</td>
            <td>{{ $requestSpecialists->doctor_id }}</td>
                <td>
                    {!! Form::open(['route' => ['requestSpecialists.destroy', $requestSpecialists->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('requestSpecialists.show', [$requestSpecialists->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('requestSpecialists.edit', [$requestSpecialists->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
