<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;

use Exception;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ordena os cursos pelo nome em ordem alfabética (ascendente)
        $cursos = Curso::orderBy('nome', 'asc')->get(); 
    
        // Retorna a view com os cursos ordenados
        return view("curso.index", compact('cursos'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("curso.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        Curso::create($request->all());

        return redirect("/curso")->with('success', 'Curso criado com sucesso!');
    }/*o método validate garantirá que os campos sejam validados antes de criar o curso


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $curso = Curso::findOrFail($id);
        return view("curso.show", compact('curso'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $curso = Curso::findOrFail($id);
        return view("curso.edit", compact('curso'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $curso = Curso::findOrFail($id);
        $curso->update($request->all());
        return redirect("/curso");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            $curso = Curso::findOrFail($id);
            $curso->delete();
            return redirect("/curso");
        } catch (Exception $e){
            return redirect("/curso")->with('error', 'Não é possível excluir o curso!');
        }

    }
}
