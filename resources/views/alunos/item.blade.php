@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <h1>Aluno "{{ $aluno->nome }}"</h1>
    <h4>Lista de inscrições de {{ $aluno->nome }} registados na base de dados.</h4>
    <a href="{{URL::route('aluno.index')}}" class="btn btn-default">Voltar atrás</a>
    <hr>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nome do aluno</th>
                    <th>Inscrito nos cursos</th>
                    <th>Inscrito nas disciplinas</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $aluno->nome; ?></td>
                    <td><?php foreach ($aluno->cursos as $curso) {
                        echo $curso->nome."<br>" ; 
                    }?></td>
                    <td><?php foreach ($aluno->disciplinas as $disciplina) {
                        echo $disciplina->nome."<br>" ; 
                    }?></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@stop