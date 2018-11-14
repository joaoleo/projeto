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
    {!! Form::label('h_consultoria', 'Horas Consultoria:') !!}
    {!! Form::number('h_consultoria', null, ['class' => 'form-control', 'placeholder' => 'Horas Consultoria']) !!}
</div>

<div class="form-group">
    {!! Form::label('h_coordenacao', 'Horas Coordenação:') !!}
    {!! Form::number('h_coordenacao', null, ['class' => 'form-control', 'placeholder' => 'Horas Consultoria']) !!}
</div>

<div class="form-group">
    {!! Form::label('h_translado', 'Horas Translado:') !!}
    {!! Form::number('h_translado', null, ['class' => 'form-control', 'placeholder' => 'Horas Consultoria']) !!}
</div>

<div class="form-group">
    {!! Form::label('orcamento', 'Toral R$:') !!}
    {!! Form::number('orcamento', null, ['class' => 'form-control', 'placeholder' => 'R$ 15.000,00', 'disabled']) !!}
</div>

<div class="form-group">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::select('status', ['aberto' => 'Aberto', 'aprovado' => 'Aprovado', 'aguardando' => 'Aguardando', 'cancelado' => 'Cancelado'], null, ['class' => 'form-control', 'required']) !!}
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
