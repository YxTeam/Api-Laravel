<?php

namespace App\Http\Controllers;

use Illuminate\Support\collection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Documento;

class DocumentoController extends Controller
{
    public function index() {
        try {
            $statusCode = 200; //Ok

            //reset data collection
            $response = collect([]);

            //get all friends from database
            $documentos = Documento::all();
            
            foreach($documentos as $documento)
            {
                //add friend to the collection
                $response->push([
                    'id' => $documento->id,
                    'nome' => $documento->nome,
                    'categoria' => $documento->categoria,
                    'link' => $documento->link,
                    'cursos' => $documento->cursos
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
            
            $documento = Documento::findOrFail($id);
            $response->push([
                'id' => $documento->id,
                'nome' => $documento->nome,
                'categoria' => $documento->categoria,
                'link' => $documento->link,
                'cursos' => $documento->cursos
            ]);
        } catch (Exception $e) {
            $response->push(['error' => 'Documento not found.']);
            $statusCode = 404; //Not Found
        } finally {
            return response()->json($response, $statusCode)->header('Access-Control-Allow-Origin', '*')->header('Access-Control-Allow-Methods', 'GET,POST,PUT,DELETE,OPTIONS');
        }
    }}
