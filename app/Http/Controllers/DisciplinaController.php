<?php

namespace App\Http\Controllers;

use Illuminate\Support\collection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Disciplina;

class DisciplinaController extends Controller
{
    public function index() {
        try {
            $statusCode = 200; //Ok

            //reset data collection
            $response = collect([]);

            //get all friends from database
            $disciplinas = Disciplina::all();
            
            foreach($disciplinas as $disciplina)
            {
                //add friend to the collection
                $response->push([
                    'id' => $disciplina->id,
                    'nome' => $disciplina->nome,
                    'tipo' => $disciplina->tipo,
                    'etcs' => $disciplina->etcs,
                    'cursos' => $disciplina->cursos,
                    'alunos' => $disciplina->alunos,
                    'avisos' => $disciplina->avisos,
                    'eventos' => $disciplina->eventos,
                    'horarios' => $disciplina->horarios
                ]);
            }
        } catch (Exception $e) {
            $statusCode = 400; //bad request
        } finally {
            return response()->json($response, $statusCode)->header('Access-Control-Allow-Origin', '*')->header('Access-Control-Allow-Methods', 'GET,POST,PUT,DELETE,OPTIONS');
        }
    }

    public function show($id) {
        try {
            $statusCode = 200;
            $response = collect([]);
            
            $disciplina = Disciplina::findOrFail($id);
            $response->push([
                'id' => $disciplina->id,
                'nome' => $disciplina->nome,
                'tipo' => $disciplina->tipo,
                'etcs' => $disciplina->etcs
            ]);
        } catch (Exception $e) {
            $response->push(['error' => 'Disciplina not found.']);
            $statusCode = 404; //Not Found
        } finally {
            return response()->json($response, $statusCode)->header('Access-Control-Allow-Origin', '*')->header('Access-Control-Allow-Methods', 'GET,POST,PUT,DELETE,OPTIONS');
        }
    }
}
