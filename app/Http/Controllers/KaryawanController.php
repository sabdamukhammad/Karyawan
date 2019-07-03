<?php

namespace App\Http\Controllers;

use App\Karyawan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $karyawan = Karyawan::all();
        return view('pages.karyawan.karyawan', compact('karyawan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.karyawan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|min:5|max:50|alpha_spaces',
            'position' => 'required|min:5|max:50|alpha_spaces',
            'place' => 'required|min:5|max:50|alpha_spaces',
            'dateb' => 'required',
            'filename' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
            'address' => 'required|min:5|max:100',
        ]);

        $avatar = $request->file('filename');
        $filename = time().'.'.$avatar->getClientOriginalExtension() ;
        $destinationPath = public_path('/uploads/karyawan');
        $avatar->move($destinationPath, $filename);

        $karyawan = new Karyawan();
        $karyawan->name = $request->name;
        $karyawan->gender = $request->gender;
        $karyawan->position = $request->position;
        $karyawan->place_of_birth = $request->place;
        $karyawan->date_of_birth = $request->dateb;
        $karyawan->filename = $filename;
        $karyawan->address = $request->address;
        //dd($request->all());
        $karyawan->save();

        return redirect()->route('karyawan')->with('create', 'Berhasil Menambahkan Data Karyawan');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function show(Karyawan $karyawan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $karyawan = Karyawan::find($id);
        return view('pages.karyawan.edit', compact('karyawan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required|min:5|max:50|alpha_spaces',
            'position' => 'required|min:5|max:50|alpha_spaces',
            'place' => 'required|min:5|max:50|alpha_spaces',
            'dateb' => 'required',
            'filename' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
            'address' => 'required|min:5|max:100',
        ]);

        $karyawan = Karyawan::find($id);
        $karyawan->name = $request->name;
        $karyawan->gender = $request->gender;
        $karyawan->position = $request->position;
        $karyawan->place_of_birth = $request->place;
        $karyawan->date_of_birth = $request->dateb;
        $avatar = $request->file('filename');
        if ($avatar == ''){
            $karyawan->filename = $request->old_filename;
        }else{
            $filename = time().'.'.$avatar->getClientOriginalExtension() ;
            $destinationPath = public_path('/uploads/karyawan');
            $avatar->move($destinationPath, $filename);
            $karyawan->filename = $filename;
        }
        $karyawan->address = $request->address;
        //dd($request->all());
        $karyawan->update();

        return redirect()->route('karyawan')->with('update', 'Berhasil Mengupdate Data Karyawan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $karyawan = Karyawan::find($id);
        $karyawan->delete();
        return redirect()->route('karyawan')->with('delete', 'Berhasil Menghapus Data Karyawan');
    }
}
