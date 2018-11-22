<?php

namespace App\Http\Controllers;

//use App\Models\Cidade;
use App\Models\Empresa;
use App\Models\Estado;
use Illuminate\Http\Request;

class EmpresasController extends Controller
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
        $empresas = Empresa::all();
        return view('empresas.index', compact('empresas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estados = Estado::all()->pluck('nome', 'id');
//        $cidades = Cidade::all()->pluck('nome', 'id');
        return view('empresas.add', compact('estados'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->valida($request);

        $empresa = new Empresa($request->except('_token'));
        $empresa->save();

        return redirect()->to('empresas');
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
        $empresa = Empresa::findOrFail($id);

        $estados = Estado::all()->pluck('nome', 'id');
//        $cidades = Cidade::all()->pluck('nome', 'id');

        return view('empresas.edit', compact('empresa', 'estados'));
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
        $this->valida($request);

        $empresa = Empresa::findOrFail($id);
        $empresa->update($request->except('_token'));

        return redirect()->to('empresas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Empresa::findOrFail($id)->delete();
        return redirect()->to('empresas');
    }

    public function valida($request)
    {
        $this->validate($request, [
            'nome' => 'required|max:255',
            'cep' => 'max:10',
            'telefone' => 'max:20'

        ]);
    }
}
