<x-app-layout>

    <h5>Alterar Curso</h5>

    <form action="/curso/" method="POST">
        @CSRF
        @method('PUT')
        <div class="row">
            <div class="col">
                <label for="nome" class="form-label">Informe o curso:</label>
                <input type="text" name="nome" class="form-control"/>
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