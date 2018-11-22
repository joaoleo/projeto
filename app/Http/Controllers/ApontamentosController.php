<?php

namespace App\Http\Controllers;

use App\Models\Apontamento;
use App\Models\Empresa;
use App\Models\Projeto;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ApontamentosController extends Controller
{
    public function __construct()
    {
       // $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            return redirect()->to('empresas');
        } elseif (Projeto::count() <= 0) {
            flash('Nenhum projeto cadastrado, cadastre uma para continuar.')->error();
            return redirect()->to('projetos');
        } else {
            $empresas = Empresa::all()->pluck('nome', 'id');
            $projetos = Projeto::all()->pluck('nome', 'id');
            $consultores = User::all()->pluck('name', 'id');
            return view('apontamentos.add', compact('empresas', 'projetos', 'consultores'));
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
        $apontamento = new Apontamento($request->except('_token'));
        $apontamento->save();

        return redirect()->to('projetos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dados = Apontamento::where('projeto_id', $id)->paginate(20);
        return view('projetos.apontamentos', compact('dados'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $apontamento = Apontamento::findOrFail($id);

        $empresas = Empresa::all()->pluck('nome', 'id');
        $projetos = Projeto::all()->pluck('nome', 'id');
        $consultores = User::all()->pluck('name', 'id');

        return view('apontamentos.edit', compact('apontamento', 'empresas', 'projetos', 'consultores'));
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
        $apontamento = Apontamento::findOrFail($id);
        $apontamento->update($request->except('_token'));

        return redirect()->to('projetos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Apontamento::findOrFail($id)->delete();
        return redirect()->to('projetos');
    }

}
