@extends('layout.main')

@section('css')
    <!-- Select2 -->
    <link href="{{ asset('vendors/select2/dist/css/select2.css') }}" rel="stylesheet">
    <!-- SummerNote -->
    <link href="{{ asset('vendors/summernote/summernote.min.css') }}" rel="stylesheet">
    <!-- ClockPicker -->
    <link href="{{ asset('vendors/clockpicker/dist/bootstrap-clockpicker.min.css') }}" rel="stylesheet">
@endsection

@section('content')

    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Adicionar Apontamento</h3>
            </div>
        </div>
        @include('layout.errors')
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Adicionar Apontamento</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        {!! Form::model($apontamento, ['url' => 'apontamentos/' . $apontamento->id, 'method' => 'PUT', 'class' => 'form-horizontal form-label-left']) !!}
                        <div class="form-group">
                            {!! Form::label('empresa_id', 'Empresa:') !!}
                            {!! Form::select('empresa_id', $empresas, null, ['class' => 'form-control', 'required']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('projeto_id', 'Projeto:') !!}
                            {!! Form::select('projeto_id', $projetos, null, ['class' => 'form-control', 'required']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('consultor_id', 'Consultor:') !!}
                            {!! Form::select('consultor_id', $consultores, null, ['class' => 'form-control', 'required']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('inicio', 'Início:') !!}
                            {!! Form::text('inicio', null, ['class' => 'form-control', 'placeholder' => '00:00', 'required']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('almoco', 'Almoço:') !!}
                            {!! Form::text('almoco', null, ['class' => 'form-control', 'placeholder' => '00:00', 'required']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('fim', 'Fim:') !!}
                            {!! Form::text('fim', null, ['class' => 'form-control', 'placeholder' => '00:00', 'required']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('refeicao', 'Refeição:') !!}
                            {!! Form::number('refeicao', null, ['class' => 'form-control', 'placeholder' => 'R$ 00,00', 'step' => 'any']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('estacionamento', 'Estacionamento:') !!}
                            {!! Form::number('estacionamento', null, ['class' => 'form-control', 'placeholder' => 'R$ 00,00', 'step' => 'any']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('kms', 'Km\'s:') !!}
                            {!! Form::number('kms', null, ['class' => 'form-control', 'placeholder' => 'R$ 00,00', 'step' => 'any']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('pedagio', 'Pedágio:') !!}
                            {!! Form::number('pedagio', null, ['class' => 'form-control', 'placeholder' => 'R$ 00,00', 'step' => 'any']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('hospital', 'Hospital:') !!}
                            {!! Form::number('hospital', null, ['class' => 'form-control', 'placeholder' => 'R$ 00,00', 'step' => 'any']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('taxi', 'Taxi:') !!}
                            {!! Form::number('taxi', null, ['class' => 'form-control', 'placeholder' => 'R$ 00,00', 'step' => 'any']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('despesas', 'Despesas:') !!}
                            {!! Form::number('despesas', null, ['class' => 'form-control', 'placeholder' => 'R$ 00,00', 'step' => 'any']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('observacao', 'Observação:') !!}
                            {!! Form::textarea('observacao', null, ['class' => 'form-control', 'rows' => 4, 'placeholder' => 'Observação']) !!}
                        </div>

                        <div class="ln_solid"></div>
                        <div class="form-group">
                            {!! Form::submit('Alterar', ['class' => 'btn btn-primary']) !!}
                        </div>
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <!-- Select2 -->
    <script src="{{ asset('vendors/select2/dist/js/select2.full.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#empresa_id').select2({
                placeholder: 'Selecione a empresa',
                allowClear: false
            });
            $('#projeto_id').select2({
                placeholder: 'Selecione o projeto',
                allowClear: false
            });
            $('#consultor_id').select2({
                placeholder: 'Selecione o consultor',
                allowClear: false
            });
        });
    </script>

    <!-- SummerNote -->
    <script src="{{ asset('vendors/summernote/summernote.min.js') }}"></script>
    <script src="{{ asset('vendors/summernote/lang/summernote-pt-BR.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#observacao').summernote({
                lang: 'pt-BR',
                height: 200,
            });
        });
    </script>

    <!-- ClockPicker -->
    <script src="{{ asset('vendors/clockpicker/dist/bootstrap-clockpicker.min.js') }}"></script>
    <script>
        $('#inicio').clockpicker({
            placement: 'bottom',
            align: 'left',
            donetext: 'Fechar',
            autoclose: true,
        });
        $('#almoco').clockpicker({
            placement: 'bottom',
            align: 'left',
            donetext: 'Fechar',
            autoclose: true,
        });
        $('#fim').clockpicker({
            placement: 'bottom',
            align: 'left',
            donetext: 'Fechar',
            autoclose: true,
        });
    </script>
@endsection
