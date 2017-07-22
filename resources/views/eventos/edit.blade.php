@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <h1>Editar evento "{{ $evento->id }}"</h1>
    <h4>Edite a informação pretendida e carregue no botão guardar.</h4>
    <a href="{{URL::route('evento.index')}}" class="btn btn-default">Voltar atrás</a>
    <hr>
    <form action="{{ route('evento.update', $evento->id)}}" method="POST">
        <input type="hidden" name="_method" value="PUT">
        <div class="form-group">
            <label for="id" class="control-label">Nº Evento:</label>
            <input type="number" id="id" name="id" class="form-control" value="{{ $evento->id }}" readonly>
        </div>
        <div class="form-group">
            <label for="dia" class="control-label">Dia:</label>
            <input type="date" id="dia" name="dia" class="form-control" value="<?php echo $evento->dia; ?>">
        </div>
        <div class="form-group">
            <label for="hora" class="control-label">Hora:</label>
            <input type="time" id="hora" name="hora" class="form-control" value="<?php echo $evento->hora; ?>" required>
        </div>
        <div class="form-group">
            <label for="local" class="control-label">Local:</label>
            <input type="text" id="local" name="local" class="form-control" value="<?php echo $evento->local; ?>" required>
        </div>
        <div class="form-group">
            <label for="assunto" class="control-label">Assunto:</label>
            <input type="text" id="assunto" name="assunto" class="form-control" value="<?php echo $evento->assunto; ?>" required>
        </div>
        <div class="form-group">
            <label for="descricao" class="control-label">Descrição:</label>
            <textarea id="descricao" name="descricao" class="form-control" required><?php echo $evento->descricao; ?></textarea>
        </div>
        <div class="form-group">
            <label for="curso" class="control-label">Cursos:</label>
            <select id="curso" name="curso[]" class="form-control" multiple>
                <?php $var = 1; ?>
                {{ $var }}
                @foreach($cursos as $curso)
                    @foreach($evento->cursos as $eventocurso)
                        @if($curso->id == $eventocurso->id)
                            <option value="<?php echo $eventocurso->id; ?>" selected><?php echo $eventocurso->nome; ?></option> 
                            {{ $var = 0 }}
                            @break;
                        @else
                            {{ $var = 1 }}
                        @endif
                    @endforeach
                    @if($var==1 )
                        <option value="<?php echo $curso->id; ?>"><?php echo $curso->nome; ?></option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="disciplina" class="control-label">Disciplinas:</label>
            <select id="disciplina" name="disciplina[]" class="form-control" multiple>
                <?php $var = 1; ?>
                {{ $var }}
                @foreach($disciplinas as $disciplina)
                    @foreach($evento->disciplinas as $eventodisciplina)
                        @if($disciplina->id == $eventodisciplina->id)
                            <option value="<?php echo $eventodisciplina->id; ?>" selected><?php echo $eventodisciplina->nome; ?></option> 
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