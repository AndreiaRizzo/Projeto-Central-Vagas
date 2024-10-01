<x-app-layout>
    <style>
        /* Definindo a imagem de fundo */
        .background-image {
            position: fixed; /* Imagem fixa no fundo */
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url("{{ asset('guri.png') }}") no-repeat center center;
            background-size: cover; /* Cobrir toda a tela */
            opacity: 0.2; /* Ajuste a opacidade conforme necessário */
            z-index: -1; /* Coloca a imagem atrás do conteúdo */
        }

        /* Estilo do conteúdo */
        .content {
            position: relative; /* O conteúdo fica acima da imagem */
            z-index: 1; /* Z-index maior que o da imagem de fundo */
            padding: 10px;
            color: blue;
        }

        /* Ajuste do navbar */
        .navbar {
            position: relative; /* Garante que o navbar fique acima da imagem */
            z-index: 2; /* Navbar acima de todo o conteúdo */
        }

        /* Estilo adicional para formulário */
        form {
            background-color: rgba(255, 255, 255, 0.1); /* Fundo branco semitransparente no formulário */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Sombras suaves ao redor do formulário */
        }
    </style>

    <!-- Imagem de fundo -->
    <div class="background-image"></div>

    <!-- Conteúdo da página -->
    <div class="content">
        <h5>Novo Curso</h5>

        <form action="/curso" method="POST">
            @csrf <!-- Token de proteção CSRF -->

            <div class="row mb-3">
                <div class="col">
                    <label for="idcurso" class="form-label">Código do Curso:</label>
                    <input type="number" name="codcurso" class="form-control" required/>
                </div>
           
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
           
                <div class="col">
                    <label for="periodo" class="form-label">Período do Curso:</label>
                    <input type="text" name="periodo" class="form-control" required/>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <button type="submit" class="btn btn-outline-primary">Salvar</button>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
