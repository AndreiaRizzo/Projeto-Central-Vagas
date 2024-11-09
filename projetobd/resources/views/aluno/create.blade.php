<x-app-layout>
    <style>
        /* Definindo a imagem de fundo */
        .background-image {
            position: fixed;
            /* Imagem fixa no fundo */
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url("{{ asset('guri.png') }}") no-repeat center center;
            background-size: cover;
            /* Cobrir toda a tela */
            opacity: 0.2;
            /* Ajuste a opacidade conforme necessário */
            z-index: -1;
            /* Coloca a imagem atrás do conteúdo */
        }

        /* Estilo do conteúdo */
        .content {
            position: relative;
            /* O conteúdo fica acima da imagem */
            z-index: 1;
            /* Z-index maior que o da imagem de fundo */
            padding: 10px;
            color: blue;
        }

        /* Ajuste do navbar */
        .navbar {
            position: relative;
            /* Garante que o navbar fique acima da imagem */
            z-index: 2;
            /* Navbar acima de todo o conteúdo */
        }

        /* Estilo adicional para formulário */
        form {
            background-color: rgba(255, 255, 255, 0.1);
            /* Fundo branco semitransparente no formulário */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            /* Sombras suaves ao redor do formulário */
        }
    </style>

    <!-- Imagem de fundo -->
    <div class="background-image"></div>

    <!-- Conteúdo da página -->
    <div class="content">
        <h5>Cadastrar Aluno</h5>

        <form action="/aluno" method="POST">
            @csrf <!-- Token de proteção CSRF -->

            <div class="row mb-3">
                <div class="col">
                    <label for="nome" class="form-label">Nome do Aluno:</label>
                    <input type="text" name="nome" class="form-control" required />
                </div>
                <div class="col">
                    <label for="idAluno" class="form-label">Cpf do Aluno:</label>
                    <input type="text" id="cpfAluno" name="cpfAluno" class="form-control" required />
                </div>

            </div>

            <div class="row mb-3">
                <div class="col">
                    <label for="dataNasc" class="form-label">Data de Nascimento:</label>
                    <input type="date" id="dataNasc" name="dataNasc" class="form-control" required
                        onchange="calcularIdade()" />
                </div>
                <div class="col">
                    <label for="idade" class="form-label">Idade do Aluno:</label>
                    <input type="number" id="idade" name="idade" class="form-control" readonly />
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <label for="curso_id" class="form-label">Nome do Curso:</label>
                    <select name="curso_id" class="form-control">
                        @foreach ($cursos as $curso)
                            <option value="{{$curso->id}}">{{$curso->nome}}

                            </option>

                        @endforeach

                    </select>
                </div>
                <div class="col">
                    <label for="data" class="form-label">Data do cadastro</label>
                    <input type="text" id="data" name="data" class="form-control" required />
                </div>

            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="nomeResp" class="form-label">Nome do Responsável:</label>
                    <input type="text" name="nomeResp" class="form-control" required />
                </div>

                <div class="col">
                    <label for="celResp" class="form-label">Celular do Responsável:</label>
                    <input type="text" id="celResp" name="celResp" class="form-control" required />
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <button type="submit" class="btn btn-outline-primary">Salvar</button>
                </div>
            </div>

    </div>

    </form>
    </div>
    <script>
        function calcularIdade() {
            const dataNasc = document.getElementById('dataNasc').value;
            const idadeInput = document.getElementById('idade');

            if (dataNasc) {
                const hoje = new Date();
                const nascimento = new Date(dataNasc);
                let idade = hoje.getFullYear() - nascimento.getFullYear();
                const mes = hoje.getMonth() - nascimento.getMonth();

                if (mes < 0 || (mes === 0 && hoje.getDate() < nascimento.getDate())) {
                    idade--;
                }

                idadeInput.value = idade;
            }
        };
        document.getElementById('celResp').addEventListener('input', function (e) {
            let input = e.target.value.replace(/\D/g, ''); // Remove tudo que não é dígito
            input = input.substring(0, 11); // Limita a 11 dígitos

            // Formata o número para o padrão (00) 00000-0000
            if (input.length > 6) {
                input = `(${input.substring(0, 2)}) ${input.substring(2, 7)}-${input.substring(7)}`;
            } else if (input.length > 2) {
                input = `(${input.substring(0, 2)}) ${input.substring(2)}`;
            } else if (input.length > 0) {
                input = `(${input}`;
            }

            e.target.value = input;
        });

        document.getElementById('cpfAluno').addEventListener('input', function (e) {
            let input = e.target.value.replace(/\D/g, ''); // Remove tudo que não é dígito
            input = input.substring(0, 11); // Limita a 11 dígitos

            // Formata o número para o padrão 000.000.000-00
            if (input.length > 9) {
                input = `${input.substring(0, 3)}.${input.substring(3, 6)}.${input.substring(6, 9)}-${input.substring(9)}`;
            } else if (input.length > 6) {
                input = `${input.substring(0, 3)}.${input.substring(3, 6)}.${input.substring(6)}`;
            } else if (input.length > 3) {
                input = `${input.substring(0, 3)}.${input.substring(3)}`;
            }

            e.target.value = input;
        });

        function preencherDataCadastro() {
            const today = new Date();
            const day = String(today.getDate()).padStart(2, '0');    // Dia com dois dígitos
            const month = String(today.getMonth() + 1).padStart(2, '0'); // Mês com dois dígitos
            const year = today.getFullYear();

            // Formato brasileiro: DD-MM-YYYY
            const formattedDate = `${day}-${month}-${year}`;

            // Define o valor do campo "data" no formato brasileiro
            document.getElementById('data').value = formattedDate;
        }

        // Executa a função quando o DOM estiver carregado
        document.addEventListener('DOMContentLoaded', function () {
            preencherDataCadastro();
        });
    </script>


</x-app-layout>