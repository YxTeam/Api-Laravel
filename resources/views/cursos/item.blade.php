@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <h1>Curso "{{ $curso->nome }}"</h1>
    <h4>Lista de informações do curso {{ $curso->nome }} registados na base de dados.</h4>
    <a href="{{URL::route('curso.index')}}" class="btn btn-default">Voltar atrás</a>
    <hr>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nome do curso</th>
                    <th>Lista de alunos inscritos</th>
                    <th>Lista de disciplinas do curso</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $curso->nome; ?></td>
                    <td><?php foreach ($curso->alunos as $aluno) {
                        echo $aluno->nome."<br>" ; 
                    }?></td>
                    <td><?php foreach ($curso->disciplinas as $disciplina) {
                        echo $disciplina->nome."<br>" ; 
                    }?></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@stop