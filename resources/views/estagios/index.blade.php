@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <h1>Lista de Estágios</h1>
    <h4>Lista de estágios registados na base de dados.</h4>
    <a href="{{URL::route('estagio.create')}}" class="btn btn-default">Adicionar Estágio</a>
    <hr>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nº Estágio</th>
                    <th>Empresa</th>
                    <th>Àrea</th>
                    <th>Nº Horas</th>
                    <th>Local</th>
                    <th>Contacto</th>
                    <th>Cursos</th>
                    <th>Editar</th>
                    <th>Apagar</th>
                </tr>
            </thead>
            <tbody>
                @foreach($estagios as $estagio)
                <tr>
                    <td><?php echo $estagio->id; ?></td>
                    <td><?php echo $estagio->empresa; ?></td>
                    <td><?php echo $estagio->area; ?></td>
                    <td><?php echo $estagio->n_horas; ?></td>
                    <td><?php echo $estagio->local; ?></td>
                    <td><?php echo $estagio->contacto; ?></td>
                    <td><a class="btn btn-default" href="{{ URL::route('estagio.show', $estagio->id) }}"><span class="glyphicon glyphicon-search"></span></a></td>

                    <td>
                        <a class="btn btn-warning" href="{{ URL::route('estagio.edit', $estagio->id) }}"><span class="glyphicon glyphicon-pencil icons"></span></a>
                    </td>
                    <td>
                        <form action="{{ route('estagio.destroy', $estagio->id) }}" method="POST">
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
                                        <p>Tem a certeza que deseja apagar o estagio?</p>
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