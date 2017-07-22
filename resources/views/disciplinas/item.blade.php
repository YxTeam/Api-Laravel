@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <h1>Disciplina "{{ $disciplina->nome }}"</h1>
    <h4>Lista de informações da disciplina {{ $disciplina->nome }} registados na base de dados.</h4>
    <a href="{{URL::route('disciplina.index')}}" class="btn btn-default">Voltar atrás</a>
    <hr>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nome da disciplina</th>
                    <th>Pertence aos cursos</th>
                    <th>Lista de alunos inscritos</th>
                    <th>Lista de professores da disciplina</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $disciplina->nome; ?></td>
                    <td><?php foreach ($disciplina->cursos as $curso) {
                        echo $curso->nome."<br>" ; 
                    }?></td>
                    <td><?php foreach ($disciplina->alunos as $aluno) {
                        echo $aluno->nome."<br>" ; 
                    }?></td>
                    <td><?php foreach ($disciplina->professores as $professor) {
                        echo $professor->nome."<br>" ; 
                    }?></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@stop