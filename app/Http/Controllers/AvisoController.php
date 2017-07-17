<?php

namespace App\Http\Controllers;

use Illuminate\Support\collection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Aviso;

class AvisoController extends Controller
{
    public function index() {
        try {
            $statusCode = 200; //Ok

            //reset data collection
            $response = collect([]);

            //get all friends from database
            $avisos = Aviso::all();
            
            foreach($avisos as $aviso)
            {
                //add friend to the collection
                $response->push([
                    'id' => $aviso->id,
                    'assunto' => $aviso->assunto,
                    'descricao' => $aviso->descricao,
                    'disciplinas' => $aviso->disciplinas,
                    'cursos' => $aviso->cursos
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
            
            $aviso = Aviso::findOrFail($id);
            $response->push([
                'id' => $aviso->id,
                'assunto' => $aviso->assunto,
                'descricao' => $aviso->descricao
            ]);
        } catch (Exception $e) {
            $response->push(['error' => 'Aviso not found.']);
            $statusCode = 404; //Not Found
        } finally {
            return response()->json($response, $statusCode)->header('Access-Control-Allow-Origin', '*')->header('Access-Control-Allow-Methods', 'GET,POST,PUT,DELETE,OPTIONS');
        }
    }
}
