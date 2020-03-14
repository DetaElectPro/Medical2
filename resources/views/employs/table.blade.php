<div class="table-responsive">
    <table class="table" id="employs-table">
        <thead>
            <tr>
                <th>Graduation Date</th>
        <th>Birth Of Date</th>
        <th>Medical Registration Number</th>
        <th>Registration Date</th>
        <th>Address</th>
        <th>Years Of Experience</th>
        <th>Cv</th>
        <th>User Id</th>
        <th>Medical Fields Id</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($employs as $employ)
            <tr>
                <td>{{ $employ->graduation_date }}</td>
            <td>{{ $employ->birth_of_date }}</td>
            <td>{{ $employ->medical_registration_number }}</td>
            <td>{{ $employ->registration_date }}</td>
            <td>{{ $employ->address }}</td>
            <td>{{ $employ->years_of_experience }}</td>
            <td>{{ $employ->cv }}</td>
            <td>{{ $employ->user_id }}</td>
            <td>{{ $employ->medical_fields_id }}</td>
                <td>
                    {!! Form::open(['route' => ['employs.destroy', $employ->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('employs.show', [$employ->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('employs.edit', [$employ->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
