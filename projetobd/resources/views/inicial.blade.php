<x-app-layout>
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
    

    <!-- Aqui ficaria o seu navbar -->
        

       
    <div class="content-wrapper">
        <h2 class="text-center">Bem vindo ao Sistema Central de Vagas!</h2>
        
        
    </div>

</x-app-layout>