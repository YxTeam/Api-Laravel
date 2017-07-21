@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <h1>Estágio "{{ $estagio->id }}"</h1>
    <h4>Lista de cursos do estágio {{ $estagio->id }} registados na base de dados.</h4>
    <a href="{{URL::route('estagio.index')}}" class="btn btn-default">Voltar atrás</a>
    <hr>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Empresa</th>
                    <th>Pertense aos cursos</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $estagio->empresa; ?></td>
                    <td><?php foreach ($estagio->cursos as $curso) {
                        echo $curso->nome."<br>" ; 
                    }?></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@stop