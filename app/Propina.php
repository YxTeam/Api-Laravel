<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Curso;
use App\Aluno;

class Propina extends Model
{
	protected $table = "propinas";
    protected $primaryKey = "id";
    protected $fillable = array("ano", "mes", "valor");
    public $timestamps = true;

    public function cursos()
    {
        return $this->belongsToMany('App\Curso', 'curso_propina')->withTimestamps();
    }

    public function alunos()
    {
        return $this->belongsToMany('App\Aluno', 'aluno_propina')->withTimestamps();
    }
}
