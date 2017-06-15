<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Curso;
use App\Disciplina;

class Evento extends Model
{
    protected $table = "eventos";
    protected $primaryKey = "id";
    protected $fillable = array("dia", "hora", "local", "assunto", "descricao");
    public $timestamps = true;

    public function cursos()
    {
        return $this->belongsToMany('App\Curso', 'evento_curso')->withTimestamps();
    }

    public function disciplinas()
    {
        return $this->belongsToMany('App\Disciplina', 'evento_disciplina')->withTimestamps();
    }
}
