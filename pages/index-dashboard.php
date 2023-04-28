<?php 

  require_once "../autoload.php";
  $allDepartments = (new \App\Model\DepartmentModel())->getAll();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/ico" href="../assets/img/ico.ico"/>
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
              <select class="selectDepartment">
                <option value="" selected disabled>Selecione</option>
                <?php 
                     if (sizeof($allDepartments) > 0) 
                     {
                     
                        foreach($allDepartments as $row) 
                        {
                  ?>

                <option value="<?= $row['department'] ?>" id="<?= $row['iddepartment'] ?>" class="allDepartments"><?= $row['department'] ?></option>

                <?php 
                        }
                      }
                    ?>
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

            <!-- GRÁFICO PIZZA RESUMIDO -->

            <div Class="canvas">
              <canvas id="myChart2" width="350"></canvas>
            </div>

            <!-- GRÁFICO DE BARRA STACKED -->

            <div style="width: 800px; height: 400px; margin-left: 16px;" Class="canvas">
              <canvas id="myChart3" width="800px" height="400px"></canvas>
            </div>

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

    <script src="chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-datalabels/2.2.0/chartjs-plugin-datalabels.min.js" integrity="sha512-JPcRR8yFa8mmCsfrw4TNte1ZvF1e3+1SdGMslZvmrzDYxS69J7J49vkFL8u6u8PlPJK+H3voElBtUCzaXj+6ig==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="module" src="../assets/js/dashboards/fetchSelect.js"></script>
</body>

</html>