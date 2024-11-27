<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Curso;

class DashboardController extends Controller
{
    public function gerarGrafico()
    {
        // Consulta o número de alunos por curso
        $data = Curso::select('cursos.nome', DB::raw('COUNT(alunos.id) as total_alunos'))
            ->leftJoin('alunos', 'cursos.id', '=', 'alunos.curso_id')
            ->groupBy('cursos.id', 'cursos.nome')
            ->get();

        // Calcula o número total de alunos
        $totalAlunos = $data->sum('total_alunos');
        $cursos = [];
        $porcentagens = [];

        // Calcula a porcentagem de alunos por curso
        foreach ($data as $linha) {
            $cursos[] = $linha->nome;
            $porcentagens[] = $totalAlunos > 0
                ? round(($linha->total_alunos / $totalAlunos) * 100, 2)
                : 0;
        }

        // Retorna os dados para a view
        return view('dashboard', [
            'cursos' => json_encode($cursos),
            'porcentagens' => json_encode($porcentagens),
        ]);
    }
}
