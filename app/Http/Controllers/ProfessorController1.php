<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

use App\Professor;
use App\Disciplina;

class ProfessorController1 extends Controller
{
    public function __construct() {
        $this->middleware("auth");
    }
    
	public function index() {
        $professores = Professor::all();
        
        foreach($professores as $professor) {
            $professor->disciplina = Disciplina::find($professor->disciplina);
        }
        
        if (is_null($professores)) {
            return redirect()->route("index")->withErrors("Erro ao carregar professores. Por favor, tente mais tarde.");
        }
        else {
            return view("professores.index", compact("professores"));
        }
    }
    
    public function create() {
        $disciplinas = Disciplina::all();
        
        return view("professores.create", compact("disciplinas"));
    }
    
    public function store(Request $dados) {
        $professor = Professor::create($dados->all());
        foreach ($dados->disciplina as $disciplina) {
            $professor->disciplinas()->attach($disciplina);//wishes is the method name that you define in model
        }
        
        if(is_null($professor)) {
            return redirect()->route("professor.index")->withErrors("Erro ao criar professor. Por favor, tente novamente.");  
        }
        else {
            return redirect()->route("professor.index")->with("Professor inserido com sucesso!");
        }
    }
    
    public function show($id) {
        $professor = Professor::findOrFail($id); 
        $professor->disciplina = Disciplina::find($professor->disciplina);
        
        if (is_null($professor)) {
            return redirect()->route("professor.index")->withErrors("Erro ao carregar professor. Por favor, tente novamente.");
        }
        else {
            return view("professores.item", compact("professor")); 
        }
    }
    
    public function edit($id) {
        $professor = Professor::findOrFail($id);
        
        if (is_null($professor)) {
            return redirect()->route("professor.index")->withErrors("Erro ao carregar professor. Por favor, tente novamente.");
        }
        else {
            $disciplinas = Disciplina::all();
            
            return view("professores.edit", compact("professor", "disciplinas"));
        }
    }
    
    public function update(Request $dados, $id) {
        $professor = Professor::findOrFail($id);
        
        if (is_null($professor)) {
            return redirect()->route("professor.index")->withErrors("Erro ao carregar professor. Por favor, tente novamente.");
        }
        else {
            $dados_professor = $dados->all();
            $professor->fill($dados_professor)->save();
            
            return redirect()->route("professor.index")->with("flash_message", "Professor atualizado com sucesso!");
        }
    }
    
    public function destroy($id) {
        $professor = Professor::findOrFail($id);
        
        if (is_null($professor)) {
            return redirect()->route("professor.index")->withErrors("Erro ao apagar professor. Por favor, tente novamente.");
        }
        else {
            $professor -> delete();
            return redirect()->route("professor.index")->with("flash_message", "Professor apagado com sucesso!");
        }
    }
}
