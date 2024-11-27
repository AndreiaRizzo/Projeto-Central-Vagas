<x-app-layout>
    <style>
        /* Container para a imagem de fundo */
        .background-image {
            position: fixed;
            /* Fica fixo no fundo */
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url("{{ asset('guri.png') }}") no-repeat center center;
            background-size: cover;
            opacity: 0.2;
            /* Ajuste a opacidade aqui */
            z-index: -1;
            /* Fica atrás de todos os outros conteúdos */
        }

        /* O restante do estilo da página */
        .content {
            position: relative;
            /* Para garantir que o conteúdo fique acima da imagem */
            z-index: 1;
            /* Z-index maior que o da imagem de fundo */
            color: blue;
        }

        .navbar {
            position: relative;
            /* Garante que o navbar esteja acima da imagem */
            z-index: 2;
            /* Z-index maior que o da imagem de fundo */
        }

        .table {
            color: blue;
        }

        /* Estilo para o botão de impressão */
        .print-button {
            margin: 20px 0;
            padding: 10px 20px;
            background-color: blue;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 16px;
            border-radius: 10px;
        }

        .print-button:hover {
            background-color: #218838;
        }

        @media print {
           
            .actions-column, .print-button, .navbar {
                display: none;
            }
        }
    </style>

    <div class="background-image"></div> <!-- Imagem de fundo com opacidade -->

    <div class="content">
        <h5 class="mt-3">Lista de espera</h5>

        <!-- Botão para imprimir -->
        <button class="print-button" onclick="window.print()">Imprimir Página</button>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Curso</th>
                    <th>Data do cadastro</th>
                    <th>Nome do aluno</th>
                    <th>Cpf do aluno</th>
                    <th>Data de nascimento</th>
                    <th>Idade</th>
                    <th>Nome do responsável</th>
                    <th>Celular</th>
                    <th class="actions-column">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($alunos as $aluno)
                    <tr>
                        <td>{{ mb_strtoupper($aluno->curso->nome) }}</td>
                        <td>{{ \Carbon\Carbon::parse($aluno->data)->format('d/m/Y')}}</td>
                        <td>{{ mb_strtoupper($aluno->nome) }}</td>
                        <td>{{ $aluno->cpfAluno }}</td>
                        <td>{{ \Carbon\Carbon::parse($aluno->dataNasc)->format('d/m/Y')}}</td>
                        <td>{{ $aluno->idade }}</td>
                        <td>{{ mb_strtoupper($aluno->nomeResp) }}</td>
                        <td>{{ $aluno->celResp }}</td>
                        <td class="actions-column">
                            <a href="/aluno/{{ $aluno->id }}/edit" class="btn btn-outline-warning">Alterar</a>
                            <a href="/aluno/{{ $aluno->id }}" class="btn btn-outline-danger">Excluir</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Script para imprimir a página -->
    <script>
        function printPage() {
            window.print();  // Chama a função para imprimir a página
        }
    </script>

</x-app-layout>