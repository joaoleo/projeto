<?php

namespace App\Http\Controllers;

use App\Models\Cotacao;
use App\Models\Empresa;
use App\User;
use Illuminate\Http\Request;

class CotacoesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cotacoes = Cotacao::all();
        return view('cotacoes.index', compact('cotacoes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Empresa::count() <= 0) {
            flash('Nenhuma empresa cadastrada, cadastre uma para continuar.')->error();
            return redirect()->to('cotacoes');
        } else {
            $empresas = Empresa::all()->pluck('nome', 'id');
            $consultores = User::all()->pluck('name', 'id');
            return view('cotacoes.add', compact('empresas', 'consultores'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cotacao = new Cotacao($request->except('_token'));
        $cotacao->save();

        return redirect()->to('cotacoes');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cotacao = Cotacao::findOrFail($id);
        return view('cotacoes.edit', compact('cotacao'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
