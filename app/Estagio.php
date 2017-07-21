<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Curso;

class Estagio extends Model
{
    protected $table = "estagios";
    protected $primaryKey = "id";
    protected $fillable = array("empresa", "area", "n_horas", "local", "contacto");
    public $timestamps = true;

    public function cursos()
    {
        return $this->belongsToMany('App\Curso', 'curso_estagio')->withTimestamps();
    }
}
