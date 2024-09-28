<x-app-layout>

    <!-- Aqui ficaria o seu navbar -->
    
    <div class="content-wrapper">
        <h2 class="mt-3 text-center">Bem vindo ao sistema Central de Vagas!</h2>

        <div class="d-flex justify-content-center">
            <div id="piechart" style="width: 900px; height: 500px;"></div>
        </div>
    </div>

</x-app-layout>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        body {
            background: url("{{ asset('guri.png') }}") no-repeat center center fixed;
            background-size: cover;
            position: relative;
        }

        /* Centraliza o conteúdo, mas não afeta o navbar */
        .content-wrapper {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: calc(100vh - 100px); /* Altura total da página menos a altura do navbar */
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
            z-index: 1;
        }
    </style>
</head>

</html>
