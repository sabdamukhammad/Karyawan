
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
                        <div class="col-md-6">
                          <a class="btn btn-round btn-primary" href="{{ url('blog/create') }}" style="float: right"><i class="fa fa-plus" aria-hidden="true"></i> Tambah Berita</a>
                        </div>
                      </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                              <th>Judul Berita</th>
                              <th>Isi Berita</th>
                              <th>Foto</th>
                              <th>Tanggal</th>
                              <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($list_berita as $berita)
                            <tr>
                              <td>{{ $berita->judul }}</td>
                              <td>{{ $berita->isiberita }}</td>
                              <td>
                                <img src="{{ '/'.$berita->foto }}" alt="foto berita" style="max-height: 50px">
                              </td>
                              <td>{{ $berita->created_at->format('d-m-Y')}}</td>
                              <td>
                                 <div class="col-md-3">
                                   {{ link_to('/blog/' . $berita->id . '/edit', 'Edit', ['class' => 'btn btn-warning  btn-sm']) }}
                                 </div>
                                 <div class="col-md-3" onclick="return confirm('Yakin Ingin Menghapus?')">
                                   {!! Form::open(['method' => 'DELETE', 'action' => ['BlogController@destroy', $berita->id], 'id' => 'delete']) !!}
                                   {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                                   {!! Form::close() !!}
                                 </div>
                              </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
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
