<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pesquisa de satifsação SENAI</title>

  <!-- Google Font: Poppins -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/css/tablecss/all.min.css">
  <!-- CSS da tabela -->
  <link rel="stylesheet" href="assets/css/tablecss/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="assets/css/tablecss/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="assets/css/tablecss/buttons.bootstrap4.min.css">
  <!-- Tema da tabela -->
  <link rel="stylesheet" href="assets/css/tablecss/adminlte.min.css">
  <!--ICONES-->
  <script src="https://kit.fontawesome.com/85b090ab76.js" crossorigin="anonymous"></script>
  <style>
    h2 {
      margin-left: 30px;
    }
    .container-fluid {
      margin-left: 23px;
    }
  </style>
</head>

<body style="height: fit-content;" class="hold-transition">

<!-- SIDE-BAR -->
<?php include_once("assets/html/index-menu.html") ?>
  

    <!-- TODO O CONTEÚDO ESTÁ AQUI DENTRO DE SECTION content -->
    

	<!-- SETOR -->
	<section class="content">
		<h2>SETORES</h2>
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Pesquisa de satisfação SENAI</h3>
                </div>
              <div class="card">
                <!-- / FIM DO TÍTULO \ -->

                <!-- CORPO DA TABELA -->
                <div class="card-body">
                  <table id="setor" class="table table-bordered table-striped">

                    <!-- TÍTULOS DAS COLUNAS -->
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Local</th>
                            <th>Criado em</th>
                        </tr>
                    </thead>

                    <!-- CONTEÚDO DA TABELA
                      aqui os valores vão ser inseridos diretamente do banco de dados
                    -->
                    <tbody>
                        <tr>
                            <td>NOC</td>  <!-- Nome do departamento -->
                            <td>Nucleo de Orientação Cultural</td> <!-- Descrição do departamento -->
                            <td>Lugar</td> <!-- Local do setor -->
                            <td>11/04/2023 às 19:31</td> <!-- Data e hora que o departamento foi adicionado -->
                        </tr>
						<tr>
                            <td>IFBA</td>  
                            <td>Instituto Federal de Educação, Ciência e Tecnologia da Bahia</td>
                            <td>Lugar2</td>
                            <td>11/04/2023 às 19:29</td> 
						</tr>
                    </tbody>

                    <!-- FOOTER DA TABELA -->
                    <tfoot>
                        <tr>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Local</th>
                            <th>Criado em</th>
                        </tr>
                    </tfoot>
                  </table>
                </div>
                <!-- /FIM DO CORPO DA TABELA -->
              </div>
              <!-- /FIM DO CARD -->
            </div>
            <!-- /FIM DO COL -->
          </div>
          <!-- /FIM DO ROW -->
        </div>
        <!-- /FIM DO CONTAINER FLUID -->
    </section>

	<!-- LOCAL -->
	<section class="content">
		<h2>LOCAIS</h2>
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Pesquisa de satisfação SENAI</h3>
                </div>
              <div class="card">
                <!-- / FIM DO TÍTULO \ -->

                <!-- CORPO DA TABELA -->
                <div class="card-body">
                  <table id="local" class="table table-bordered table-striped">

                    <!-- TÍTULOS DAS COLUNAS -->
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Enderenço</th>
                            <th>Site</th>
                        </tr>
                    </thead>

                    <!-- CONTEÚDO DA TABELA
                      aqui os valores vão ser inseridos diretamente do banco de dados
                    -->
                    <tbody>
                        <tr>
                            <td>Cidade do saber</td>  <!-- Nome do local -->
                            <td>Rua do Telegrafo, S/Nº, bairro do Natal, Camaçari</td> <!-- Endereço do local -->
                            <td>https://secult.camacari.ba.gov.br/?page_id=532%27</td> <!-- URL do possível site do local -->
                        </tr>
						<tr>
                            <td>Google</td>  
                            <td>Vira a dereita, vai reto na casa Nº2, esquerda e vai toda vida reto</td>
                            <td>https://google.com.br</td>
						</tr>
                    </tbody>

                    <!-- FOOTER DA TABELA -->
                    <tfoot>
                        <tr>
                            <th>Nome</th>
                            <th>Enderenço</th>
                            <th>Site</th>
                        </tr>
                    </tfoot>
                  </table>
                </div>
                <!-- /FIM DO CORPO DA TABELA -->
              </div>
              <!-- /FIM DO CARD -->
            </div>
            <!-- /FIM DO COL -->
          </div>
          <!-- /FIM DO ROW -->
        </div>
        <!-- /FIM DO CONTAINER FLUID -->
    </section>

                <!-- /FIM DO CORPO DA TABELA -->
              </div>
              <!-- /FIM DO CARD -->
            </div>
            <!-- /FIM DO COL -->
          </div>
          <!-- /FIM DO ROW -->
        </div>
        <!-- /FIM DO CONTAINER FLUID -->
    </section>

	<!-- INICIO DO JS -->

<script src="assets/js/tablejs/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="assets/js/tablejs/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="assets/js/tablejs/jquery.dataTables.min.js"></script>
<script src="assets/js/tablejs/dataTables.bootstrap4.min.js"></script>
<script src="assets/js/tablejs/dataTables.responsive.min.js"></script>
<script src="assets/js/tablejs/responsive.bootstrap4.min.js"></script>
<script src="assets/js/tablejs/dataTables.buttons.min.js"></script>
<script src="assets/js/tablejs/buttons.bootstrap4.min.js"></script>
<script src="assets/js/tablejs/jszip.min.js"></script>
<script src="assets/js/tablejs/pdfmake.min.js"></script>
<script src="assets/js/tablejs/vfs_fonts.js"></script>
<script src="assets/js/tablejs/buttons.html5.min.js"></script>
<script src="assets/js/tablejs/buttons.print.min.js"></script>
<script src="assets/js/tablejs/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/js/tablejs/adminlte.min.js"></script>

<!-- ALGUMAS COISAS EXTRAS -->
<script>
    // Coloquei aqui constantes de data para exportarmos arquivos com a data de hora de exportação
    const now = new Date();
    const day = now.getDate();
    const month = now.getMonth() + 1; // Os meses são indexados a partir de 0
    const year = now.getFullYear();
    const hour = now.getHours();
    const minutes = now.getMinutes();
    const dateString = `Pesquisa de satisfação ${day}-${month}-${year} às ${hour}-${minutes}`;

	// AVALIAÇÕES
    $(function () {
        $("#avaiacoes").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": [
            "copy", // botão
            {
                extend: 'excel', // botão
                filename: dateString, // nome do arquivo
            },
            {
                extend: 'pdf',
                filename: dateString,
            },
            "csv",
            "print",
            "colvis"
    ]
    }).buttons().container().appendTo('#avaiacoes_wrapper .col-md-6:eq(0)');

    $('#avaiacoes2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });


	// SETOR
	$(function () {
        $("#setor").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": [
            "copy", // botão
            {
                extend: 'excel', // botão
                filename: dateString, // nome do arquivo
            },
            {
                extend: 'pdf',
                filename: dateString,
            },
            "csv",
            "print",
            "colvis"
    ]
    }).buttons().container().appendTo('#setor_wrapper .col-md-6:eq(0)');

    $('#setor2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });


	// LOCAL
	$(function () {
        $("#local").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": [
            "copy", // botão
            {
                extend: 'excel', // botão
                filename: dateString, // nome do arquivo
            },
            {
                extend: 'pdf',
                filename: dateString,
            },
            "csv",
            "print",
            "colvis"
    ]
    }).buttons().container().appendTo('#local_wrapper .col-md-6:eq(0)');

    $('#local2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });


	// USUÁRIOS
	$(function () {
        $("#usuario").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": [
            "copy", // botão
            {
                extend: 'excel', // botão
                filename: dateString, // nome do arquivo
            },
            {
                extend: 'pdf',
                filename: dateString,
            },
            "csv",
            "print",
            "colvis"
    ]
    }).buttons().container().appendTo('#usuario_wrapper .col-md-6:eq(0)');

    $('#usuario2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });

</script>
</body>
</html>
