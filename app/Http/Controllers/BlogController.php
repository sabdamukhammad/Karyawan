<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Blog;

use Storage;

class BlogController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $list_berita = Blog::orderBy('created_at', 'desc')->get();
        return view('pages/blog/index', compact('list_berita'));
    }

    public function create()
    {
        return view('pages/blog/create');
    }

    public function store(Request $request)
    {
        $input = $request->all();

        //validasi
        $this->validate($request, [
          'judul'     => 'required|max:50',
          'isiberita' => 'required|max:255',
          'foto'      => 'required|image|max:3000|mimes:jpeg,jpg,bmp,png'
        ]);

        //upload gambar
        if ($request->hasFile('foto')) {
          $input['foto'] = $this->uploadFoto($request);
        }

        Blog::create($input);
        return redirect('/blog');
    }

    public function uploadFoto(Request $request) {
        $foto = $request->file('foto');
        $ext  = $foto->getClientOriginalExtension();

        if($request->file('foto')->isValid()) {
          $foto_name   = 'foto/'.date('YmdHis'). ".$ext";
          $upload_path = 'foto';
          $request->file('foto')->move($upload_path, $foto_name);

          return $foto_name;
        }
        return false;
    }

    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        return view('pages/blog/edit', compact('blog'));
    }

    public function update(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);
        $input = $request->all();

        //validasi
        $this->validate($request, [
          'judul'     => 'required|max:50',
          'isiberita' => 'required|max:255',
          'foto'      => 'sometimes|image|max:3000|mimes:jpeg,jpg,bmp,png'
        ]);

        if($request->hasFile('foto')) {
          //hapus foto lama
          $this->hapusFoto($blog);
          //upload foto baru
          $input['foto'] = $this->uploadFoto($request);
        } else {
          $this->hapusFoto($blog);
        }

        $blog->update($input);
        return redirect('/blog');
    }

    public function hapusFoto($blog) {
      $exist = Storage::disk('foto')->exists($blog->foto);
      if(isset($blog->foto) && $exist) {
        $delete = Storage::disk('foto')->delete($blog->foto);
        if($delete) {
          return true;
        }
        return false;
      }
    }

    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();
        return redirect('blog');
    }
}
