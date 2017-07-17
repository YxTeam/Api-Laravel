<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Curso;

class Documento extends Model
{
    protected $table = "documentos";
    protected $primaryKey = "id";
    protected $fillable = array("nome", "categoria", "link");
    public $timestamps = true;

    public function cursos()
    {
        return $this->belongsToMany('App\Curso', 'curso_documento')->withTimestamps();
    }
}
