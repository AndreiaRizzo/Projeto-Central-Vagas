<x-app-layout>
    <style>
        /* Container para a imagem de fundo */
        .background-image {
            position: fixed; /* Fica fixo no fundo */
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url("{{ asset('guri.png') }}") no-repeat center center;
            background-size: cover;
            opacity: 0.2; /* Ajuste a opacidade aqui */
            z-index: -1; /* Fica atrás de todos os outros conteúdos */
        }

        /* O restante do estilo da página */
        .content {
            position: relative; /* Para garantir que o conteúdo fique acima da imagem */
            z-index: 1; /* Z-index maior que o da imagem de fundo */
            color:blue;
        }
        .navbar {
            position: relative; /* Garante que o navbar esteja acima da imagem */
            z-index: 2; /* Z-index maior que o da imagem de fundo */
        }
        .table {
            color: blue;
        }
    </style>
    <div class="background-image"></div> <!-- Imagem de fundo com opacidade -->
    <div class="content"></div>
        <h5>Excluir Curso</h5>

        <form action="/curso/{{$curso->id}}" method="POST">
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
    </div>
</x-app-layout>