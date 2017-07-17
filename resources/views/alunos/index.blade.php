@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <h1>Lista de Alunos</h1>
    <h4>Lista de alunos registados na base de dados.</h4>
    <a href="{{URL::route('aluno.create')}}" class="btn btn-default">Adicionar Aluno</a>
    <hr>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nº de Aluno</th>
                    <th>Nome</th>
                    <th>Cartão de Cidadão</th>
                    <th>Sexo</th>
                    <th>Nacionalidade</th>
                    <th>Morada</th>
                    <th>Telemóvel</th>
                    <th>Email</th>
                    <th>Cursos</th>
                    <th>Disciplinas</th>
                    <th>Editar</th>
                    <th>Apagar</th>
                </tr>
            </thead>
            <tbody>
                @foreach($alunos as $aluno)
                <tr>
                    <td><?php echo $aluno->id; ?></td>
                    <td><?php echo $aluno->nome; ?></td>
                    <td><?php echo $aluno->cartao_cidadao; ?></td>
                    <td><?php echo $aluno->sexo; ?></td>
                    <td><?php echo $aluno->nacionalidade; ?></td>
                    <td><?php echo $aluno->morada; ?></td>
                    <td><?php echo $aluno->telemovel; ?></td>
                    <td><?php echo $aluno->email; ?></td>
                    <td><?php foreach ($aluno->cursos as $curso) {
                        echo $curso->nome."<br>" ; 
                    }?></td>
                    <td><?php foreach ($aluno->disciplinas as $disciplina) {
                        echo $disciplina->nome."<br>" ; 
                    }?></td>

                    <td>
                        <a class="btn btn-warning" href="{{ URL::route('aluno.edit', $aluno->id) }}"><span class="glyphicon glyphicon-pencil icons"></span></a>
                    </td>
                    <td>
                        <form action="{{ route('aluno.destroy', $aluno->id) }}" method="POST">
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
                                        <p>Tem a certeza que deseja apagar o aluno?</p>
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