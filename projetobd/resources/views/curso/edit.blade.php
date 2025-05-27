<x-app-layout>

    <h5>Alterar Curso</h5>

    <form action="/curso/{{$curso->id}}" method="POST">
        @CSRF
        @method('PUT')
        <div class="row">
            <div class="col">
                <label for="nome" class="form-label">Código do curso:</label>
                <input type="number" name="codcurso" class="form-control" value="{{$curso->codcurso}}"/>

                <label for="nome" class="form-label">Nome do curso:</label>
                <input type="text" name="nome" class="form-control" value="{{$curso->nome}}"/>

                <label for="nome" class="form-label">Dia do curso:</label>
                <input type="text" name="dia" class="form-control" value="{{$curso->dia}}"/>

                <label for="nome" class="form-label">Período do curso:</label>
                <input type="text" name="periodo" class="form-control" value="{{$curso->periodo}}"/>




                
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