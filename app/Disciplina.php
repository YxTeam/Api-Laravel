<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Aluno;
use App\Curso;
use App\Aviso;
use App\Evento;

class Disciplina extends Model
{
    protected $table = "disciplinas";
    protected $primaryKey = "id";
    protected $fillable = array("nome", "tipo", "ects");
    public $timestamps = true;

    public function alunos()
    {
        return $this->belongsToMany('App\Aluno', 'aluno_disciplina')->withTimestamps();
    }

    public function cursos()
    {
        return $this->belongsToMany('App\Curso', 'curso_disciplina')->withTimestamps();
    }

    public function avisos()
    {
        return $this->belongsToMany('App\Aviso', 'aviso_disciplina')->withTimestamps();
    }

    public function eventos()
    {
        return $this->belongsToMany('App\Evento', 'evento_disciplina')->withTimestamps();
    }
}
