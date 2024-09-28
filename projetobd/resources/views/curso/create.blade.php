<x-app-layout>

    <h5>Novo Curso</h5>

    <form action="/curso" method="POST">
        @csrf <!-- Token de proteção CSRF -->

        <div class="row mb-3">
            <div class="col">
                <label for="idcurso" class="form-label">ID do Curso:</label>
                <input type="number" name="idcurso" class="form-control" required/>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col">
                <label for="nome" class="form-label">Nome do Curso:</label>
                <input type="text" name="nome" class="form-control" required/>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col">
                <label for="dia" class="form-label">Dia do Curso:</label>
                <input type="text" name="dia" class="form-control" required/>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col">
                <label for="periodo" class="form-label">Período do Curso:</label>
                <input type="text" name="periodo" class="form-control" required/>
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
