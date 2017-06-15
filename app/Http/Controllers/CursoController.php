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
                    'tipo' => $curso->tipo
                ]);
            }
        } catch (Exception $e) {
            $statusCode = 400; //bad request
        } finally {
            return response()->json($response, $statusCode)->header('Access-Control-Allow-Origin', '*')->header('Access-Control-Allow-Methods', 'GET,POST,PUT,DELETE,OPTIONS');
        }
    }

    public function store(Request $dados) {
        try {
            $statusCode = 200;
            $response = collect([]);
            
            $curso = Curso::create();
            $response->push(['created' => 'Curso created successfully.']);
        } catch (Exception $e) {
            $response->push(['error' => 'Error creating Curso.']);
            $statusCode = 404;
        } finally {
            return response()->json($response, $statusCode);
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
                'tipo' => $curso->tipo
            ]);
        } catch (Exception $e) {
            $response->push(['error' => 'Curso not found.']);
            $statusCode = 404; //Not Found
        } finally {
            return response()->json($response, $statusCode)->header('Access-Control-Allow-Origin', '*')->header('Access-Control-Allow-Methods', 'GET,POST,PUT,DELETE,OPTIONS');
        }
    }

    public function update(Request $dados, $id) {
        try {
            $statusCode = 200;
            $response = collect([]);
            
            $curso = Curso::findOrFail($id);
            $curso->fill($dados->all())->save();
            $response->push(['updated' => 'Curso updated successfully.']);
        } catch (Exception $e) {
            $response->push(['error' => 'Error updating Curso.']);
            $statusCode = 404;
        } finally {
            return response()->json($response, $statusCode);
        }
    }

    public function destroy($id) {
        try {
            $statusCode = 200;
            $response = collect([]);
            
            $curso = Curso::findOrFail($id);
            $curso->delete();
            $response->push(['success' => 'Curso deleted successfully.']);
        } catch (Exception $e) {
            $response->push(['error' => 'Error deleting Curso.']);
            $statusCode = 404;
        } finally {
            return response()->json($response, $statusCode);
        }
    }
}
