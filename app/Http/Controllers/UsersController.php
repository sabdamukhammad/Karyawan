<?php

namespace App\Http\Controllers;

use App\Users;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = Users::all();
        return view('pages.user.user', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.user.create');
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
            'username' => 'required|unique:users|min:5|max:20',
            'email' => 'required|unique:users',
            'password' => 'required|min:8|max:60',
            'filename' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $avatar = $request->file('filename');
        $filename = time().'.'.$avatar->getClientOriginalExtension() ;
        $destinationPath = public_path('/uploads/users');
        $avatar->move($destinationPath, $filename);


        $users = new Users();
        $users->name = $request->name;
        $users->username = $request->username;
        $users->email = $request->email;
        $users->password = bcrypt($request->password);
        $users->filename = $filename;
        $users->remember_token = bcrypt($request->email);
        $users->save();

        return redirect()->route('user')->with('create', 'Berhasil Menambahkan Data User');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Users  $users
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = Users::find($id);
        return view('pages.user.edit', compact('users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required|min:5|max:50|alpha_spaces',
            'password' => 'required|min:8|max:60',
            'filename' => 'file|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $users = Users::find($id);
        $users->name = $request->name;
        $users->password = bcrypt($request->password);
        $avatar = $request->file('filename');
        if ($avatar == ''){
            $users->filename = $request->old_filename;
        }else{
            $filename = time().'.'.$avatar->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/users');
            $avatar->move($destinationPath, $filename);
            $users->filename = $filename;
        }
        $users->update();

        return redirect()->route('user')->with('update', 'Berhasil Mengupdate Data User');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users = Users::find($id);
        $users->delete();
        return redirect()->route('user')->with('delete', 'Berhasil Menghapus Data User');
    }
}
