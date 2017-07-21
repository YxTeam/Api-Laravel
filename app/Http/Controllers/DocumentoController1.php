<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

use App\Documento;
use App\Curso;

class DocumentoController1 extends Controller
{
    public function __construct() {
        $this->middleware("auth");
    }
    
    public function index() {
        $documentos = Documento::all();
        
        foreach($documentos as $documento) {
            $documento->curso = Curso::find($documento->curso);
        }
        
        if (is_null($documentos)) {
            return redirect()->route("index")->withErrors("Erro ao carregar documentos. Por favor, tente mais tarde.");
        }
        else {
            return view("documentos.index", compact("documentos"));
        }
    }
    
    public function create() {
        $cursos = Curso::all();
        
        return view("documentos.create", compact("cursos"));
    }
    
    public function store(Request $dados) {
        $documento = Documento::create($dados->all());
        foreach ($dados->curso as $curso) {
            $documento->cursos()->attach($curso);//wishes is the method name that you define in model
        }
        
        if(is_null($documento)) {
            return redirect()->route("documento.index")->withErrors("Erro ao criar documento. Por favor, tente novamente.");  
        }
        else {
            return redirect()->route("documento.index")->with("Documento inserido com sucesso!");
        }
    }
    
    public function show($id) {
        $documento = Documento::findOrFail($id); 
        $documento->curso = Curso::find($documento->curso);
        
        if (is_null($documento)) {
            return redirect()->route("documento.index")->withErrors("Erro ao carregar documento. Por favor, tente novamente.");
        }
        else {
            return view("documentos.item", compact("documento")); 
        }
    }
    
    public function edit($id) {
        $documento = Documento::findOrFail($id);
        
        if (is_null($documento)) {
            return redirect()->route("documento.index")->withErrors("Erro ao carregar documento. Por favor, tente novamente.");
        }
        else {
        	$cursos = Curso::all(); 
            
            return view("eventos.edit", compact("cursos"));
        }
    }
    
    public function update(Request $dados, $id) {
        $documento = Documento::findOrFail($id);
        
        if (is_null($documento)) {
            return redirect()->route("documento.index")->withErrors("Erro ao carregar documento. Por favor, tente novamente.");
        }
        else {
            $dados_documento = $dados->all();
            $documento->fill($dados_documento)->save();
            
            return redirect()->route("documento.index")->with("flash_message", "Documento atualizado com sucesso!");
        }
    }
    
    public function destroy($id) {
        $documento = Documento::findOrFail($id);
        
        if (is_null($documento)) {
            return redirect()->route("documento.index")->withErrors("Erro ao apagar documento. Por favor, tente novamente.");
        }
        else {
            $documento -> delete();
            return redirect()->route("documento.index")->with("flash_message", "Documento apagado com sucesso!");
        }
    }}
