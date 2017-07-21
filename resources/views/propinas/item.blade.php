@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <h1>Propina "{{ $propina->id }}"</h1>
    <h4>Lista de inscrições da propina com o nº{{ $propina->id }} registados na base de dados.</h4>
    <a href="{{URL::route('propina.index')}}" class="btn btn-default">Voltar atrás</a>
    <hr>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nº da propina</th>
                    <th>Pertence aos cursos</th>
                    <th>Pertence aos alunos</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $propina->id; ?></td>
                    <td><?php foreach ($propina->cursos as $curso) {
                        echo $curso->nome."<br>" ; 
                    }?></td>
                    <td><?php foreach ($propina->alunos as $aluno) {
                        echo $aluno->nome."<br>" ; 
                    }?></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@stop