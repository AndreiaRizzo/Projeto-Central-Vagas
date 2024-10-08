<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Aluno extends Model
{
    use HasFactory;

    protected $fillable = ['codcurso', 'nome', 'dia', 'periodo'];//colocar os campos do aluno aqui

    public function curso(){
        return $this->belongsTo(Curso::class);
    }
}
