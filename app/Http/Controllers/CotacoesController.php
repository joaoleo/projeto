<?php

namespace App\Http\Controllers;

use App\Models\Cotacao;
use App\Models\Empresa;
use App\Models\Taxa;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CotacoesController extends Controller
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
            $taxas = Taxa::all()->pluck('nome', 'id');

            return view('cotacoes.add', compact('empresas', 'consultores', 'taxas'));
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
        $cotacao->empresa_id = $request->input('empresa_id');
        //consultor
        $cotacao->consultor_id = $request->input('consultor_id');

        $h_consultoria = $request->input('h_consultoria');
        $consultor_taxa = $request->input('consultor_taxa');
        $total_consultoria = $h_consultoria * $this->taxas($consultor_taxa);

        $cotacao->h_consultoria = $h_consultoria;
        $cotacao->consultor_taxa = $consultor_taxa;
        $cotacao->f_consultoria = $total_consultoria;

        //coordenador
        $cotacao->coordenador_id = $request->input('coordenador_id');

        $h_coordenacao = $request->input('h_coordenacao');
        $coordenador_taxa = $request->input('coordenador_taxa');
        $total_coordenacao = $h_coordenacao * $this->taxas($coordenador_taxa);

        $cotacao->h_coordenacao = $h_coordenacao;
        $cotacao->coordenador_taxa = $coordenador_taxa;
        $cotacao->f_coordenacao = $total_coordenacao;

        //translado
        $cotacao->viajante_id = $request->input('viajante_id');

        $h_translado = $request->input('h_translado');
        $translado_taxa = $request->input('translado_taxa');
        $total_translado = $h_translado * $this->taxas($translado_taxa);

        $cotacao->h_translado = $h_translado;
        $cotacao->translado_taxa = $translado_taxa;
        $cotacao->f_translado = $total_translado;

        //fim
        $cotacao->status = $request->input('status');
        $cotacao->total_simposto = $total_consultoria + $total_coordenacao + $total_translado;

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

        $empresas = Empresa::all()->pluck('nome', 'id');
        $consultores = User::all()->pluck('name', 'id');
        $taxas = Taxa::all()->pluck('nome', 'id');

        return view('cotacoes.edit', compact('cotacao', 'empresas', 'consultores', 'taxas'));
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
        $cotacao = Cotacao::findOrFail($id);
        $cotacao->empresa_id = $request->input('empresa_id');
        //consultor
        $cotacao->consultor_id = $request->input('consultor_id');

        $h_consultoria = $request->input('h_consultoria');
        $consultor_taxa = $request->input('consultor_taxa');
        $total_consultoria = $h_consultoria * $this->taxas($consultor_taxa);

        $cotacao->h_consultoria = $h_consultoria;
        $cotacao->consultor_taxa = $consultor_taxa;
        $cotacao->f_consultoria = $total_consultoria;

        //coordenador
        $cotacao->coordenador_id = $request->input('coordenador_id');

        $h_coordenacao = $request->input('h_coordenacao');
        $coordenador_taxa = $request->input('coordenador_taxa');
        $total_coordenacao = $h_coordenacao * $this->taxas($coordenador_taxa);

        $cotacao->h_coordenacao = $h_coordenacao;
        $cotacao->coordenador_taxa = $coordenador_taxa;
        $cotacao->f_coordenacao = $total_coordenacao;

        //translado
        $cotacao->viajante_id = $request->input('viajante_id');

        $h_translado = $request->input('h_translado');
        $translado_taxa = $request->input('translado_taxa');
        $total_translado = $h_translado * $this->taxas($translado_taxa);

        $cotacao->h_translado = $h_translado;
        $cotacao->translado_taxa = $translado_taxa;
        $cotacao->f_translado = $total_translado;

        //fim
        $cotacao->status = $request->input('status');
        $cotacao->total_simposto = $total_consultoria + $total_coordenacao + $total_translado;

        $cotacao->update();

        return redirect()->to('cotacoes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cotacao::findOrFail($id)->delete();
        return redirect()->to('cotacoes');
    }

    public function taxas($id)
    {
        $taxa = Taxa::findOrFail($id);
        return $taxa->valor;
    }

}
