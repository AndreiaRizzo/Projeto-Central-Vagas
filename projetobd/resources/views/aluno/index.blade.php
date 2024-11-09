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
        <h5 class="mt-3">Cadastrar alunos</h5>

        <a class="btn btn-outline-primary" href="/aluno/create">
            Inserir novo aluno
        </a>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Nome do aluno</th>
                    <th>Cpf do aluno</th>
                    <th>Data de nascimento</th>
                    <th>Idade</th>
                    <th>Curso</th>
                    <th>Nome do responsável</th>
                    <th>Celular</th>
                    <th>Data do cadastro</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($alunos as $aluno)
                    <tr>
                        <td>{{ $aluno->nome }}</td>
                        <td>{{ $aluno->cpfAluno }}</td>
                        <td>{{ $aluno->dataNasc }}</td>
                        <td>{{ $aluno->idade }}</td>
                        <td>{{ $aluno->curso->nome }}</td>
                        <td>{{ $aluno->nomeResp }}</td>
                        <td>{{ $aluno->celResp }}</td>
                        <td>{{ $aluno->data }}</td>
                        <td>
                            <a href="/aluno/{{ $aluno->id }}/edit" class="btn btn-outline-warning">Alterar</a>
                            <a href="/aluno/{{ $aluno->id }}" class="btn btn-outline-danger">Excluir</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
