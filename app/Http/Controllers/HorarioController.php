<?php

namespace App\Http\Controllers;

use Illuminate\Support\collection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Horario;

class HorarioController extends Controller
{
    public function index() {
        try {
            $statusCode = 200; //Ok

            //reset data collection
            $response = collect([]);

            //get all friends from database
            $horarios = Horario::all();
            
            foreach($horarios as $horario)
            {
                //add friend to the collection
                $response->push([
                    'id' => $horario->id,
                    'dia' => $horario->dia,
                    'hora' => $horario->hora,
                    'duracao' => $horario->duracao,
                    'sala' => $horario->sala,
                    'disciplinas' => $horario->disciplinas
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
            
            $horario = Horario::findOrFail($id);
            $response->push([
                'id' => $horario->id,
                'dia' => $horario->dia,
                'hora' => $horario->hora,
                'duracao' => $horario->duracao,
                'sala' => $horario->sala
            ]);
        } catch (Exception $e) {
            $response->push(['error' => 'Horario not found.']);
            $statusCode = 404; //Not Found
        } finally {
            return response()->json($response, $statusCode)->header('Access-Control-Allow-Origin', '*')->header('Access-Control-Allow-Methods', 'GET,POST,PUT,DELETE,OPTIONS');
        }
    }
}
