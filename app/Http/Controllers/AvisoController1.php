<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

use App\Aviso;
use App\Curso;
use App\Disciplina;

class AvisoController1 extends Controller
{
	public function index() {
        $avisos = Aviso::all();
        
        foreach($avisos as $aviso) {
            $aviso->curso = Curso::find($aviso->curso);
            $aviso->disciplina = Disciplina::find($aviso->curso);
        }
        
        if (is_null($avisos)) {
            return redirect()->route("index")->withErrors("Erro ao carregar avisos. Por favor, tente mais tarde.");
        }
        else {
            return view("avisos.index", compact("avisos"));
        }
    }
    
    public function create() {
        $cursos = Curso::all();
        $disciplinas = Disciplina::all();
        
        return view("avisos.create", compact("cursos", "disciplinas"));
    }
    
    public function store(Request $dados) {
        $aviso = Aviso::create($dados->all());
        foreach ($dados->curso as $curso) {
            $aviso->cursos()->attach($curso);//wishes is the method name that you define in model
        }
        foreach ($dados->disciplina as $disciplina) {
            $aviso->disciplinas()->attach($disciplina);//wishes is the method name that you define in model
        }
        
        if(is_null($aviso)) {
            return redirect()->route("aviso.index")->withErrors("Erro ao criar aviso. Por favor, tente novamente.");  
        }
        else {
            return redirect()->route("aviso.index")->with("Aviso inserido com sucesso!");
        }
    }
    
    public function show($id) {
        $aviso = Aviso::findOrFail($id); 
        $aviso->curso = Curso::find($aviso->curso); 
        $aviso->disciplina = Disciplina::find($aviso->disciplina);
        
        if (is_null($aviso)) {
            return redirect()->route("aviso.index")->withErrors("Erro ao carregar aviso. Por favor, tente novamente.");
        }
        else {
            return view("aviso.item", compact("aviso")); 
        }
    }
    
    public function edit($id) {
        $aviso = Aviso::findOrFail($id);
        
        if (is_null($aviso)) {
            return redirect()->route("aviso.index")->withErrors("Erro ao carregar aviso. Por favor, tente novamente.");
        }
        else {
            $cursos = Curso::all(); 
            $disciplinas = Disciplina::all();
            
            return view("avisos.edit", compact("aviso", "cursos", "disciplinas"));
        }
    }
    
    public function update(Request $dados, $id) {
        $aviso = Aviso::findOrFail($id);
        
        if (is_null($aviso)) {
            return redirect()->route("aviso.index")->withErrors("Erro ao carregar aviso. Por favor, tente novamente.");
        }
        else {
            $dados_aviso = $dados->all();
            $aviso->fill($dados_aviso)->save();
            
            return redirect()->route("aviso.index")->with("flash_message", "Aviso atualizado com sucesso!");
        }
    }
    
    public function destroy($id) {
        $aviso = Aviso::findOrFail($id);
        
        if (is_null($aviso)) {
            return redirect()->route("aviso.index")->withErrors("Erro ao apagar aviso. Por favor, tente novamente.");
        }
        else {
            $aviso -> delete();
            return redirect()->route("aviso.index")->with("flash_message", "Aviso apagado com sucesso!");
        }
    }
}
