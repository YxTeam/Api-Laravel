<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

use App\Evento;
use App\Curso;
use App\Disciplina;

class EventoController1 extends Controller
{
    public function __construct() {
        $this->middleware("auth");
    }
    
	public function index() {
        $eventos = Evento::all();
        
        foreach($eventos as $evento) {
            $evento->curso = Curso::find($evento->curso);
            $evento->disciplina = Disciplina::find($evento->disciplina);
        }
        
        if (is_null($eventos)) {
            return redirect()->route("index")->withErrors("Erro ao carregar eventos. Por favor, tente mais tarde.");
        }
        else {
            return view("eventos.index", compact("eventos"));
        }
    }
    
    public function create() {
        $cursos = Curso::all();
        $disciplinas = Disciplina::all();
        
        return view("eventos.create", compact("cursos", "disciplinas"));
    }
    
    public function store(Request $dados) {
        $evento = Evento::create($dados->all());
        foreach ($dados->curso as $curso) {
            $evento->cursos()->attach($curso);//wishes is the method name that you define in model
        }
        foreach ($dados->disciplina as $disciplina) {
            $evento->disciplinas()->attach($disciplina);//wishes is the method name that you define in model
        }
        
        if(is_null($evento)) {
            return redirect()->route("evento.index")->withErrors("Erro ao criar evento. Por favor, tente novamente.");  
        }
        else {
            return redirect()->route("evento.index")->with("Evento inserido com sucesso!");
        }
    }
    
    public function show($id) {
        $evento = Evento::findOrFail($id); 
        $evento->curso = Curso::find($evento->curso);
        $evento->disciplina = Disciplina::find($evento->disciplina);
        
        if (is_null($evento)) {
            return redirect()->route("evento.index")->withErrors("Erro ao carregar evento. Por favor, tente novamente.");
        }
        else {
            return view("eventos.item", compact("evento")); 
        }
    }
    
    public function edit($id) {
        $evento = Evento::findOrFail($id);
        
        if (is_null($evento)) {
            return redirect()->route("evento.index")->withErrors("Erro ao carregar evento. Por favor, tente novamente.");
        }
        else {
        	$cursos = Curso::all(); 
            $disciplinas = Disciplina::all();
            
            return view("eventos.edit", compact("evento", "cursos", "disciplinas"));
        }
    }
    
    public function update(Request $dados, $id) {
        $evento = Evento::findOrFail($id);
        
        if (is_null($evento)) {
            return redirect()->route("evento.index")->withErrors("Erro ao carregar evento. Por favor, tente novamente.");
        }
        else {
            $dados_evento = $dados->all();
            $evento->cursos()->sync($dados->curso);
            $evento->disciplinas()->sync($dados->disciplina);
            $evento->fill($dados_evento)->save();
            
            return redirect()->route("evento.index")->with("flash_message", "Evento atualizado com sucesso!");
        }
    }
    
    public function destroy($id) {
        $evento = Evento::findOrFail($id);
        
        if (is_null($evento)) {
            return redirect()->route("evento.index")->withErrors("Erro ao apagar evento. Por favor, tente novamente.");
        }
        else {
            $evento -> delete();
            return redirect()->route("evento.index")->with("flash_message", "Evento apagado com sucesso!");
        }
    }
}
