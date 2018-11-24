@extends('layout.main')

@section('css')
    <!-- Morris -->
    <link rel="stylesheet" href="{{ asset('vendors/morris.js/morris.css') }}">
@endsection

@section('content')

    <div class="">
        <div class="row top_tiles">
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                    <div class="icon"><i class="fa fa-bar-chart-o"></i></div>
                    <div class="count">{{ $projetos }}</div>
                    <h3>Projetos</h3>
                    {{--<p>Lorem ipsum psdea itgum rixt.</p>--}}
                </div>
            </div>
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                    <div class="icon"><i class="fa fa-desktop"></i></div>
                    <div class="count">{{ $empresas }}</div>
                    <h3>Empresas cadastradas</h3>
                    {{--<p>Lorem ipsum psdea itgum rixt.</p>--}}
                </div>
            </div>
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                    <div class="icon"><i class="fa fa-clock-o"></i></div>
                    <div class="count">{{ $hora }}</div>
                    <h3>Horas Trabalhadas</h3>
                    {{--<p>Lorem ipsum psdea itgum rixt.</p>--}}
                </div>
            </div>
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                    <div class="icon"><i class="fa fa-users"></i></div>
                    <div class="count">{{ $funcionarios }}</div>
                    <h3>Funcionários</h3>
                    {{--<p>Lorem ipsum psdea itgum rixt.</p>--}}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Faturamento/Despesas Mensal</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="demo-container" style="height:280px">
                                <div id="chartty" class="demo-placeholder"></div>
                            </div>
                            <div class="tiles">
                                <div class="col-md-3 tile">
                                    <span>Faturamento do ano</span>
                                    <h2>R${{ number_format($faturamento, 2, ',', '.') }}</h2>
                                    <span class="sparkline22 graph" style="height: 160px;">
                                        <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                                    </span>
                                </div>
                                <div class="col-md-3 tile">
                                    <span>Despesas do ano</span>
                                    <h2>R${{ number_format($despesa, 2, ',', '.') }}</h2>
                                    <span class="sparkline11 graph" style="height: 160px;">
                                        <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                                    </span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <!-- Morris -->
    <script src="{{ asset('vendors/raphael/raphael-min.js') }}"></script>
    <script src="{{ asset('vendors/morris.js/morris.min.js') }}"></script>
    <script>
        var months = ["Jan", "Fev", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez"];

        new Morris.Line({
            element: 'chartty',
            data: {{ route('api.home') }},
            xkey: 'mes',
            ykeys: ['faturamento', 'despesa'],
            lineColors: ['#228B22', '#FF0000'],
            labels: ['Faturamento', 'Despesas'],
            xLabelFormat: function (x) {
                return months[x.getMonth()];
            }
        });
    </script>
@endsection