@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <h1>Adicionar um novo propina</h1>
    <h4>Insira toda a informação sobre o propina.</h4>
    <a href="{{URL::route('propina.index')}}" class="btn btn-default">Voltar atrás</a>
    <hr>

    <form action="{{URL::route('propina.store')}}" method="POST">
        <div class="form-group">
            <label for="ano" class="control-label">Ano:</label>
            <input type="number" id="ano" name="ano" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="mes" class="control-label">Mês:</label>
            <input type="text" id="mes" name="mes" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="valor" class="control-label">Valor:</label>
            <input type="number" id="valor" name="valor" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="curso" class="control-label">Curso:</label>
            <select id="curso" name="curso[]" class="form-control" multiple required>
                @foreach($cursos as $curso)
                    <option value="<?php echo $curso->id; ?>"><?php echo $curso->nome; ?></option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="aluno" class="control-label">Disciplinas:</label>
            <select id="aluno" name="aluno[]" class="form-control" multiple required>
                @foreach($alunos as $aluno)
                    <option value="<?php echo $aluno->id; ?>"><?php echo $aluno->nome; ?></option>
                @endforeach
            </select>
        </div>
        <input type="submit" class="btn btn-primary" value="Inserir">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
    </form>
</div>
@stop
