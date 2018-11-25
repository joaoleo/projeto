<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Models\Mif;
use App\Models\Projeto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjetosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projetos = Projeto::all();
        return view('projetos.index', compact('projetos'));
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
            return redirect()->to('projetos');
        } else {
            $empresas = Empresa::all()->pluck('nome', 'id');
            return view('projetos.add', compact('empresas'));
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
        $this->valida($request);

        $projeto = new Projeto($request->except('_token'));
        $projeto->save();

        $this->mifs($projeto->id);

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
        $projeto = Projeto::findOrFail($id);
        return view('projetos.projeto', compact('projeto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $projeto = Projeto::findOrFail($id);
        $empresas = Empresa::all()->pluck('nome', 'id');
        return view('projetos.edit', compact('projeto', 'empresas'));
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

        $projeto = Projeto::findOrFail($id);
        $projeto->update($request->except('_token'));

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
        Projeto::findOrFail($id)->delete();
        return redirect()->to('projetos');
    }

    public function valida($request)
    {
        $this->validate($request, [
            'nome' => 'required|max:255',
            'progresso' => 'required',
            'descricao' => 'required',
            'data_inicio' => 'required|date',
            'data_limite' => 'required|date',
            'prazo_final' => 'required|date',
            'data_termino' => 'required|date'
        ]);
    }

    public function mifs($id)
    {
        $mifs = [
            ['projeto_id' => $id, 'nome' => 'Memória de Cálculo'],
            ['projeto_id' => $id, 'nome' => 'Cronograma do Projeto'],
            ['projeto_id' => $id, 'nome' => 'EASY Project'],
            ['projeto_id' => $id, 'nome' => 'MIF005 Ata de Reunião'],
            ['projeto_id' => $id, 'nome' => 'MIF021 Termo de Abertura, Proposta'],
            ['projeto_id' => $id, 'nome' => 'MIF906 Lista de Tarefas e Pendências'],
            ['projeto_id' => $id, 'nome' => 'MIF962 Termo de Encerramento'],
            ['projeto_id' => $id, 'nome' => 'MIF991 Status Report ou MIT008'],
            ['projeto_id' => $id, 'nome' => 'MIF998 Engenharia de Processos'],
        ];

        foreach ($mifs as $mif) {
            Mif::create($mif);
        }
    }

    public function mif($id)
    {
        $mifs = Mif::where('projeto_id', '=', $id)->get();
        $assinado = Mif::where('projeto_id', '=', $id)->where('assinado', '=', true)->where('easy_project', '!=', true)->count();
        $entregue = Mif::where('projeto_id', '=', $id)->where('entregue', '=', true)->where('easy_project', '!=', true)->count();
        $easy_project = Mif::where('projeto_id', '=', $id)->where('easy_project', '=', true)->count();

        $assin_perc = 0;
        if ($assinado > 0) {
            $assin_perc = ($assinado / 8) * 100;
        }

        $entre_perc = 0;
        if ($entregue > 0) {
            $entre_perc = ($entregue / 8) * 100;
        }

        return view('projetos.mifs', compact('mifs', 'assinado', 'entregue', 'assin_perc', 'entre_perc', 'easy_project'));
    }

    public function mifUpdate(Request $request)
    {
        $assinadas = $request->input('assinado');
        $entregues = $request->input('entregue');
        $easy_project = $request->input('easy_project');

        if ($assinadas != null) {
            foreach ($assinadas as $key => $a_id) {
                $ass = Mif::find($a_id);
                if ($ass->id == $a_id) {
                    DB::table('mifs')->where('id', '=', $a_id)->update(['assinado' => true]);
                }
            }
        }

        if ($entregues != null) {
            foreach ($entregues as $key => $e_id) {
                $ent = Mif::findOrFail($e_id);
                if ($e_id == $ent->id) {
                    DB::table('mifs')->where('id', '=', $e_id)->update(['entregue' => true]);
                }
            }
        }

        if ($easy_project != null) {
            $easy = Mif::findOrFail($easy_project);
            $easy->easy_project = true;
            $easy->update();
        }

        return redirect()->back();
    }
}
