<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

use App\Aluno;
use App\Curso;
use App\Disciplina;

class AlunoController1 extends Controller
{
    public function __construct() {
        $this->middleware("auth");
    }

    public function index() {
        $alunos = Aluno::all();
        
        foreach($alunos as $aluno) {
            $aluno->curso = Curso::find($aluno->curso);
            $aluno->disciplina = Disciplina::find($aluno->curso);
        }
        
        if (is_null($alunos)) {
            return redirect()->route("index")->withErrors("Erro ao carregar alunos. Por favor, tente mais tarde.");
        }
        else {
            return view("alunos.index", compact("alunos"));
        }
    }
    
    public function create() {
        $cursos = Curso::all();
        $disciplinas = Disciplina::all();
        
        return view("alunos.create", compact("cursos", "disciplinas"));
    }
    
    public function store(Request $dados) {
        $aluno = Aluno::create($dados->all());
        foreach ($dados->curso as $curso) {
            $aluno->cursos()->attach($curso);//wishes is the method name that you define in model
        }
        foreach ($dados->disciplina as $disciplina) {
            $aluno->disciplinas()->attach($disciplina);//wishes is the method name that you define in model
        }
        
        if(is_null($aluno)) {
            return redirect()->route("aluno.index")->withErrors("Erro ao criar aluno. Por favor, tente novamente.");  
        }
        else {
            return redirect()->route("aluno.index")->with("Aluno inserido com sucesso!");
        }
    }
    
    public function show($id) {
        $aluno = Aluno::findOrFail($id); 
        $aluno->curso = Curso::find($aluno->curso); 
        $aluno->disciplina = Disciplina::find($aluno->disciplina);
        
        if (is_null($aluno)) {
            return redirect()->route("aluno.index")->withErrors("Erro ao carregar aluno. Por favor, tente novamente.");
        }
        else {
            return view("alunos.item", compact("aluno")); 
        }
    }
    
    public function edit($id) {
        $aluno = Aluno::findOrFail($id);
        
        if (is_null($aluno)) {
            return redirect()->route("aluno.index")->withErrors("Erro ao carregar aluno. Por favor, tente novamente.");
        }
        else {
            $cursos = Curso::all(); 
            $disciplinas = Disciplina::all();
            
            return view("alunos.edit", compact("aluno", "cursos", "disciplinas"));
        }
    }
    
    public function update(Request $dados, $id) {
        $aluno = Aluno::findOrFail($id);
        
        if (is_null($aluno)) {
            return redirect()->route("aluno.index")->withErrors("Erro ao carregar aluno. Por favor, tente novamente.");
        }
        else {
            $dados_aluno = $dados->all();
            $aluno->cursos()->sync($dados->curso);
            $aluno->disciplinas()->sync($dados->disciplina);
            $aluno->fill($dados_aluno)->save();
            
            return redirect()->route("aluno.index")->with("flash_message", "Aluno atualizado com sucesso!");
        }
    }
    
    public function destroy($id) {
        $aluno = Aluno::findOrFail($id);
        
        if (is_null($aluno)) {
            return redirect()->route("aluno.index")->withErrors("Erro ao apagar aluno. Por favor, tente novamente.");
        }
        else {
            $aluno -> delete();
            return redirect()->route("aluno.index")->with("flash_message", "Aluno apagado com sucesso!");
        }
    }
}
