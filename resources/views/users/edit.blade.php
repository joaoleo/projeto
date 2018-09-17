@extends('layout.main')

@section('content')

    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Editar Funcionária(o): {{ $user->name }}</h3>
            </div>
        </div>
        @include('layout.errors')
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_content">

                        {!! Form::model($user, ['url' => '/users/' . $user->id, 'method' => 'PUT', 'class' => 'form-horizontal form-label-left']) !!}
                            @include('users.form', ['submitButton' => 'Editar'])
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
