@extends('layouts.app')
@section('content')
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <?php echo($employ->id); ?>

                <div class="row">
                {!! Form::model($employ, ['route' => ['profile.update', $employ->id], 'method' => 'patch', 'files' => true]) !!}


                <!-- Medical Registration Number Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('medical_registration_number', 'Medical Registration Number:') !!}
                        {!! Form::text('medical_registration_number', null, ['class' => 'form-control','max' => 150,'min' => 5]) !!}
                    </div>


                    <!-- Address Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('address', 'Address:') !!}
                        {!! Form::text('address', null, ['class' => 'form-control','max' => 150,'min' => 5]) !!}
                    </div>

                    <!-- Years Of Experience Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('years_of_experience', 'Years Of Experience:') !!}
                        {!! Form::number('years_of_experience', null, ['class' => 'form-control','min' => 1]) !!}
                    </div>

                    <!-- Cv Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('cv', 'Upload File CV*:') !!}
                        {!! Form::file('cv',['accept' => '.doc , .docx , .pdf , .csv' ] ) !!}
                    </div>
                    <div class="clearfix"></div>


                    <!-- Submit Field -->
                    <div class="form-group col-sm-12">
                        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                        <a href="{{ route('employs.index') }}" class="btn btn-default">Cancel</a>
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection
