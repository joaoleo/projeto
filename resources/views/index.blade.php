<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>

    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Meta -->
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <!-- Site Meta -->
    <title>Site</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,700,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,400i,700,700i" rel="stylesheet">

    <!-- Custom & Default Styles -->
    <!-- Bootstrap -->
    <link href="{{ asset('vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <!-- LOADER -->
    <div id="preloader">
        <img class="preloader" src="{{ asset('images/loader.gif') }}" alt="">
    </div><!-- end loader -->
    <!-- END LOADER -->

    <div id="wrapper">
        <!-- BEGIN # MODAL LOGIN -->
        <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Begin # DIV Form -->
                    <div id="div-forms">
                        <form id="login-form">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span class="flaticon-add" aria-hidden="true"></span>
                            </button>
                            <div class="modal-body">
                                <input class="form-control" type="text" placeholder="What you are looking for?" required>
                            </div>
                        </form><!-- End # Login Form -->
                    </div><!-- End # DIV Form -->
                </div>
            </div>
        </div>
        <!-- END # MODAL LOGIN -->

        <header class="header">
            <div class="topbar clearfix">
                <div class="container">
                    <div class="row-fluid">
                        <div class="col-md-6 col-sm-6 text-left">
                            <p>
                                <strong><i class="fa fa-phone"></i></strong> +90 543 123 45 67 &nbsp;&nbsp;
                                <strong><i class="fa fa-envelope"></i></strong> <a href="mailto:#">info@yoursite.com</a>
                            </p>
                        </div><!-- end left -->
                    </div><!-- end row -->
                </div><!-- end container -->
            </div><!-- end topbar -->

            <div class="container">
                <nav class="navbar navbar-default yamm">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <div class="logo-normal">
                            <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ asset('images/logo.png') }}" alt=""></a>
                        </div>
                    </div>

                    <div id="navbar" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav navbar-right">
                            @if (Route::has('login'))
                                @auth
                                    <li><a href="{{ url('/home') }}">Painel Admin</a></li>
                                @else
                                    <li><a href="{{ url('/home') }}">Painel Admin</a></li>
                                    <li><a href="{{ route('login') }}">Login</a></li>
                                    {{--<li><a href="{{ route('register') }}">Register</a></li>--}}
                                @endauth
                            @endif
                        </ul>
                    </div>
                </nav><!-- end navbar -->
            </div><!-- end container -->
        </header>

        <section id="home" class="video-section js-height-full">
            <div class="overlay"></div>
            <div class="home-text-wrapper relative container">
                <div class="home-message">
                    <p>Sistema de Gerenciamento de Projetos</p>
                    <small>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce a sapien et ipsum ultricies fermentum. Etiam vitae risus lacus. Mauris bibendum non enim a consectetur.</small>
                    <div class="btn-wrapper">
                        <div class="text-center">
                            <a href="#" class="btn btn-primary wow slideInLeft">Texto 1</a>
                            &nbsp;&nbsp;&nbsp;<a href="#" class="btn btn-default wow slideInRight">Texto 2</a>
                        </div>
                    </div><!-- end row -->
                </div>
            </div>
            <div class="slider-bottom">
                <span>Copyright &copy{{ date('Y') }} <i class="fa fa-angle-up"></i></span>
            </div>
        </section>

    </div><!-- end wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('vendors/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/carousel.js') }}"></script>
    <script src="{{ asset('js/animate.js') }}"></script>
    <script src="{{ asset('js/site.js') }}"></script>
    <!-- VIDEO BG PLUGINS -->
    <script src="{{ asset('js/videobg.js') }}"></script>
</body>
</html>
