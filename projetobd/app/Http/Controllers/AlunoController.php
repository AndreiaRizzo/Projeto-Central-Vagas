<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aluno;
use App\Models\Curso;

class AlunoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Faz o join entre as tabelas 'alunos' e 'cursos' e ordena pelos campos desejados
        $alunos = Aluno::join('cursos', 'alunos.curso_id', '=', 'cursos.id') // Supondo que o relacionamento seja via curso_id
            ->orderBy('cursos.nome', 'asc') // Ordena pelo nome do curso
            ->orderBy('alunos.data', 'asc') // Ordena pela data de cadastro do aluno
            ->select('alunos.*', 'cursos.nome as nome_curso') // Seleciona todos os campos da tabela 'alunos' e o nome do curso
            ->get();

        // Retorna a view com os alunos ordenados
        return view('aluno.index', compact('alunos'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $cursos = Curso::all();
        return view('aluno.create', compact('cursos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        Aluno::create($request->all());
        return redirect('/aluno');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $aluno = Aluno::with('curso')->findOrFail($id);
        return view('aluno.show', compact('aluno'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $aluno = Aluno::with('curso')->findOrFail($id);
        $cursos = Curso::all();
        return view('aluno.edit', compact('aluno', 'cursos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $aluno = Aluno::findOrFail($id);
        $aluno->update($request->all());
        return redirect('/aluno');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $aluno = Aluno::findOrFail($id);
        $aluno->delete();
        return redirect('/aluno');
    }
}
