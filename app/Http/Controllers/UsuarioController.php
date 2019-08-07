<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Nivel, Usuario};
use App\Http\Requests\UsuarioStoreRequest;

class UsuarioController extends Controller
{
    public function index()
    {
        //Usuario ativos
        $usuarios = Usuario::all();

        //Excluido e não excluido
        $usuariosDeletados = Usuario::onlyTrashed()->get();
        return view('index', compact('usuarios', 'usuariosDeletados'));
    }

    public function soma($a,$b)
    {
        return "Soma: ".($a+ $b);
    }

    public function create()
    {
        $niveis = Nivel::all();

        

        return view('form', compact('niveis'));
    }

    public function store(UsuarioStoreRequest $request)
    {
        // $usuario = Usuario::create([
        //     'nome' => $request->nome,
        //     'email'=>$request->email,
        //     'data_nascimento'=>$request->data_nascimento,
        //     'nivel_id'=>$request->nivel_id
        // ]);
        
        Usuario::create($request->all());
        return redirect('/');
    }

    public function edit($id)
    {
        $usuario = Usuario::findOrFail($id);
        $niveis  = Nivel::all();

        return view('form', compact('usuario', 'niveis'));
    }

    public function update(UsuarioStoreRequest $request, $id)
    {
        $usuario = Usuario::findOrFail($id);
       
        // $usuario->update([
        //     'nome' => $request->nome,
        //     'email'=>$request->email,
        //     'data_nascimento'=>$request->data_nascimento,
        //     'nivel_id'=>$request->nivel_id
        // ]);
        $usuario->update($request->all());
        return redirect('/');

    }

    public function destroy($id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->delete();
        return back();
    }

    public function restore($id)
    {
        $usuario = Usuario::onlyTrashed()->findOrFail($id);
        $usuario->restore();
        return back();
    }
}
