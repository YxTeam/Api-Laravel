<?php

namespace App\Http\Controllers;

use Illuminate\Support\collection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Estagio;

class EstagioController extends Controller
{
    public function index() {
        try {
            $statusCode = 200; //Ok

            //reset data collection
            $response = collect([]);

            //get all friends from database
            $estagios = Estagio::all();
            
            foreach($estagios as $estagio)
            {
                //add friend to the collection
                $response->push([
                    'id' => $estagio->id,
                    'empresa' => $estagio->empresa,
                    'area' => $estagio->area,
                    'n_horas' => $estagio->n_horas,
                    'local' => $estagio->local,
                    'contacto' => $estagio->contacto,
                    'cursos' => $estagio->cursos
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
            
            $estagio = Estagio::findOrFail($id);
            $response->push([
                'id' => $estagio->id,
                'empresa' => $estagio->empresa,
                'area' => $estagio->area,
                'n_horas' => $estagio->n_horas,
                'local' => $estagio->local,
                'contacto' => $estagio->contacto,
                'cursos' => $estagio->cursos
            ]);
        } catch (Exception $e) {
            $response->push(['error' => 'Estagio not found.']);
            $statusCode = 404; //Not Found
        } finally {
            return response()->json($response, $statusCode)->header('Access-Control-Allow-Origin', '*')->header('Access-Control-Allow-Methods', 'GET,POST,PUT,DELETE,OPTIONS');
        }
    }}
