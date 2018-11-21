@extends('layout.main')

@section('content')

    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Orçamentos</h3>
            </div>
        </div>
        @include('flash::message')
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <a class="btn btn-xs btn-info" href="{{ url('cotacoes/create') }}">Adicionar Orçamento</a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <div class="table-responsive">
                            <table class="table table-striped jambo_table bulk_action">
                                <thead>
                                    <tr class="headings">
                                        <th class="column-title"># </th>
                                        <th class="column-title">Empresa </th>
                                        <th class="column-title">Cadastrado em </th>
                                        <th class="column-title">Total S/Imposto </th>
                                        <th class="column-title">Total C/Imposto </th>
                                        <th class="column-title">Status </th>
                                        <th class="column-title no-link last"><span class="nobr">Opções</span> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($cotacoes as $cotacao)
                                        <td class=" ">{{ $cotacao->id }}</td>
                                        <td class=" ">{{ $cotacao->empresa->nome }}</td>
                                        <td class=" ">{{ $cotacao->created_at->format('d/m/Y') }}</td>
                                        <td class=" ">R${{ $cotacao->totalSemImposto() }}</td>
                                        <td class=" ">R${{ $cotacao->totalComImposto() }}</td>
                                        <td class=" ">{!! $cotacao->getStatus() !!}</td>
                                        <td class=" last">
                                            <a href="{{ url('cotacoes/' . $cotacao->id . '/edit') }}" class="btn btn-xs btn-info" type="button" data-toggle="tooltip" title="Editar Cotação"><i class="fa fa-pencil"></i> Editar</a>
                                            <a href="javascript:;" onclick="document.getElementById('cotacao-del-{{ $cotacao->id }}').submit();" class="btn btn-danger btn-xs" type="button" data-toggle="tooltip" title="Remover Cotação"><i class="fa fa-trash-o"></i> Deletar</a>
                                            {!! Form::open(['url' => 'cotacoes/' . $cotacao->id, 'method' => 'DELETE', 'id' => 'cotacao-del-' . $cotacao->id , 'style' => 'display: none']) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    @empty
                                        <td colspan="6" class="text-center">Nenhum orçamento cadastrada.</td>
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
