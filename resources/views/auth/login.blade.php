@extends('layout.auth')

@section('content')

    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">
                {!! Form::open(['url' => 'login']) !!}
                    <h1>Login</h1>
                    <div>
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus placeholder="E-mail">
                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div>
                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Senha">
                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div>
                        <button class="btn btn-default" type="submit">Login</button>
                        <a class="reset_pass" href="{{ route('password.request') }}">Esqueceu a senha?</a>
                    </div>

                    <div class="clearfix"></div>

                    <div class="separator">
                        <div class="clearfix"></div>
                        <br />

                        <div>
                            <h1><i class="fa fa-home"></i>Sistema de Gerenciamento de Projetos</h1>
                            <p>©{{ date('Y') }} Todos os direitos reservados.</p>
                        </div>
                    </div>
                {!! Form::close() !!}
            </section>
        </div>
    </div>

@endsection
