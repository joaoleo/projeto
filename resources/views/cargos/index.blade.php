@extends('layout.main')

@section('content')

    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Cargos</h3>
            </div>
        </div>
        @include('flash::message')
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <button type="button" class="btn btn-xs btn-info" data-toggle="modal" data-target=".bs-example-modal-lg">Adicionar Cargo</button>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nome</th>
                                    <th>Opções</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($cargos as $cargo)
                                    <tr>
                                		<th scope="row">{{ $cargo->id }}</th>
                                		<td >{{ $cargo->nome }}</td>
                                		<td>
                                			<a href="#" class="btn btn-xs btn-info" type="button" data-toggle="modal" data-target=".edit-id-lg-{{ $cargo->id }}"><i class="fa fa-pencil" data-toggle="tooltip" title="Editar Cargo"></i> Editar</a>
                                			<a href="javascript:;" onclick="document.getElementById('empresa-del-{{ $cargo->id }}').submit();" class="btn btn-danger btn-xs" type="button" data-toggle="tooltip" title="Remover Cargo"><i class="fa fa-trash-o"></i> Deletar</a>
                                			{!! Form::open(['url' => 'cargos/' . $cargo->id, 'method' => 'DELETE', 'id' => 'empresa-del-' . $cargo->id , 'style' => 'display: none']) !!}
                                			{!! Form::close() !!}
                                		</td>
                                    </tr>
                            	@empty
                            		<td colspan="3" class="text-center">Nenhum cargo cadastrado.</td>
                            	@endforelse
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- modal adicionar cargo -->
    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Adicionar Cargo</h4>
                </div>
                {!! Form::open(['url' => '/cargos', 'class' => 'form-horizontal form-label-left']) !!}
                    <div class="modal-body">
                        <div class="form-group">
                            {!! Form::label('nome', 'Cargo:') !!}
                            {!! Form::text('nome', null, ['class' => 'form-control', 'placeholder' => 'Cargo', 'required']) !!}
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                        {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <!-- end modal adicionar cargo -->

    @forelse($cargos as $cargo)
        <!-- modal editar cargo -->
        <div class="modal fade edit-id-lg-{{ $cargo->id }}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
                        <h4 class="modal-title" id="myModalLabel">Adicionar Cargo</h4>
                    </div>
                    {!! Form::model($cargo, ['url' => '/cargos/' . $cargo->id, 'method' => 'PUT', 'class' => 'form-horizontal form-label-left']) !!}
                        <div class="modal-body">
                            <div class="form-group">
                                {!! Form::label('id', 'ID:') !!}
                                {!! Form::text('id', $cargo->id, ['class' => 'form-control', 'disabled']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('nome', 'Cargo:') !!}
                                {!! Form::text('nome', $cargo->nome, ['class' => 'form-control', 'placeholder' => 'Cargo', 'required']) !!}
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                            {!! Form::submit('Atualizar', ['class' => 'btn btn-primary']) !!}
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <!-- end modal editar cargo -->
    @empty

    @endforelse

@endsection
