<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

use App\Horario;
use App\Disciplina;

class HorarioController1 extends Controller
{
    public function __construct() {
        $this->middleware("auth");
    }
    
	public function index() {
        $horarios = Horario::all();
        
        foreach($horarios as $horario) {
            $horario->disciplina = Disciplina::find($horario->disciplina);
        }
        
        if (is_null($horarios)) {
            return redirect()->route("index")->withErrors("Erro ao carregar horarios. Por favor, tente mais tarde.");
        }
        else {
            return view("horarios.index", compact("horarios"));
        }
    }
    
    public function create() {
        $disciplinas = Disciplina::all();
        
        return view("horarios.create", compact("disciplinas"));
    }
    
    public function store(Request $dados) {
        $horario = Horario::create($dados->all());
        foreach ($dados->disciplina as $disciplina) {
            $horario->disciplinas()->attach($disciplina);//wishes is the method name that you define in model
        }
        
        if(is_null($horario)) {
            return redirect()->route("horario.index")->withErrors("Erro ao criar horario. Por favor, tente novamente.");  
        }
        else {
            return redirect()->route("horario.index")->with("Horario inserido com sucesso!");
        }
    }
    
    public function show($id) {
        $horario = Horario::findOrFail($id); 
        $horario->disciplina = Disciplina::find($horario->disciplina);
        
        if (is_null($horario)) {
            return redirect()->route("horario.index")->withErrors("Erro ao carregar horario. Por favor, tente novamente.");
        }
        else {
            return view("horarios.item", compact("horario")); 
        }
    }
    
    public function edit($id) {
        $horario = Horario::findOrFail($id);
        
        if (is_null($horario)) {
            return redirect()->route("horario.index")->withErrors("Erro ao carregar horario. Por favor, tente novamente.");
        }
        else {
            $disciplinas = Disciplina::all();
            
            return view("horarios.edit", compact("horario", "disciplinas"));
        }
    }
    
    public function update(Request $dados, $id) {
        $horario = Horario::findOrFail($id);
        
        if (is_null($horario)) {
            return redirect()->route("horario.index")->withErrors("Erro ao carregar horario. Por favor, tente novamente.");
        }
        else {
            $dados_horario = $dados->all();
            $horario->fill($dados_horario)->save();
            
            return redirect()->route("horario.index")->with("flash_message", "Horario atualizado com sucesso!");
        }
    }
    
    public function destroy($id) {
        $horario = Horario::findOrFail($id);
        
        if (is_null($horario)) {
            return redirect()->route("horario.index")->withErrors("Erro ao apagar horario. Por favor, tente novamente.");
        }
        else {
            $horario -> delete();
            return redirect()->route("horario.index")->with("flash_message", "Horario apagado com sucesso!");
        }
    }
}
