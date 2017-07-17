@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <h1>Lista de Horarios</h1>
    <h4>Lista de horarios registados na base de dados.</h4>
    <a href="{{URL::route('horario.create')}}" class="btn btn-default">Adicionar Horario</a>
    <hr>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nº Aviso</th>
                    <th>Dia</th>
                    <th>Hora de início</th>
                    <th>Hora de fim</th>
                    <th>Sala</th>
                    <th>Disciplina</th>
                    <th>Editar</th>
                    <th>Apagar</th>
                </tr>
            </thead>
            <tbody>
                @foreach($horarios as $horario)
                <tr>
                    <td><?php echo $horario->id; ?></td>
                    <td><?php echo $horario->dia; ?></td>
                    <td><?php echo $horario->hora_inicio; ?></td>
                    <td><?php echo $horario->hora_fim; ?></td>
                    <td><?php echo $horario->sala; ?></td>
                    <td><?php foreach ($horario->disciplinas as $disciplina) {
                        echo $disciplina->nome."<br>" ; 
                    }?></td>

                    <td>
                        <a class="btn btn-warning" href="{{ URL::route('horario.edit', $horario->id) }}"><span class="glyphicon glyphicon-pencil icons"></span></a>
                    </td>
                    <td>
                        <form action="{{ route('horario.destroy', $horario->id) }}" method="POST">
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
                                        <p>Tem a certeza que deseja apagar o horario?</p>
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