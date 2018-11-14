@section('css')
    <!-- Select2 -->
    <link href="{{ asset('vendors/select2/dist/css/select2.css') }}" rel="stylesheet">
    <!-- SummerNote -->
    <link href="{{ asset('vendors/summernote/summernote.min.css') }}" rel="stylesheet">
@endsection

<div class="form-group">
    {!! Form::label('nome', 'Nome:') !!}
    {!! Form::text('nome', null, ['class' => 'form-control', 'placeholder' => 'Nome']) !!}
</div>

<div class="form-group">
    {!! Form::label('endereco', 'Endereço:') !!}
    {!! Form::textarea('endereco', null, ['class' => 'form-control', 'placeholder' => 'Endereço', 'rows' => 4]) !!}
</div>

<div class="form-group">
    {!! Form::label('estado_id', 'Estado:') !!}
    {!! Form::select('estado_id', $estados, null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('cidade_id', 'Cidade:') !!}
    {!! Form::text('cidade', null, ['class' => 'form-control', 'placeholder' => 'Cidade']) !!}
</div>

<div class="form-group">
    {!! Form::label('cep', 'CEP:') !!}
    {!! Form::text('cep', null, ['class' => 'form-control', 'placeholder' => 'CEP', 'data-inputmask' => '"mask" : "99999-999"']) !!}
</div>

<div class="form-group">
    {!! Form::label('telefone', 'Telefone:') !!}
    {!! Form::text('telefone', null, ['class' => 'form-control', 'placeholder' => 'Telefone', 'data-inputmask' => '"mask" : "(99) 9999-9999"']) !!}
</div>

<div class="form-group">
    {!! Form::label('observacao', 'Observação:') !!}
    {!! Form::textarea('observacao', null, ['class' => 'form-control', 'rows' => 8, 'placeholder' => 'Observação']) !!}
</div>

<div class="ln_solid"></div>
<div class="form-group">
    {!! Form::submit($submitButton, ['class' => 'btn btn-primary']) !!}
</div>

@section('scripts')
    <!-- Select2 -->
    <script src="{{ asset('vendors/select2/dist/js/select2.full.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#estado_id').select2({
                placeholder: 'Escolha o estado',
                allowClear: false
            });
            $('#cidade_id').select2({
                placeholder: 'Escolha a cidade',
                allowClear: false
            });
        });
    </script>

    <!-- SummerNote -->
    <script src="{{ asset('vendors/summernote/summernote.min.js') }}"></script>
    <script src="{{ asset('vendors/summernote/lang/summernote-pt-BR.js') }}"></script>

    <!-- Page JS Code -->
    <script>
        $(document).ready(function() {
            $('#observacao').summernote({
                lang: 'pt-BR',
                height: 200,
            });
        });
    </script>
    <!-- jquery.inputmask -->
    <script src="{{ asset('vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js') }}"></script>
@endsection
