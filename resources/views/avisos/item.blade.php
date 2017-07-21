@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <h1>Aviso "{{ $aviso->assunto }}"</h1>
    <h4>Lista de informações do aviso com o assunto {{ $aviso->assunto }} registados na base de dados.</h4>
    <a href="{{URL::route('aviso.index')}}" class="btn btn-default">Voltar atrás</a>
    <hr>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Assunto do aviso</th>
                    <th>Pertence aos cursos</th>
                    <th>Pertence às disciplina</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $aviso->assunto; ?></td>
                    <td><?php foreach ($aviso->cursos as $curso) {
                        echo $curso->nome."<br>" ; 
                    }?></td>
                    <td><?php foreach ($aviso->disciplinas as $disciplina) {
                        echo $disciplina->nome."<br>" ; 
                    }?></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@stop