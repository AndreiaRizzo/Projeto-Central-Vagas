<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acesso</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: url("{{ asset('guri.png') }}") no-repeat center center fixed;
            background-size: cover;
            position: relative;
        }

        /* Sobreposição de opacidade */
        body::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.5);
            /* Branco semi-transparente */
            z-index: 1;
        }

        /* Conteúdo da página */
        .container {
            position: relative;
            z-index: 2;
            /* Garantir que o conteúdo apareça acima da sobreposição */
        }

        .card {
            border-radius: 1rem;
            /* Borda arredondada para o card */
        }

        .card-body {
            padding: 2rem;
            /* Padding mais espaçoso dentro do card */
        }

        .btn {
            width: 100%;
            /* Botões ocupam a largura total do card */
            margin-bottom: 0.5rem;
            /* Espaçamento entre botões */
        }

        .card-title {
            margin-bottom: 1.5rem;
            /* Espaçamento abaixo do título do card */
        }
    </style>
</head>

<body>
    
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="col-md-4">
            <div class="card shadow-lg">
                <div class="card-body">
                    <h5 class="card-title text-center">Central de vagas</h5>
                    @auth
                        <a href="/dashboard" class="btn btn-primary">
                            Acessar área restrita
                        </a>
                    @else
                        <a href="/login" class="btn btn-primary">
                            Acessar o sistema
                        </a>
                        <a href="/register" class="btn btn-primary">
                            Crie sua conta
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>