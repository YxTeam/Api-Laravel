<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

use App\Disciplina;
use App\Aluno;
use App\Curso;
use App\Professor;
use App\Aviso;
use App\Evento;
use App\Horario;

class DisciplinaController1 extends Controller
{
    public function __construct() {
        $this->middleware("auth");
    }
    
	public function index() {
        $disciplinas = Disciplina::all();
        
        foreach($disciplinas as $disciplina) {
            $disciplina->aluno = Aluno::find($disciplina->aluno);
            $disciplina->curso = Curso::find($disciplina->curso);
            $disciplina->professor = Professor::find($disciplina->professor);
        }
        
        if (is_null($disciplinas)) {
            return redirect()->route("index")->withErrors("Erro ao carregar disciplinas. Por favor, tente mais tarde.");
        }
        else {
            return view("disciplinas.index", compact("disciplinas"));
        }
    }
    
    public function create() {
        return view("disciplinas.create");
    }
    
    public function store(Request $dados) {
        $disciplina = Disciplina::create($dados->all());
        
        if(is_null($disciplina)) {
            return redirect()->route("disciplina.index")->withErrors("Erro ao criar disciplina. Por favor, tente novamente.");  
        }
        else {
            return redirect()->route("disciplina.index")->with("Disciplina inserido com sucesso!");
        }
    }
    
    public function show($id) {
        $disciplina = Disciplina::findOrFail($id); 
        $disciplina->aluno = Aluno::find($disciplina->aluno);
        $disciplina->curso = Curso::find($disciplina->curso);
        $disciplina->aviso = Aviso::find($disciplina->aviso);
        $disciplina->evento = Evento::find($disciplina->evento);
        $disciplina->horario = Horario::find($disciplina->horario);
        
        if (is_null($disciplina)) {
            return redirect()->route("disciplina.index")->withErrors("Erro ao carregar disciplina. Por favor, tente novamente.");
        }
        else {
            return view("disciplinas.item", compact("disciplina")); 
        }
    }
    
    public function edit($id) {
        $disciplina = Disciplina::findOrFail($id);
        
        if (is_null($disciplina)) {
            return redirect()->route("disciplina.index")->withErrors("Erro ao carregar disciplina. Por favor, tente novamente.");
        }
        else {
            return view("disciplinas.edit", compact("disciplina"));
        }
    }
    
    public function update(Request $dados, $id) {
        $disciplina = Disciplina::findOrFail($id);
        
        if (is_null($disciplina)) {
            return redirect()->route("disciplina.index")->withErrors("Erro ao carregar disciplina. Por favor, tente novamente.");
        }
        else {
            $dados_disciplina = $dados->all();
            $disciplina->fill($dados_disciplina)->save();
            
            return redirect()->route("disciplina.index")->with("flash_message", "Disciplina atualizado com sucesso!");
        }
    }
    
    public function destroy($id) {
        $disciplina = Disciplina::findOrFail($id);
        
        if (is_null($disciplina)) {
            return redirect()->route("disciplina.index")->withErrors("Erro ao apagar disciplina. Por favor, tente novamente.");
        }
        else {
            $disciplina -> delete();
            return redirect()->route("disciplina.index")->with("flash_message", "Disciplina apagado com sucesso!");
        }
    }
}
