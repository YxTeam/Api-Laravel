@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <h1>Editar propina de "{{ $propina->mes }}"</h1>
    <h4>Edite a informação pretendida e carregue no botão guardar.</h4>
    <a href="{{URL::route('propina.index')}}" class="btn btn-default">Voltar atrás</a>
    <hr>
    <form action="{{ route('propina.update', $propina->id)}}" method="POST">
        <input type="hidden" name="_method" value="PUT">
        <div class="form-group">
            <label for="id" class="control-label">Nº Propina:</label>
            <input type="number" id="id" name="id" class="form-control" value="{{ $propina->id }}" readonly>
        </div>
        <div class="form-group">
            <label for="ano" class="control-label">Ano:</label>
            <input type="number" id="ano" name="ano" class="form-control" value="<?php echo $propina->ano; ?>">
        </div>
        <div class="form-group">
            <label for="mes" class="control-label">Mês:</label>
            <select id="mes" name="mes" class="form-control" required>
                <option value="<?php echo $propina->mes; ?>"><?php echo $propina->mes; ?></option>
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
            <input type="number" id="valor" name="valor" class="form-control" value="<?php echo $propina->valor; ?>" required>
        </div>
        <div class="form-group">
            <label for="curso" class="control-label">Cursos:</label>
            <select id="curso" name="curso[]" class="form-control" multiple>
                <?php $var = 1; ?>
                {{ $var }}
                @foreach($cursos as $curso)
                    @foreach($propina->cursos as $propinacurso)
                        @if($curso->id == $propinacurso->id)
                            <option value="<?php echo $propinacurso->id; ?>" selected><?php echo $propinacurso->nome; ?></option> 
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
            <label for="aluno" class="control-label">Alunos:</label>
            <select id="aluno" name="aluno[]" class="form-control" multiple>
                <?php $var = 1; ?>
                {{ $var }}
                @foreach($alunos as $aluno)
                    @foreach($propina->alunos as $propinaaluno)
                        @if($aluno->id == $propinaaluno->id)
                            <option value="<?php echo $propinaaluno->id; ?>" selected><?php echo $propinaaluno->nome; ?></option> 
                            {{ $var = 0 }}
                            @break;
                        @else
                            {{ $var = 1 }}
                        @endif
                    @endforeach
                    @if($var==1 )
                        <option value="<?php echo $aluno->id; ?>"><?php echo $aluno->nome; ?></option>
                    @endif
                @endforeach
            </select>
        </div>
        <input type="submit" class="btn btn-primary">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
    </form>
</div>
@stop