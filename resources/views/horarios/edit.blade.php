@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <h1>Editar horario "{{ $horario->nome }}"</h1>
    <h4>Edite a informação pretendida e carregue no botão guardar.</h4>
    <a href="{{URL::route('horario.index')}}" class="btn btn-default">Voltar atrás</a>
    <hr>
    <form action="{{ route('horario.update', $horario->id)}}" method="POST">
        <input type="hidden" name="_method" value="PUT">
        <div class="form-group">
            <label for="id" class="control-label">Nº Evento:</label>
            <input type="number" id="id" name="id" class="form-control" value="{{ $horario->id }}" readonly>
        </div>
        <div class="form-group">
            <label for="dia" class="control-label">Dia:</label>
            <select id="dia" name="dia" class="form-control" required>
                <option value="<?php echo $horario->dia; ?>" selected><?php echo $horario->dia; ?></option>
                <option value="Segunda-feira">Segunda-feira</option>
                <option value="Terça-feira">Terça-feira</option>
                <option value="Quarta-feira">Quarta-feira</option>
                <option value="Quinta-feira">Quinta-feira</option>
                <option value="Sexta-feira">Sexta-feira</option>
            </select>
        </div>
        <div class="form-group">
            <label for="hora_inicio" class="control-label">Hora de Inicio:</label>
            <input type="time" id="hora_inicio" name="hora_inicio" class="form-control" value="<?php echo $horario->hora_inicio; ?>" required>
        </div>
        <div class="form-group">
            <label for="hora_fim" class="control-label">Hora de Fim:</label>
            <input type="time" id="hora_fim" name="hora_fim" class="form-control" value="<?php echo $horario->hora_fim; ?>" required>
        </div>
        <div class="form-group">
            <label for="sala" class="control-label">Sala:</label>
            <input type="text" id="sala" name="sala" class="form-control" value="<?php echo $horario->sala; ?>" required>
        </div>
        <div class="form-group">
            <label for="disciplina" class="control-label">Disciplinas:</label>
            <select id="disciplina" name="disciplina" class="form-control" multiple>
                <?php $var = 1; ?>
                {{ $var }}
                @foreach($disciplinas as $disciplina)
                    @foreach($horario->disciplinas as $horariodisciplina)
                        @if($disciplina->id == $horariodisciplina->id)
                            <option value="<?php echo $horariodisciplina->id; ?>" selected><?php echo $horariodisciplina->nome; ?></option> 
                            {{ $var = 0 }}
                            @break;
                        @else
                            {{ $var = 1 }}
                        @endif
                    @endforeach
                    @if($var==1 )
                        <option value="<?php echo $disciplina->id; ?>"><?php echo $disciplina->nome; ?></option>
                    @endif
                @endforeach
            </select>
        </div>
        <input type="submit" class="btn btn-primary">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
    </form>
</div>
@stop