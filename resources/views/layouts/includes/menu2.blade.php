<div class="col-sm-3 col-md-2 sidebar">
    <ul class="nav nav-sidebar">
        <li class="{{ Request::is('web') ? 'active' : '' }}"><a href="{{ route('index') }}">Home</a></li>
        
	        <li class="{{ Request::is('web/aluno') ? 'active' : '' }}"><a href="{{ route('aluno.index') }}">Alunos</a></li>
	        <li class="{{ Request::is('web/curso') ? 'active' : '' }}"><a href="{{ route('curso.index') }}">Cursos</a></li>
	        <li class="{{ Request::is('web/disciplina') ? 'active' : '' }}"><a href="{{ route('disciplina.index') }}">Disciplinas</a></li>
	        <li class="{{ Request::is('web/evento') ? 'active' : '' }}"><a href="{{ route('evento.index') }}">Eventos</a></li>
	        <li class="{{ Request::is('web/aviso') ? 'active' : '' }}"><a href="{{ route('aviso.index') }}">Avisos</a></li>
	        <li class="{{ Request::is('web/professor') ? 'active' : '' }}"><a href="{{ route('professor.index') }}">Professores</a></li>
	        <li class="{{ Request::is('web/horario') ? 'active' : '' }}"><a href="{{ route('horario.index') }}">Horarios</a></li>
	        <li class="{{ Request::is('web/propina') ? 'active' : '' }}"><a href="{{ route('propina.index') }}">Propinas</a></li>
	        <li class="{{ Request::is('web/documento') ? 'active' : '' }}"><a href="{{ route('documento.index') }}">Documentos</a></li>
        
        <li class="{{ Request::is('web/creditos') ? 'active' : '' }}"><a href="{{ route('creditos') }}">Creditos</a></li>
    </ul>
</div>