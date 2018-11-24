<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Models\Projeto;
use App\User;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projetos = Projeto::all()->count();
        $empresas = Empresa::all()->count();
        $funcionarios = User::all()->count();

        $ano = date('Y');

        $hora = DB::table('apontamentos')->selectRaw('time(sum(TIMEDIFF(fim, inicio))) as total')->get()->pluck('total')->flatten();

        $hora = str_replace('"', '', $hora);
        $hora = str_replace('[', '', $hora);
        $hora = str_replace(']', '', $hora);

        $faturamento = DB::table('cotacoes')->where('status', '=', 'aprovado')->whereYear('created_at', $ano)->sum('total_simposto');

        $despesa = DB::table('apontamentos')->whereYear('created_at', $ano)->sum(DB::raw('refeicao + estacionamento + kms + pedagio + hospital + taxi + despesas'));

        return view('home.index', compact('projetos', 'empresas', 'funcionarios', 'hora', 'faturamento', 'despesa'));
    }
}
