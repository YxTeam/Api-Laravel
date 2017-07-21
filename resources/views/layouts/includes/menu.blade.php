<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="{{ route('index') }}"><span class="navbar-brand">ESAE Dashboard</span></a>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
                <span class="sr-only">Navegação</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="hidden-sm hidden-md hidden-lg {{ Request::is('web') ? 'active' : '' }}"><a href="{{ route('index') }}">Home</a></li>
                @if (Auth::check())
                    <li class="hidden-sm hidden-md hidden-lg {{ Request::is('web/aluno') ? 'active' : '' }}"><a href="{{ route('aluno.index') }}">Alunos</a></li>
                    <li class="hidden-sm hidden-md hidden-lg {{ Request::is('web/curso') ? 'active' : '' }}"><a href="{{ route('curso.index') }}">Cursos</a></li>
                    <li class="hidden-sm hidden-md hidden-lg {{ Request::is('web/disciplina') ? 'active' : '' }}"><a href="{{ route('disciplina.index') }}">Disciplinas</a></li>
                    <li class="hidden-sm hidden-md hidden-lg {{ Request::is('web/evento') ? 'active' : '' }}"><a href="{{ route('evento.index') }}">Eventos</a></li>
                    <li class="hidden-sm hidden-md hidden-lg {{ Request::is('web/aviso') ? 'active' : '' }}"><a href="{{ route('aviso.index') }}">Avisos</a></li>
                    <li class="hidden-sm hidden-md hidden-lg {{ Request::is('web/professor') ? 'active' : '' }}"><a href="{{ route('professor.index') }}">Professores</a></li>
                    <li class="hidden-sm hidden-md hidden-lg {{ Request::is('web/horario') ? 'active' : '' }}"><a href="{{ route('horario.index') }}">Horarios</a></li>
                    <li class="hidden-sm hidden-md hidden-lg {{ Request::is('web/estagio') ? 'active' : '' }}"><a href="{{ route('estagio.index') }}">Estágios</a></li>
                    <li class="hidden-sm hidden-md hidden-lg {{ Request::is('web/propina') ? 'active' : '' }}"><a href="{{ route('propina.index') }}">Propinas</a></li>
                    <li class="hidden-sm hidden-md hidden-lg {{ Request::is('web/documento') ? 'active' : '' }}"><a href="{{ route('documento.index') }}">Documentos</a></li>
                @endif
                <li class="hidden-sm hidden-md hidden-lg {{ Request::is('web/creditos') ? 'active' : '' }}"><a href="{{ route('creditos') }}">Creditos</a></li>
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">Login<span class="caret"></span></a>
                        <div id="login-dp" class="row dropdown-menu">
                            <p>Login</p>
                            <div class="col-md-12">
                                <form action="{{ route('login') }}" method="POST">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <input id="email" type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}" required autofocus>

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">
                                            Login
                                        </button>

                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            Forgot Your Password?
                                        </a>
                                    </div>
                                </form>
                            </div>
                            <div class="bottom text-center">
                                <a href="{{ route('register') }}">Não tem conta?</a>
                            </div>
                        </div>
                    </li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>