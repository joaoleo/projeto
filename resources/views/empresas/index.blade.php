@extends('layout.main')

@section('content')

    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Empresas</h3>
            </div>
        </div>
        @include('flash::message')
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <a class="btn btn-xs btn-info" href="{{ url('empresas/create') }}">Adicionar Empresa</a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <div class="table-responsive">
                            <table class="table table-striped jambo_table bulk_action">
                                <thead>
                                    <tr class="headings">
                                        <th class="column-title"># </th>
                                        <th class="column-title">Nome </th>
                                        <th class="column-title">Telefone </th>
                                        <th class="column-title">Cadastrado em </th>
                                        <th class="column-title no-link last"><span class="nobr">Opções</span>
                                        </th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse($empresas as $empresa)
                                        <td class=" ">{{ $empresa->id }}</td>
                                        <td class=" ">{{ $empresa->nome }}</td>
                                        <td class=" ">{{ $empresa->telefone }}</td>
                                        <td class=" ">{{ $empresa->created_at->format('d-m-Y') }}</td>
                                        <td class=" last">
                                            <a href="{{ url('empresas/' . $empresa->id . '/edit') }}" class="btn btn-xs btn-info" type="button" data-toggle="tooltip" title="Editar Empresa"><i class="fa fa-pencil"></i> Editar</a>
                                            <a href="javascript:;" onclick="document.getElementById('empresa-del-{{ $empresa->id }}').submit();" class="btn btn-danger btn-xs" type="button" data-toggle="tooltip" title="Remover Empresa"><i class="fa fa-trash-o"></i> Deletar</a>
                                            {!! Form::open(['url' => 'empresas/' . $empresa->id, 'method' => 'DELETE', 'id' => 'empresa-del-' . $empresa->id , 'style' => 'display: none']) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    @empty
                                        <td colspan="5" class="text-center">Nenhuma empresa cadastrada.</td>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
