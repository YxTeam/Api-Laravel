<?php

namespace App\Http\Controllers;

use Illuminate\Support\collection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Evento;

class EventoController extends Controller
{
    public function index() {
        try {
            $statusCode = 200; //Ok

            //reset data collection
            $response = collect([]);

            //get all friends from database
            $eventos = Evento::all();
            
            foreach($eventos as $evento)
            {
                //add friend to the collection
                $response->push([
                    'id' => $evento->id,
                    'dia' => $evento->dia,
                    'hora' => $evento->hora,
                    'local' => $evento->local,
                    'assunto' => $evento->assunto,
                    'descricao' => $evento->descricao
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
            
            $evento = Evento::create();
            $response->push(['created' => 'Evento created successfully.']);
        } catch (Exception $e) {
            $response->push(['error' => 'Error creating Evento.']);
            $statusCode = 404;
        } finally {
            return response()->json($response, $statusCode);
        }
    }

    public function show($id) {
        try {
            $statusCode = 200;
            $response = collect([]);
            
            $evento = Evento::findOrFail($id);
            $response->push([
                'id' => $evento->id,
                'dia' => $evento->dia,
                'hora' => $evento->hora,
                'local' => $evento->local,
                'assunto' => $evento->assunto,
                'descricao' => $evento->descricao
            ]);
        } catch (Exception $e) {
            $response->push(['error' => 'Evento not found.']);
            $statusCode = 404; //Not Found
        } finally {
            return response()->json($response, $statusCode)->header('Access-Control-Allow-Origin', '*')->header('Access-Control-Allow-Methods', 'GET,POST,PUT,DELETE,OPTIONS');
        }
    }

    public function update(Request $dados, $id) {
        try {
            $statusCode = 200;
            $response = collect([]);
            
            $evento = Evento::findOrFail($id);
            $evento->fill($dados->all())->save();
            $response->push(['updated' => 'Evento updated successfully.']);
        } catch (Exception $e) {
            $response->push(['error' => 'Error updating Evento.']);
            $statusCode = 404;
        } finally {
            return response()->json($response, $statusCode);
        }
    }

    public function destroy($id) {
        try {
            $statusCode = 200;
            $response = collect([]);
            
            $evento = Evento::findOrFail($id);
            $evento->delete();
            $response->push(['success' => 'Evento deleted successfully.']);
        } catch (Exception $e) {
            $response->push(['error' => 'Error deleting Evento.']);
            $statusCode = 404;
        } finally {
            return response()->json($response, $statusCode);
        }
    }
}
