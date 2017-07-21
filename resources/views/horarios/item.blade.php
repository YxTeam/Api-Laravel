@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <h1>Horario "{{ $horario->id }}"</h1>
    <h4>Lista de disciplinas do horario com o nº{{ $horario->id }} registados na base de dados.</h4>
    <a href="{{URL::route('horario.index')}}" class="btn btn-default">Voltar atrás</a>
    <hr>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nome do horario</th>
                    <th>Pertence às disciplina</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $horario->id; ?></td>
                    <td><?php foreach ($horario->disciplinas as $disciplina) {
                        echo $disciplina->nome."<br>" ; 
                    }?></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@stop