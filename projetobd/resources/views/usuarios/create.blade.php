
    <style>
         body {
            margin: 0; /* Remove margens */
            padding: 0; /* Remove padding */
            background: url("{{ asset('guri.png') }}") no-repeat center center fixed;
            background-size: cover;
            min-height: 100vh; /* Garante que o body ocupe no mínimo 100% da tela */
            display: flex;
            flex-direction: column;
        }


        /* Garante que o navbar tenha sua posição correta */
        .navbar {
            position: relative;
            z-index: 2;
            /* Garante que o navbar esteja acima da imagem */
        }

        /* Centraliza o conteúdo, descontando a altura do navbar */
        .content-wrapper {
            flex: 1; /* Ocupar o espaço restante */
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: blue;
            padding-top: 100px;
        }

        /* Sobreposição de opacidade */
        body::before {
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.7);
            z-index: -1;
        }
    </style>
    

    

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar novo usuário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    

<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title text-center mb-4">Registrar novo usuário</h5>
                <form method="post" action="/usuarios">
                    @CSRF
                    <div class="mb-3">
                        <label for="name" class="form-label">Nome</label>
                        <input type="text" class="form-control" id="name" placeholder="Digite seu nome" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Digite seu email" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Senha</label>
                        <input type="password" class="form-control" id="password" placeholder="Digite sua senha" name="password">
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirme a Senha</label>
                        <input type="password" class="form-control" id="password_confirmation" placeholder="Confirme sua senha" name="password_confirmation">
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Registrar</button>
                    </div>
                </form>
                @if ($errors->any())
                    <div class="alert alert-danger mt-3">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>