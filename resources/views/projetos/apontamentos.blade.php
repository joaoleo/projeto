@extends('layout.main')

@section('content')

    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Apontamentos</h3>
            </div>
        </div>
        @include('flash::message')
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Apontamentos do Projeto</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Data</th>
                                    <th>Empresa</th>
                                    <th>Projeto</th>
                                    <th>Consultor</th>
                                    <th>Início</th>
                                    <th>Almoço</th>
                                    <th>Fim</th>
                                    <th>Total Horas</th>
                                    <th>Almoço</th>
                                    <th>Estacionamento</th>
                                    <th>Km</th>
                                    <th>Pedágio</th>
                                    <th>Hospital</th>
                                    <th>Taxi</th>
                                    <th>Despesas</th>
                                </tr>
                            </thead>
                            <tbody>
                            @forelse($dados as $dado)
                                <tr class="accordion-toggle"  data-toggle="collapse" data-target="#collapse-{{ $dado->id }}">
                                    <td scope="row">{{ $dado->created_at->format('d/m/Y') }}</td>
                                    <td>{{ $dado->empresa->nome }}</td>
                                    <td>{{ $dado->projeto->nome }}</td>
                                    <td>{{ $dado->user->name }}</td>
                                    <td>{{ date('H:i', strtotime($dado->inicio)) }}</td>
                                    <td>{{ date('H:i', strtotime($dado->almoco)) }}</td>
                                    <td>{{ date('H:i', strtotime($dado->fim)) }}</td>
                                    <td>{{ $dado->calculoHoras($dado->inicio, $dado->fim)[0] }}</td>
                                    <td>R${{ $dado->refeicao }}</td>
                                    <td>R${{ $dado->estacionamento }}</td>
                                    <td>R${{ $dado->kms }}</td>
                                    <td>R${{ $dado->pedagio }}</td>
                                    <td>R${{ $dado->hospital }}</td>
                                    <td>R${{ $dado->taxi }}</td>
                                    <td>R${{ $dado->despesas }}</td>
                                </tr>
                                <tr>
                                    <td colspan="15">
                                        <div id="collapse-{{ $dado->id }}" class="collapse">
                                            <b>Observação:</b>
                                            {!! $dado->observacao !!}
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="15">
                                        <p class="text-center">Nenhum apontamemento cadastrado no momento.</p>
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                        {{ $dados->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
