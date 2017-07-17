<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

use App\Propina;
use App\Curso;
use App\Aluno;

class PropinaController1 extends Controller
{
    public function index() {
        $propinas = Propina::all();
        
        foreach($propinas as $propina) {
            $propina->curso = Curso::find($propina->curso);
            $propina->aluno = Aluno::find($propina->aluno);
        }
        
        if (is_null($propinas)) {
            return redirect()->route("index")->withErrors("Erro ao carregar propinas. Por favor, tente mais tarde.");
        }
        else {
            return view("propinas.index", compact("propinas"));
        }
    }
    
    public function create() {
        $cursos = Curso::all();
        $alunos = Aluno::all();
        
        return view("propinas.create", compact("cursos", "alunos"));
    }
    
    public function store(Request $dados) {
        $propina = Propina::create($dados->all());
        foreach ($dados->curso as $curso) {
            $propina->cursos()->attach($curso);//wishes is the method name that you define in model
        }
        foreach ($dados->aluno as $aluno) {
            $propina->alunos()->attach($aluno);//wishes is the method name that you define in model
        }
        
        if(is_null($propina)) {
            return redirect()->route("propina.index")->withErrors("Erro ao criar propina. Por favor, tente novamente.");  
        }
        else {
            return redirect()->route("propina.index")->with("Propina inserido com sucesso!");
        }
    }
    
    public function show($id) {
        $propina = Propina::findOrFail($id); 
        $propina->curso = Curso::find($propina->curso);
        $propina->aluno = Disciplina::find($propina->aluno);
        
        if (is_null($propina)) {
            return redirect()->route("propina.index")->withErrors("Erro ao carregar propina. Por favor, tente novamente.");
        }
        else {
            return view("propina.item", compact("propina")); 
        }
    }
    
    public function edit($id) {
        $propina = Propina::findOrFail($id);
        
        if (is_null($propina)) {
            return redirect()->route("propina.index")->withErrors("Erro ao carregar propina. Por favor, tente novamente.");
        }
        else {
        	$cursos = Curso::all(); 
            $alunos = Aluno::all();
            
            return view("propinas.edit", compact("propina", "cursos", "alunos"));
        }
    }
    
    public function update(Request $dados, $id) {
        $propina = Propina::findOrFail($id);
        
        if (is_null($propina)) {
            return redirect()->route("propina.index")->withErrors("Erro ao carregar propina. Por favor, tente novamente.");
        }
        else {
            $dados_propina = $dados->all();
            $propina->fill($dados_propina)->save();
            
            return redirect()->route("propina.index")->with("flash_message", "Propina atualizado com sucesso!");
        }
    }
    
    public function destroy($id) {
        $propina = Propina::findOrFail($id);
        
        if (is_null($propina)) {
            return redirect()->route("propina.index")->withErrors("Erro ao apagar propina. Por favor, tente novamente.");
        }
        else {
            $propina -> delete();
            return redirect()->route("propina.index")->with("flash_message", "Propina apagado com sucesso!");
        }
    }}
