<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control','minlength' => 3,'maxlength' => 191]) !!}
</div>

<!-- Address Field -->
<div class="form-group col-sm-6">
    {!! Form::label('address', 'Address:') !!}
    {!! Form::text('address', null, ['class' => 'form-control','minlength' => 3,'maxlength' => 191]) !!}
</div>

<!-- Price Per Day Field -->
<div class="form-group col-sm-6">
    {!! Form::label('price_per_day', 'Price Per Day:') !!}
    {!! Form::text('price_per_day', null, ['class' => 'form-control','minlength' => 1]) !!}
</div>

<!-- Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('type', 'Type:') !!}
    {!! Form::text('type', null, ['class' => 'form-control','minlength' => 3,'maxlength' => 60]) !!}
</div>

<!-- Available Field -->
<div class="form-group col-sm-6">
    {!! Form::label('available', 'Available:') !!}
    {!! Form::text('available', null, ['class' => 'form-control','minlength' => 1]) !!}
</div>

<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'User Id:') !!}
    {!! Form::text('user_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('emergencyServiceds.index') }}" class="btn btn-default">Cancel</a>
</div>
