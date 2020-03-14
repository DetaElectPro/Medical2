<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 100]) !!}
</div>

<!-- Medical Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('medical_id', 'Medical Id:') !!}
    {!! Form::text('medical_id', null, ['class' => 'form-control','maxlength' => 100,'minlength' => 3]) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('medicalSpecialties.index') }}" class="btn btn-default">Cancel</a>
</div>
