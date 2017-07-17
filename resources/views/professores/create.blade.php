@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <h1>Adicionar uma nova professor</h1>
    <h4>Insira toda a informação sobre a professor.</h4>
    <a href="{{URL::route('professor.index')}}" class="btn btn-default">Voltar atrás</a>
    <hr>

    <form action="{{URL::route('professor.store')}}" method="POST">
        <div class="form-group">
            <label for="nome" class="control-label">Nome:</label>
            <input type="text" id="nome" name="nome" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="email" class="control-label">Email:</label>
            <input type="email" id="email" name="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="disciplina" class="control-label">Disciplina:</label>
            <select id="disciplina" name="disciplina[]" class="form-control" multiple required>
                @foreach($disciplinas as $disciplina)
                    <option value="<?php echo $disciplina->id; ?>"><?php echo $disciplina->nome; ?></option>
                @endforeach
            </select>
        </div>
        <input type="submit" class="btn btn-primary" value="Inserir">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
    </form>
</div>
@stop