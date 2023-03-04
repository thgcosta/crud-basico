<?php

namespace App\Http\Controllers;
use App\Models\Profile;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index(){
        $users = Profile::get();
        return view('users.list', ['users'=> $users]);
    }

    public function new(){
        return view('users.form');
    }

    public function add(Request $request){
        $user = Profile::create($request->all());
        return redirect()->route('users.home');
    }

    public function update( $id ){
        $user = Profile::findOrFail( $id );
        return view('users.form', ['user'=> $user]);
    }

    public function save(Request $request, $id){
        $user = Profile::findOrFail($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();

        return redirect('/users');
    }

    public function delete( $id ){
        $user = Profile::findOrFail($id);
        $user->delete();
        return redirect('/users');
    }
}
