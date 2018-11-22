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
                                    <th class="text-center">Opções</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($projetos as $projeto)
                                    <tr>
                                        <th scope="row">{{ $projeto->id }}</th>
                                        <td><b><a href="{{ url('projetos/' . $projeto->id) }}">{{ $projeto->empresa->nome }}</a></b></td>
                                        <td>{{ $projeto->nome }}</td>
                                        <td class="project_progress">
                                            <div class="progress progress_sm">
                                                <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="{{ $projeto->progresso }}"></div>
                                            </div>
                                            <small>{{ $projeto->progresso }}% Completo</small>
                                        </td>
                                        <td>{!! $projeto->getStatus() !!}</td>
                                        <td class="last text-center">
                                            <a href="{{ url('projetos/' . $projeto->id) }}" class="btn btn-xs btn-success" type="button" data-toggle="tooltip" title="Visualizar Projeto"><i class="fa fa-eye"></i> Visualizar</a>
                                            <a href="{{ url('projetos/' . $projeto->id . '/edit') }}" class="btn btn-xs btn-info" type="button" data-toggle="tooltip" title="Editar Projeto"><i class="fa fa-pencil"></i> Editar</a>
                                            <a href="javascript:;" onclick="document.getElementById('projeto-del-{{ $projeto->id }}').submit();" class="btn btn-danger btn-xs" type="button" data-toggle="tooltip" title="Remover Projeto"><i class="fa fa-trash-o"></i> Deletar</a>
                                            {!! Form::open(['url' => 'projetos/' . $projeto->id, 'method' => 'DELETE', 'id' => 'projeto-del-' . $projeto->id , 'style' => 'display: none']) !!}
                                            {!! Form::close() !!}
                                            <a href="{{ url('projetos/' . $projeto->id . '/mifs') }}" class="btn btn-xs btn-dark" type="button" data-toggle="tooltip" title="Editar MIFS"><i class="fa fa-check-square-o"></i> MIF's</a>
                                            <a href="{{ url('apontamentos/' . $projeto->id) }}" class="btn btn-xs btn-warning" type="button" data-toggle="tooltip" title="Visualizar Apontamentos"><i class="fa fa-table"></i> Apontamentos</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <th scope="row" colspan="10" class="text-center">Nenhum projeto cadastrado.</th>
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

@section('scripts')
    <!-- bootstrap-progressbar -->
    <script src="{{ asset('vendors/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
@endsection
