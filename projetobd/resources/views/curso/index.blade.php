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

    <div class="content">
        <h5 class="mt-3">Gerenciar Cursos</h5>

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <a class="btn btn-outline-primary" href="/curso/create">
            Inserir novo Curso
        </a>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Código do Curso</th>
                    <th>Nome</th>
                    <th>Dia</th>
                    <th>Período</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cursos as $c)
                    <tr>
                        <td>{{ $c->codcurso }}</td>
                        <td>{{ mb_strtoupper($c->nome) }}</td>
                        <td>{{ mb_strtoupper($c->dia) }}</td>
                        <td>{{ mb_strtoupper($c->periodo) }}</td>
                        <td>
                            <a href="/curso/{{ $c->id }}/edit" class="btn btn-outline-warning">Alterar</a>
                            <a href="/curso/{{ $c->id }}" class="btn btn-outline-danger">Excluir</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
