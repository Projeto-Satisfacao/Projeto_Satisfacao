<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pesquisa Satisfação Dashboard</title>

  <!-- Google Font: Poppins (elementos h1,h2,h3) -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../assets/plugins/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../assets/plugins/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../assets/plugins/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../assets/plugins/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/plugins/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../assets/plugins/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../assets/plugins/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../assets/plugins/summernote-bs4.min.css">
  <!-- Arquivo css -->
  <link rel="stylesheet" href="../assets/plugins/style.css">
  <script src="https://kit.fontawesome.com/85b090ab76.js" crossorigin="anonymous"></script>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <div class="barra">
        <p><b>Resultados das avaliações e recomendações dos usuarios</b></p>
      </div>

      <!-- Itens na barra da direita -->
      <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->
    </nav>
    <!-- /.navbar -->
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="" class="brand-link">
        <img src="" alt="" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Pesquisa de satisfação</span>
      </a>

    <!-- SIDE-BAR -->
    <?php include_once("index-menu.html") ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">

        <div style="margin-left: 7%; margin-right: 20%;" class="col-sm-9 text-center">
          <h3>Painel de controle</h3>
        </div><!-- /.col -->

      </div>

      <!-- Main content -->
      <section class="content">
        <style>
          body .chart-container {
            display: flex;
            justify-content: center;
            align-items: center;
			margin-left: -180px;
          }


          .button {
            position: relative;
            display: flex;
            left: 100vh;

          }

          #canvas {
            position: relative
          }

          section {
            align-items: center;
            justify-content: center;
          }

          select {
            display: block;
            margin-bottom: 10px;
          }

          .canvas {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
          }

          canvas {
            max-width: 100%;
            height: auto;
            margin: 0 auto;
          }
        </style>
        <!-- Gráfico em pizza -->
        <section>
          <div class="chart-container">
            <div class="fltr1">
              <select>
                <option>Department</option>
              </select>
              <select>
                <option>Local</option>
              </select>
              <select>
                <option>Date</option>
              </select>
            </div>
            
			<!-- GRÁTIFO DONUT COMPLETO -->

			<div style="margin-right: 250px;" class="canvas">
              <canvas id="myChart" width="350px"></canvas>
            </div>
            <script src="chart.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-datalabels/2.2.0/chartjs-plugin-datalabels.min.js" integrity="sha512-JPcRR8yFa8mmCsfrw4TNte1ZvF1e3+1SdGMslZvmrzDYxS69J7J49vkFL8u6u8PlPJK+H3voElBtUCzaXj+6ig==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
           
           
            
            <script src="chart.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

            <script>
              const ctx = document.getElementById('myChart');
            	/*
				* Gráfico donut completo com todas as categorias de avaliação;
				* Filtro de data deve ter os dias do banco de dados (isso pode ser alterado caso seja mais pertinente);
				* 
				* [EXPLICAÇÃO DAS PARTES IMPORTANTES DO GRÁFICO]
			  	* 
			  	* labels: representa, nesse gráfico, as categorias que recebem os dados.
			  	* label: representa a quantidade de votos.
			  	* data: representa os dados daquela categoria (5 valores seguindo a quantidade de strings em LABELS).
			  	* backgroundColor: representa a cor das fatias do gráfico.
				* 
            	*/
              new Chart(ctx, {
                type: 'doughnut',
                data: {
                  labels: ['Excelente', 'Bom', 'Regular', 'Ruim', 'Péssimo'],
                  datasets: [{
                    label: 'Quantidade de votos',
                    data: [12, 4, 4, 5, 8],
                    borderWidth: 1,
                    backgroundColor: [
                      'rgba(16, 168, 55, 0.8)',
                      'rgba(59, 160, 4, 0.8)',
                      'rgba(255, 144, 4, 0.8)',
                      'rgba(124, 4, 0, 0.8)',
                      'rgba(183, 0, 0, 0.8)',
                    ]
                  }]
                },
                options: {
                  plugins: {
                    title: {
                      display: true,
                      text: 'Votações geral',
                    },
                  },
                  maintainAspectRatio: false,
                  width: 800,
                  height: 800,
                  scales: {}
                }
              });

            </script>


			<!-- GRÁFICO PIZZA RESUMIDO -->

            <div Class="canvas">
              <canvas style="margin-right: -16px;" id="myChart2" width="350"></canvas>
            </div>

            <script src="chart.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

            <script>
              const ctx2 = document.getElementById('myChart2');
              /*
			  * Gráfico de pizza resumido com apenas avaliações Exelentes e Péssimas;
			  * Filtro de data funciona por dia. poderá ser escolhido o dia que se quer ver os resultados (isso pode mudar caso seja mais pertinente);
			  * 
			  * [EXPLICAÇÃO DAS PARTES IMPORTANTES DO GRÁFICO]
			  * 
			  * labels: representa, nesse gráfico, as categorias que recebem os dados.
			  * label: representa a quantidade de votos.
			  * data: representa os dados daquela categoria (2 valores seguindo a quantidade de strings em LABELS).
			  * backgroundColor: representa a cor das fatias do gráfico.
			  */
              new Chart(ctx2, {
                type: 'pie',
                data: {
                  labels: ['Excelente', 'Péssimo'],
                  datasets: [{
                    label: 'Quantidade de votos',
                    data: [12, 4],
                    backgroundColor: [
                      'rgba(16, 168, 55, 0.8)',
                      'rgba(183, 0, 0, 0.8)',
                    ]
                  }]
                },
                options: {
                  plugins: {
                    title: {
                      display: true,
                      text: 'Resumo Exelente/Péssimo',
                    },
                  },
                  maintainAspectRatio: true,
                  width: 800,
                  height: 800,
                  scales: {}
                }
              });

            </script>

            <div style="margin-left: 20px;" class="flter2">
              <select>
                <option>Department</option>
              </select>
              <select>
                <option>Local</option>
              </select>
              <select>
                <option>Date</option>
              </select>
            </div>

			<!-- GRÁFICO DE BARRA STACKED -->

            <div style="width: 800px; height: 400px; margin-left: 16px;"  Class="canvas">
              <canvas id="myChart3" width="800px" height="400px"></canvas>
            </div>

            <div style="margin-left: 30px;" class="flter3">
              <select>
                <option>Department</option>
              </select>
              <select>
                <option>Local</option>
              </select>
              <select>
                <option>Year</option>
              </select>
            </div>

            <script src="chart.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

            <script>
              const ctx3 = document.getElementById('myChart3');
              /*
              * Gráfico de barra stacked que mostra os resultados por mês;
			  * Filtro funciona por ano ao invés de ser por data como nos demais gráficos;
			  * 
			  * [EXPLICAÇÃO DAS PARTES IMPORTANTES DO GRÁFICO]
			  * 
			  * labels: representa, nesse gráfico, os meses do ano
			  * label: representa a categoria da avaliação
			  * data: representa os dados daquela categoria (são 12 valores, um para cada mês)
			  * backgroundColor: representa a cor das barras do gráfico
              */
			          
              new Chart(ctx3, {
                type: 'bar',
                data: {
                  labels: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
                  datasets: [{
                    label: 'Exelente',
                    data: [17, 4, 27, 11, 6, 22, 28, 29, 5, 26, 8, 24, 15],
                    backgroundColor: [
						'rgba(16, 168, 55, 0.8)',
                    ]
                  },{
                    label: 'Bom',
                    data: [13, 9, 3, 22, 30, 6, 14, 2, 25, 19, 10, 21, 8],
                    backgroundColor: [
						'rgba(59, 160, 4, 0.8)',
                    ]
                  },{
                    label: 'Regular',
                    data: [7, 30, 25, 12, 20, 23, 26, 1, 16, 8, 2, 19, 14],
                    backgroundColor: [
						'rgba(255, 144, 4, 0.8)',
                    ]
                  },{
                    label: 'Ruim',
                    data: [30, 8, 12, 27, 3, 10, 1, 15, 14, 21, 24, 20, 23],
                    backgroundColor: [
						'rgba(124, 4, 0, 0.8)',
                    ]
                  },{
                    label: 'Péssimo',
                    data: [18, 21, 28, 9, 7, 2, 6, 29, 27, 19, 10, 13, 4],
                    backgroundColor: [
						'rgba(183, 0, 0, 0.8)',
                    ]
                  }]
                },
                options: {
                  plugins: {
                    title: {
                      display: true,
                      text: 'Votações por mês',
                    },
                  },
                  maintainAspectRatio: false,
                  width: 2000,
                  height: 800,
                  scales: {
                    x: {
                      stacked: true,
                    },
                    y: {
                      stacked: true,
                      beginAtZero: true
                    }
                  }
                }
              });
            </script>
          </div>
        </section>
        <!-- /.content -->
 
    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <strong>04/2023 <a href="">Pesquisa de Satisfação</a>.</strong>
      Turma Desenvolvimento de Sistemas SENAI
      <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 1.0
      </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

</body>

</html>
