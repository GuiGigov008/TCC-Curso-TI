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

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>FCA | Valores</title>
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
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <?php if ($adm) : ?>

          <div class="content-header">
            <div class="container-fluid">
              <div class="row mb-3">
                <div class="col-sm-6">
                  <h1 class="m-0 text-dark" style="font-weight: bold;">Gastos e Despesas</h1>
                </div><!-- /.col -->
                <!-- /.col -->
              </div><!-- /.row -->
            </div><!-- /.container-fluid -->

            <div class="pull-right" style="margin-bottom: 1%;">
              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModalcad">Adicionar Despesa</button>
            </div>

            <form method="POST" id="form_despesa" action="">

              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                    <tr style="background-color: darkred;">
                      <th class="text-center">
                        <select name="ano_despesa" class="form-control" id="options" style="width: 100%; font-weight: bold;">
                          <option class="text-bold" style="background-color: lightgoldenrodyellow;">ANO</option>
                          <?php
                          for ($anodespesa = 2040; $anodespesa > 2019; $anodespesa--) {
                            echo "<option value='$anodespesa' class='text-bold'>$anodespesa</option>";
                          }
                          ?>
                        </select>
                      </th>
                      <th class="text-center"><input type="submit" name="janeiro_des" value="JAN" class="btn btn-white btn-sn text-bold" style="height: 55px; width: 55px; color: darkred; background-color: white;"></th>
                      <th class="text-center"><input type="submit" name="fevereiro_des" value="FEV" class="btn btn-white btn-sn text-bold" style="height: 55px; width: 55px; color: darkred; background-color: white;"></th>
                      <th class="text-center"><input type="submit" name="marco_des" value="MAR" class="btn btn-white btn-sn text-bold" style="height: 55px; width: 55px; color: darkred; background-color: white;"></th>
                      <th class="text-center"><input type="submit" name="abril_des" value="ABR" class="btn btn-white btn-sn text-bold" style="height: 55px; width: 55px; color: darkred; background-color: white;"></th>
                      <th class="text-center"><input type="submit" name="maio_des" value="MAI" class="btn btn-white btn-sn text-bold" style="height: 55px; width: 55px; color: darkred; background-color: white;"></th>
                      <th class="text-center"><input type="submit" name="junho_des" value="JUN" class="btn btn-white btn-sn text-bold" style="height: 55px; width: 55px; color: darkred; background-color: white;"></th>
                      <th class="text-center"><input type="submit" name="julho_des" value="JUL" class="btn btn-white btn-sn text-bold" style="height: 55px; width: 55px; color: darkred; background-color: white;"></th>
                      <th class="text-center"><input type="submit" name="agosto_des" value="AGO" class="btn btn-white btn-sn text-bold" style="height: 55px; width: 55px; color: darkred; background-color: white;"></th>
                      <th class="text-center"><input type="submit" name="setembro_des" value="SET" class="btn btn-white btn-sn text-bold" style="height: 55px; width: 55px; color: darkred; background-color: white;"></th>
                      <th class="text-center"><input type="submit" name="outubro_des" value="OUT" class="btn btn-white btn-sn text-bold" style="height: 55px; width: 55px; color: darkred; background-color: white;"></th>
                      <th class="text-center"><input type="submit" name="novembro_des" value="NOV" class="btn btn-white btn-sn text-bold" style="height: 55px; width: 55px; color: darkred; background-color: white;"></th>
                      <th class="text-center"><input type="submit" name="dezembro_des" value="DEZ" class="btn btn-white btn-sn text-bold" style="height: 55px; width: 55px; color: darkred; background-color: white;"></th>
                      <th class="text-center"><input type="submit" name="limpar_des" value="Limpar" class="btn btn-white btn-sn text-bold" style="height: 55px; color: darkred; background-color: white;"></th>
                    </tr>
                  </thead>
                </table>
              </div>

              <div class="content-header">
                <div class="card-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th class="text-center" width="7%">ID</th>
                        <th class="text-center" width="10%">Situação</th>
                        <th class="text-center" width="18%">Descrição</th>
                        <th class="text-center" width="10%">Valor</th>
                        <th class="text-center" width="10%">Data de Emissão</th>
                        <th class="text-center" width="15%"></th>
                        <th class="text-center" width="15%"></th>
                        <th class="text-center" width="15%"></th>
                      </tr>
                    </thead>

                    <?php
                    require_once("busca_despesa.php");
                    ?>

                  </table>
                </div>
              </div>
            </form>

            <?php
            require('pages/conexao_banco.php');
            $query = "SELECT * FROM despesas";
            $busca = mysqli_query($link, $query);
            ?>

            <!-- Inicio Modal -->
            <div class="modal fade" id="myModalcad" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Cadastrar Despesa</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: red;"><span aria-hidden="true">&times;</span></button>
                  </div>
                  <div class="modal-body">
                    <form method="POST" action="janela_modal/despesa/cad_despesa.php" enctype="multipart/form-data">
                      <div class="form-group">
                        <label for="recipient-name" class="control-label">Descrição:</label>
                        <input name="Descricao_Despesa" type="text" class="form-control">
                      </div>
                      <div class="form-group">
                        <label for="message-text" class="control-label">Valor:</label>
                        <input name="Valor_Despesa" type="text" class="form-control">
                      </div>
                      <div class="form-group" hidden>
                        <label for="message-text" class="control-label">Data:</label>
                        <input name="Data_Despesa" type="text" class="form-control" id="detalhes-data">
                      </div>
                      <div class="form-group" hidden>
                        <label for="message-text" class="control-label">Situação:</label>
                        <input name="id_situacao_fk" type="text" class="form-control" id="detalhes-status">
                      </div>
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Confirmar <i class="fas fa-check"></i></button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <!-- Fim Modal -->
            <div class="row" hidden>
              <div class="col-md-12">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th class="text-center">#</th>
                      <!-- <th>Data</th> -->
                      <th class="text-center">Situação</th>
                      <th class="text-center">Descrição</th>
                      <th class="text-center">Valor</th>
                      <th class="text-center"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php while ($dados = mysqli_fetch_assoc($busca)) {

                      $id = $dados['Id_Despesa'];
                      $data = $dados['Data_Despesa'];
                      $date_format = date('d/m/Y', strtotime($data));
                      $nome = $dados['Descricao_Despesa'];
                      $valor = $dados['Valor_Despesa'];
                      $status = $dados['id_situacao_fk'];
                      if ($status == '1') {
                        $status = "<label style='font-weight: normal; color: green;'>Fechado</label>";
                      } else {
                        $status = "<label style='font-weight: normal; color: red;'>Em aberto</label>";
                      }


                    ?>
                      <tr>
                        <td class="text-center"><?php echo "$id"; ?></td>
                        <td class="text-center"><?php echo $status; ?></td>
                        <!-- <td><?php echo "$date_format"; ?></td> -->
                        <td class="text-center"><?php echo " $nome"; ?></td>
                        <td class="text-center">R$ <?php echo "$valor"; ?>,00</td>
                        <td class="text-center">
                          <button type="button" class="btn btn-warning col-md-3" data-toggle="modal" data-target="#exampleModal" data-whatever="<?php echo $dados['Id_Despesa']; ?>" data-whatevernome="<?php echo $dados['Descricao_Despesa']; ?>" data-whateverdetalhes="<?php echo $dados['Valor_Despesa']; ?>" data-whateverdata="<?php echo $dados['Data_Despesa']; ?>" data-whateverstatus="<?php echo $dados['id_situacao_fk']; ?>">Editar</button>

                          <a href="janela_modal/despesa/delete_despesa.php?Id_Despesa=<?php echo $dados['Id_Despesa']; ?>"><button type="button" class="btn btn-danger col-md-3">Apagar</button></a>

                          <a href="janela_modal/despesa/delete_despesa.php?Id_Despesa=<?php echo $dados['Id_Despesa']; ?>"><button type="button" class="btn btn-primary col-md-3">Dar baixa</button></a>
                        </td>
                      </tr>
                      <!-- Inicio Modal -->
                      <div class="modal fade" id="myModal<?php echo $dados['Id_Despesa']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title text-center" id="myModalLabel"><?php echo $dados['Descricao_Despesa']; ?></h4>
                            </div>
                            <div class="modal-body">
                              <p><?php echo $dados['Id_Despesa']; ?></p>
                              <p><?php echo $dados['id_situacao_fk']; ?></p>
                              <p><?php echo $dados['Descricao_Despesa']; ?></p>
                              <p><?php echo $dados['Valor_Despesa']; ?></p>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- Fim Modal -->
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title" id="exampleModalLabel">Alterando despesa</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                  <form method="POST" action="janela_modal/despesa/edit_despesa.php" enctype="multipart/form-data">

                    <input name="Id_Despesa" type="hidden" id="id">
                    <div class="form-group">
                      <label for="recipient-name" class="control-label">Descrição:</label>
                      <input name="Descricao_Despesa" type="text" class="form-control" id="recipient-name">
                    </div>
                    <div class="form-group">
                      <label for="valor-text" class="control-label">Valor:</label>
                      <input name="Valor_Despesa" type="text" class="form-control" id="valor-text">
                    </div>
                    <div class="form-group" hidden>
                      <label for="data-text" class="control-label">Data:</label>
                      <input name="Data_Despesa" type="text" class="form-control" id="data-text">
                    </div>
                    <div class="form-group" hidden>
                      <label for="situacao-text" class="control-label">Situação:</label>
                      <input name="id_situacao_fk" type="text" class="form-control" id="situacao-text">
                    </div>

                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                      <button type="submit" class="btn btn-primary">Alterar</button>
                    </div>

                  </form>
                </div>
              </div>
            </div>
          </div>

          <div class="content-header">
            <div class="container-fluid">
              <div class="row mb-3">
                <div class="col-sm-6">
                  <h1 class="m-0 text-dark" style="font-weight: bold;">Orçamentos e Receita</h1>
                </div><!-- /.col -->
                <!-- /.col -->
              </div><!-- /.row -->
            </div><!-- /.container-fluid -->

            <!-- <div id="piechart_3d" style="width: 900px; height: 500px; margin-bottom: -15%;"></div> -->
            <?php
            require('pages/conexao_banco.php');
            // $situacao = $_GET["fk_id_situacao"];
            $query = "SELECT SUM(Total_Geral) as Total FROM orcamento WHERE fk_id_situacao = 1";
            $busca = mysqli_query($link, $query);
            $total = mysqli_fetch_assoc($busca);
            ?>
            <!-- <p class="btn btn-success">R$ <?= $total['Total'] ?>,00</p> -->

            <form method="POST" id="form_receita" action="">

              <div class="form-group col-12">
                <div class="card-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                      <tr style="background-color: green;">
                        <th class="text-center">
                          <select name="ano_receita" class="form-control" id="options" style="width: 100%; font-weight: bold;">
                            <option class="text-bold" style="background-color: lightgoldenrodyellow;">ANO</option>
                            <?php
                            for ($anoreceita = 2040; $anoreceita > 2019; $anoreceita--) {
                              echo "<option value='$anoreceita' class='text-bold'>$anoreceita</option>";
                            }
                            ?>
                          </select>
                        </th>
                        <th class="text-center"><input type="submit" name="janeiro_rec" value="JAN" class="btn btn-white btn-sn text-bold" style="height: 55px; width: 55px; color: green; background-color: white;"></th>
                        <th class="text-center"><input type="submit" name="fevereiro_rec" value="FEV" class="btn btn-white btn-sn text-bold" style="height: 55px; width: 55px; color: green; background-color: white;"></th>
                        <th class="text-center"><input type="submit" name="marco_rec" value="MAR" class="btn btn-white btn-sn text-bold" style="height: 55px; width: 55px; color: green; background-color: white;"></th>
                        <th class="text-center"><input type="submit" name="abril_rec" value="ABR" class="btn btn-white btn-sn text-bold" style="height: 55px; width: 55px; color: green; background-color: white;"></th>
                        <th class="text-center"><input type="submit" name="maio_rec" value="MAI" class="btn btn-white btn-sn text-bold" style="height: 55px; width: 55px; color: green; background-color: white;"></th>
                        <th class="text-center"><input type="submit" name="junho_rec" value="JUN" class="btn btn-white btn-sn text-bold" style="height: 55px; width: 55px; color: green; background-color: white;"></th>
                        <th class="text-center"><input type="submit" name="julho_rec" value="JUL" class="btn btn-white btn-sn text-bold" style="height: 55px; width: 55px; color: green; background-color: white;"></th>
                        <th class="text-center"><input type="submit" name="agosto_rec" value="AGO" class="btn btn-white btn-sn text-bold" style="height: 55px; width: 55px; color: green; background-color: white;"></th>
                        <th class="text-center"><input type="submit" name="setembro_rec" value="SET" class="btn btn-white btn-sn text-bold" style="height: 55px; width: 55px; color: green; background-color: white;"></th>
                        <th class="text-center"><input type="submit" name="outubro_rec" value="OUT" class="btn btn-white btn-sn text-bold" style="height: 55px; width: 55px; color: green; background-color: white;"></th>
                        <th class="text-center"><input type="submit" name="novembro_rec" value="NOV" class="btn btn-white btn-sn text-bold" style="height: 55px; width: 55px; color: green; background-color: white;"></th>
                        <th class="text-center"><input type="submit" name="dezembro_rec" value="DEZ" class="btn btn-white btn-sn text-bold" style="height: 55px; width: 55px; color: green; background-color: white;"></th>
                        <th class="text-center"><input type="submit" name="limpar_rec" value="Limpar" class="btn btn-white btn-sn text-bold" style="height: 55px; color: green; background-color: white;"></th>
                      </tr>
                    </thead>
                  </table>
                </div>
                <!-- Main content -->
              </div>

              <div class="content-header">

                <div class="card-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th class="text-center" width="7%">ID</th>
                        <th class="text-center" width="20%">Situação</th>
                        <th class="text-center" width="30%">Data de Emissão</th>
                        <th class="text-center" width="20%">Total Geral</th>
                      </tr>
                    </thead>

                    <?php
                    require_once("busca_receita.php");
                    ?>

                  </table>
                </div>
              </div>
            </form>
          </div>

          <!-- Control Sidebar -->
          <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
          </aside>
          <!-- /.control-sidebar -->
      </div>


      <!-- ./wrapper -->
    <?php endif; ?>
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
        var recipientvalor = button.data('whatevervalor')
        var recipientdata = button.data('whateverdata')
        var recipientstatus = button.data('whateverstatus')
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('.modal-title').text('ID do Curso: ' + recipient)
        modal.find('#id').val(recipient)
        modal.find('#recipient-name').val(recipientnome)
        modal.find('#valor-text').val(recipientvalor)
        modal.find('#data-text').val(recipientdata)
        modal.find('#situacao-text').val(recipientstatus)
      })
    </script>

    <!-- Gráfico da Receita -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {
        packages: ["corechart"]
      });
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Situação', 'Quantidade'],
          ['Fechado', 5],
          ['Em Aberto', 8],
        ]);

        var options = {
          title: 'Orçamentos',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>

    <!-- Gráfico de Lucros -->
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
          ['Água', 11],
          ['Energia', 2],
          ['Peças', 2],
          ['Salários', 2],
          ['Internet', 7]
        ]);

        var options = {
          title: 'Gastos e Despesas',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
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

    <script>
      $(function() {
        'use strict'

        var ticksStyle = {
          fontColor: '#495057',
          fontStyle: 'bold'
        }

        var mode = 'index'
        var intersect = true

        var $salesChart = $('#sales-chart')
        var salesChart = new Chart($salesChart, {
          type: 'bar',
          data: {
            labels: ['JAN', 'TER', 'MAR', 'ABR', 'MAI', 'JUN', 'JUL', 'AGO', 'SET', 'OUT', 'NOV', 'DEZ'],
            datasets: [{
                backgroundColor: '#007bff',
                borderColor: '#007bff',
                data: [<?php
                        require('pages/conexao_banco.php');
                        $query = "SELECT * FROM orcamento WHERE fk_id_situacao = 1 AND Data_Emissao BETWEEN '$ano-$mes-$dia1' AND '$ano-$mes-$dia2'";
                        $busca = mysqli_query($link, $query);
                        $cont = 0;
                        while ($dados = mysqli_fetch_array($busca)) {
                          $cont++;
                        }
                        echo $cont;
                        ?>, 1000, 2000, 3000, 2500, 2700, 2500, 3000, 2500, 2700, 2500, 3000]
              },
              {
                backgroundColor: 'gold',
                borderColor: '#ced4da',
                data: [<?php
                        require('pages/conexao_banco.php');
                        $query = "SELECT * FROM orcamento";
                        $busca = mysqli_query($link, $query);
                        $cont = 0;
                        while ($dados = mysqli_fetch_array($busca)) {
                          $cont++;
                        }
                        echo $cont;
                        ?>, 700, 1700, 2700, 2000, 1800, 1500, 2000, 2500, 2700, 2500, 3000]
              }
            ]
          },
          options: {
            maintainAspectRatio: false,
            tooltips: {
              mode: mode,
              intersect: intersect
            },
            hover: {
              mode: mode,
              intersect: intersect
            },
            legend: {
              display: false
            },
            scales: {
              yAxes: [{
                // display: false,
                gridLines: {
                  display: true,
                  lineWidth: '4px',
                  color: 'rgba(0, 0, 0, .2)',
                  zeroLineColor: 'transparent'
                },
                ticks: $.extend({
                  beginAtZero: true,

                  // Include a dollar sign in the ticks
                  callback: function(value, index, values) {
                    // if (value >= 1000) {
                    //   value /= 1000
                    //   value += 'k'
                    // }
                    return 'R$ ' + value
                  }
                }, ticksStyle)
              }],
              xAxes: [{
                display: true,
                gridLines: {
                  display: true
                },
                ticks: ticksStyle
              }]
            }
          }
        })

        var $visitorsChart = $('#visitors-chart')
        var visitorsChart = new Chart($visitorsChart, {
          data: {
            labels: ['JAN', 'TER', 'MAR', 'ABR', 'MAI', 'JUN', 'JUL', 'AGO', 'SET', 'OUT', 'NOV', 'DEZ'],
            datasets: [{
                type: 'line',
                data: [1000, 1000, 2000, 3000, 2500, 2700, 2500, 3000, 2500, 2700, 2500, 3000],
                backgroundColor: 'transparent',
                borderColor: '#007bff',
                pointBorderColor: '#007bff',
                pointBackgroundColor: '#007bff',
                fill: false
                // pointHoverBackgroundColor: '#007bff',
                // pointHoverBorderColor    : '#007bff'
              },
              {
                type: 'line',
                data: [1000, 700, 1700, 2700, 2000, 1800, 1500, 2000, 2500, 2700, 2500, 3000],
                backgroundColor: 'tansparent',
                borderColor: '#ced4da',
                pointBorderColor: '#ced4da',
                pointBackgroundColor: '#ced4da',
                fill: false
                // pointHoverBackgroundColor: '#ced4da',
                // pointHoverBorderColor    : '#ced4da'
              }
            ]
          },
          options: {
            maintainAspectRatio: false,
            tooltips: {
              mode: mode,
              intersect: intersect
            },
            hover: {
              mode: mode,
              intersect: intersect
            },
            legend: {
              display: false
            },
            scales: {
              yAxes: [{
                // display: false,
                gridLines: {
                  display: true,
                  lineWidth: '4px',
                  color: 'rgba(0, 0, 0, .2)',
                  zeroLineColor: 'transparent'
                },
                ticks: $.extend({
                  beginAtZero: true,
                  suggestedMax: 200
                }, ticksStyle)
              }],
              xAxes: [{
                display: true,
                gridLines: {
                  display: false
                },
                ticks: ticksStyle
              }]
            }
          }
        })
      })

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
    <script>
      $(function() {
        /* ChartJS
         * -------
         * Here we will create a few charts using ChartJS
         */

        //--------------
        //- AREA CHART -
        //--------------

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
            data: [28, 48, 40, 19, 86, 27, 90, 40, 19, 86, 27, 200]
          }, {
            label: 'Receita',
            backgroundColor: 'limegreen',
            borderColor: 'rgba(210, 214, 222, 1)',
            pointRadius: false,
            pointColor: 'rgba(210, 214, 222, 1)',
            pointStrokeColor: '#c1c7d1',
            pointHighlightFill: '#fff',
            pointHighlightStroke: 'rgba(220,220,220,1)',
            data: [65, 59, 80, 81, 56, 55, 40, 40, 19, 86, 27, 90]
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
                display: false,
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

        //-------------
        //- DONUT CHART -
        //-------------
        // Get context with jQuery - using jQuery's .get() method.
        var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
        var donutData = {
          labels: [
            'Chrome',
            'IE',
            'FireFox',
            'Safari',
            'Opera',
            'Navigator',
          ],
          datasets: [{
            data: [700, 500, 400, 600, 300, 100],
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
</body>

</html>