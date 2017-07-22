@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <h1>Professor "{{ $professor->nome }}"</h1>
    <h4>Lista de disciplinas lecionas pelo professor {{ $professor->nome }} registados na base de dados.</h4>
    <a href="{{URL::route('professor.index')}}" class="btn btn-default">Voltar atrás</a>
    <hr>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nome do professor</th>
                    <th>Pertence às disciplina</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $professor->nome; ?></td>
                    <td><?php foreach ($professor->disciplinas as $disciplina) {
                        echo $disciplina->nome."<br>" ; 
                    }?></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@stop