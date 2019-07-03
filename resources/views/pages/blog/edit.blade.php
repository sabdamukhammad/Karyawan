@extends('templates.default')

@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Blog</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Data Blog</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="row">
            <div class="col-12">
                <!-- /.card -->

                <div class="card">
                    <div class="card-header">
                      <div class="row col-md-12">
                        <div class="col-md-6">
                          <h3 class="card-title">Blog - Artikel</h3>
                        </div>
                      </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      {!! Form::model($blog, ['method' => 'PATCH', 'action' => ['BlogController@update', $blog->id], 'enctype' => 'multipart/form-data']) !!}
                        <input type="hidden" name="_token" value="{{csrf_token()}}">

                        @include('pages/blog/form', ['submitButtonText' => 'Simpan Artikel'])

                      {!! Form::close() !!}
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>

@endsection
