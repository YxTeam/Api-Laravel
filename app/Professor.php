<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Disciplina;

class Professor extends Model
{
    protected $table = "professores";
    protected $primaryKey = "id";
    protected $fillable = array("nome", "email");
    public $timestamps = true;

    public function disciplinas()
    {
        return $this->belongsToMany('App\Disciplina', 'professor_disciplina')->withTimestamps();
    }
}
