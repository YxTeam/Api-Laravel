<?php

namespace App\Http\Controllers;

use Illuminate\Support\collection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Propina;

class PropinaController extends Controller
{
    public function index() {
        try {
            $statusCode = 200; //Ok

            //reset data collection
            $response = collect([]);

            //get all friends from database
            $propinas = Propina::all();
            
            foreach($propinas as $propina)
            {
                //add friend to the collection
                $response->push([
                    'id' => $propina->id,
                    'ano' => $propina->ano,
                    'mes' => $propina->mes,
                    'valor' => $propina->valor,
                    'cursos' => $propina->cursos,
                    'alunos' => $propina->alunos
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
            
            $propina = Propina::findOrFail($id);
            $response->push([
                'id' => $propina->id,
                'ano' => $propina->ano,
                'mes' => $propina->mes,
                'valor' => $propina->valor,
                'cursos' => $propina->cursos,
                'alunos' => $propina->alunos
            ]);
        } catch (Exception $e) {
            $response->push(['error' => 'Propina not found.']);
            $statusCode = 404; //Not Found
        } finally {
            return response()->json($response, $statusCode)->header('Access-Control-Allow-Origin', '*')->header('Access-Control-Allow-Methods', 'GET,POST,PUT,DELETE,OPTIONS');
        }
    }
}
