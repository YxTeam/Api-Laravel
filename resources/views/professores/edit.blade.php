@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <h1>Editar professor "{{ $professor->nome }}"</h1>
    <h4>Edite a informação pretendida e carregue no botão guardar.</h4>
    <a href="{{URL::route('professor.index')}}" class="btn btn-default">Voltar atrás</a>
    <hr>
    <form action="{{route('professor.update', $professor->id)}}" method="POST">
        <input type="hidden" name="_method" value="PUT">
        <div class="form-group">
            <label for="id" class="control-label">Nº Disciplina:</label>
            <input type="text" id="id" name="id" class="form-control" value="{{ $professor->id }}" readonly>
        </div>
        <div class="form-group">
            <label for="nome" class="control-label">Nome:</label>
            <input type="text" id="nome" name="nome" class="form-control" value="{{ $professor->nome }}">
        </div>
        <div class="form-group">
            <label for="email" class="control-label">Email:</label>
            <input type="email" id="email" name="email" class="form-control" value="{{ $professor->email }}">
        </div>
        <div class="form-group">
            <label for="disciplina" class="control-label">Disciplina:</label>
            <select id="disciplina" name="disciplina[]" class="form-control" multiple required>
                <?php $var = 1; ?>
                {{ $var }}
                @foreach($disciplinas as $disciplina)
                    @foreach($professor->disciplinas as $professordisciplina)
                        @if($disciplina->id == $professordisciplina->id)
                            <option value="<?php echo $professordisciplina->id; ?>" selected><?php echo $professordisciplina->nome; ?></option> 
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