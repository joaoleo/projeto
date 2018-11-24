<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\HomeResource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $ano = date('Y');

        $f01 = DB::table('cotacoes')->where('status', '=', 'aprovado')->whereMonth('created_at', '01')->sum('total_simposto');
        $f02 = DB::table('cotacoes')->where('status', '=', 'aprovado')->whereMonth('created_at', '02')->sum('total_simposto');
        $f03 = DB::table('cotacoes')->where('status', '=', 'aprovado')->whereMonth('created_at', '03')->sum('total_simposto');
        $f04 = DB::table('cotacoes')->where('status', '=', 'aprovado')->whereMonth('created_at', '04')->sum('total_simposto');
        $f05 = DB::table('cotacoes')->where('status', '=', 'aprovado')->whereMonth('created_at', '05')->sum('total_simposto');
        $f06 = DB::table('cotacoes')->where('status', '=', 'aprovado')->whereMonth('created_at', '06')->sum('total_simposto');
        $f07 = DB::table('cotacoes')->where('status', '=', 'aprovado')->whereMonth('created_at', '07')->sum('total_simposto');
        $f08 = DB::table('cotacoes')->where('status', '=', 'aprovado')->whereMonth('created_at', '08')->sum('total_simposto');
        $f09 = DB::table('cotacoes')->where('status', '=', 'aprovado')->whereMonth('created_at', '09')->sum('total_simposto');
        $f10 = DB::table('cotacoes')->where('status', '=', 'aprovado')->whereMonth('created_at', '10')->sum('total_simposto');
        $f11 = DB::table('cotacoes')->where('status', '=', 'aprovado')->whereMonth('created_at', '11')->sum('total_simposto');
        $f12 = DB::table('cotacoes')->where('status', '=', 'aprovado')->whereMonth('created_at', '12')->sum('total_simposto');

        $d01 = DB::table('apontamentos')->whereMonth('created_at', '01')->sum(DB::raw('refeicao + estacionamento + kms + pedagio + hospital + taxi + despesas'));
        $d02 = DB::table('apontamentos')->whereMonth('created_at', '02')->sum(DB::raw('refeicao + estacionamento + kms + pedagio + hospital + taxi + despesas'));
        $d03 = DB::table('apontamentos')->whereMonth('created_at', '03')->sum(DB::raw('refeicao + estacionamento + kms + pedagio + hospital + taxi + despesas'));
        $d04 = DB::table('apontamentos')->whereMonth('created_at', '04')->sum(DB::raw('refeicao + estacionamento + kms + pedagio + hospital + taxi + despesas'));
        $d05 = DB::table('apontamentos')->whereMonth('created_at', '05')->sum(DB::raw('refeicao + estacionamento + kms + pedagio + hospital + taxi + despesas'));
        $d06 = DB::table('apontamentos')->whereMonth('created_at', '06')->sum(DB::raw('refeicao + estacionamento + kms + pedagio + hospital + taxi + despesas'));
        $d07 = DB::table('apontamentos')->whereMonth('created_at', '07')->sum(DB::raw('refeicao + estacionamento + kms + pedagio + hospital + taxi + despesas'));
        $d08 = DB::table('apontamentos')->whereMonth('created_at', '08')->sum(DB::raw('refeicao + estacionamento + kms + pedagio + hospital + taxi + despesas'));
        $d09 = DB::table('apontamentos')->whereMonth('created_at', '09')->sum(DB::raw('refeicao + estacionamento + kms + pedagio + hospital + taxi + despesas'));
        $d10 = DB::table('apontamentos')->whereMonth('created_at', '10')->sum(DB::raw('refeicao + estacionamento + kms + pedagio + hospital + taxi + despesas'));
        $d11 = DB::table('apontamentos')->whereMonth('created_at', '11')->sum(DB::raw('refeicao + estacionamento + kms + pedagio + hospital + taxi + despesas'));
        $d12 = DB::table('apontamentos')->whereMonth('created_at', '12')->sum(DB::raw('refeicao + estacionamento + kms + pedagio + hospital + taxi + despesas'));

        $data = [
            [
                'mes' => $ano.'-01',
                'faturamento' => $f01,
                'despesa' => $d01
            ],
            [
                'mes' => $ano.'-02',
                'faturamento' => $f02,
                'despesa' => $d02
            ],
            [
                'mes' => $ano.'-03',
                'faturamento' => $f03,
                'despesa' => $d03
            ],
            [
                'mes' => $ano.'-04',
                'faturamento' => $f04,
                'despesa' => $d04
            ],
            [
                'mes' => $ano.'-05',
                'faturamento' => $f05,
                'despesa' => $d05
            ],
            [
                'mes' => $ano.'-06',
                'faturamento' => $f06,
                'despesa' => $d06
            ],
            [
                'mes' => $ano.'-07',
                'faturamento' => $f07,
                'despesa' => $d07
            ],
            [
                'mes' => $ano.'-08',
                'faturamento' => $f08,
                'despesa' => $d08
            ],
            [
                'mes' => $ano.'-09',
                'faturamento' => $f09,
                'despesa' => $d09
            ],
            [
                'mes' => $ano.'-10',
                'faturamento' => $f10,
                'despesa' => $d10
            ],
            [
                'mes' => $ano.'-11',
                'faturamento' => $f11,
                'despesa' => $d11
            ],
            [
                'mes' => $ano.'-12',
                'faturamento' => $f12,
                'despesa' => $d12
            ]
        ];

        return response()->json($data, 200);
    }
}
