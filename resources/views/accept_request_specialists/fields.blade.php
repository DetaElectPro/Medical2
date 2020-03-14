<!-- Note Field -->
<div class="form-group col-sm-6">
    {!! Form::label('note', 'Note:') !!}
    {!! Form::text('note', null, ['class' => 'form-control']) !!}
</div>

<!-- Recommendation Field -->
<div class="form-group col-sm-6">
    {!! Form::label('recommendation', 'Recommendation:') !!}
    {!! Form::text('recommendation', null, ['class' => 'form-control']) !!}
</div>

<!-- Rating Field -->
<div class="form-group col-sm-6">
    {!! Form::label('rating', 'Rating:') !!}
    {!! Form::number('rating', null, ['class' => 'form-control']) !!}
</div>

<!-- Doctor Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('doctor_id', 'Doctor Id:') !!}
    {!! Form::text('doctor_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Request Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('request_id', 'Request Id:') !!}
    {!! Form::text('request_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('acceptRequestSpecialists.index') }}" class="btn btn-default">Cancel</a>
</div>
