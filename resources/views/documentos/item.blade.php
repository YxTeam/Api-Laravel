@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <h1>Documento "{{ $documento->nome }}"</h1>
    <h4>Lista de cursos com o documento {{ $documento->nome }} registados na base de dados.</h4>
    <a href="{{URL::route('documento.index')}}" class="btn btn-default">Voltar atrás</a>
    <hr>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nome do documento</th>
                    <th>Pertense aos cursos</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $documento->nome; ?></td>
                    <td><?php foreach ($documento->cursos as $curso) {
                        echo $curso->nome."<br>" ; 
                    }?></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@stop