<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Aluno extends Model
{
    use HasFactory;

    protected $fillable = ['cpfAluno', 'nome', 'dataNasc', 'idade', 'nomeResp' , 'celResp', 'curso_id', 'data'];//colocar os campos do aluno aqui

    public function curso(){
        return $this->belongsTo(Curso::class);
    }
}
