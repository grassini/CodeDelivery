{!! Form::hidden('user_id',isset($client->user_id) ? $client->user_id : null) !!}


<div class="form-group">
    {!! Form::label('Name','Nome: ') !!}
    {!! Form::text('user[name]', null , ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('Email','Email: ') !!}
    {!! Form::text('user[email]', null, ['class'=>'form-control' ]) !!}
</div>

<div class="form-group">
    {!! Form::label('password','Senha:') !!}
    {!! Form::text('password',null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('Telefone','Telefone: ') !!}
    {!! Form::text('phone',null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('Endreço','Endereço: ') !!}
    {!! Form::textarea('address',null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('Cidade','Cidade:') !!}
    {!! Form::text('city',null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('Estado','Estado: ') !!}
    {!! Form::text('state', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('zipcode','Cep: ') !!}
    {!! Form::text('zipcode',null, ['class'=>'form-control']) !!}
</div>