
<div class="form-group">
    {!! Form::label('name', 'Nome:') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nome']) !!}
</div>

<div class="form-group">
    {!! Form::label('email', 'E-mail:') !!}
    {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'E-mail']) !!}
</div>

<div class="form-group">
    {!! Form::label('senha', 'Senha:') !!}
    {!! Form::text('senha', null, ['class' => 'form-control', 'placeholder' => 'Senha']) !!}
</div>

<div class="form-group">
    {!! Form::label('cargo_id', 'Cargo:') !!}
    {!! Form::select('cargo_id', $cargos, null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('tipo', 'Tipo:') !!}
    {!! Form::select('tipo', ['clt' => 'CLT', 'pj' => 'PJ'], null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('pj', 'PJ:') !!}
    {!! Form::number('pj', null, ['class' => 'form-control', 'step' => 'any']) !!}
</div>

<div class="form-group">
    {!! Form::label('clt', 'CLT:') !!}
    {!! Form::number('clt', null, ['class' => 'form-control', 'step' => 'any']) !!}
</div>

<div class="form-group">
    {!! Form::label('vt', 'VT:') !!}
    {!! Form::number('vt', null, ['class' => 'form-control', 'step' => 'any']) !!}
</div>

<div class="form-group">
    {!! Form::label('va', 'VA:') !!}
    {!! Form::number('va', null, ['class' => 'form-control', 'step' => 'any']) !!}
</div>

<div class="form-group">
    {!! Form::label('vr', 'VR:') !!}
    {!! Form::number('vr', null, ['class' => 'form-control', 'step' => 'any']) !!}
</div>

<div class="form-group">
    {!! Form::label('plano_saude', 'Plano Saúde:') !!}
    {!! Form::number('plano_saude', null, ['class' => 'form-control', 'step' => 'any']) !!}
</div>

<div class="form-group">
    {!! Form::label('seguro_vida', 'Seguro Vida:') !!}
    {!! Form::number('seguro_vida', null, ['class' => 'form-control', 'step' => 'any']) !!}
</div>

<div class="form-group">
    {!! Form::label('full_premiacao', 'Full Premiação:') !!}
    {!! Form::number('full_premiacao', null, ['class' => 'form-control', 'step' => 'any']) !!}
</div>

<div class="form-group">
    {!! Form::label('premiacao_trimestral', 'Premiação Trimestral:') !!}
    {!! Form::number('premiacao_trimestral', null, ['class' => 'form-control', 'step' => 'any']) !!}
</div>

<div class="form-group">
    {!! Form::label('celular', 'Celular:') !!}
    {!! Form::number('celular', null, ['class' => 'form-control', 'step' => 'any']) !!}
</div>

<div class="ln_solid"></div>
<div class="form-group">
    {!! Form::submit($submitButton, ['class' => 'btn btn-primary']) !!}
</div>
