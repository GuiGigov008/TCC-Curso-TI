<?php
session_start();

if (isset($_SESSION["usuario"]) && is_array($_SESSION["usuario"])) {
  require("pages/login/acoes/conexao.php");
  $adm = $_SESSION["usuario"][1];
  $nome = $_SESSION["usuario"][0];
  // $segundos = time() - $_SESSION['usuario'];
  // if ($segundos > $_SESSION['limite']) {
  //   unset($_SESSION['usuario']);
  //   unset($_SESSION['limite']);
  //   unset($_SESSION['msg']);
  //   session_destroy();
  //   header("Location: pages/login/index.php");
  // } else {
  //   $_SESSION['usuario'] = time();
  // }
} else {
  echo "<script>window.location = 'pages/login/index.php'</script>";
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<!-- <html lang="pt-br" theme="dark-mode" style="filter: invert(1) hue-rotate(180deg);"> -->

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>FCA | Dashboard</title>
  <link rel="icon" href="img/FCA_Logo.png" type="image/x-icon" sizes="16x16">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <?php require "menu_index.php" ?>

    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-3">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark" style="font-weight: bold;">Painel de Controle | Início</h1>
          </div><!-- /.col -->
          <!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-blue">
              <div class="inner">
                <h3><?php
                    require('pages/conexao_banco.php');
                    $query = "SELECT * FROM clientes";
                    $busca = mysqli_query($link, $query);
                    $cont = 0;
                    while ($dados = mysqli_fetch_array($busca)) {
                      $cont++;
                    }
                    echo $cont;
                    ?></h3>

                <h5 style="font-weight: bold;">Clientes cadastrados</h5>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="pages/cad_list_cliente.php" class="small-box-footer">Detalhes <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
              <div class="inner">
                <h3><?php
                    require('pages/conexao_banco.php');
                    $query = "SELECT * FROM veiculos";
                    $busca = mysqli_query($link, $query);
                    $cont = 0;
                    while ($dados = mysqli_fetch_array($busca)) {
                      $cont++;
                    }
                    echo $cont;
                    ?></h3>

                <h5 style="font-weight: bold;">Veículos cadastrados</h5>
              </div>
              <div class="icon">
                <i class="fas fa-car"></i>
              </div>
              <a href="pages/cad_list_veiculos.php" class="small-box-footer">Detalhes <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-teal">
              <div class="inner">
                <h3><?php
                    require('pages/conexao_banco.php');
                    $query = "SELECT * FROM orcamento WHERE fk_id_situacao = 1";
                    $busca = mysqli_query($link, $query);
                    $cont = 0;
                    while ($dados = mysqli_fetch_array($busca)) {
                      $cont++;
                    }
                    echo $cont;
                    ?></h3>

                <h5 style="font-weight: bold;">Orçamentos fechados</h5>
              </div>
              <div class="icon">
                <i class="fas fa-dollar-sign"></i>
              </div>
              <a href="pages/orcamento&venda/registro_orcamento_fechado.php" class="small-box-footer">Detalhes <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-red">
              <div class="inner">
                <h3><?php
                    require('pages/conexao_banco.php');
                    $query = "SELECT * FROM orcamento WHERE fk_id_situacao = 4";
                    $busca = mysqli_query($link, $query);
                    $cont = 0;
                    while ($dados = mysqli_fetch_array($busca)) {
                      $cont++;
                    }
                    echo $cont;
                    ?></h3>

                <h5 style="font-weight: bold;">Orçamentos em aberto</h5>
              </div>
              <div class="icon">
                <i class="fas fa-clock"></i>
              </div>
              <a href="pages/orcamento&venda/registro_orcamento_aberto.php" class="small-box-footer">Detalhes <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>

        <!-- Começo dos gráficos -->
        <div>
          <!-- Main content -->
          <section class="content">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-6">
                  <!-- AREA CHART -->
                  <div class="card card-primary" hidden>
                    <div class="card-header">
                      <h3 class="card-title">Area Chart</h3>

                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="chart">
                        <canvas id="areaChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                      </div>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->

                  <!-- DONUT CHART -->
                  <div class="card card-danger" hidden>
                    <div class="card-header">
                      <h3 class="card-title">Donut Chart</h3>

                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                      </div>
                    </div>
                    <div class="card-body">
                      <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->

                  <!-- PIE CHART -->
                  <div class="card card-danger" hidden>
                    <div class="card-header">
                      <h3 class="card-title-bold">Balanço de Despesas (em R$)</h3>

                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                        </button>
                      </div>
                    </div>
                    <div class="card-body">
                      <canvas id="pieChart" style="min-height: 400px; height: 400px; max-height: 400px; max-width: 100%;"></canvas>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->

                </div>
                <!-- /.col (LEFT) -->
                <div class="col-md-6" hidden>
                  <!-- LINE CHART -->
                  <div class="card card-info">
                    <div class="card-header">
                      <h3 class="card-title-bold">Balanço de Orçamentos (em R$)</h3>
                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                        </button>
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="chart">
                        <canvas id="donutChart2" style="min-height: 400px; height: 400px; max-height: 400px; max-width: 100%;"></canvas>
                      </div>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->

                  <!-- BAR CHART -->
                  <div class="card card-success" hidden>
                    <div class="card-header">
                      <h3 class="card-title">Bar Chart</h3>

                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="chart">
                        <canvas id="" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                      </div>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->

                  <!-- STACKED BAR CHART -->
                  <div class="card card-success" hidden>
                    <div class="card-header">
                      <h3 class="card-title">Stacked Bar Chart</h3>

                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="chart">
                        <canvas id="stackedBarChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                      </div>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->

                </div>
                <!-- /.col (RIGHT) -->
              </div>
              <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
          </section>
          <!-- /.content -->


          <!-- hidden para ocultar div - div do grafico -->
          <div hidden>
            <form id="pesquisaCustos" class="form-group" method="GET">
              <select class="form-control col-2" name="Ano" style="width: 100%; font-weight: bold;">
                <option class="text-bold" style="background-color: lightgoldenrodyellow;">ANO</option>
                <?php
                for ($ano = 2040; $ano > 2019; $ano--) {
                  echo "<option value='$ano' class='text-bold'>$ano</option>";
                }
                ?>
              </select>
            </form>
            <div class="col-6" style="margin-bottom: 1%;">
              <button type="submit" name="Enviar" value="Enviar" class="btn btn-primary btn-sn" form="pesquisaCustos">Visualizar <span class="fas fa-eye"></span></button>
            </div>
          </div>

          <?php if ($adm == 1) : ?>

            <?php
            $day1 = date('01');
            $day2 = date('31');
            $month = date('m');
            $year = date('Y');
            ?>

            <div class="card card-lightblue">
              <div class="card-header">
                <h3 class="card-title" style="font-size:x-large;">Controles</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <div class="chart">
                    <div id="despesas_3d" style="width: 900px; height: 500px;"></div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="chart">
                    <div id="orcamentos_3d" style="width: 900px; height: 500px;"></div>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
          <?php endif; ?>

        </div>

        <!-- Main content -->
        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-6">
                <!-- AREA CHART -->

                <!-- hidden para ocultar div - grafico template -->
                <div class="card card-primary" hidden>
                  <div class="card-header">
                    <h3 class="card-title">Area Chart</h3>

                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="chart">
                      <canvas id="areaChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                    </div>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->

                <!-- DONUT CHART -->

                <!-- hidden para ocultar div - grafico template -->
                <div class="card card-danger" hidden>
                  <div class="card-header">
                    <h3 class="card-title">Donut Chart</h3>

                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                    </div>
                  </div>
                  <div class="card-body">
                    <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->

                <!-- BAR CHART 2 -->

                <!-- hidden para ocultar div - grafico template -->
                <div class="card card-gray" hidden>
                  <div class="card-header">
                    <h3 class="card-title" style="font-size:x-large;">(em R$)</h3>

                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="chart">
                      <canvas id="barChart2" style="min-height: 400px; height: 400px; max-height: 400px; max-width: 100%;"></canvas>
                    </div>
                  </div>
                  <!-- /.card-body -->
                </div>

                <!-- PIE CHART -->

                <!-- hidden para ocultar div - grafico template -->
                <div class="card card-danger" hidden>
                  <div class="card-header">
                    <h3 class="card-title">Pie Chart</h3>

                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                    </div>
                  </div>
                  <div class="card-body">
                    <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->

              </div>
              <!-- /.col (LEFT) -->
              <div class="col-md-12">
                <!-- LINE CHART -->

                <!-- hidden para ocultar div - grafico template -->
                <div class="card card-info" hidden>
                  <div class="card-header">
                    <h3 class="card-title">Line Chart</h3>

                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="chart">
                      <canvas id="lineChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                    </div>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->

                <!-- /.card -->

                <!-- BAR CHART -->

                <!-- grafico template - receitas X despesas -->



                <div class="card card-gray" hidden>
                  <div class="card-header">
                    <div class="row">
                      <div class="form-group col-md-4">
                        <h3 class="card-title-bold">Balanço de Custos (em R$)</h3>
                      </div>

                      <div class="form-group col-md-4">
                        <form id="pesquisaCustos" class="form-group" method="GET">
                          <select class="form-control col-2" name="Ano" style="width: 100%; font-weight: bold; margin-left: -40%;">
                            <option class="text-bold" style="background-color: lightgoldenrodyellow;">ANO</option>
                            <?php
                            for ($ano = 2040; $ano > 2019; $ano--) {
                              echo "<option value='$ano' class='text-bold'>$ano</option>";
                            }
                            ?>
                          </select>
                        </form>
                      </div>

                      <div class="form-group col-md-4" style="margin-left: -40%;">
                        <button type="submit" name="Enviar" value="Enviar" class="btn btn-primary btn-sn" form="pesquisaCustos">Mostrar&nbsp; <span class="fas fa-eye"></span></button>
                      </div>
                    </div>

                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="chart">
                      <canvas id="barChart" style="min-height: 400px; height: 400px; max-height: 400px; max-width: 100%;"></canvas>
                    </div>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->

              </div>
              <!-- /.col (RIGHT) -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.container-fluid -->
        </section>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
          <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
      </div>


      <!-- ./wrapper -->

      <!-- jQuery -->
      <script src="plugins/jquery/jquery.min.js"></script>
      <!-- jQuery UI 1.11.4 -->
      <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
      <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
      <script>
        $.widget.bridge('uibutton', $.ui.button)
      </script>
      <!-- Bootstrap 4 -->
      <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
      <!-- ChartJS -->
      <script src="plugins/chart.js/Chart.min.js"></script>
      <!-- Sparkline -->
      <script src="plugins/sparklines/sparkline.js"></script>
      <!-- JQVMap -->
      <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
      <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
      <!-- jQuery Knob Chart -->
      <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
      <!-- daterangepicker -->
      <script src="plugins/moment/moment.min.js"></script>
      <script src="plugins/daterangepicker/daterangepicker.js"></script>
      <!-- Tempusdominus Bootstrap 4 -->
      <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
      <!-- Summernote -->
      <script src="plugins/summernote/summernote-bs4.min.js"></script>
      <!-- overlayScrollbars -->
      <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
      <!-- AdminLTE App -->
      <script src="dist/js/adminlte.js"></script>
      <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
      <script src="dist/js/pages/dashboard.js"></script>
      <!-- AdminLTE for demo purposes -->
      <script src="dist/js/demo.js"></script>
      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
      <!-- Include all compiled plugins (below), or include individual files as needed -->
      <script src="js/bootstrap.min.js"></script>
      <script type="text/javascript">
        $('#exampleModal').on('show.bs.modal', function(event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var recipient = button.data('whatever') // Extract info from data-* attributes
          var recipientnome = button.data('whatevernome')
          var recipientdetalhes = button.data('whateverdetalhes')
          // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
          // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
          var modal = $(this)
          modal.find('.modal-title').text('ID do Curso: ' + recipient)
          modal.find('#id_curso').val(recipient)
          modal.find('#recipient-name').val(recipientnome)
          modal.find('#detalhes-text').val(recipientdetalhes)
        })
      </script>

      <!-- REQUIRED SCRIPTS -->

      <!-- jQuery -->
      <!-- <script src="plugins/jquery/jquery.min.js"></script> -->
      <!-- Bootstrap -->
      <!-- <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script> -->
      <!-- AdminLTE -->
      <!-- <script src="dist/js/adminlte.js"></script> -->

      <!-- OPTIONAL SCRIPTS -->
      <!-- <script src="plugins/chart.js/Chart.min.js"></script>
    <script src="dist/js/demo.js"></script>
    <script src="dist/js/pages/dashboard3.js"></script> -->

      <!-- FUNCAO DE GRAFICOS NAO UTILIZADOS -->
      <script>
        // $(function() {
        //   'use strict'

        //   var ticksStyle = {
        //     fontColor: '#495057',
        //     fontStyle: 'bold'
        //   }

        //   var mode = 'index'
        //   var intersect = true

        //   var $salesChart = $('#sales-chart')
        //   var salesChart = new Chart($salesChart, {
        //     type: 'bar',
        //     data: {
        //       labels: ['JAN', 'TER', 'MAR', 'ABR', 'MAI', 'JUN', 'JUL', 'AGO', 'SET', 'OUT', 'NOV', 'DEZ'],
        //       datasets: [{
        //           backgroundColor: '#007bff',
        //           borderColor: '#007bff',
        //           data: [<?php
                            //                   require('pages/conexao_banco.php');
                            //                   $query = "SELECT * FROM orcamento WHERE fk_id_situacao = 1 AND Data_Emissao BETWEEN '$ano-$mes-$dia1' AND '$ano-$mes-$dia2'";
                            //                   $busca = mysqli_query($link, $query);
                            //                   $cont = 0;
                            //                   while ($dados = mysqli_fetch_array($busca)) {
                            //                     $cont++;
                            //                   }
                            //                   echo $cont;
                            //                   
                            ?>, 1000, 2000, 3000, 2500, 2700, 2500, 3000, 2500, 2700, 2500, 3000]
        //         },
        //         {
        //           backgroundColor: 'gold',
        //           borderColor: '#ced4da',
        //           data: [<?php
                            //                   require('pages/conexao_banco.php');
                            //                   $query = "SELECT * FROM orcamento";
                            //                   $busca = mysqli_query($link, $query);
                            //                   $cont = 0;
                            //                   while ($dados = mysqli_fetch_array($busca)) {
                            //                     $cont++;
                            //                   }
                            //                   echo $cont;
                            //                   
                            ?>, 700, 1700, 2700, 2000, 1800, 1500, 2000, 2500, 2700, 2500, 3000]
        //         }
        //       ]
        //     },
        //     options: {
        //       maintainAspectRatio: false,
        //       tooltips: {
        //         mode: mode,
        //         intersect: intersect
        //       },
        //       hover: {
        //         mode: mode,
        //         intersect: intersect
        //       },
        //       legend: {
        //         display: false
        //       },
        //       scales: {
        //         yAxes: [{
        //           // display: false,
        //           gridLines: {
        //             display: true,
        //             lineWidth: '4px',
        //             color: 'rgba(0, 0, 0, .2)',
        //             zeroLineColor: 'transparent'
        //           },
        //           ticks: $.extend({
        //             beginAtZero: true,

        //             // Include a dollar sign in the ticks
        //             callback: function(value, index, values) {
        //               // if (value >= 1000) {
        //               //   value /= 1000
        //               //   value += 'k'
        //               // }
        //               return 'R$ ' + value
        //             }
        //           }, ticksStyle)
        //         }],
        //         xAxes: [{
        //           display: true,
        //           gridLines: {
        //             display: true
        //           },
        //           ticks: ticksStyle
        //         }]
        //       }
        //     }
        //   })

        //   var $visitorsChart = $('#visitors-chart')
        //   var visitorsChart = new Chart($visitorsChart, {
        //     data: {
        //       labels: ['JAN', 'TER', 'MAR', 'ABR', 'MAI', 'JUN', 'JUL', 'AGO', 'SET', 'OUT', 'NOV', 'DEZ'],
        //       datasets: [{
        //           type: 'line',
        //           data: [1000, 1000, 2000, 3000, 2500, 2700, 2500, 3000, 2500, 2700, 2500, 3000],
        //           backgroundColor: 'transparent',
        //           borderColor: '#007bff',
        //           pointBorderColor: '#007bff',
        //           pointBackgroundColor: '#007bff',
        //           fill: false
        //           // pointHoverBackgroundColor: '#007bff',
        //           // pointHoverBorderColor    : '#007bff'
        //         },
        //         {
        //           type: 'line',
        //           data: [1000, 700, 1700, 2700, 2000, 1800, 1500, 2000, 2500, 2700, 2500, 3000],
        //           backgroundColor: 'tansparent',
        //           borderColor: '#ced4da',
        //           pointBorderColor: '#ced4da',
        //           pointBackgroundColor: '#ced4da',
        //           fill: false
        //           // pointHoverBackgroundColor: '#ced4da',
        //           // pointHoverBorderColor    : '#ced4da'
        //         }
        //       ]
        //     },
        //     options: {
        //       maintainAspectRatio: false,
        //       tooltips: {
        //         mode: mode,
        //         intersect: intersect
        //       },
        //       hover: {
        //         mode: mode,
        //         intersect: intersect
        //       },
        //       legend: {
        //         display: false
        //       },
        //       scales: {
        //         yAxes: [{
        //           // display: false,
        //           gridLines: {
        //             display: true,
        //             lineWidth: '4px',
        //             color: 'rgba(0, 0, 0, .2)',
        //             zeroLineColor: 'transparent'
        //           },
        //           ticks: $.extend({
        //             beginAtZero: true,
        //             suggestedMax: 200
        //           }, ticksStyle)
        //         }],
        //         xAxes: [{
        //           display: true,
        //           gridLines: {
        //             display: false
        //           },
        //           ticks: ticksStyle
        //         }]
        //       }
        //     }
        //   })
        // })
      </script>

      <!-- FUNCAO PARA DIGITAR SOMENTE NUMEROS -->
      <script>
        function somenteNumeros(e) {
          var charCode = e.charCode ? e.charCode : e.keyCode;
          // charCode 8 = backspace   
          // charCode 9 = tab
          if (charCode != 8 && charCode != 9) {
            // charCode 48 equivale a 0   
            // charCode 57 equivale a 9
            if (charCode < 48 || charCode > 57) {
              return false;
            }
          }
        };
      </script>

      <!-- GRAFICOS JQUERY PUXANDO DADOS COM PHP -->

      <script>
        $(function() {
          /* ChartJS
           * -------
           * Here we will create a few charts using ChartJS
           */

          //--------------
          //- AREA CHART -
          //--------------


          //FUNCAO DO GRAFICO DE CUSTOS
          // Get context with jQuery - using jQuery's .get() method.
          var areaChartCanvas = $('#areaChart').get(0).getContext('2d')

          var areaChartData = {
            labels: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
            datasets: [{
              label: 'Despesas',
              backgroundColor: 'red',
              borderColor: 'rgba(60,141,188,0.8)',
              pointRadius: false,
              pointColor: '#3b8bba',
              pointStrokeColor: 'rgba(60,141,188,1)',
              pointHighlightFill: '#fff',
              pointHighlightStroke: 'rgba(60,141,188,1)',
              data: [<?php
                      $dia1 = '01';
                      $dia2 = '31';
                      $mes = '01';
                      $ano = $_GET['Ano'];

                      require('pages/conexao_banco.php');

                      $soma = "SELECT SUM(Valor_Despesa) AS DESPESA FROM despesas WHERE id_situacao_fk = 1 AND Data_Despesa BETWEEN '$ano-$mes-$dia1' AND '$ano-$mes-$dia2'";
                      $resultado = mysqli_query($link, $soma);
                      $despesa = mysqli_fetch_assoc($resultado);

                      echo $despesa['DESPESA'];
                      ?>, <?php
                          $dia1 = '01';
                          $dia2 = '31';
                          $mes = '02';
                          $ano = $_GET['Ano'];

                          require('pages/conexao_banco.php');

                          $soma = "SELECT SUM(Valor_Despesa) AS DESPESA FROM despesas WHERE id_situacao_fk = 1 AND Data_Despesa BETWEEN '$ano-$mes-$dia1' AND '$ano-$mes-$dia2'";
                          $resultado = mysqli_query($link, $soma);
                          $despesa = mysqli_fetch_assoc($resultado);

                          echo $despesa['DESPESA'];
                          ?>, <?php
                              $dia1 = '01';
                              $dia2 = '31';
                              $mes = '03';
                              $ano = $_GET['Ano'];

                              require('pages/conexao_banco.php');

                              $soma = "SELECT SUM(Valor_Despesa) AS DESPESA FROM despesas WHERE id_situacao_fk = 1 AND Data_Despesa BETWEEN '$ano-$mes-$dia1' AND '$ano-$mes-$dia2'";
                              $resultado = mysqli_query($link, $soma);
                              $despesa = mysqli_fetch_assoc($resultado);

                              echo $despesa['DESPESA'];
                              ?>, <?php
                                $dia1 = '01';
                                $dia2 = '31';
                                $mes = '04';
                                $ano = $_GET['Ano'];

                                require('pages/conexao_banco.php');

                                $soma = "SELECT SUM(Valor_Despesa) AS DESPESA FROM despesas WHERE id_situacao_fk = 1 AND Data_Despesa BETWEEN '$ano-$mes-$dia1' AND '$ano-$mes-$dia2'";
                                $resultado = mysqli_query($link, $soma);
                                $despesa = mysqli_fetch_assoc($resultado);

                                echo $despesa['DESPESA'];
                                ?>, <?php
                                    $dia1 = '01';
                                    $dia2 = '31';
                                    $mes = '05';
                                    $ano = $_GET['Ano'];

                                    require('pages/conexao_banco.php');

                                    $soma = "SELECT SUM(Valor_Despesa) AS DESPESA FROM despesas WHERE id_situacao_fk = 1 AND Data_Despesa BETWEEN '$ano-$mes-$dia1' AND '$ano-$mes-$dia2'";
                                    $resultado = mysqli_query($link, $soma);
                                    $despesa = mysqli_fetch_assoc($resultado);

                                    echo $despesa['DESPESA'];
                                    ?>, <?php
                                        $dia1 = '01';
                                        $dia2 = '31';
                                        $mes = '06';
                                        $ano = $_GET['Ano'];

                                        require('pages/conexao_banco.php');

                                        $soma = "SELECT SUM(Valor_Despesa) AS DESPESA FROM despesas WHERE id_situacao_fk = 1 AND Data_Despesa BETWEEN '$ano-$mes-$dia1' AND '$ano-$mes-$dia2'";
                                        $resultado = mysqli_query($link, $soma);
                                        $despesa = mysqli_fetch_assoc($resultado);

                                        echo $despesa['DESPESA'];
                                        ?>, <?php
                                            $dia1 = '01';
                                            $dia2 = '31';
                                            $mes = '07';
                                            $ano = $_GET['Ano'];

                                            require('pages/conexao_banco.php');

                                            $soma = "SELECT SUM(Valor_Despesa) AS DESPESA FROM despesas WHERE id_situacao_fk = 1 AND Data_Despesa BETWEEN '$ano-$mes-$dia1' AND '$ano-$mes-$dia2'";
                                            $resultado = mysqli_query($link, $soma);
                                            $despesa = mysqli_fetch_assoc($resultado);

                                            echo $despesa['DESPESA'];
                                            ?>, <?php
                                                $dia1 = '01';
                                                $dia2 = '31';
                                                $mes = '08';
                                                $ano = $_GET['Ano'];

                                                require('pages/conexao_banco.php');

                                                $soma = "SELECT SUM(Valor_Despesa) AS DESPESA FROM despesas WHERE id_situacao_fk = 1 AND Data_Despesa BETWEEN '$ano-$mes-$dia1' AND '$ano-$mes-$dia2'";
                                                $resultado = mysqli_query($link, $soma);
                                                $despesa = mysqli_fetch_assoc($resultado);

                                                echo $despesa['DESPESA'];
                                                ?>, <?php
                                                    $dia1 = '01';
                                                    $dia2 = '31';
                                                    $mes = '09';
                                                    $ano = $_GET['Ano'];

                                                    require('pages/conexao_banco.php');

                                                    $soma = "SELECT SUM(Valor_Despesa) AS DESPESA FROM despesas WHERE id_situacao_fk = 1 AND Data_Despesa BETWEEN '$ano-$mes-$dia1' AND '$ano-$mes-$dia2'";
                                                    $resultado = mysqli_query($link, $soma);
                                                    $despesa = mysqli_fetch_assoc($resultado);

                                                    echo $despesa['DESPESA'];
                                                    ?>, <?php
                                                        $dia1 = '01';
                                                        $dia2 = '31';
                                                        $mes = '10';
                                                        $ano = $_GET['Ano'];

                                                        require('pages/conexao_banco.php');

                                                        $soma = "SELECT SUM(Valor_Despesa) AS DESPESA FROM despesas WHERE id_situacao_fk = 1 AND Data_Despesa BETWEEN '$ano-$mes-$dia1' AND '$ano-$mes-$dia2'";
                                                        $resultado = mysqli_query($link, $soma);
                                                        $despesa = mysqli_fetch_assoc($resultado);

                                                        echo $despesa['DESPESA'];
                                                        ?>, <?php
                                                            $dia1 = '01';
                                                            $dia2 = '31';
                                                            $mes = '11';
                                                            $ano = $_GET['Ano'];

                                                            require('pages/conexao_banco.php');

                                                            $soma = "SELECT SUM(Valor_Despesa) AS DESPESA FROM despesas WHERE id_situacao_fk = 1 AND Data_Despesa BETWEEN '$ano-$mes-$dia1' AND '$ano-$mes-$dia2'";
                                                            $resultado = mysqli_query($link, $soma);
                                                            $despesa = mysqli_fetch_assoc($resultado);

                                                            echo $despesa['DESPESA'];
                                                            ?>, <?php
                                                                $dia1 = '01';
                                                                $dia2 = '31';
                                                                $mes = '12';
                                                                $ano = $_GET['Ano'];

                                                                require('pages/conexao_banco.php');

                                                                $soma = "SELECT SUM(Valor_Despesa) AS DESPESA FROM despesas WHERE id_situacao_fk = 1 AND Data_Despesa BETWEEN '$ano-$mes-$dia1' AND '$ano-$mes-$dia2'";
                                                                $resultado = mysqli_query($link, $soma);
                                                                $despesa = mysqli_fetch_assoc($resultado);

                                                                echo $despesa['DESPESA'];
                                                                ?>]
            }, {
              label: 'Receita',
              backgroundColor: 'green',
              borderColor: 'rgba(210, 214, 222, 1)',
              pointRadius: false,
              pointColor: 'rgba(210, 214, 222, 1)',
              pointStrokeColor: '#c1c7d1',
              pointHighlightFill: '#fff',
              pointHighlightStroke: 'rgba(220,220,220,1)',
              data: [<?php
                      $dia1 = '01';
                      $dia2 = '31';
                      $mes = '01';
                      $ano = $_GET['Ano'];

                      require('pages/conexao_banco.php');

                      $soma = "SELECT SUM(Total_Geral) AS RECEITA FROM orcamento WHERE fk_id_situacao = 1 AND Data_Emissao BETWEEN '$ano-$mes-$dia1' AND '$ano-$mes-$dia2'";
                      $resultado = mysqli_query($link, $soma);
                      $receita = mysqli_fetch_assoc($resultado);

                      echo $receita['RECEITA'];
                      ?>, <?php
                          $dia1 = '01';
                          $dia2 = '31';
                          $mes = '02';
                          $ano = $_GET['Ano'];

                          require('pages/conexao_banco.php');

                          $soma = "SELECT SUM(Total_Geral) AS RECEITA FROM orcamento WHERE fk_id_situacao = 1 AND Data_Emissao BETWEEN '$ano-$mes-$dia1' AND '$ano-$mes-$dia2'";
                          $resultado = mysqli_query($link, $soma);
                          $receita = mysqli_fetch_assoc($resultado);

                          echo $receita['RECEITA'];
                          ?>, <?php
                              $dia1 = '01';
                              $dia2 = '31';
                              $mes = '03';
                              $ano = $_GET['Ano'];

                              require('pages/conexao_banco.php');

                              $soma = "SELECT SUM(Total_Geral) AS RECEITA FROM orcamento WHERE fk_id_situacao = 1 AND Data_Emissao BETWEEN '$ano-$mes-$dia1' AND '$ano-$mes-$dia2'";
                              $resultado = mysqli_query($link, $soma);
                              $receita = mysqli_fetch_assoc($resultado);

                              echo $receita['RECEITA'];
                              ?>, <?php
                                $dia1 = '01';
                                $dia2 = '31';
                                $mes = '04';
                                $ano = $_GET['Ano'];

                                require('pages/conexao_banco.php');

                                $soma = "SELECT SUM(Total_Geral) AS RECEITA FROM orcamento WHERE fk_id_situacao = 1 AND Data_Emissao BETWEEN '$ano-$mes-$dia1' AND '$ano-$mes-$dia2'";
                                $resultado = mysqli_query($link, $soma);
                                $receita = mysqli_fetch_assoc($resultado);

                                echo $receita['RECEITA'];
                                ?>, <?php
                                    $dia1 = '01';
                                    $dia2 = '31';
                                    $mes = '05';
                                    $ano = $_GET['Ano'];

                                    require('pages/conexao_banco.php');

                                    $soma = "SELECT SUM(Total_Geral) AS RECEITA FROM orcamento WHERE fk_id_situacao = 1 AND Data_Emissao BETWEEN '$ano-$mes-$dia1' AND '$ano-$mes-$dia2'";
                                    $resultado = mysqli_query($link, $soma);
                                    $receita = mysqli_fetch_assoc($resultado);

                                    echo $receita['RECEITA'];
                                    ?>, <?php
                                        $dia1 = '01';
                                        $dia2 = '31';
                                        $mes = '06';
                                        $ano = $_GET['Ano'];

                                        require('pages/conexao_banco.php');

                                        $soma = "SELECT SUM(Total_Geral) AS RECEITA FROM orcamento WHERE fk_id_situacao = 1 AND Data_Emissao BETWEEN '$ano-$mes-$dia1' AND '$ano-$mes-$dia2'";
                                        $resultado = mysqli_query($link, $soma);
                                        $receita = mysqli_fetch_assoc($resultado);

                                        echo $receita['RECEITA'];
                                        ?>, <?php
                                            $dia1 = '01';
                                            $dia2 = '31';
                                            $mes = '07';
                                            $ano = $_GET['Ano'];

                                            require('pages/conexao_banco.php');

                                            $soma = "SELECT SUM(Total_Geral) AS RECEITA FROM orcamento WHERE fk_id_situacao = 1 AND Data_Emissao BETWEEN '$ano-$mes-$dia1' AND '$ano-$mes-$dia2'";
                                            $resultado = mysqli_query($link, $soma);
                                            $receita = mysqli_fetch_assoc($resultado);

                                            echo $receita['RECEITA'];
                                            ?>, <?php
                                                $dia1 = '01';
                                                $dia2 = '31';
                                                $mes = '08';
                                                $ano = $_GET['Ano'];

                                                require('pages/conexao_banco.php');

                                                $soma = "SELECT SUM(Total_Geral) AS RECEITA FROM orcamento WHERE fk_id_situacao = 1 AND Data_Emissao BETWEEN '$ano-$mes-$dia1' AND '$ano-$mes-$dia2'";
                                                $resultado = mysqli_query($link, $soma);
                                                $receita = mysqli_fetch_assoc($resultado);

                                                echo $receita['RECEITA'];
                                                ?>, <?php
                                                    $dia1 = '01';
                                                    $dia2 = '31';
                                                    $mes = '09';
                                                    $ano = $_GET['Ano'];

                                                    require('pages/conexao_banco.php');

                                                    $soma = "SELECT SUM(Total_Geral) AS RECEITA FROM orcamento WHERE fk_id_situacao = 1 AND Data_Emissao BETWEEN '$ano-$mes-$dia1' AND '$ano-$mes-$dia2'";
                                                    $resultado = mysqli_query($link, $soma);
                                                    $receita = mysqli_fetch_assoc($resultado);

                                                    echo $receita['RECEITA'];
                                                    ?>, <?php
                                                        $dia1 = '01';
                                                        $dia2 = '31';
                                                        $mes = '10';
                                                        $ano = $_GET['Ano'];

                                                        require('pages/conexao_banco.php');

                                                        $soma = "SELECT SUM(Total_Geral) AS RECEITA FROM orcamento WHERE fk_id_situacao = 1 AND Data_Emissao BETWEEN '$ano-$mes-$dia1' AND '$ano-$mes-$dia2'";
                                                        $resultado = mysqli_query($link, $soma);
                                                        $receita = mysqli_fetch_assoc($resultado);

                                                        echo $receita['RECEITA'];
                                                        ?>, <?php
                                                            $dia1 = '01';
                                                            $dia2 = '31';
                                                            $mes = '11';
                                                            $ano = $_GET['Ano'];

                                                            require('pages/conexao_banco.php');

                                                            $soma = "SELECT SUM(Total_Geral) AS RECEITA FROM orcamento WHERE fk_id_situacao = 1 AND Data_Emissao BETWEEN '$ano-$mes-$dia1' AND '$ano-$mes-$dia2'";
                                                            $resultado = mysqli_query($link, $soma);
                                                            $receita = mysqli_fetch_assoc($resultado);

                                                            echo $receita['RECEITA'];
                                                            ?>, <?php
                                                                $dia1 = '01';
                                                                $dia2 = '31';
                                                                $mes = '12';
                                                                $ano = $_GET['Ano'];

                                                                require('pages/conexao_banco.php');

                                                                $soma = "SELECT SUM(Total_Geral) AS RECEITA FROM orcamento WHERE fk_id_situacao = 1 AND Data_Emissao BETWEEN '$ano-$mes-$dia1' AND '$ano-$mes-$dia2'";
                                                                $resultado = mysqli_query($link, $soma);
                                                                $receita = mysqli_fetch_assoc($resultado);

                                                                echo $receita['RECEITA'];
                                                                ?>]
            }, ]
          }

          var areaChartOptions = {
            maintainAspectRatio: false,
            responsive: true,
            legend: {
              display: false
            },
            scales: {
              xAxes: [{
                gridLines: {
                  display: true,
                }
              }],
              yAxes: [{
                gridLines: {
                  display: false,
                }
              }]
            }
          }

          // This will get the first returned node in the jQuery collection.
          var areaChart = new Chart(areaChartCanvas, {
            type: 'line',
            data: areaChartData,
            options: areaChartOptions
          })

          //-------------
          //- LINE CHART -
          //--------------
          var lineChartCanvas = $('#lineChart').get(0).getContext('2d')
          var lineChartOptions = jQuery.extend(true, {}, areaChartOptions)
          var lineChartData = jQuery.extend(true, {}, areaChartData)
          lineChartData.datasets[0].fill = false;
          lineChartData.datasets[1].fill = false;
          lineChartOptions.datasetFill = false

          var lineChart = new Chart(lineChartCanvas, {
            type: 'line',
            data: lineChartData,
            options: lineChartOptions
          })


          //FUNCAO DO GRAFICO DE DESPESAS
          //-------------
          //- DONUT CHART -
          //-------------
          // Get context with jQuery - using jQuery's .get() method.


          var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
          var donutData = {
            labels: [
              'Salários',
              'Água',
              'Energia',
              'Internet',
              'Peças',
              'Impostos',
            ],
            datasets: [{
              data: [100, 300, 700, 300, 300, 300],
              backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
            }]
          }
          var donutOptions = {
            maintainAspectRatio: false,
            responsive: true,
          }
          //Create pie or douhnut chart
          // You can switch between pie and douhnut using the method below.
          var donutChart = new Chart(donutChartCanvas, {
            type: 'doughnut',
            data: donutData,
            options: donutOptions
          })


          //FUNCAO DO GRAFICO DE ORCAMENTOS
          //-----------------
          //- DONUT CHART 2 -
          //-----------------
          // Get context with jQuery - using jQuery's .get() method.
          var donutChartCanvas2 = $('#donutChart2').get(0).getContext('2d')
          var donutData2 = {
            labels: [
              'Em aberto',
              'Fechado'
            ],
            datasets: [{
              data: [700, 300],
              backgroundColor: ['#f56954', '#00a65a'],
            }]
          }
          var donutOptions2 = {
            maintainAspectRatio: false,
            responsive: true,
          }
          //Create pie or douhnut chart
          // You can switch between pie and douhnut using the method below.
          var donutChart2 = new Chart(donutChartCanvas2, {
            type: 'doughnut',
            data: donutData2,
            options: donutOptions2
          })

          //-------------
          //- PIE CHART -
          //-------------
          // Get context with jQuery - using jQuery's .get() method.
          var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
          var pieData = donutData;
          var pieOptions = {
            maintainAspectRatio: false,
            responsive: true,
          }
          //Create pie or douhnut chart
          // You can switch between pie and douhnut using the method below.
          var pieChart = new Chart(pieChartCanvas, {
            type: 'pie',
            data: pieData,
            options: pieOptions
          })

          //-------------
          //- BAR CHART -
          //-------------
          var barChartCanvas = $('#barChart').get(0).getContext('2d')
          var barChartData = jQuery.extend(true, {}, areaChartData)
          var temp0 = areaChartData.datasets[0]
          var temp1 = areaChartData.datasets[1]
          barChartData.datasets[0] = temp1
          barChartData.datasets[1] = temp0

          var barChartOptions = {
            responsive: true,
            maintainAspectRatio: false,
            datasetFill: false
          }

          var barChart = new Chart(barChartCanvas, {
            type: 'bar',
            data: barChartData,
            options: barChartOptions
          })

          //---------------
          //- BAR CHART 2 -
          //---------------
          var barChartCanvas = $('#barChart2').get(0).getContext('2d')
          var barChartData = jQuery.extend(true, {}, areaChartData)
          var temp0 = areaChartData.datasets[0]
          var temp1 = areaChartData.datasets[1]
          barChartData.datasets[0] = temp1
          barChartData.datasets[1] = temp0

          var barChartOptions = {
            responsive: true,
            maintainAspectRatio: false,
            datasetFill: false
          }

          var barChart = new Chart(barChartCanvas, {
            type: 'bar',
            data: barChartData,
            options: barChartOptions
          })

          //---------------------
          //- STACKED BAR CHART -
          //---------------------
          var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')
          var stackedBarChartData = jQuery.extend(true, {}, barChartData)

          var stackedBarChartOptions = {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
              xAxes: [{
                stacked: true,
              }],
              yAxes: [{
                stacked: true
              }]
            }
          }

          var stackedBarChart = new Chart(stackedBarChartCanvas, {
            type: 'bar',
            data: stackedBarChartData,
            options: stackedBarChartOptions
          })
        })
      </script>

      <?php if ($adm == 1) : ?>

        <?php

        $host = "127.0.0.1";
        $usuario = "root";
        $senha = "";
        $bd = "grems";
        $link = mysqli_connect($host, $usuario, $senha, $bd);

        $query = "SELECT * FROM despesas WHERE Data_Despesa BETWEEN '$year-$month-$day1' AND '$year-$month-$day2'";
        $res = mysqli_query($link, $query);


        ?>

        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
          google.charts.load("current", {
            packages: ["corechart"]
          });
          google.charts.setOnLoadCallback(drawChart);

          function drawChart() {
            var data = google.visualization.arrayToDataTable([
              ['Descricao_Despesa', 'Valor_Despesa'],
              <?php

              while ($row = $res->fetch_assoc()) {
                echo "['" . $row['Descricao_Despesa'] . "', " . $row['Valor_Despesa'] . "],";
              }

              ?>
            ]);

            var options = {
              title: 'Despesas',
              is3D: true,
            };

            var chart = new google.visualization.PieChart(document.getElementById('despesas_3d'));
            chart.draw(data, options);
          }
        </script>

        <!-- GRAFICOS GOOGLE (NAO UTILIZADOS) | LUCROS -->
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
          google.charts.load("current", {
            packages: ["corechart"]
          });
          google.charts.setOnLoadCallback(drawChart);

          function drawChart() {
            var data = google.visualization.arrayToDataTable([
              ['Situação', 'Quantidade'],
              ['Lucros', 5],
              ['Prejuízos', 5],
            ]);

            var options = {
              title: 'Balanço de valores',
              is3D: true,
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart1_3d'));
            chart.draw(data, options);
          }
        </script>

        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
          google.charts.load("current", {
            packages: ["corechart"]
          });
          google.charts.setOnLoadCallback(drawChart);

          function drawChart() {
            var data = google.visualization.arrayToDataTable([
              ['Task', 'Hours per Day'],
              ['Fechados', 11],
              ['Em aberto', 2]
            ]);

            var options = {
              title: 'Total de Orçamentos',
              is3D: true,
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart_orcamento_3d'));
            chart.draw(data, options);
          }
        </script>
        <script type="text/javascript">
          google.charts.load("current", {
            packages: ["corechart"]
          });
          google.charts.setOnLoadCallback(drawChart);

          function drawChart() {
            var data = google.visualization.arrayToDataTable([
              ['Task', 'Hours per Day'],
              ['Fechados', <?php
                            require('pages/conexao_banco.php');
                            $query = "SELECT * FROM orcamento WHERE fk_id_situacao = 1 AND Data_Emissao BETWEEN '$year-$month-$day1' AND '$year-$month-$day2'";
                            $busca = mysqli_query($link, $query);
                            $cont = 0;
                            while ($dados = mysqli_fetch_array($busca)) {
                              $cont++;
                            }
                            echo $cont;
                            ?>],
              ['Em aberto', <?php
                            require('pages/conexao_banco.php');
                            $query = "SELECT * FROM orcamento WHERE fk_id_situacao = 4 AND Data_Emissao BETWEEN '$year-$month-$day1' AND '$year-$month-$day2'";
                            $busca = mysqli_query($link, $query);
                            $cont = 0;
                            while ($dados = mysqli_fetch_array($busca)) {
                              $cont++;
                            }
                            echo $cont;
                            ?>],
            ]);

            var options = {
              title: 'Orçamentos',
              is3D: true,
            };

            var chart = new google.visualization.PieChart(document.getElementById('orcamentos_3d'));
            chart.draw(data, options);
          }
        </script>
      <?php endif; ?>
</body>

</html>