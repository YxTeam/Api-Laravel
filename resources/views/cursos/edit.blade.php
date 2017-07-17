@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <h1>Editar curso "{{ $curso->nome }}"</h1>
    <h4>Edite a informação pretendida e carregue no botão guardar.</h4>
    <a href="{{URL::route('curso.index')}}" class="btn btn-default">Voltar atrás</a>
    <hr>
    <form action="{{route('curso.update', $curso->id)}}" method="POST">
        <input type="hidden" name="_method" value="PUT">
        <div class="form-group">
            <label for="id" class="control-label">Nº Curso:</label>
            <input type="text" id="id" name="id" class="form-control" value="{{ $curso->id }}" readonly>
        </div>
        <div class="form-group">
            <label for="nome" class="control-label">Nome:</label>
            <input type="text" id="nome" name="nome" class="form-control" value="{{ $curso->nome }}">
        </div>
        <div class="form-group">
            <label for="anos" class="control-label">Número de Anos:</label>
            <select id="anos" name="anos" class="form-control" required>
                <option value="{{ $curso->anos }}">{{ $curso->anos }}</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
        </div>
        <div class="form-group">
            <label for="coordenador" class="control-label">Coordenador:</label>
            <input type="text" id="coordenador" name="coordenador" class="form-control" value="{{ $curso->coordenador }}">
        </div>
        <div class="form-group">
            <label for="tipo" class="control-label">Tipo:</label>
            <select id="tipo" name="tipo" class="form-control" required>
                <option value="{{ $curso->tipo }}">{{ $curso->tipo }}</option>
                <option value="Mestrado">Mestrado</option>
                <option value="Pós-Graduação">Pós-Graduação</option>
                <option value="Outro">Outro</option>
            </select>
        </div>
        <div class="form-group">
            <label for="disciplina" class="control-label">Modelo:</label>
            <select id="disciplina" name="disciplina[]" class="form-control" multiple>
                <?php $var = 1; ?>
                {{ $var }}
                @foreach($disciplinas as $disciplina)
                    @foreach($curso->disciplinas as $cursodisciplina)
                        @if($disciplina->id == $cursodisciplina->id)
                            <option value="<?php echo $cursodisciplina->id; ?>" selected><?php echo $cursodisciplina->nome; ?></option> 
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