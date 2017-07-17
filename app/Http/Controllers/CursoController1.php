<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

use App\Curso;
use App\Aluno;
use App\Disciplina;
use App\Aviso;
use App\Evento;

class CursoController1 extends Controller
{
	public function index() {
        $cursos = Curso::all();
        
        foreach($cursos as $curso) {
            $curso->aluno = Aluno::find($curso->aluno);
            $curso->disciplina = Disciplina::find($curso->disciplina);
            $curso->aviso = Aviso::find($curso->aviso);
            $curso->evento = Evento::find($curso->evento);
        }
        
        if (is_null($cursos)) {
            return redirect()->route("index")->withErrors("Erro ao carregar cursos. Por favor, tente mais tarde.");
        }
        else {
            return view("cursos.index", compact("cursos"));
        }
    }
    
    public function create() {
        $disciplinas = Disciplina::all();
        
        return view("cursos.create", compact("disciplinas"));
    }
    
    public function store(Request $dados) {
        $curso = Curso::create($dados->all());
        foreach ($dados->disciplina as $disciplina) {
            $curso->disciplinas()->attach($disciplina);//wishes is the method name that you define in model
        }
        
        if(is_null($curso)) {
            return redirect()->route("curso.index")->withErrors("Erro ao criar curso. Por favor, tente novamente.");  
        }
        else {
            return redirect()->route("curso.index")->with("Curso inserido com sucesso!");
        }
    }
    
    public function show($id) {
        $curso = Curso::findOrFail($id); 
        $curso->aluno = Aluno::find($curso->aluno); 
        $curso->disciplina = Disciplina::find($curso->disciplina);
        $curso->aviso = Aviso::find($curso->aviso);
        $curso->evento = Evento::find($curso->evento);
        
        if (is_null($curso)) {
            return redirect()->route("curso.index")->withErrors("Erro ao carregar curso. Por favor, tente novamente.");
        }
        else {
            return view("curso.item", compact("curso")); 
        }
    }
    
    public function edit($id) {
        $curso = Curso::findOrFail($id);
        
        if (is_null($curso)) {
            return redirect()->route("curso.index")->withErrors("Erro ao carregar curso. Por favor, tente novamente.");
        }
        else { 
            $disciplinas = Disciplina::all();
            
            return view("cursos.edit", compact("curso", "disciplinas"));
        }
    }
    
    public function update(Request $dados, $id) {
        $curso = Curso::findOrFail($id);
        
        if (is_null($curso)) {
            return redirect()->route("curso.index")->withErrors("Erro ao carregar curso. Por favor, tente novamente.");
        }
        else {
            $dados_curso = $dados->all();
            $curso->fill($dados_curso)->save();
            
            return redirect()->route("curso.index")->with("flash_message", "Curso atualizado com sucesso!");
        }
    }
    
    public function destroy($id) {
        $curso = Curso::findOrFail($id);
        
        if (is_null($curso)) {
            return redirect()->route("curso.index")->withErrors("Erro ao apagar curso. Por favor, tente novamente.");
        }
        else {
            $curso -> delete();
            return redirect()->route("curso.index")->with("flash_message", "Curso apagado com sucesso!");
        }
    }
}
