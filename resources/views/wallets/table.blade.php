<div class="table-responsive">
    <table class="table" id="wallets-table">
        <thead>
            <tr>
                <th>Balance</th>
        <th>User Id</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($wallets as $wallet)
            <tr>
                <td>{{ $wallet->balance }}</td>
            <td>{{ $wallet->user_id }}</td>
                <td>
                    {!! Form::open(['route' => ['wallets.destroy', $wallet->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('wallets.show', [$wallet->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('wallets.edit', [$wallet->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
