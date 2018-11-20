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
                        <h2>Lucratividade <small>Lucro anual</small></h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="demo-container" style="height:280px">
                                <div id="chartty" class="demo-placeholder"></div>
                            </div>
                            <div class="tiles">
                                <div class="col-md-3 tile">
                                    <span>Gastos</span>
                                    <h2>R$31.809,92</h2>
                                    <span class="sparkline11 graph" style="height: 160px;">
                                        <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                                    </span>
                                </div>
                                <div class="col-md-3 tile">
                                    <span>Lucro</span>
                                    <h2>R$256.790,55</h2>
                                    <span class="sparkline22 graph" style="height: 160px;">
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
        new Morris.Line({
            // ID of the element in which to draw the chart.
            element: 'chartty',
            // Chart data records -- each entry in this array corresponds to a point on
            // the chart.
            data: [
                { year: '2014', value: 20 },
                { year: '2015', value: 10 },
                { year: '2016', value: 5 },
                { year: '2017', value: 5 },
                { year: '2018', value: 20 }
            ],
            // The name of the data record attribute that contains x-values.
            xkey: 'year',
            // A list of names of data record attributes that contain y-values.
            ykeys: ['value'],
            // Labels for the ykeys -- will be displayed when you hover over the
            // chart.
            labels: ['Valor']
        });
    </script>
@endsection