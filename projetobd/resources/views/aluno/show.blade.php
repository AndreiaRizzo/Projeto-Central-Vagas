<x-app-layout>

    <h5>Excluir Aluno</h5>

    <form action="/aluno/{{$aluno->id}}" method="POST">
        @CSRF
        @method('DELETE')
        <div class="row">
            <div class="col">
                <label for="nome" class="form-label">Informe o curso:</label>
                <input type="text" name="nome" class="form-control" value="{{$curso->nome}}" disabled/>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <button type="submit" class="btn btn-primary">
                    Excluir
                </button>
            </div>
        </div>
    </form>

</x-app-layout>