<?php

namespace App\Http\Controllers;

use Illuminate\Support\collection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Aluno;

class AlunoController extends Controller
{
    public function index() {
        try {
            $statusCode = 200; //Ok

            //reset data collection
            $response = collect([]);

            //get all friends from database
            $alunos = Aluno::all();
            
            foreach($alunos as $aluno)
            {
                //add friend to the collection
                $response->push([
                    'id' => $aluno->id,
                    'nome' => $aluno->nome,
                    'cartao_cidadao' => $aluno->cartao_cidadao,
                    'sexo' => $aluno->sexo,
                    'nacionalidade' => $aluno->nacionalidade,
                    'morada' => $aluno->morada,
                    'telemovel' => $aluno->telemovel,
                    'email' => $aluno->email
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
            
            $aluno = Aluno::create();
            $response->push(['created' => 'Aluno created successfully.']);
        } catch (Exception $e) {
            $response->push(['error' => 'Error creating Aluno.']);
            $statusCode = 404;
        } finally {
            return response()->json($response, $statusCode);
        }
    }

    public function show($id) {
        try {
            $statusCode = 200;
            $response = collect([]);
            
            $aluno = Aluno::findOrFail($id);
            $response->push([
                'id' => $aluno->id,
                'nome' => $aluno->nome,
                'cartao_cidadao' => $aluno->cartao_cidadao,
                'sexo' => $aluno->sexo,
                'nacionalidade' => $aluno->nacionalidade,
                'morada' => $aluno->morada,
                'telemovel' => $aluno->telemovel,
                'email' => $aluno->email
            ]);
        } catch (Exception $e) {
            $response->push(['error' => 'Aluno not found.']);
            $statusCode = 404; //Not Found
        } finally {
            return response()->json($response, $statusCode)->header('Access-Control-Allow-Origin', '*')->header('Access-Control-Allow-Methods', 'GET,POST,PUT,DELETE,OPTIONS');
        }
    }

    public function update(Request $dados, $id) {
        try {
            $statusCode = 200;
            $response = collect([]);
            
            $aluno = Aluno::findOrFail($id);
            $aluno->fill($dados->all())->save();
            $response->push(['updated' => 'Aluno updated successfully.']);
        } catch (Exception $e) {
            $response->push(['error' => 'Error updating Aluno.']);
            $statusCode = 404;
        } finally {
            return response()->json($response, $statusCode);
        }
    }

    public function destroy($id) {
        try {
            $statusCode = 200;
            $response = collect([]);
            
            $aluno = Aluno::findOrFail($id);
            $aluno->delete();
            $response->push(['success' => 'Aluno deleted successfully.']);
        } catch (Exception $e) {
            $response->push(['error' => 'Error deleting Aluno.']);
            $statusCode = 404;
        } finally {
            return response()->json($response, $statusCode);
        }
    }
}
