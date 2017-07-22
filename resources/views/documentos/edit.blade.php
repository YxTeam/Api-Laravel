@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <h1>Editar documento "{{ $documento->nome }}"</h1>
    <h4>Edite a informação pretendida e carregue no botão guardar.</h4>
    <a href="{{URL::route('documento.index')}}" class="btn btn-default">Voltar atrás</a>
    <hr>
    <form action="{{ route('documento.update', $documento->id)}}" method="POST">
        <input type="hidden" name="_method" value="PUT">
        <div class="form-group">
            <label for="id" class="control-label">Nº Evento:</label>
            <input type="number" id="id" name="id" class="form-control" value="{{ $documento->id }}" readonly>
        </div>
        <div class="form-group">
            <label for="nome" class="control-label">Nome:</label>
            <input type="text" id="nome" name="nome" class="form-control" value="<?php echo $documento->nome; ?>">
        </div>
        <div class="form-group">
            <label for="categoria" class="control-label">Categoria:</label>
            <select id="categoria" name="categoria" class="form-control" required>
                <option value="<?php echo $documento->categoria; ?>"><?php echo $documento->categoria; ?></option>
                <option value="Boletins">Boletins</option>
                <option value="Critérios">Critérios</option>
                <option value="Capas">Capas</option>
                <option value="Entregas">Entregas</option>
                <option value="Estágios">Estágios</option>
                <option value="Requerimentos">Requerimentos</option>
            </select>
        </div>
        <div class="form-group">
            <label for="link" class="control-label">Link:</label>
            <input type="text" id="link" name="link" class="form-control" value="<?php echo $documento->link; ?>" required>
        </div>
        <div class="form-group">
            <label for="curso" class="control-label">Curso:</label>
            <select id="curso" name="curso[]" class="form-control" multiple>
                <?php $var = 1; ?>
                {{ $var }}
                @foreach($cursos as $curso)
                    @foreach($documento->cursos as $documentocurso)
                        @if($curso->id == $documentocurso->id)
                            <option value="<?php echo $documentocurso->id; ?>" selected><?php echo $documentocurso->nome; ?></option> 
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
        <input type="submit" class="btn btn-primary">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
    </form>
</div>
@stop