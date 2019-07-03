<?php
/**
 * Created by PhpStorm.
 * User: Elfan N
 * Date: 25/06/2019
 * Time: 18:15
 */
?>


@extends('templates.default')

@section('content')

    <section class="content-header">
        @if($message = Session::get('create'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <i class="icon fa fa-check"></i><strong>{{$message}}</strong>
            </div>
        @endif

        @if($message = Session::get('update'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <i class="icon fa fa-check"></i><strong>{{$message}}</strong>
            </div>
        @endif

        @if($message = Session::get('delete'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <i class="icon fa fa-check"></i><strong>{{$message}}</strong>
            </div>
        @endif

        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">User</a></li>
                        <li class="breadcrumb-item active">Data User</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data User
                            <a href="{{route('user.create')}}" class="btn btn-info btn-sm float-right"><i
                                        class="fa fa-plus"></i> Add</a>
                        </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Avatar</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $no = 1 ?>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{$no}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td><img src="{{asset('uploads/users/'.$user->filename)}}" width="50" height="50">
                                    </td>
                                    <td>
                                        <a href="{{route('user.edit', $user->id)}}" class="btn btn-warning btn-sm"><i
                                                    class="fa fa-pencil"></i></a>
                                        @if(Auth::user()->email != $user->email)
                                            <a href="{{route('user.destroy', $user->id)}}"
                                               onclick="return confirm('Apakah Anda Yakin Akan Menghapus Data Ini?')"
                                               class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                        @endif
                                    </td>
                                </tr>
                                <?php $no++ ?>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
@endsection

