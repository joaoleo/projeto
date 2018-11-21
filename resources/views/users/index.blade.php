@extends('layout.main')

@section('content')

    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Funcionárias(os)</h3>
            </div>
        </div>
        @include('flash::message')
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <a class="btn btn-xs btn-info" href="{{ url('users/create') }}">Adicionar Funcionária(o)</a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nome</th>
                                    <th>E-mail</th>
                                    <th>Contratação</th>
                                    <th>Cargo</th>
                                    <th>Custo</th>
                                    <th>Custo Hora</th>
                                    <th>Opções</th>
                                </tr>
                            </thead>
                            <tbody>
                            @forelse($users as $user)
                                <tr>
                                    <th scope="row">{{ $user->id }}</th>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->tipo }}</td>
                                    <td>{{ $user->cargo->nome }}</td>
                                    <td>R$ {{ number_format($user->custo(), 2, ',', '.') }}</td>
                                    <td>R$ {{ $user->custoHora() }}</td>
                                    <td class=" last">
                                        <a href="{{ url('users/' . $user->id . '/edit') }}" class="btn btn-xs btn-info" type="button" data-toggle="tooltip" title="Editar Funcionária(o)"><i class="fa fa-pencil"></i> Editar</a>
                                        <a href="javascript:;" onclick="document.getElementById('user-del-{{ $user->id }}').submit();" class="btn btn-danger btn-xs" type="button" data-toggle="tooltip" title="Remover Funcionária(o)"><i class="fa fa-trash-o"></i> Deletar</a>
                                        {!! Form::open(['url' => 'users/' . $user->id, 'method' => 'DELETE', 'id' => 'user-del-' . $user->id , 'style' => 'display: none']) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <th scope="row" colspan="6" class="text-center">Nenhum funcionária(o) cadastrado.</th>
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
