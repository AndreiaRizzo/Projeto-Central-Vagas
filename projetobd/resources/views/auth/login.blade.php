<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acesso</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Estilização do background com imagem */
        body {
            background: url("{{ asset('guri.png') }}") no-repeat center center fixed;
            background-size: cover;
            position: relative;
            margin: 0;
            padding: 0;
        }

        /* Sobreposição de opacidade para clarear a imagem */
        body::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.6);
            z-index: 1;
        }

        /* Garante que o conteúdo do login esteja acima da sobreposição */
        .container {
            position: relative;
            z-index: 2;
        }

        .card {
            background: rgba(255, 255, 255, 0.3);
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            width: 60%;
            color: blue;
        }
    </style>
</head>

<body>

    <div class="container d-flex justify-content-center align-items-center vh-100">

        <div class="card">
            <div class="card-body">
                <h3 class="card-title text-center mb-4">Login</h3>
                <form method="post" action="/login">
                    @CSRF
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input name="email" type="email" class="form-control" id="email" placeholder="Digite seu email">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Senha</label>
                        <input name="password" type="password" class="form-control" id="password"
                            placeholder="Digite sua senha">
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-outline-primary">Entrar</button>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>