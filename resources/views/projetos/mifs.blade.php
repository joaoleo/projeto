@extends('layout.main')

@section('css')
    <!-- iCheck -->
    <link href="{{ asset('vendors/iCheck/skins/flat/green.css') }}" rel="stylesheet">
@endsection

@section('content')

    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Projeto</h3>
            </div>
        </div>
        @include('flash::message')
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>MIF's do Projeto</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        {!! Form::open(['url' => '/projetos/mifs']) !!}

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Assinado</th>
                                    <th>Entregue</th>
                                    <th>Easy Project</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($mifs as $mif)
                                    @if($mif->nome == 'EASY Project')
                                        <tr>
                                            <th scope="row">EASY Project</th>
                                            <th></th>
                                            <th></th>
                                            <th>{!! Form::checkbox('easy_project', $mif->id, $mif->easy_project, ['class' => 'flat']) !!}</th>
                                        </tr>
                                    @else
                                        <tr>
                                            <th scope="row">{{ $mif->nome }}</th>
                                            <th>{!! Form::checkbox('assinado[]', $mif->id, $mif->assinado, ['class' => 'flat']) !!}</th>
                                            <th>{!! Form::checkbox('entregue[]', $mif->id, $mif->entregue, ['class' => 'flat']) !!}</th>
                                            <th></th>
                                        </tr>
                                    @endif
                                @endforeach

                                <tr> </tr>
                                <tr>
                                    <th scope="row" class="text-center">Total (checked)</th>
                                    <th>{{ $assinado }}</th>
                                    <th>{{ $entregue }}</th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <th scope="row" class="text-center"> Total em %</th>
                                    <th>{{ $assin_perc }}%</th>
                                    <th>{{ $entre_perc }}%</th>
                                    <th>{{ $easy_project ? '100' : '0' }}%</th>
                                </tr>
                            </tbody>
                        </table>
                        {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <!-- iCheck -->
    <script src="{{ asset('vendors/iCheck/icheck.min.js') }}"></script>
@endsection
