@extends('layout.main')

@section('content')

    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Adicionar Orçamento</h3>
            </div>
        </div>
        @include('layout.errors')
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_content">

                        {!! Form::open(['url' => '/cotacoes', 'class' => 'form-horizontal form-label-left']) !!}
                            @include('cotacoes.form', ['submitButton' => 'Adicionar'])
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
