<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Nivel;
use App\Http\Requests\NiveisStoreRequest;
class NivelController extends Controller
{
    
    public function index()
    {
        $niveis = Nivel::all();
        return view('nivel.index', compact('niveis'));
    }

    public function create()
    {
        
        return view('nivel.form');    
    }

    public function store(NiveisStoreRequest $request)
    {
        $nivel = Nivel::create([
            'nome'=>$request->nome
        ]);
        
        return redirect('nivel/');
    }

    public function edit($id)
    {
        $nivel = Nivel::findOrFail($id);

        return view('nivel.form', compact('nivel'));
    }

    public function update(Request $request, $id)
    {
        $nivel = Nivel::findOrFail($id);
       
        $nivel->update($request->all());
        $niveis = Nivel::all();


        return view('nivel.index', compact('niveis'));
    }

}
