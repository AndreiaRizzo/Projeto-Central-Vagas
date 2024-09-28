<x-app-layout>

    <h5>Excluir Curso</h5>

    <form action="/categoria/" method="POST">
        @CSRF
        @method('DELETE')
        <div class="row">
            <div class="col">
                <label for="nome" class="form-label">Informe o curso:</label>
                <input type="text" name="nome" class="form-control" disabled/>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <button type="submit" class="btn btn-primary">
                    Salvar
                </button>
            </div>
        </div>
    </form>

</x-app-layout>