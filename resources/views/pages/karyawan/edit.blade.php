<?php
/**
 * Created by PhpStorm.
 * User: Elfan N
 * Date: 25/06/2019
 * Time: 18:24
 */
?>

@extends('templates.default')
@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">karyawan</a></li>
                        <li class="breadcrumb-item active">Add karyawan</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!-- Horizontal Form -->
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Add karyawan</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        {!! Form::open(['route' => ['karyawan.update',$karyawan->id], 'method' => 'post', 'files' => true]) !!}
                        {{csrf_field()}}
                        {{method_field('PATCH')}}
                        <div class="card-body">

                            <div class="form-group row">
                                {!! Form::label('name', 'Name', ['class' => 'col-sm-2 control-label']) !!}
                                <div class="col-sm-10">
                                    {!! Form::text('name', $karyawan->name,['placeholder' => 'Enter Name', 'class' => ['form-control' ,($errors->has('name')?'is-invalid':'')]]) !!}
                                    @if ($errors->has('name'))
                                        <span class=" invalid-feedback" role="alert">
                                                <p><b>{{ $errors->first('name') }}</b></p>
                                            </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                {!! Form::label('gender', 'Gender', ['class' => 'col-sm-2 control-label']) !!}
                                <div class="col-sm-10">
                                    {!! Form::select('gender', ['Male' => 'Male', 'Female' => 'Female'], null, [ 'class' => 'form-control']) !!}
                                </div>
                            </div>

                            <div class="form-group row">
                                {!! Form::label('position', 'Position', ['class' => 'col-sm-2 control-label']) !!}
                                <div class="col-sm-10">
                                    {!! Form::text('position', $karyawan->position ,['placeholder' => 'Enter Position', 'class' => ['form-control' ,($errors->has('position')?'is-invalid':'')]]) !!}
                                    @if ($errors->has('position'))
                                        <span class=" invalid-feedback" role="alert">
                                                <p><b>{{ $errors->first('position') }}</b></p>
                                            </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                {!! Form::label('place', 'Place of Birth', ['class' => 'col-sm-2 control-label']) !!}
                                <div class="col-sm-10">
                                    {!! Form::text('place', $karyawan->place_of_birth,['placeholder' => 'Enter Place', 'class' => ['form-control' ,($errors->has('place')?'is-invalid':'')]]) !!}
                                    @if ($errors->has('place'))
                                        <span class=" invalid-feedback" role="alert">
                                                <p><b>{{ $errors->first('place') }}</b></p>
                                            </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                {!! Form::label('dateb', 'Date of Birth', ['class' => 'col-sm-2 control-label']) !!}
                                <div class="col-sm-10">
                                    {!! Form::date('dateb', $karyawan->date_of_birth,['class' => ['form-control' ,($errors->has('dateb')?'is-invalid':'')]]) !!}
                                    @if ($errors->has('dateb'))
                                        <span class=" invalid-feedback" role="alert">
                                                <p><b>{{ $errors->first('dateb') }}</b></p>
                                            </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group row">
                                {!! Form::label('filename', 'Avatar', ['class' => 'col-sm-2 control-label']) !!}
                                <div class="col-sm-10">
                                    {!! Form::hidden('old_filename', $karyawan->filename) !!}
                                    {!! Form::file('filename', ['class' => ['form-control' ,($errors->has('filename')?'is-invalid':'')], 'onchange' => 'loadfile(event)']) !!}
                                    </br>
                                    <img id="output" class="img-fluid" height="100" width="100">
                                    @if ($errors->has('filename'))
                                        <span class=" invalid-feedback" role="alert">
                                                <p><b>{{ $errors->first('filename') }}</b></p>
                                            </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                {!! Form::label('address', 'Address', ['class' => 'col-sm-2 control-label']) !!}
                                <div class="col-sm-10">
                                    {!! Form::textarea('address', $karyawan->address,['placeholder' => 'Enter Address', 'rows' => 3, 'class' => ['form-control' ,($errors->has('address')?'is-invalid':'')]]) !!}
                                    @if ($errors->has('address'))
                                        <span class=" invalid-feedback" role="alert">
                                                <p><b>{{ $errors->first('address') }}</b></p>
                                            </span>
                                    @endif
                                </div>
                            </div>

                            <!-- /.card-body -->
                            <div class=" card-footer form-group">
                                <button type="submit" class="btn btn-info">Save</button>
                                <a href="{{route('karyawan')}}" class="btn btn-default">Cancel</a>
                            </div>
                            <!-- /.card-footer -->
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
    </section>
@endsection

<script>
    var loadfile = function (event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
    };
</script>