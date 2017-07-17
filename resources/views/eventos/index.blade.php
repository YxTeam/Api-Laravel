@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <h1>Lista de Eventos</h1>
    <h4>Lista de eventos registados na base de dados.</h4>
    <a href="{{URL::route('evento.create')}}" class="btn btn-default">Adicionar Evento</a>
    <hr>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nº Aviso</th>
                    <th>Dia</th>
                    <th>Hora</th>
                    <th>Local</th>
                    <th>Assunto</th>
                    <th>Descrição</th>
                    <th>Cursos</th>
                    <th>Disciplinas</th>
                    <th>Editar</th>
                    <th>Apagar</th>
                </tr>
            </thead>
            <tbody>
                @foreach($eventos as $evento)
                <tr>
                    <td><?php echo $evento->id; ?></td>
                    <td><?php echo $evento->dia; ?></td>
                    <td><?php echo $evento->hora; ?></td>
                    <td><?php echo $evento->local; ?></td>
                    <td><?php echo $evento->assunto; ?></td>
                    <td><?php echo $evento->descricao; ?></td>
                    <td><?php foreach ($evento->cursos as $curso) {
                        echo $curso->nome."<br>" ; 
                    }?></td>
                    <td><?php foreach ($evento->disciplinas as $disciplina) {
                        echo $disciplina->nome."<br>" ; 
                    }?></td>

                    <td>
                        <a class="btn btn-warning" href="{{ URL::route('evento.edit', $evento->id) }}"><span class="glyphicon glyphicon-pencil icons"></span></a>
                    </td>
                    <td>
                        <form action="{{ route('evento.destroy', $evento->id) }}" method="POST">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="_method" value="DELETE">
                            <button name="remover" type="submit" class="btn btn-danger">
                                <span class="glyphicon glyphicon-remove icons"></span>
                            </button>
                        </form>
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <h4 class="modal-title" id="myModalLabel">Atenção</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p>Tem a certeza que deseja apagar o evento?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Não</button>
                                        <button type="button" class="btn btn-primary" id="apagar">Sim</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<script>
    $('button[name="remover"]').on('click', function(e) {
        var $form = $(this).closest('form');
        e.preventDefault();
        $('#myModal').modal({
            backdrop: 'static',
            keyboard: false
        })
        .one('click', '#apagar', function(e) {
            $form.trigger('submit');
        });
    });
</script>
@stop