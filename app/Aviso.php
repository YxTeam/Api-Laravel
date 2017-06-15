<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Curso;
use App\Disciplina;

class Aviso extends Model
{
    protected $table = "avisos";
    protected $primaryKey = "id";
    protected $fillable = array("assunto", "descricao");
    public $timestamps = true;

    public function cursos()
    {
        return $this->belongsToMany('App\Curso', 'aviso_curso')->withTimestamps();
    }

    public function disciplinas()
    {
        return $this->belongsToMany('App\Disciplina', 'aviso_disciplina')->withTimestamps();
    }
}
