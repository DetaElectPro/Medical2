<!-- Graduation Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('graduation_date', 'Graduation Date:') !!}
    {!! Form::date('graduation_date', null, ['class' => 'form-control','id'=>'graduation_date']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#graduation_date').datetimepicker({
            // format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endpush

<!-- Birth Of Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('birth_of_date', 'Birth Of Date:') !!}
    {!! Form::date('birth_of_date', null, ['class' => 'form-control','id'=>'birth_of_date']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#birth_of_date').datetimepicker({
            // format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endpush

<!-- Medical Registration Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('medical_registration_number', 'Medical Registration Number:') !!}
    {!! Form::text('medical_registration_number', null, ['class' => 'form-control','maxlength' => 150,'minlength' => 5]) !!}
</div>

<!-- Registration Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('registration_date', 'Registration Date:') !!}
    {!! Form::date('registration_date', null, ['class' => 'form-control','id'=>'registration_date']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#registration_date').datetimepicker({
            // format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endpush

<!-- Address Field -->
<div class="form-group col-sm-6">
    {!! Form::label('address', 'Address:') !!}
    {!! Form::text('address', null, ['class' => 'form-control','maxlength' => 150,'minlength' => 5]) !!}
</div>

<!-- Years Of Experience Field -->
<div class="form-group col-sm-6">
    {!! Form::label('years_of_experience', 'Years Of Experience:') !!}
    {!! Form::number('years_of_experience', null, ['class' => 'form-control','min' => 1]) !!}
</div>

<!-- Cv Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cv', 'Cv:') !!}
    {!! Form::file('cv') !!}
</div>
<div class="clearfix"></div>

<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'User Id:') !!}
    {!! Form::text('user_id', null, ['class' => 'form-control','maxlength' => 100,'minlength' => 1]) !!}
</div>

<!-- Medical Fields Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('medical_fields_id', 'Medical Fields Id:') !!}
    {!! Form::text('medical_fields_id', null, ['class' => 'form-control','maxlength' => 100,'minlength' => 1]) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('employs.index') }}" class="btn btn-default">Cancel</a>
</div>
