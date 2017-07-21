<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

use App\Estagio;
use App\Curso;

class EstagioController1 extends Controller
{
    public function __construct() {
        $this->middleware("auth");
    }
    
    public function index() {
        $estagios = Estagio::all();
        
        foreach($estagios as $estagio) {
            $estagio->curso = Curso::find($estagio->curso);
        }
        
        if (is_null($estagios)) {
            return redirect()->route("index")->withErrors("Erro ao carregar estagios. Por favor, tente mais tarde.");
        }
        else {
            return view("estagios.index", compact("estagios"));
        }
    }
    
    public function create() {
        $cursos = Curso::all();
        
        return view("estagios.create", compact("cursos"));
    }
    
    public function store(Request $dados) {
        $estagio = Estagio::create($dados->all());
        foreach ($dados->curso as $curso) {
            $estagio->cursos()->attach($curso);//wishes is the method name that you define in model
        }
        
        if(is_null($estagio)) {
            return redirect()->route("estagio.index")->withErrors("Erro ao criar estagio. Por favor, tente novamente.");  
        }
        else {
            return redirect()->route("estagio.index")->with("Estagio inserido com sucesso!");
        }
    }
    
    public function show($id) {
        $estagio = Estagio::findOrFail($id); 
        $estagio->curso = Curso::find($estagio->curso);
        
        if (is_null($estagio)) {
            return redirect()->route("estagio.index")->withErrors("Erro ao carregar estagio. Por favor, tente novamente.");
        }
        else {
            return view("estagios.item", compact("estagio")); 
        }
    }
    
    public function edit($id) {
        $estagio = Estagio::findOrFail($id);
        
        if (is_null($estagio)) {
            return redirect()->route("estagio.index")->withErrors("Erro ao carregar estagio. Por favor, tente novamente.");
        }
        else {
        	$cursos = Curso::all(); 
            
            return view("estagios.edit", compact("cursos"));
        }
    }
    
    public function update(Request $dados, $id) {
        $estagio = Estagio::findOrFail($id);
        
        if (is_null($estagio)) {
            return redirect()->route("estagio.index")->withErrors("Erro ao carregar estagio. Por favor, tente novamente.");
        }
        else {
            $dados_estagio = $dados->all();
            $estagio->fill($dados_estagio)->save();
            
            return redirect()->route("estagio.index")->with("flash_message", "Estagio atualizado com sucesso!");
        }
    }
    
    public function destroy($id) {
        $estagio = Estagio::findOrFail($id);
        
        if (is_null($estagio)) {
            return redirect()->route("estagio.index")->withErrors("Erro ao apagar estagio. Por favor, tente novamente.");
        }
        else {
            $estagio -> delete();
            return redirect()->route("estagio.index")->with("flash_message", "Documento apagado com sucesso!");
        }
    }
}