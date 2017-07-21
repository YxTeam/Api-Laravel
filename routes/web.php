<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::group(array('prefix' => 'api'), function() {
	Route::resource('alunos', 'AlunoController');
	Route::resource('avisos', 'AvisoController');
	Route::resource('cursos', 'CursoController');
	Route::resource('disciplinas', 'DisciplinaController');
	Route::resource('eventos', 'EventoController');
	Route::resource('estagio', 'EstagioController');
	Route::resource('professores', 'ProfessorController');
	Route::resource('horarios', 'HorarioController');
	Route::resource('propinas', 'PropinaController');
	Route::resource('documento', 'DocumentoController');
});

Route::group(array('prefix' => 'web'), function() {
	Route::get('/', 'PageController@index')->name("index");

	Route::resource('aluno', 'AlunoController1');
	Route::resource('aviso', 'AvisoController1');
	Route::resource('curso', 'CursoController1');
	Route::resource('disciplina', 'DisciplinaController1');
	Route::resource('evento', 'EventoController1');
	Route::resource('estagio', 'EstagioController1');
	Route::resource('professor', 'ProfessorController1');
	Route::resource('horario', 'HorarioController1');
	Route::resource('propina', 'PropinaController1');
	Route::resource('documento', 'DocumentoController1');

	Route::get("creditos", "PageController@credito")->name("creditos");
});
Auth::routes();

Route::get('/home', 'HomeController@index');
