@extends('layout.main')

@section('css')
    <!-- iCheck -->
    <link href="{{ asset('vendors/iCheck/skins/flat/green.css') }}" rel="stylesheet">
@endsection

@section('content')

    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Projeto nome</h3>
            </div>
        </div>
        @include('flash::message')
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>MIF's do Projeto: </h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

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
                                <tr>
                                    <th scope="row">Memória de Cálculo </th>
                                    <th><input type="checkbox" class="flat" checked="checked"></th>
                                    <th><input type="checkbox" class="flat" checked="checked"></th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <th scope="row">Cronograma do Projeto </th>
                                    <th><input type="checkbox" class="flat" checked="checked"></th>
                                    <th><input type="checkbox" class="flat" checked="checked"></th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <th scope="row">EASY Project </th>
                                    <th></th>
                                    <th></th>
                                    <th><input type="checkbox" class="flat" checked="checked"></th>
                                </tr>
                                <tr>
                                    <th scope="row">MIF005 Ata de Reunião </th>
                                    <th><input type="checkbox" class="flat" checked="checked"></th>
                                    <th><input type="checkbox" class="flat" checked="checked"></th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <th scope="row">MIF021 Termo de Abertura, Proposta </th>
                                    <th><input type="checkbox" class="flat" checked="checked"></th>
                                    <th><input type="checkbox" class="flat" checked="checked"></th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <th scope="row">MIF906 Lista de Tarefas e Pendências </th>
                                    <th><input type="checkbox" class="flat" checked="checked"></th>
                                    <th><input type="checkbox" class="flat" checked="checked"></th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <th scope="row">MIF962 Termo de Encerramento </th>
                                    <th><input type="checkbox" class="flat" checked="checked"></th>
                                    <th><input type="checkbox" class="flat" checked="checked"></th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <th scope="row">MIF991 Status Report ou MIT008 </th>
                                    <th><input type="checkbox" class="flat" checked="checked"></th>
                                    <th><input type="checkbox" class="flat" checked="checked"></th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <th scope="row">MIF998 Engenharia de Processos </th>
                                    <th><input type="checkbox" class="flat" checked="checked"></th>
                                    <th><input type="checkbox" class="flat" checked="checked"></th>
                                    <th></th>
                                </tr>
                                <tr>

                                </tr>
                                <tr>
                                    <th scope="row" class="text-center">Total (checked)</th>
                                    <th>9</th>
                                    <th>9</th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <th scope="row" class="text-center"> Total %</th>
                                    <th>100%</th>
                                    <th>100%</th>
                                    <th>100%</th>
                                </tr>
                            </tbody>
                        </table>

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