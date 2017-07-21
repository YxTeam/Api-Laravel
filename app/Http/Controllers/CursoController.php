<?php

namespace App\Http\Controllers;

use Illuminate\Support\collection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Curso;

class CursoController extends Controller
{
    public function index() {
        try {
            $statusCode = 200; //Ok

            //reset data collection
            $response = collect([]);

            //get all friends from database
            $cursos = Curso::all();
            
            foreach($cursos as $curso)
            {
                //add friend to the collection
                $response->push([
                    'id' => $curso->id,
                    'nome' => $curso->nome,
                    'anos' => $curso->anos,
                    'coordenador' => $curso->coordenador,
                    'tipo' => $curso->tipo,
                    'alunos' => $curso->alunos,
                    'disciplinas' => $curso->disciplinas,
                    'avisos' => $curso->avisos,
                    'eventos' => $curso->eventos
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
            
            $curso = Curso::findOrFail($id);
            $response->push([
                'id' => $curso->id,
                'nome' => $curso->nome,
                'anos' => $curso->anos,
                'coordenador' => $curso->coordenador,
                'tipo' => $curso->tipo,
                'alunos' => $curso->alunos,
                'disciplinas' => $curso->disciplinas,
                'avisos' => $curso->avisos,
                'eventos' => $curso->eventos
            ]);
        } catch (Exception $e) {
            $response->push(['error' => 'Curso not found.']);
            $statusCode = 404; //Not Found
        } finally {
            return response()->json($response, $statusCode)->header('Access-Control-Allow-Origin', '*')->header('Access-Control-Allow-Methods', 'GET,POST,PUT,DELETE,OPTIONS');
        }
    }
}
