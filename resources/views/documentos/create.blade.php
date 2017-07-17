@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <h1>Adicionar um novo documento</h1>
    <h4>Insira toda a informação sobre o documento.</h4>
    <a href="{{URL::route('documento.index')}}" class="btn btn-default">Voltar atrás</a>
    <hr>

    <form action="{{URL::route('documento.store')}}" method="POST">
        <div class="form-group">
            <label for="nome" class="control-label">Nome:</label>
            <input type="text" id="nome" name="nome" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="categoria" class="control-label">Categoria:</label>
            <select id="categoria" name="categoria" class="form-control" required>
                <option value="Boletins">Boletins</option>
                <option value="Critérios">Critérios</option>
                <option value="Capas">Capas</option>
                <option value="Entregas">Entregas</option>
                <option value="Estágios">Estágios</option>
                <option value="Requerimentos">Requerimentos</option>
            </select>
        </div>
        <div class="form-group">
            <label for="link" class="control-label">link:</label>
            <input type="text" id="link" name="link" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="curso" class="control-label">Cursos:</label>
            <select id="curso" name="curso[]" class="form-control" multiple required>
                @foreach($cursos as $curso)
                    <option value="<?php echo $curso->id; ?>"><?php echo $curso->nome; ?></option>
                @endforeach
            </select>
        </div>
        <input type="submit" class="btn btn-primary" value="Inserir">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
    </form>
</div>
@stop
