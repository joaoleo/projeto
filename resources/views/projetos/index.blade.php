@extends('layout.main')

@section('content')

    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Projetos</h3>
            </div>
        </div>
        @include('flash::message')
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <a class="btn btn-xs btn-info" href="{{ url('projetos/create') }}">Adicionar Projeto</a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Empresa</th>
                                    <th>Projeto</th>
                                    <th>Progresso</th>
                                    <th>Status</th>
                                    <th>Data Início</th>
                                    <th>Data Limite</th>
                                    <th>Prazo Final</th>
                                    <th>Data Término</th>
                                    <th>Opções</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($projetos as $projeto)
                                    <tr>
                                        <th scope="row">{{ $projeto->id }}</th>
                                        <td>{{ $projeto->empresa->nome }}</td>
                                        <td>{{ $projeto->nome }}</td>
                                        <td>{{ $projeto->progresso }} %</td>
                                        <td>{!! $projeto->getStatus() !!}</td>
                                        <td>{{ $projeto->getDataInicio() }}</td>
                                        <td>{{ $projeto->getDataLimite() }}</td>
                                        <td>{{ $projeto->getPrazoFinal() }}</td>
                                        <td>{{ $projeto->getDataTermino() }}</td>
                                        <td class=" last">
                                            <a href="{{ url('projetos/' . $projeto->id . '/edit') }}" class="btn btn-xs btn-info" type="button" data-toggle="tooltip" title="Editar Projeto"><i class="fa fa-pencil"></i> Editar</a>
                                            <a href="javascript:;" onclick="document.getElementById('projeto-del-{{ $projeto->id }}').submit();" class="btn btn-danger btn-xs" type="button" data-toggle="tooltip" title="Remover Projeto"><i class="fa fa-trash-o"></i> Deletar</a>
                                            {!! Form::open(['url' => 'projetos/' . $projeto->id, 'method' => 'DELETE', 'id' => 'projeto-del-' . $projeto->id , 'style' => 'display: none']) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <th scope="row" colspan="9" class="text-center">Nenhum projeto cadastrado.</th>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
