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
                        <li class="breadcrumb-item"><a href="#">Users</a></li>
                        <li class="breadcrumb-item active">Add User</li>
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
                            <h3 class="card-title">Edit User</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        {!! Form::open(['route' => ['user.update',$users->id], 'method' => 'post', 'files' => true]) !!}
                        {{csrf_field()}}
                        {{method_field('PATCH')}}
                        <div class="card-body">
                            <div class="form-group row">
                                {!! Form::label('name', 'Name', ['class' => 'col-sm-2 control-label']) !!}
                                <div class="col-sm-10">
                                    {!! Form::text('name', $users->name, ['placeholder' => 'Enter Name', 'class' => ['form-control' ,($errors->has('name')?'is-invalid':'')]]) !!}
                                    @if ($errors->has('name'))
                                        <span class=" invalid-feedback" role="alert">
                                                <p><b>{{ $errors->first('name') }}</b></p>
                                            </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                {!! Form::label('username', 'Username', ['class' => 'col-sm-2 control-label']) !!}
                                <div class="col-sm-10">
                                    {!! Form::text('username', $users->username,['placeholder' => 'Enter username', 'class' => ['form-control' ,($errors->has('username')?'is-invalid':'')], 'disabled']) !!}
                                    @if ($errors->has('username'))
                                        <span class=" invalid-feedback" role="alert">
                                                <p><b>{{ $errors->first('username') }}</b></p>
                                            </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                {!! Form::label('email', 'Email', ['class' => 'col-sm-2 control-label']) !!}
                                <div class="col-sm-10">
                                    {!! Form::email('email', $users->email, ['placeholder' => 'Enter Email', 'class' => 'form-control'.($errors->has('email')?'is-invalid':''), 'disabled']) !!}
                                    @if ($errors->has('email'))
                                        <span class=" invalid-feedback" role="alert">
                                                <p><b>{{ $errors->first('email') }}</b></p>
                                            </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                {!! Form::label('password', 'Password', ['class' => 'col-sm-2 control-label']) !!}
                                <div class="col-sm-10">
                                    {!! Form::password('password', ['placeholder' => 'Enter password', 'class' => ['form-control' ,($errors->has('password')?'is-invalid':'')]]) !!}
                                    @if ($errors->has('password'))
                                        <span class=" invalid-feedback" role="alert">
                                                <p><b>{{ $errors->first('password') }}</b></p>
                                            </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                {!! Form::label('filename', 'Avatar', ['class' => 'col-sm-2 control-label']) !!}
                                <div class="col-sm-10">
                                    {!! Form::hidden('old_filename', $users->filename) !!}
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

                            <!-- /.card-body -->
                            <div class=" card-footer form-group">
                                <button type="submit" class="btn btn-info">Save</button>
                                <a href="{{route('user')}}" class="btn btn-default">Cancel</a>
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
