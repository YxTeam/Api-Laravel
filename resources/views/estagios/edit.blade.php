@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <h1>Editar estagio "{{ $estagio->nome }}"</h1>
    <h4>Edite a informação pretendida e carregue no botão guardar.</h4>
    <a href="{{URL::route('estagio.index')}}" class="btn btn-default">Voltar atrás</a>
    <hr>
    <form action="{{ route('estagio.update', $estagio->id)}}" method="POST">
        <input type="hidden" name="_method" value="PUT">
        <div class="form-group">
            <label for="id" class="control-label">Nº Estágio:</label>
            <input type="number" id="id" name="id" class="form-control" value="{{ $estagio->id }}" readonly>
        </div>
        <div class="form-group">
            <label for="empresa" class="control-label">Empresa:</label>
            <input type="text" id="empresa" name="empresa" class="form-control" value="<?php echo $estagio->empresa; ?>">
        </div>
        <div class="form-group">
            <label for="area" class="control-label">Area:</label>
            <input type="text" id="area" name="area" class="form-control" value="<?php echo $estagio->area; ?>" required>
        </div>
        <div class="form-group">
            <label for="n_horas" class="control-label">Nº Horas:</label>
            <input type="number" id="n_horas" name="n_horas" class="form-control" value="<?php echo $estagio->n_horas; ?>" required>
        </div>
        <div class="form-group">
            <label for="local" class="control-label">Local:</label>
            <input type="text" id="local" name="local" class="form-control" value="<?php echo $estagio->local; ?>" required>
        </div>
        <div class="form-group">
            <label for="contacto" class="control-label">Contacto:</label>
            <textarea id="contacto" name="contacto" class="form-control" value="<?php echo $estagio->contacto; ?>" required></textarea>
        </div>
        <div class="form-group">
            <label for="curso" class="control-label">Curso:</label>
            <select id="curso" name="curso[]" class="form-control" multiple>
                <?php $var = 1; ?>
                {{ $var }}
                @foreach($cursos as $curso)
                    @foreach($estagio->cursos as $estagiocurso)
                        @if($curso->id == $estagiocurso->id)
                            <option value="<?php echo $estagiocurso->id; ?>" selected><?php echo $estagiocurso->nome; ?></option> 
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