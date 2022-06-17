@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <h1>Editar aviso "{{ $aviso->id }}"</h1>
    <h4>Edite a informação pretendida e carregue no botão guardar.</h4>
    <a href="{{URL::route('aviso.index')}}" class="btn btn-default">Voltar atrás</a>
    <hr>
    <form action="{{ route('aviso.update', $aviso->id)}}" method="POST">
        <input type="hidden" name="_method" value="PUT">
        <div class="form-group">
            <label for="id" class="control-label">Nº Evento:</label>
            <input type="number" id="id" name="id" class="form-control" value="{{ $aviso->id }}" readonly>
        </div>
        <div class="form-group">
            <label for="assunto" class="control-label">Assunto:</label>
            <input type="text" id="assunto" name="assunto" class="form-control" value="<?php echo $aviso->assunto; ?>" required>
        </div>
        <div class="form-group">
            <label for="descricao" class="control-label">Descrição:</label>
            <textarea id="descricao" name="descricao" class="form-control" required><?php echo $aviso->descricao; ?></textarea>
        </div>
        <div class="form-group">
            <label for="curso" class="control-label">Curso:</label>
            <select id="curso" name="curso[]" class="form-control" multiple>
                <?php $var = 1; ?>
                {{ $var }}
                @foreach($cursos as $curso)
                    @foreach($aviso->cursos as $avisocurso)
                        @if($curso->id == $avisocurso->id)
                            <option value="<?php echo $avisocurso->id; ?>" selected><?php echo $avisocurso->nome; ?></option> 
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
                    @foreach($aviso->disciplinas as $avisodisciplina)
                        @if($disciplina->id == $avisodisciplina->id)
                            <option value="<?php echo $avisodisciplina->id; ?>" selected><?php echo $avisodisciplina->nome; ?></option> 
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