<?php

namespace App\Http\Controllers;
use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    public function index(){
        $usuarios = Usuario::get();
        return view('usuarios.list', ['usuarios'=> $usuarios]);
    }

    public function new(){
        return view('usuarios.form');
    }

    public function add(Request $request){
        $usuario = Usuario::create($request->all());
        return redirect()->route('usuarios.home');
    }

    public function update( $id ){
        $usuario = Usuario::findOrFail( $id );
        return view('usuarios.form', ['usuario'=> $usuario]);
    }

    public function save(Request $request, $id){
        $usuario = Usuario::findOrFail($id);
        $usuario->name = $request->input('name');
        $usuario->email = $request->input('email');
        $usuario->save();

        return redirect('/usuarios');
    }

    public function delete( $id ){
        $usuario = Usuario::findOrFail($id);
        $usuario->delete();
        return redirect('/usuarios');
    }
}
