@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <h1>Adicionar um novo aluno</h1>
    <h4>Insira toda a informação sobre o aluno.</h4>
    <a href="{{URL::route('aluno.index')}}" class="btn btn-default">Voltar atrás</a>
    <hr>

    <form action="{{URL::route('aluno.store')}}" method="POST">
        <div class="form-group">
            <label for="nome" class="control-label">Nome:</label>
            <input type="text" id="nome" name="nome" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="cartao_cidadao" class="control-label">Cartão de Cidadão:</label>
            <input type="text" id="cartao_cidadao" name="cartao_cidadao" class="form-control" required>
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
            <input type="text" id="nacionalidade" name="nacionalidade" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="morada" class="control-label">Morada:</label>
            <input type="text" id="morada" name="morada" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="telemovel" class="control-label">Telemóvel:</label>
            <input type="text" id="telemovel" name="telemovel" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="email" class="control-label">Email:</label>
            <input type="email" id="email" name="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="curso" class="control-label">Curso:</label>
            <select id="curso" name="curso[]" class="form-control" multiple required>
                @foreach($cursos as $curso)
                    <option value="<?php echo $curso->id; ?>"><?php echo $curso->nome; ?></option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="disciplina" class="control-label">Disciplinas:</label>
            <select id="disciplina" name="disciplina[]" class="form-control" multiple required>
                @foreach($disciplinas as $disciplina)
                    <option value="<?php echo $disciplina->id; ?>"><?php echo $disciplina->nome; ?></option>
                @endforeach
            </select>
        </div>
        <input type="submit" class="btn btn-primary" value="Inserir">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
    </form>
</div>
@stop
