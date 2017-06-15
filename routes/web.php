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
    return view('welcome');
});

Route::group(array('prefix' => 'api'), function() {
	Route::resource('alunos', 'AlunoController');
	Route::resource('avisos', 'AvisoController');
	Route::resource('cursos', 'CursoController');
	Route::resource('disciplinas', 'DisciplinaController');
	Route::resource('eventos', 'EventoController');
	Route::resource('professores', 'ProfessorController');
});