<x-app-layout>

  <style>
    body {
      margin: 0;
      /* Remove margens */
      padding: 0;
      /* Remove padding */
      background: url("{{ asset('guri.png') }}") no-repeat center center fixed;
      background-size: cover;
      min-height: 100vh;
      /* Garante que o body ocupe no mínimo 100% da tela */
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
      flex: 1;
      /* Ocupar o espaço restante */
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

  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load('current', { 'packages': ['corechart'] });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
      // Recebe os dados do controlador como JSON
      var cursos = JSON.parse('{!! $cursos !!}');
      var porcentagens = JSON.parse('{!! $porcentagens !!}');

      cursos = cursos.map(curso => curso.toUpperCase());
      // Constrói o array de dados para o gráfico
      var data = google.visualization.arrayToDataTable([
        ['Cursos', 'Porcentagem'],
        ...cursos.map((curso, index) => [curso, porcentagens[index]])
      ]);
      var options = {
        title: 'Distribuição de alunos por curso',
        pieHole: 0.4, // Adiciona um efeito de gráfico em anel, opcional
        is3D: true,   // Para tornar o gráfico 3D, opcional
        colors: [
          '#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF', '#FF9F40',
          '#F7464A', '#46BFBD', '#FDB45C', '#949FB1', '#4D5360', '#AC64AD',
          '#5AD3D1', '#FFC870', '#D4E157', '#FF7043', '#8D6E63', '#BDBDBD',
          '#9CCC65', '#26A69A', '#7E57C2', '#78909C', '#FFEB3B', '#64B5F6',
          '#E57373', '#81C784'
        ],
        titleTextStyle: {
          fontSize: 25, // Aumenta o tamanho da fonte do título
          bold: true,   // Define o título como negrito (opcional)
          color: 'blue' // Define a cor do título (opcional)
        }
      };

      var chart = new google.visualization.PieChart(document.getElementById('piechart'));

      chart.draw(data, options);
    }
  </script>

  <div class="d-flex justify-content-center">
    <div id="piechart" style="width: 700px; height: 500px; border-radius: 200px; 
      overflow: hidden; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
    </div>

  </div>
</x-app-layout>