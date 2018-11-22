@extends('layout.main')

@section('content')

<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>{{ $projeto->empresa->nome }}</h3>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>{{ $projeto->nome }}</h2>
                    <div class="clearfix"></div>
                </div>

                <div class="x_content">

                    <div class="col-md-9 col-sm-9 col-xs-12">

                        <section class="panel">

                            <div class="panel-body">
                                <h4>Descrição do Projeto:</h4>
                                {!! $projeto->descricao !!}
                                <br />

                                <div class="text-center mtop20">
                                    <a href="{{ url('/projetos') }}" class="btn btn-sm btn-primary">Voltar</a>
                                </div>
                            </div>

                        </section>

                    </div>

                    <!-- start project-detail sidebar -->
                    <div class="col-md-3 col-sm-3 col-xs-12">

                        <h4>Prazos e Datas</h4>

                        <!-- end of user messages -->
                        <div class="project_detail">
                            <p class="title">Data Início</p>
                            <p>{{ $projeto->getDataInicio() }}</p>
                            <p class="title">Data Limite</p>
                            <p>{{ $projeto->getDataLimite() }}</p>
                            <p class="title">Prazo Final</p>
                            <p>{{ $projeto->getPrazoFinal() }}</p>
                            <p class="title">Data Término</p>
                            <p>{{ $projeto->getDataTermino() }}</p>
                        </div>
                        <br />

                    </div>
                    <!-- end project-detail sidebar -->

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
