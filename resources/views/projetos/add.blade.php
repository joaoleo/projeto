@extends('layout.main')

@section('css')
    <!-- Select2 -->
    <link href="{{ asset('vendors/select2/dist/css/select2.css') }}" rel="stylesheet">
    <!-- SummerNote -->
    <link href="{{ asset('vendors/summernote/summernote.min.css') }}" rel="stylesheet">
    <!-- Ion.RangeSlider -->
    <link href="{{ asset('vendors/normalize-css/normalize.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/ion.rangeSlider/css/ion.rangeSlider.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/ion.rangeSlider/css/ion.rangeSlider.skinFlat.css') }}" rel="stylesheet">
@endsection

@section('content')

    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Adicionar Projeto</h3>
            </div>
        </div>
        @include('layout.errors')
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Adicionar Projeto</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        {!! Form::open(['url' => '/projetos', 'class' => 'form-horizontal form-label-left']) !!}
                            <div class="form-group">
                                {!! Form::label('nome', 'Nome do Projeto:') !!}
                                {!! Form::text('nome', null, ['class' => 'form-control', 'placeholder' => 'Nome', 'required']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('empresa_id', 'Empresa:') !!}
                                {!! Form::select('empresa_id', $empresas, null, ['class' => 'form-control', 'required']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('status', 'Status:') !!}
                                {!! Form::select('status', ['aberto' => 'Aberto', 'finalizado' => 'Finalizado', 'aguardando' => 'Aguardando', 'cancelado' => 'Cancelado'], null, ['class' => 'form-control', 'required']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('progresso', 'Progresso:') !!}
                                {!! Form::text('progresso', null) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('data_inicio', 'Data Incício:') !!}
                                {!! Form::date('data_inicio', null, ['class' => 'form-control', 'required']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('data_limite', 'Data Limite:') !!}
                                {!! Form::date('data_limite', null, ['class' => 'form-control', 'required']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('prazo_final', 'Prazo Final:') !!}
                                {!! Form::date('prazo_final', null, ['class' => 'form-control', 'required']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('data_termino', 'Data Término:') !!}
                                {!! Form::date('data_termino', null, ['class' => 'form-control', 'required']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('descricao', 'Descrição:') !!}
                                {!! Form::textarea('descricao', null, ['class' => 'form-control', 'rows' => 4, 'placeholder' => 'Descrição', 'required']) !!}
                            </div>

                            <div class="ln_solid"></div>
                            <div class="form-group">
                                {!! Form::submit('Adicionar', ['class' => 'btn btn-primary']) !!}
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
        });
    </script>

    <!-- SummerNote -->
    <script src="{{ asset('vendors/summernote/summernote.min.js') }}"></script>
    <script src="{{ asset('vendors/summernote/lang/summernote-pt-BR.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#descricao').summernote({
                lang: 'pt-BR',
                height: 200,
            });
        });
    </script>

    <!-- Ion.RangeSlider -->
    <script src="{{ asset('vendors/ion.rangeSlider/js/ion.rangeSlider.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $("#progresso").ionRangeSlider({
                type: "single",
                min: 0,
                max: 100,
                postfix: " %"
            });
        });
    </script>
@endsection
