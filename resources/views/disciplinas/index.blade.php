@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <h1>Lista de disciplinas</h1>
    <h4>Lista de disciplinas registadas na base de dados.</h4>
    <a href="{{URL::route('disciplina.create')}}" class="btn btn-default">Adicionar disciplina</a>
    <hr>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nº Disciplina</th>
                    <th>Nome</th>
                    <th>Tipo</th>
                    <th>Ects</th>
                    <th>Professor</th>
                    <th>Alunos</th>
                    <th>Editar</th>
                    <th>Apagar</th>
                </tr>
            </thead>
            <tbody>
                @foreach($disciplinas as $disciplina)
                <tr>
                    <td><?php echo $disciplina->id; ?></td>
                    <td><?php echo $disciplina->nome; ?></td>
                    <td><?php echo $disciplina->tipo; ?></td>
                    <td><?php echo $disciplina->ects; ?></td>
                    <td><?php foreach ($disciplina->professores as $professor) {
                        echo $professor->nome."<br>" ; 
                    }?></td>
                    <td><?php foreach ($disciplina->alunos as $aluno) {
                        echo $aluno->nome."<br>" ; 
                    }?></td>
                    <td>
                        <a class="btn btn-warning" href="{{ URL::route('disciplina.edit', $disciplina->id) }}">
                            <span class="glyphicon glyphicon-pencil icons"></span>
                        </a>
                    </td>
                    <td>
                        <form action="{{ route('disciplina.destroy', $disciplina->id) }}" method="POST">
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
                                        <p>Tem a certeza que deseja apagar a disciplina?</p>
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