@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <h1>Editar aluno "{{ $aluno->nome }}"</h1>
    <h4>Edite a informação pretendida e carregue no botão guardar.</h4>
    <a href="{{URL::route('aluno.index')}}" class="btn btn-default">Voltar atrás</a>
    <hr>
    <form action="{{ route('aluno.update', $aluno->id)}}" method="POST">
        <input type="hidden" name="_method" value="PUT">
        <div class="form-group">
            <label for="id" class="control-label">Nº de Aluno:</label>
            <input type="number" id="id" name="id" class="form-control" value="{{ $aluno->id }}" readonly>
        </div>
        <div class="form-group">
            <label for="nome" class="control-label">Nome:</label>
            <input type="text" id="nome" name="nome" class="form-control" value="<?php echo $aluno->nome; ?>">
        </div>
        <div class="form-group">
            <label for="cartao_cidadao" class="control-label">Cartão de Cidadão:</label>
            <input type="text" id="cartao_cidadao" name="cartao_cidadao" class="form-control" value="<?php echo $aluno->cartao_cidadao; ?>">
        </div>
        <div class="form-group">
            <label for="sexo" class="control-label">Sexo:</label>
            <select id="sexo" name="sexo" class="form-control" required>
                <option value="Masculino">Masculino</option>
                <option value="Feminino">Feminino</option>
            </select>
        </div>
        <div class="form-group">
            <label for="nacionalidade" class="control-label">Nacionalidade:</label>
            <input type="text" id="nacionalidade" name="nacionalidade" class="form-control" value="<?php echo $aluno->nacionalidade; ?>" required>
        </div>
        <div class="form-group">
            <label for="morada" class="control-label">Morada:</label>
            <input type="text" id="morada" name="morada" class="form-control" value="<?php echo $aluno->morada; ?>" required>
        </div>
        <div class="form-group">
            <label for="telemovel" class="control-label">Telemóvel:</label>
            <input type="text" id="telemovel" name="telemovel" class="form-control" value="<?php echo $aluno->telemovel; ?>" required>
        </div>
        <div class="form-group">
            <label for="email" class="control-label">Email:</label>
            <input type="email" id="email" name="email" class="form-control" value="<?php echo $aluno->email; ?>" required>
        </div>
        <div class="form-group">
            <label for="curso" class="control-label">Cursos:</label>
            <select id="curso" name="curso[]" class="form-control" multiple>
                <?php $var = 1; ?>
                {{ $var }}
                @foreach($cursos as $curso)
                    @foreach($aluno->cursos as $alunocurso)
                        @if($curso->id == $alunocurso->id)
                            <option value="<?php echo $alunocurso->id; ?>" selected><?php echo $alunocurso->nome; ?></option> 
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
                    @foreach($aluno->disciplinas as $alunodisciplina)
                        @if($disciplina->id == $alunodisciplina->id)
                            <option value="<?php echo $alunodisciplina->id; ?>" selected><?php echo $alunodisciplina->nome; ?></option> 
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