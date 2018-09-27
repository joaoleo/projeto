@section('css')
    <!-- Select2 -->
    <link href="{{ asset('vendors/select2/dist/css/select2.css') }}" rel="stylesheet">
@endsection

<div class="form-group">
    {!! Form::label('empresa_id', 'Empresa:') !!}
    {!! Form::select('empresa_id', $empresas, null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('consultor_id', 'Consultor:') !!}
    {!! Form::select('consultor_id', $consultores, null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('h_consultoria', 'Hora Consultoria:') !!}
    {!! Form::number('h_consultoria', null, ['class' => 'form-control', 'placeholder' => 'Hora Consultoria']) !!}
</div>

<div class="form-group">
    {!! Form::label('h_coordenacao', 'Hora Coordenação:') !!}
    {!! Form::number('h_coordenacao', null, ['class' => 'form-control', 'placeholder' => 'Hora Consultoria']) !!}
</div>

<div class="form-group">
    {!! Form::label('h_translado', 'Hora Translado:') !!}
    {!! Form::number('h_translado', null, ['class' => 'form-control', 'placeholder' => 'Hora Consultoria']) !!}
</div>

<div class="form-group">
    {!! Form::label('vazio', 'Toral R$:') !!}
    {!! Form::number('vazio', null, ['class' => 'form-control', 'placeholder' => 'R$ 15.000,00', 'disabled']) !!}
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
            $('#empresa_id').select2({
                placeholder: 'Escolha a empresa',
                allowClear: false
            });
            $('#consultor_id').select2({
                placeholder: 'Selecione o consultor',
                allowClear: false
            });
        });
    </script>
@endsection
