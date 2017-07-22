@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <h1>Adicionar uma nova propina</h1>
    <h4>Insira toda a informação sobre a propina.</h4>
    <a href="{{URL::route('propina.index')}}" class="btn btn-default">Voltar atrás</a>
    <hr>

    <form action="{{URL::route('propina.store')}}" method="POST">
        <div class="form-group">
            <label for="ano" class="control-label">Ano:</label>
            <input type="number" id="ano" name="ano" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="mes" class="control-label">Mês:</label>
            <select id="mes" name="mes" class="form-control" required>
                <option value="Janeiro">Janeiro</option>
                <option value="Fevereiro">Fevereiro</option>
                <option value="Março">Março</option>
                <option value="Abril">Abril</option>
                <option value="Maio">Maio</option>
                <option value="Junho">Junho</option>
                <option value="Julho">Julho</option>
                <option value="Agosto">Agosto</option>
                <option value="Setembro">Setembro</option>
                <option value="Outubro">Outubro</option>
                <option value="Novembro">Novembro</option>
                <option value="Dezembro">Dezembro</option>
            </select>
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
