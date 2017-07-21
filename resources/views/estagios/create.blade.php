@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <h1>Adicionar um novo estagio</h1>
    <h4>Insira toda a informação sobre o estagio.</h4>
    <a href="{{URL::route('estagio.index')}}" class="btn btn-default">Voltar atrás</a>
    <hr>

    <form action="{{URL::route('estagio.store')}}" method="POST">
        <div class="form-group">
            <label for="empresa" class="control-label">Empresa:</label>
            <input type="text" id="empresa" name="empresa" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="area" class="control-label">Àrea:</label>
            <input type="text" id="area" name="area" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="n_horas" class="control-label">Nº Horas:</label>
            <input type="number" id="n_horas" name="n_horas" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="local" class="control-label">Local:</label>
            <input type="text" id="local" name="local" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="contacto" class="control-label">Contacto:</label>
            <input type="text" id="contacto" name="contacto" class="form-control" required>
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
