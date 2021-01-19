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
$connect = mysqli_connect("localhost", "root", "", "grems");

$todos_items = array();

if (isset($_POST["add_to_cart"])) {
  if (isset($_SESSION["shopping_cart"])) {
    $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
    if (!in_array($_GET["id"], $item_array_id)) {
      $count = count($_SESSION["shopping_cart"]);
      $item_array = array(
        'item_id'     =>  $_GET["id"],
        'item_name'     =>  $_POST["hidden_name"],
        'item_price'    =>  $_POST["hidden_price"],
        'item_quantity'   =>  $_POST["quantity"]
      );
      $_SESSION["shopping_cart"][$count] = $item_array;
    } else {
      echo "<script>alert('Este item já foi adicionado.')</script>";
    }
  } else {
    $item_array = array(
      'item_id'     =>  $_GET["id"],
      'item_name'     =>  $_POST["hidden_name"],
      'item_price'    =>  $_POST["hidden_price"],
      'item_quantity'   =>  $_POST["quantity"]
    );

    $_SESSION["shopping_cart"][0] = $item_array;
  }
}

if (isset($_GET["action"])) {
  if ($_GET["action"] == "delete") {
    foreach ($_SESSION["shopping_cart"] as $keys => $values) {
      if ($values["item_id"] == $_GET["id"]) {
        unset($_SESSION["shopping_cart"][$keys]);
        echo "<script>alert('Item removido.')</script>";
      }
    }
  }
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Orçamento | FCA</title>
  <link rel="icon" href="../img/FCA_Logo.png" type="image/x-icon" sizes="16x16">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="../../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</head>

<body class="hold-transition sidebar-mini" style="font-family: 'Source Sans Pro', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol';">
  <script type='text/javascript'>
    $(document).ready(function() {
      $("select[name='Placa']").blur(function() {
        var $Carro2 = $("input[name='Modelo']");
        var $valor = $("input[name='fk_id_cliente']");
        var $valor2 = $("input[name='fk_nome_cliente']");
        $.getJSON('function.php', {
          Placa: $(this).val()
        }, function(json) {
          $Carro2.val(json.Modelo);
          $valor.val(json.fk_id_cliente);
          $valor2.val(json.fk_nome_cliente);
        });
      });
    });
  </script>
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
            <h1 style="font-weight: bold;">Orçamento</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#" style="text-decoration: none;">Início</a></li>
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

              <!-- card corpo pricipal -->
              <div class="card-body">

                <h2>Quais serão os produtos necessários?
                  <div style="float: right;">
                    Hoje: <?php setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
                          date_default_timezone_set('America/Sao_Paulo');
                          echo strftime('%d de %B de %Y', strtotime('today')); ?>
                  </div>
                </h2>
                <div class="row" style="margin-bottom: 2%;">
                  <p>
                    <div class="col-md-1" style='background: #1E90FF; width: 100px; height: 40px; border-radius: 100px;'>
                      <div>
                        <h4 class='text-white' style='text-align: center; line-height: 150%;'>Peça</h4>
                      </div>
                    </div>
                  </p>
                  <p>
                    <div class="col-md-1" style='background: #708090; width: 100px; height: 40px; border-radius: 100px;'>
                      <div>
                        <h4 class='text-white' style='text-align: center; line-height: 150%;'>Serviço</h4>
                      </div>
                    </div>
                  </p>
                </div>

                <div class="row">

                  <?php

                  $query = "SELECT produtos.Id_Produto , produtos.Descricao_Produto, produtos.Preco_Produto, produtos.Tipo_Produto, fornecedores.Descricao_Fornecedor 
                  AS fornecedores FROM produtos INNER JOIN fornecedores ON produtos.fk_id_forn = fornecedores.Id_Fornecedor ORDER BY Id_Produto ASC";

                  $result = mysqli_query($connect, $query);
                  if (mysqli_num_rows($result) > 0) {
                    while ($linha = mysqli_fetch_array($result)) {
                      $id = $linha['Id_Produto'];
                      $nome = $linha['Descricao_Produto'];
                      $id_forn = $linha['fornecedores'];
                      $tipo = $linha['Tipo_Produto'];
                      $preco = $linha['Preco_Produto'];
                      $quantidade = $linha['Id_Produto'];

                      if ($tipo == "Peca") {
                        echo "<div class='form-group col-md-3'>
                        <form id='form' method='post' action='orcamento.php?action=add&id=$id'>
                          <div class='card' style='background: #1E90FF; border-radius: 5%;'>
                            <div class='card-body'>
                              <div class='card text-center' style='border-radius: 5%;'>
                                <h4 class='text-primary'>$nome</h4>
                                <h4 class='text'>$id_forn</h4>
                                <h4 class='text-danger'>R$ $preco</h4>
                                <center><input type='number' name='quantity' min='1' value='1' class='form-control col-3' style='text-align: center;' /></center>
                                <input type='hidden' name='hidden_name' value='$nome' />
                                <input type='hidden' name='hidden_price' value='$preco' />
                                <input type='submit' name='add_to_cart' style='margin-top:5px; font-size: 150%;' class='btn btn-success' value='Adicionar' />
                              </div>
                            </div>
                          </div>
                        </form>
                      </div>";
                      } else {
                        echo "<div class='form-group col-md-3'>

                        <form id='form' method='post' action='orcamento.php?action=add&id=$id'>
                          <div class='card' style='background: #708090; border-radius: 5%;'>
                            <div class='card-body'>
                              <div class='card text-center' style='border-radius: 5%;'>
                                <h4 class='text' style='color: #708090;'>$nome</h4>
                                <h4 class='text'>$id_forn</h4>
                                <h4 class='text-danger'>R$ $preco</h4>
                                <center><input type='number' name='quantity' min='1' value='1' class='form-control col-3' style='text-align: center;' readonly='true' /></center>
                                <input type='hidden' name='hidden_name' value='$nome' />
                                <input type='hidden' name='hidden_price' value='$preco' />
                                <input type='submit' name='add_to_cart' style='margin-top:5px; font-size: 150%;' class='btn btn-success' value='Adicionar' />
                              </div>
                            </div>
                          </div>
                        </form>
                      </div>";
                      }
                    }
                  }

                  ?>

                </div>

                <form class="form-group" id="formulario" method="POST">
                  <h3 class="col-md-12">Dados do Orçamento</h3>
                  <div class="modal-body" style="font-size: larger;">
                    <div class="row">
                      <div class="form-group col-md-6">
                        <label>Data da Emissão</label>
                        <input name="Data_Emissao" value="<?php setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
                                                          date_default_timezone_set('America/Sao_Paulo');
                                                          echo strftime('%d/%m/%Y', strtotime('today')); ?>" class="form-control" style="width: 100%; font-size:large;" readonly="true">
                      </div>
                      <div class="form-group col-md-6" style="float: right;">
                        <label>Data de Retorno</label>
                        <input type="date" name="Data_Retorno" class="form-control" style="width: 100%; font-size:large;">
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-4">
                        <label>Placa</label>
                        <select type="text" name="Placa" class="form-control" style="width: 100%; font-size:large;" placeholder="">
                          <option> Placa </option>
                          <option> - - - - - </option>
                          <?php

                          require("../conexao_banco.php");

                          $query = "SELECT * FROM veiculos ORDER BY Placa ASC";
                          $busca = mysqli_query($link, $query);

                          while ($dados = mysqli_fetch_array($busca)) {
                            $placa = $dados['Placa'];
                            echo " 
                                  <option> $placa </option>";
                          }
                          ?>
                        </select>
                      </div>
                      <div class="form-group col-md-2">
                        <label>Modelo</label>
                        <input type="text" class="form-control" name="Modelo" readonly="true" style="background-color: #FFFFFF; font-size:large;" />
                      </div>
                      <div class="form-group col-md-2">
                        <label>ID</label>
                        <input type="text" class="form-control" name="fk_id_cliente" readonly="true" style="background-color: #FFFFFF; font-size:large;" />
                      </div>
                      <div class="form-group col-md-4" style="float: right;">
                        <label>Cliente</label>
                        <input type="text" class="form-control" name="fk_nome_cliente" readonly="true" style="background-color: #FFFFFF; font-size:large;" />
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <label>Atendente</label>
                        <select type="text" name="Atendente" class="form-control select2bs4" style="width: 100%; font-size:large;" placeholder="">
                          <option> Nome </option>
                          <option> - - - - - </option>
                          <?php

                          require('../conexao_banco.php');

                          $query = "SELECT * FROM funcionarios WHERE Cargo_Func = 1";
                          $busca = mysqli_query($link, $query);

                          while ($dados = mysqli_fetch_array($busca)) {
                            $nome = $dados['Nome_Func'];
                            echo " 
                                  <option> $nome </option>";
                          }
                          ?>
                        </select>
                      </div>
                      <div class='col-md-6'>
                        <label>Técnico</label>
                        <select type="text" name="Tecnico" class="form-control select2bs4" style="width: 100%; font-size:large;" placeholder="">
                          <option> Nome </option>
                          <option> - - - - - </option>
                          <?php

                          require("../conexao_banco.php");

                          $query = "SELECT * FROM funcionarios WHERE Cargo_Func = 2";
                          $busca = mysqli_query($link, $query);

                          while ($dados = mysqli_fetch_array($busca)) {
                            $nome = $dados['Nome_Func'];
                            echo " 
                                  <option> $nome </option>";
                          }
                          ?>
                        </select>
                      </div>
                    </div>

                    <!-- <div style="clear:both"></div> -->

                    <h3 style="margin-top: 2%;">Revisão de itens</h3>
                    <div class="table-responsive">
                      <table id="revisao" class="table table-bordered">
                        <tr>
                          <th width="35%">Produto</th>
                          <th width="10%">Quantidade</th>
                          <th width="20%">Valor por Unidade</th>
                          <th width="15%">Subtotal</th>
                          <th width="10%">Ação</th>
                        </tr>
                        <?php
                        if (!empty($_SESSION["shopping_cart"])) {
                          $total = 0;
                          foreach ($_SESSION["shopping_cart"] as $keys => $values) {
                        ?>

                            <tr>
                              <td><input type="text" name="nome_produto" readonly="true" value="<?php echo $values['item_name']; ?>"></td>
                              <td><input type="text" name="quantidade_produto" readonly="true" value="<?php echo $values['item_quantity']; ?>"></td>
                              <td><input type="text" name="preco_produto" readonly="true" value="R$ <?php echo $values['item_price']; ?>"></td>
                              <td><input type="text" name="subtotal_produto" readonly="true" value="R$ <?php echo number_format($values['item_quantity'] * $values['item_price'], 2); ?>"></td>
                              <td><a style="text-decoration-line: none;" href="orcamento.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="btn btn-outline-danger btn-sn float-right">Remover <span class="fas fa-trash"></span></span></a></td>
                            </tr>
                          <?php
                            $total = $total + ($values["item_quantity"] * $values["item_price"]);
                          }

                          ?>
                          <tr>
                            <td colspan="3" align="right"><b>Total</b></td>
                            <td align="left"><input type="" name="Total" readonly="true" value="R$ <?php echo number_format($total, 2); ?>"></td>
                            <td></td>
                          </tr>
                          <tr>
                            <td colspan="3" align="left"><textarea class="w-100" type="text" name='Sugestao' placeholder="Observação..."></textarea></td>
                            <td><label><input type="number" name="Descontos" min="0" max="100" value="0" size="3" /> %</label></td>
                            <td></td>
                          </tr>
                      </table>


                      <div class="col-12">
                        <button type="submit" name="Enviar" value="Enviar" class="btn btn-outline-success btn-sn float-right">Confirmar <span class="fas fa-check"></span></button>
                      </div>
                    </div>
                    <!-- </div> -->

                  <?php
                        }
                  ?>

                  <?php
                  // ENVIANDO DADOS PARA FAZER ORCAMENTO 
                  if (isset($_POST['Enviar'])) {
                    //recebendos os valores do form
                    //-----------------
                    // ORCAMENTO MESTRE
                    //-----------------
                    $data_retorno = $_POST['Data_Retorno'];
                    $placa = $_POST['Placa'];
                    $modelo = $_POST['Modelo'];
                    $id_cliente = $_POST['fk_id_cliente'];
                    $cliente = $_POST['fk_nome_cliente'];
                    $atendente = $_POST['Atendente'];
                    $tecnico = $_POST['Tecnico'];
                    $produtos_mestre = $total;
                    $descontos = $_POST['Descontos'];
                    // $subtotal_geral = $_POST['Total'];
                    $sugestao = $_POST['Sugestao'];
                    //CALCULO DE DESCONTO
                    $total_mestre = floatval($total) - (floatval($total) * (floatval($descontos) / 100));

                    //-----------------
                    //ORCAMENTO DETALHES
                    //-----------------
                    $item = $id;
                    $produto_detalhes = $_POST['nome_produto'];
                    $quantidade_detalhes = $_POST['quantidade_produto'];
                    $valor_unico = $_POST['preco_produto'];
                    $sub_total = $_POST['subtotal_produto'];

                    //conexao banco 
                    require('../conexao_banco.php');

                    //ENVIAR DADOS | MESTRE
                    $sqlinsert_MESTRE = "INSERT INTO orcamento(Numero_Orcamento, Data_Retorno, Cliente, Placa, Modelo, Tecnico, Atendente, Produtos, Descontos, Total_Geral, Sugestao, fk_id_cliente, fk_id_situacao, Data_Emissao) VALUES (default, '$data_retorno', '$cliente', '$placa', '$modelo', '$tecnico', 
                        '$atendente', '$produtos_mestre', '$descontos', '$total_mestre', '$sugestao', '$id_cliente', '4', default)";

                    mysqli_query($link, $sqlinsert_MESTRE) or die("Erro nos dados!");
                    $id_orcamento = mysqli_insert_id($link);

                    //ENVIAR DADOS | DETALHES

                    foreach ($_SESSION["shopping_cart"] as $keys => $values) {

                      $itemName = $values['item_name'];
                      $itemQuantity = $values['item_quantity'];
                      $itemPrice = $values['item_price'];
                      $itemSubTotal = number_format($values['item_quantity'] * $values['item_price'], 2);

                      $sqlinsert_DETALHES = "INSERT INTO orcamento_detalhes(ID, FK_Detalhes, Produto, Quantidade, Valor_Unico, Sub_Total) VALUES (default, '$id_orcamento', '$itemName', '$itemQuantity', '$itemPrice', '$itemSubTotal')";

                      mysqli_query($link, $sqlinsert_DETALHES) or die("Erro nos produtos!");
                    }

                    echo "<script> alert('Orçamento feito!') </script>
                        <meta http-equiv='refresh' content=0.1;url='orcamento_feito_aberto.php?Numero_Orcamento=$id_orcamento'>";

                    unset($_SESSION["shopping_cart"]);
                  }

                  ?>

                </form>

              </div>
              <!-- </div>
          </div>
        </div>
      </div> -->
              <!-- Fechando o card corpo pricipal -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.0.5
    </div>
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io" target="_blank">AdminLTE.io</a>.</strong> All rights
    reserved.<br>
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
  <!-- <script src="./index.js"></script> -->

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

  <script src="./limpar.js"></script>


  <!-- page script -->
  <!-- <script>
    $(function() {
      $("#example1").DataTable({
        "responsive": true,
        "autoWidth": false,
      });
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": false,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script> -->
  <!-- <script>
    function mascaraData(campo, e) {
      var kC = (document.all) ? event.keyCode : e.keyCode;
      var data = campo.value;

      if (kC != 8 && kC != 46) {
        if (data.length == 2) {
          campo.value = data += '/';
        } else if (data.length == 5) {
          campo.value = data += '/';
        } else
          campo.value = data;
      }
    }
  </script> -->
</body>

</html>