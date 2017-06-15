<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Curso;
use App\Disciplina;

class Aluno extends Model
{
    protected $table = "alunos";
    protected $primaryKey = "id";
    protected $fillable = array("nome", "cartao_cidadao", "sexo", "nacionalidade", "morada", "telemovel", "email");
    public $timestamps = true;

    public function cursos()
    {
        return $this->belongsToMany('App\Curso', 'curso_aluno')->withTimestamps();
    }

    public function disciplinas()
    {
        return $this->belongsToMany('App\Disciplina', 'aluno_disciplina')->withTimestamps();
    }
}
