@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <h1>Evento "{{ $evento->assunto }}"</h1>
    <h4>Lista de informações do envento com o assunto {{ $evento->assunto }} registados na base de dados.</h4>
    <a href="{{URL::route('evento.index')}}" class="btn btn-default">Voltar atrás</a>
    <hr>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Assunto do evento</th>
                    <th>Pertence aos cursos</th>
                    <th>Pertence às disciplina</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $evento->assunto; ?></td>
                    <td><?php foreach ($evento->cursos as $curso) {
                        echo $curso->nome."<br>" ; 
                    }?></td>
                    <td><?php foreach ($evento->disciplinas as $disciplina) {
                        echo $disciplina->nome."<br>" ; 
                    }?></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@stop