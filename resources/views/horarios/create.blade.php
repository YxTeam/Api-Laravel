@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <h1>Adicionar um novo horario</h1>
    <h4>Insira toda a informação sobre o horario.</h4>
    <a href="{{URL::route('horario.index')}}" class="btn btn-default">Voltar atrás</a>
    <hr>

    <form action="{{URL::route('horario.store')}}" method="POST">
        <div class="form-group">
            <label for="disciplina" class="control-label">Disciplinas:</label>
            <select id="disciplina" name="disciplina[]" class="form-control" multiple required>
                @foreach($disciplinas as $disciplina)
                    <option value="<?php echo $disciplina->id; ?>"><?php echo $disciplina->nome; ?></option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="dia" class="control-label">Dia:</label>
            <select id="dia" name="dia" class="form-control" required>
                <option value="Segunda-feira">Segunda-feira</option>
                <option value="Terça-feira">Terça-feira</option>
                <option value="Quarta-feira">Quarta-feira</option>
                <option value="Quinta-feira">Quinta-feira</option>
                <option value="Sexta-feira">Sexta-feira</option>
            </select>
        </div>
        <div class="form-group">
            <label for="hora_inicio" class="control-label">Hora de Início:</label>
            <input type="time" id="hora_inicio" name="hora_inicio" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="hora_fim" class="control-label">Hora de Fim:</label>
            <input type="time" id="hora_fim" name="hora_fim" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="sala" class="control-label">Sala:</label>
            <input type="text" id="sala" name="sala" class="form-control" rows="4" required>
        </div>
        <input type="submit" class="btn btn-primary" value="Inserir">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
    </form>
</div>
@stop
