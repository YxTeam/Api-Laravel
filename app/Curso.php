<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Aluno;
use App\Disciplina;
use App\Aviso;
use App\Evento;
use App\Propina;
use App\Documento;

class Curso extends Model
{
    protected $table = "cursos";
    protected $primaryKey = "id";
    protected $fillable = array("nome", "anos", "coordenador", "tipo");
    public $timestamps = true;

    public function alunos()
    {
        return $this->belongsToMany('App\Aluno', 'curso_aluno')->withTimestamps();
    }

    public function disciplinas()
    {
        return $this->belongsToMany('App\Disciplina', 'curso_disciplina')->withTimestamps();
    }

    public function avisos()
    {
        return $this->belongsToMany('App\Aviso', 'aviso_curso')->withTimestamps();
    }

    public function eventos()
    {
        return $this->belongsToMany('App\Evento', 'evento_curso')->withTimestamps();
    }

    public function propinas()
    {
        return $this->belongsToMany('App\Propina', 'curso_propina')->withTimestamps();
    }

    public function documentos()
    {
        return $this->belongsToMany('App\Documento', 'curso_documento')->withTimestamps();
    }
}
