<?php
session_start();

if (isset($_SESSION["usuario"]) && is_array($_SESSION["usuario"])) {
  require("../login/acoes/conexao.php");
  $adm = $_SESSION["usuario"][1];
  $nome = $_SESSION["usuario"][0];
} else {
  echo "<script>window.location = '../login/index.php'</script>";
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Orçamentos | Em Aberto</title>
  <link rel="icon" href="../img/FCA_Logo.png" type="image/x-icon" sizes="16x16">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini">
  <div class=" wrapper">
    <!-- Navbar -->
    <?php

    require('menu_orcamento.php');

    ?>

    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Orçamentos: <label style="color: red;">Em Aberto</label>
              <!-- <div style="background-color: orange; height: 20px; width: 20px; border-radius: 100%;"></div> -->
            </h1>
            <h4 style="margin-top: 5%; font-style: italic;">• Total de <?php
                                                                        require('../conexao_banco.php');
                                                                        $query = "SELECT * FROM orcamento WHERE fk_id_situacao = 4";
                                                                        $busca = mysqli_query($link, $query);
                                                                        $cont = 0;
                                                                        while ($dados = mysqli_fetch_array($busca)) {
                                                                          $cont++;
                                                                        }
                                                                        echo $cont;
                                                                        ?> em aberto.</h4>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Início</a></li>
              <li class="breadcrumb-item active">Tabelas</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">

              <!-- /.card-header -->
              <div class="card-body">
                <form class="form-group" id="formulario" method="POST">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th class="text-center" width="5%">Código identificador</th>
                        <th class="text-center" width="10%">Data da Emissão</th>
                        <th class="text-center" width="25%">Cliente</th>
                        <th class="text-center" width="10%">Valor Final</th>
                        <th class="text-center" width="10%">Situação</th>
                        <th class="text-center" width="5%">Vizualizar Orçamento</th>
                        <th class="text-center" width="5%">Fechar orçamento?</th>
                      </tr>
                    </thead>

                    <?php
                    require('../conexao_banco.php');

                    // $query = "SELECT * FROM orcamento ORDER BY Numero_Orcamento ASC";
                    $query = "SELECT * FROM orcamento WHERE fk_id_situacao = '4'";
                    $busca = mysqli_query($link, $query);

                    while ($dados = mysqli_fetch_array($busca)) {
                      $id = $dados['Numero_Orcamento'];
                      $data = $dados['Data_Emissao'];
                      $date_format = date('d/m/Y', strtotime($data));
                      $cliente = $dados['Cliente'];
                      $status = $dados['fk_id_situacao'];
                      if ($dados['fk_id_situacao']) {
                        $tipo = "Em aberto";
                      }

                      // if ($dados['fk_id_situacao'] == 2) {
                      //   $tipo = "Não Pago";
                      // } 
                      // if ($dados['fk_id_situacao'] == 3) {
                      //   $tipo = "Não Realizado";
                      // } 

                      // if ($dados['fk_id_situacao'] == 4) {
                      //   $tipo = "Em andamento";
                      // }

                      echo "
                      <tr>
                        <td class='text-center'>" . $dados['Numero_Orcamento'] . "</td>
                        <td class='text-center'>" . $date_format . "</td>
                        <td class='text-center'>" . $dados['Cliente'] . "</td>
                        <td class='text-center'>R$ " . $dados['Total_Geral'] . ",00</td>
                        <td class='text-center'>" . $tipo . "</td>
                          
                        <td>
                          <center>
                            <a class='btn btn-danger btn-sn' href='orcamento_feito_aberto.php?Numero_Orcamento=$id'>
                                <i class='fas fa-eye'>
                                </i>
                                Detalhes
                            </a>
                          </center>
                        </td>

                        <td>  
                          <center>
                            <div class='col-12'>
                              <button type='submit' name='Enviar' value='Enviar' class='btn btn-success btn-sn float-right'>Sim <span class='fas fa-check'></span></button>
                            </div>
                          </center>
                        </td>

                        </tr>
                      
		                ";
                    }

                    ?>

                    <?php
                    // ENVIANDO DADOS PARA FAZER ORCAMENTO 
                    if (isset($_POST['Enviar'])) {

                      //Mudança situação para FECHADO
                      $sqlinsert = "UPDATE orcamento SET fk_id_situacao = '1' WHERE Numero_Orcamento = '$id'";

                      mysqli_query($link, $sqlinsert) or die("Erro no situação!");
                      $id_orcamento = mysqli_insert_id($link);

                      echo "<script> alert('Orçamento fechado!') </script>
                        <meta http-equiv='refresh' content=0.1;url='registro_orcamento_fechado.php'>";
                    }

                    ?>

                  </table>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.0.5
    </div>
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io" target="_blank">AdminLTE.io</a>.</strong> All rights
    reserved.
    <strong>Copyright &copy; Projeto desenvolvido pela <a href="https://grems.azurewebsites.net/" target="_blank">GREMS</a>.</strong> Todos os direitos reservados.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="../../plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- DataTables -->
  <script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../../dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="../../dist/js/demo.js"></script>
  <!-- page script -->
  <script>
    $(function() {
      $("#example1").DataTable({
        "responsive": true,
        "autoWidth": false,
      });
      $('#example2').DataTable({
        "paging": false,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": false,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
</body>

</html>