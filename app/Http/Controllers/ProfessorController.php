<?php

namespace App\Http\Controllers;

use Illuminate\Support\collection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Professor;

class ProfessorController extends Controller
{
    public function index() {
        try {
            $statusCode = 200; //Ok

            //reset data collection
            $response = collect([]);

            //get all friends from database
            $professores = Professor::all();
            
            foreach($professores as $professor)
            {
                //add friend to the collection
                $response->push([
                    'id' => $professor->id,
                    'nome' => $professor->nome,
                    'email' => $professor->email
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
            
            $professor = Professor::findOrFail($id);
            $response->push([
                'id' => $professor->id,
                'nome' => $professor->nome,
                'email' => $professor->email
            ]);
        } catch (Exception $e) {
            $response->push(['error' => 'Professor not found.']);
            $statusCode = 404; //Not Found
        } finally {
            return response()->json($response, $statusCode)->header('Access-Control-Allow-Origin', '*')->header('Access-Control-Allow-Methods', 'GET,POST,PUT,DELETE,OPTIONS');
        }
    }
}
