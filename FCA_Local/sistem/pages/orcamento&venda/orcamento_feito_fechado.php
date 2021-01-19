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
<?php
$connect = mysqli_connect("localhost", "root", "", "grems"); ?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Orçamento | Pronto</title>
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
  <div class="wrapper">
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
            <h1>Orçamento | Pronto</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Documento</a></li>
              <li class="breadcrumb-item active">Final</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <?php
      $id_orcamento = $_GET['Numero_Orcamento'];

      $query = "SELECT o.*, c.CPF_CNPJ,c.Endereco_Cliente, c.Email_Cliente, c.Celular_Cliente, c.Telefone_Cliente, v.Marca FROM orcamento AS o
      INNER JOIN clientes AS c ON c.Id_Cliente = o.fk_id_cliente INNER JOIN veiculos AS v ON v.Placa = o.Placa WHERE o.Numero_Orcamento = $id_orcamento";
      $result = mysqli_query($connect, $query);
      if (mysqli_num_rows($result) > 0) {
        while ($linha = mysqli_fetch_array($result)) {
          $id = $linha['Numero_Orcamento'];
          $data_emissao = $linha['Data_Emissao'];
          $date_format1 = date('d/m/Y', strtotime($data_emissao));
          $data_retorno = $linha['Data_Retorno'];
          $date_format2 = date('d/m/Y', strtotime($data_retorno));
          $cliente = $linha['Cliente'];
          $placa = $linha['Placa'];
          $modelo = $linha['Modelo'];
          $marca = $linha['Marca'];
          $tecnico = $linha['Tecnico'];
          $atendente = $linha['Atendente'];
          $descontos = $linha['Descontos'];
          $total_mestre = $linha['Total_Geral'];
          $total_produto = $linha['Produtos'];
          $valorDesconto = $total_produto * (floatval($descontos) / 100);
          $cod = $linha['CPF_CNPJ'];
          $endereco = $linha['Endereco_Cliente'];
          $email = $linha['Email_Cliente'];
          $celular = $linha['Celular_Cliente'];
          $telefone = $linha['Telefone_Cliente'];
          $observacao = $linha['Sugestao'];
        }
      }

      ?>

      <div class='container-fluid'>
        <div class='row'>
          <div class='col-12'>


            <!-- Main content -->
            <div class='invoice p-3 mb-3'>
              <!-- title row -->
              <div class='row'>
                <div class='col-12'>
                  <h4>
                    <img src='../img\FCA_Logo.png' alt='FCA Logo' title='FCA - Fluxo de Caixa Automotivo' style='height: 100px; width: 100px;'> FCA.
                    <small class='float-right' style='margin-right: 2%;'><b>Data:</b> <?php echo "$date_format1"; ?></small>
                    <small class='float-right' style='margin-right: 2%;'><b>Número Orçamento:</b> <?php echo "$id"; ?> </small>
                  </h4>

                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class='row invoice-info'>
                <div class='col-sm-3 invoice-col'>
                  <h4 style='font-weight: bold;'>Funcionários <span class='fas fa-users'></span></h4>
                  <address>

                    <b>Atendente: </b><?php echo "$atendente"; ?><br>
                    <b>Técnico: </b><?php echo "$tecnico"; ?><br><br>

                  </address>
                </div>
                <!-- /.col -->
                <div class='col-sm-3 invoice-col'>
                  <h4 style='font-weight: bold;'>Cliente <span class='fas fa-user'></span></h4>
                  <address>
                    <b>Nome:</b> <?php echo "$cliente"; ?><br>
                    <b>CPF/CNPJ:</b> <?php echo "$cod"; ?><br>
                    <b>Endereço:</b> <?php echo "$endereco"; ?><br>
                    <b>E-mail:</b> <?php echo "$email"; ?><br>
                    <b>Contato:</b> <?php echo "$celular / $telefone"; ?><br>
                  </address>

                </div>
                <!-- /.col -->
                <div class='col-sm-3 invoice-col'>
                  <h4 style='font-weight: bold;'>Veículo <span class='fas fa-car'></span></h4>
                  <p>
                    <b>Placa:</b> <?php echo "$placa"; ?><br>
                    <b>Marca:</b> <?php echo "$modelo"; ?><br>
                    <b>Modelo:</b> <?php echo "$marca"; ?>
                </div>
                <!-- /.col -->
                <div class='col-sm-3 invoice-col'>
                  <h4 style='font-weight: bold;'>Observação <span class='fas fa-comment'></span></h4>
                  <address>
                    <?php echo "$observacao"; ?><br>
                  </address>
                </div>
              </div>
              <!-- /.row -->


              <!-- /.invoice -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->

        <!-- Table row -->
        <div class='row'>
          <div class='col-12 table-responsive'>
            <table class='table table-striped'>
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Qtd</th>
                  <th>Produto</th>
                  <th>Valor da Unidade</th>
                  <th>SubTotal</th>

                </tr>
              </thead>
              <?php
              $query = "SELECT * FROM orcamento_detalhes WHERE FK_Detalhes = $id";
              $result = mysqli_query($connect, $query);
              if (mysqli_num_rows($result) > 0) {
                while ($linha = mysqli_fetch_array($result)) {
                  $id = $linha['ID'];
                  $produto = $linha['Produto'];
                  $quantidade = $linha['Quantidade'];
                  $valor = $linha['Valor_Unico'];
                  $subtotal = $linha['Sub_Total'];
                  echo "
                    <tbody>
                      <tr>
                        <td>$id</td>
                        <td>$quantidade</td>
                        <td>$produto</td>
                        <td>$valor</td>
                        <td>$subtotal</td>
                      </tr>
                    </tbody>
                     ";
                }
              } ?>

            </table>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->


        <div class='row'>
          <!-- accepted payments column -->
          <div class='col-6'>
            <p class='lead'>Formas de Pagamento:</p>
            <img src='../../dist/img/credit/visa.png' alt='Visa'>
            <img src='../../dist/img/credit/mastercard.png' alt='Mastercard'>
            <img src='../../dist/img/credit/american-express.png' alt='American Express'>
            <img src='../../dist/img/credit/paypal2.png' alt='Paypal'>


          </div>
          <!-- /.col -->
          <div class='col-6'>
            <p class='lead'>Retorno: <?php echo "$date_format2"; ?></p>

            <div class='table-responsive'>
              <table class='table'>
                <tr>
                  <th>Total bruto:</th>
                  <td>R$ <?php echo "$total_produto"; ?></td>
                </tr>
                <tr>
                  <th>Desconto:</th>
                  <td><?php echo "$descontos"; ?> %</td>
                </tr>
                <tr>
                  <th>Valor do desconto:</th>
                  <td>R$ <?php echo "$valorDesconto"; ?></td>
                </tr>
                <tr>
                  <th>Total descontado:</th>
                  <td>R$ <?php echo "$total_mestre"; ?></td>
                </tr>
              </table>
            </div>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- this row will not appear when printing -->
        <div class='row no-print' style="margin-bottom: 2%;">
          <div class='col-12'>

            <!-- Botão de fechar a ordem de serviço do orçamento -->
            <!-- <button type='button' class='btn btn-success float-right'><i class='fas fa-check'></i> Fechar Ordem
            </button> -->
            <a href='<?php echo "orcamento_imprimir.php?Numero_Orcamento=$id_orcamento"; ?>' target='_blank' class='btn btn-primary float-right' style="margin-right: 1%;">
              <i class='fas fa-print'></i> Imprimir</a>

          </div>
        </div>
      </div>


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer no-print">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.0.5
    </div>
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
    reserved.<br>
    <strong>Copyright &copy; Projeto desenvolvido pela <a href="https://grems.azurewebsites.net/">GREMS</a>.</strong> Todos os direitos reservados.
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
  <!-- AdminLTE App -->
  <script src="../../dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="../../dist/js/demo.js"></script>
</body>

</html>