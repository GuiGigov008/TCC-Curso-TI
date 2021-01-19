<?php
session_start();

if (isset($_SESSION["usuario"]) && is_array($_SESSION["usuario"])) {
  require("login/acoes/conexao.php");
  $adm = $_SESSION["usuario"][1];
  $nome = $_SESSION["usuario"][0];
} else {
  echo "<script>window.location = 'login/index.php'</script>";
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>FCA | Veículos</title>
  <link rel="icon" href="img/FCA_Logo.png" type="image/x-icon" sizes="16x16">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <script>
    function validarPlaca(entradaDoUsuario) {
      var Placa = entradaDoUsuario.value; // Passa para a variável 'Placa' o que o usuário digitar no formulário

      if (Placa.length === 1 || Placa.length === 2) { // Quando a string possuir 1 ou 2 dígitos
        PlacaMaiuscula = Placa.toUpperCase(); // Passa a string para letras maiúsculas
        document.forms[0].Placa.value = PlacaMaiuscula; // Coloca a string modificada de volta no formulário
        return true;
      }

      if (Placa.length === 3) { // Quando a string possuir 3 dígitos
        Placa += "-"; // Adiciona um hífen
        PlacaMaiuscula = Placa.toUpperCase(); // Passa a string para letras maiúsculas
        document.forms[0].Placa.value = PlacaMaiuscula; // Coloca a nova string de volta no formulário
        return true;
      }
    }
  </script>
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- Navbar -->
    <?php

    require('menu_forms.php');

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
        <div class="row">
          <div class="col-md-6">
            <h1>Veículos cadastrados</h1>
            <h4 style="margin-top: 5%; font-style: italic;">• Total de <?php
                                                                        require('conexao_banco.php');
                                                                        $query = "SELECT * FROM veiculos";
                                                                        $busca = mysqli_query($link, $query);
                                                                        $cont = 0;
                                                                        while ($dados = mysqli_fetch_array($busca)) {
                                                                          $cont++;
                                                                        }
                                                                        echo $cont;
                                                                        ?> veículos.</h4>
          </div>
          <div class="col-md-4">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Início</a></li>
              <li class="breadcrumb-item active">Tabelas</li>
            </ol>
          </div>
          <div class="col-md-2">
            <a href="relatorios/veiculos/veiculo.php" class="btn btn-outline-dark btn-sn" target="_blank"><span class="fas fa-newspaper"></span> Gerar Relatório</a>
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
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th class="text-center">Placa</th>
                      <th class="text-center">Modelo</th>
                      <th class="text-center">Marca</th>
                      <th class="text-center">Ano</th>
                      <th class="text-center">Cor</th>
                      <th class="text-center">Cliente</th>
                      <th></th>
                      <th></th>
                    </tr>
                  </thead>

                  <?php
                  if (isset($_SESSION['msg'])) {
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                  }
                  if (isset($_SESSION['msg_cad'])) {
                    echo $_SESSION['msg_cad'];
                    unset($_SESSION['msg_cad']);
                  }
                  if (isset($_SESSION['msg_edit'])) {
                    echo $_SESSION['msg_edit'];
                    unset($_SESSION['msg_edit']);
                  }
                  if (isset($_SESSION['msg_err'])) {
                    echo $_SESSION['msg_err'];
                    unset($_SESSION['msg_err']);
                  }

                  require('conexao_banco.php');

                  $query = "SELECT veiculos.Placa, veiculos.Modelo, veiculos.Marca, veiculos.Ano, veiculos.cor, clientes.Descricao_Cliente
                   AS cliente FROM veiculos INNER JOIN clientes ON veiculos.fk_id_cliente = clientes.Id_Cliente";
                  $busca = mysqli_query($link, $query);

                  while ($dados = mysqli_fetch_array($busca)) {
                    $placa = $dados['Placa'];

                  ?>

                    <tr>
                      <td class="text-center"> <?php echo $dados['Placa'] ?> </td>
                      <td class="text-center"> <?php echo $dados['Modelo'] ?> </td>
                      <td class="text-center"> <?php echo $dados['Marca'] ?> </td>
                      <td class="text-center"> <?php echo $dados['Ano'] ?> </td>
                      <td class="text-center"> <?php echo $dados['cor'] ?> </td>
                      <td class="text-center"> <?php echo $dados['cliente'] ?> </td>

                      <td>
                        <center>
                          <button class='btn btn-info btn-sn' data-toggle="modal" data-target="#exampleModal" data-whatever="<?php echo $dados['Placa']; ?>" data-whateverclientes="<?php echo $dados['Nome_Cliente']; ?>" data-whatevermarca="<?php echo $dados['Marca']; ?>" data-whatevercor="<?php echo $dados['Cor']; ?>" data-whateverano="<?php echo $dados['Ano']; ?>" data-whatevermodelo="<?php echo $dados['Modelo']; ?>">
                            <i class='fas fa-pencil-alt'>
                            </i>
                            Editar
                          </button>
                        </center>
                      </td>
                      <td>
                        <center>
                          <a class='btn btn-danger btn-sn' href="janela_modal/php/veiculo/delete_car.php?Placa=<?php echo $dados['Placa']; ?>" data-confirm='Tem certeza de que deseja excluir o item selecionado?'>
                            <i class='fas fa-trash'>
                            </i>
                            Excluir
                          </a>
                        </center>
                      </td>
                    </tr>

                  <?php
                  }
                  ?>

                  <div class="pull-right" style="margin-bottom: 1%;">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModalcad">Adicionar <i class="fas fa-plus"></i></button>
                  </div>
                  <!-- Inicio Modal -->
                  <div class="modal fade" id="myModalcad" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title text-center" id="myModalLabel">Cadastrando Veículo</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: red;"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                          <form method="POST" action="janela_modal/php/veiculo/cad_car.php" enctype="multipart/form-data">
                            <div class="container">

                              <div class="row">
                                <div class="form-group col-md-12" align='center'>
                                  <div class="icheck-success d-inline">
                                    <input type="radio" name="Radio_Cliente" value="Fisico" id="radioSuccess1">
                                    <label for="radioSuccess1">Cliente Físico
                                    </label>
                                  </div>
                                  <div class="icheck-success d-inline" style="margin-left: 50px;">
                                    <input type="radio" name="Radio_Cliente" value="Juridico" id="radioSuccess2">
                                    <label for="radioSuccess2">Cliente Jurídico
                                    </label>
                                  </div>
                                </div>
                              </div>

                              <div class="row">
                                <div class="form-group col-md-12">
                                  <label for="recipient-name" class="control-label">Tipo:</label>
                                  <select class="custom-select" name="Nome_Cliente" id="Clientes">
                                    <option selected>Selecione o Cliente</option>
                                    <option>-----</option>

                                    <?php
                                    require('conexao_banco.php');
                                    $query = "SELECT * FROM clientes WHERE Tipo_Cliente = '1'";
                                    $query2 = "SELECT * FROM clientes WHERE Tipo_Cliente = '2'";
                                    $busca = mysqli_query($link, $query);
                                    $busca2 = mysqli_query($link, $query2);

                                    //***************************
                                    //***** CLIENTE FISICO ******
                                    //***************************
                                    echo "<script> window.fisica = [];
                                    var tst = window.fisica; </script>";
                                    while ($dados = mysqli_fetch_array($busca)) {
                                      $id = $dados['Id_Cliente'];
                                      $nome = $dados['Descricao_Cliente'];
                                      echo " 
                                      <script>
                  
                                      tst.push('$id | $nome')

                                      </script>
                                      ";
                                    }
                                    echo "<script> window.newFisico = tst </script>";

                                    //***************************
                                    //***** CLIENTE JURIDICO ****
                                    //***************************
                                    echo "<script> window.juridica = [];
                                    var tst2 = window.juridica; </script>";
                                    while ($dados2 = mysqli_fetch_array($busca2)) {
                                      $id2 = $dados2['Id_Cliente'];
                                      $nome2 = $dados2['Descricao_Cliente'];
                                      echo " 
                                      <script>
                  
                                      tst2.push('$id2 | $nome2')

                                      </script>
                                      ";
                                    }
                                    echo "<script> window.newJuridico = tst2 </script>";
                                    ?>
                                  </select>
                                </div>
                              </div>

                              <div class="row">
                                <div class="form-group col-md-6">
                                  <label for="message-text" class="control-label">Placa:</label>
                                  <input type="text" name="Placa" onkeyup="validarPlaca(this)" class="form-control" maxlength="8" required="required" data-validation-required-message="Digite a placa do carro">
                                </div>
                                <div class="form-group col-md-6">
                                  <label for="recipient-name" class="control-label">Marca:</label>
                                  <select class="form-control" name="Marca">
                                    <option selected>Selecionar marca</option>
                                    <option>-----</option>
                                    <option value="Abarth">Abarth</option>
                                    <option value="Alfa Romeo">Alfa Romeo</option>
                                    <option value="Aston Martin">Aston Martin</option>
                                    <option value="Audi">Audi</option>
                                    <option value="Bentley">Bentley</option>
                                    <option value="BMW">BMW</option>
                                    <option value="Caterham">Caterham</option>
                                    <option value="Chevrolet">Chevrolet</option>
                                    <option value="Chrysler">Chrysler</option>
                                    <option value="Citroen">Citroen</option>
                                    <option value="Corvette">Corvette</option>
                                    <option value="Dacia">Dacia</option>
                                    <option value="Daewoo">Daewoo</option>
                                    <option value="Daihatsu">Daihatsu</option>
                                    <option value="Dodge">Dodge</option>
                                    <option value="DS">DS</option>
                                    <option value="Ferrari">Ferrari</option>
                                    <option value="Fiat">Fiat</option>
                                    <option value="Ford">Ford</option>
                                    <option value="Honda">Honda</option>
                                    <option value="Hummer">Hummer</option>
                                    <option value="Hyundai">Hyundai</option>
                                    <option value="Jaguar">Jaguar</option>
                                    <option value="Jeep">Jeep</option>
                                    <option value="Kia">Kia</option>
                                    <option value="Lada">Lada</option>
                                    <option value="Lamborghini">Lamborghini</option>
                                    <option value="Lancia">Lancia</option>
                                    <option value="Land Rover">Land Rover</option>
                                    <option value="Lexus">Lexus</option>
                                    <option value="Lotus">Lotus</option>
                                    <option value="Maserati">Maserati</option>
                                    <option value="Maybach">Maybach</option>
                                    <option value="Mazda">Mazda</option>
                                    <option value="Mercedes-Benz">Mercedes-Benz</option>
                                    <option value="MG">MG</option>
                                    <option value="MINI">MINI</option>
                                    <option value="Mitsubishi">Mitsubishi</option>
                                    <option value="Morgan">Morgan</option>
                                    <option value="Nissan">Nissan</option>
                                    <option value="Opel">Opel</option>
                                    <option value="Peugeot">Peugeot</option>
                                    <option value="Porsche">Porsche</option>
                                    <option value="Renault">Renault</option>
                                    <option value="Rolls-Royce">Rolls-Royce</option>
                                    <option value="Rover">Rover</option>
                                    <option value="Saab">Saab</option>
                                    <option value="Seat">Seat</option>
                                    <option value="Skoda">Skoda</option>
                                    <option value="Smart">Smart</option>
                                    <option value="SsangYong">SsangYong</option>
                                    <option value="Subaru">Subaru</option>
                                    <option value="Suzuki">Suzuki</option>
                                    <option value="Tata">Tata</option>
                                    <option value="Tesla">Tesla</option>
                                    <option value="Toyota">Toyota</option>
                                    <option value="Volkswagen">Volkswagen</option>
                                    <option value="Volvo">Volvo</option>
                                  </select>
                                </div>
                              </div>

                              <div class="row">
                                <div class="form-group col-md-6">
                                  <label for="message-text" class="control-label">Cor:</label>
                                  <input type="text" name="Cor" class="form-control" id="cor" required="required" data-validation-required-message="Digite a cor" />
                                </div>
                                <div class="form-group col-md-6">
                                  <label for="message-text" class="control-label">Ano:</label>
                                  <select class="custom-select" name="Ano">
                                    <option selected>Selecionar ano</option>
                                    <option>-----</option>
                                    <?php
                                    for ($ano = 2040; $ano > 1900; $ano--) {
                                      echo "<option value='$ano'>$ano</option>";
                                    }
                                    ?>
                                  </select>
                                </div>
                              </div>

                              <div class="row">
                                <div class="form-group col-md-12">
                                  <label for="message-text" class="control-label">Modelo:</label>
                                  <input type="text" name="Modelo" class="form-control" required="required" data-validation-required-message="Digite o Modelo" />
                                </div>
                              </div>

                              <div class="modal-footer">
                                <button type="reset" class="btn btn-danger">Limpar <i class="fas fa-backspace"></i></button>
                                <button type="submit" name="Enviar" value="Enviar" class="btn btn-success">Cadastrar <i class="fas fa-check"></i></button>
                              </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Fim Modal -->

                  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title" id="exampleModalLabel">Alterando Veículo</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: red;"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                          <form method="POST" action="janela_modal/php/veiculo/edit_car.php" enctype="multipart/form-data">
                            <div class="container">
                              <input name="Placa" type="hidden" id="id" class="form-control">

                              <div class="row">
                                <div class="form-group col-md-12" align='center'>
                                  <div class="icheck-success d-inline">
                                    <input type="radio" name="Radio_Cliente" value="Fisico" id="radioSuccess1">
                                    <label for="radioSuccess1">Cliente Físico
                                    </label>
                                  </div>
                                  <div class="icheck-success d-inline" style="margin-left: 50px;">
                                    <input type="radio" name="Radio_Cliente" value="Juridico" id="radioSuccess2">
                                    <label for="radioSuccess2">Cliente Jurídico
                                    </label>
                                  </div>
                                </div>
                              </div>

                              <div class="row">
                                <div class="form-group col-md-12">
                                  <label for="clientes" class="control-label">Tipo:</label>
                                  <select class="custom-select" name="Nome_Cliente" id="clientes">
                                    <option selected>Selecione o Cliente</option>
                                    <option>-----</option>

                                    <?php
                                    require('conexao_banco.php');
                                    $query = "SELECT * FROM clientes WHERE Tipo_Cliente = '1'";
                                    $query2 = "SELECT * FROM clientes WHERE Tipo_Cliente = '2'";
                                    $busca = mysqli_query($link, $query);
                                    $busca2 = mysqli_query($link, $query2);

                                    //***************************
                                    //***** CLIENTE FISICO ******
                                    //***************************
                                    echo "<script> window.fisica = [];
                                    var tst = window.fisica; </script>";
                                    while ($dados = mysqli_fetch_array($busca)) {
                                      $id = $dados['Id_Cliente'];
                                      $nome = $dados['Descricao_Cliente'];
                                      echo " 
                                      <script>
                  
                                      tst.push('$id | $nome')

                                      </script>
                                      ";
                                    }
                                    echo "<script> window.newFisico = tst </script>";

                                    //***************************
                                    //***** CLIENTE JURIDICO ****
                                    //***************************
                                    echo "<script> window.juridica = [];
                                    var tst2 = window.juridica; </script>";
                                    while ($dados2 = mysqli_fetch_array($busca2)) {
                                      $id2 = $dados2['Id_Cliente'];
                                      $nome2 = $dados2['Descricao_Cliente'];
                                      echo " 
                                      <script>
                  
                                      tst2.push('$id2 | $nome2')

                                      </script>
                                      ";
                                    }
                                    echo "<script> window.newJuridico = tst2 </script>";
                                    ?>
                                  </select>
                                </div>
                              </div>

                              <div class="row">
                                <div class="form-group col-md-6">
                                  <label for="placa" class="control-label">Placa:</label>
                                  <input type="text" name="Placa" id="placa" onkeyup="validarPlaca(this)" class="form-control" maxlength="8" required="required" data-validation-required-message="Digite a placa do carro">
                                </div>
                                <div class="form-group col-md-6">
                                  <label for="marca" class="control-label">Marca:</label>
                                  <select class="form-control" name="Marca" id="marca">
                                    <option selected>Selecionar marca</option>
                                    <option>-----</option>
                                    <option value="Abarth">Abarth</option>
                                    <option value="Alfa Romeo">Alfa Romeo</option>
                                    <option value="Aston Martin">Aston Martin</option>
                                    <option value="Audi">Audi</option>
                                    <option value="Bentley">Bentley</option>
                                    <option value="BMW">BMW</option>
                                    <option value="Caterham">Caterham</option>
                                    <option value="Chevrolet">Chevrolet</option>
                                    <option value="Chrysler">Chrysler</option>
                                    <option value="Citroen">Citroen</option>
                                    <option value="Corvette">Corvette</option>
                                    <option value="Dacia">Dacia</option>
                                    <option value="Daewoo">Daewoo</option>
                                    <option value="Daihatsu">Daihatsu</option>
                                    <option value="Dodge">Dodge</option>
                                    <option value="DS">DS</option>
                                    <option value="Ferrari">Ferrari</option>
                                    <option value="Fiat">Fiat</option>
                                    <option value="Ford">Ford</option>
                                    <option value="Honda">Honda</option>
                                    <option value="Hummer">Hummer</option>
                                    <option value="Hyundai">Hyundai</option>
                                    <option value="Jaguar">Jaguar</option>
                                    <option value="Jeep">Jeep</option>
                                    <option value="Kia">Kia</option>
                                    <option value="Lada">Lada</option>
                                    <option value="Lamborghini">Lamborghini</option>
                                    <option value="Lancia">Lancia</option>
                                    <option value="Land Rover">Land Rover</option>
                                    <option value="Lexus">Lexus</option>
                                    <option value="Lotus">Lotus</option>
                                    <option value="Maserati">Maserati</option>
                                    <option value="Maybach">Maybach</option>
                                    <option value="Mazda">Mazda</option>
                                    <option value="Mercedes-Benz">Mercedes-Benz</option>
                                    <option value="MG">MG</option>
                                    <option value="MINI">MINI</option>
                                    <option value="Mitsubishi">Mitsubishi</option>
                                    <option value="Morgan">Morgan</option>
                                    <option value="Nissan">Nissan</option>
                                    <option value="Opel">Opel</option>
                                    <option value="Peugeot">Peugeot</option>
                                    <option value="Porsche">Porsche</option>
                                    <option value="Renault">Renault</option>
                                    <option value="Rolls-Royce">Rolls-Royce</option>
                                    <option value="Rover">Rover</option>
                                    <option value="Saab">Saab</option>
                                    <option value="Seat">Seat</option>
                                    <option value="Skoda">Skoda</option>
                                    <option value="Smart">Smart</option>
                                    <option value="SsangYong">SsangYong</option>
                                    <option value="Subaru">Subaru</option>
                                    <option value="Suzuki">Suzuki</option>
                                    <option value="Tata">Tata</option>
                                    <option value="Tesla">Tesla</option>
                                    <option value="Toyota">Toyota</option>
                                    <option value="Volkswagen">Volkswagen</option>
                                    <option value="Volvo">Volvo</option>
                                  </select>
                                </div>
                              </div>

                              <div class="row">
                                <div class="form-group col-md-6">
                                  <label for="cor" class="control-label">Cor:</label>
                                  <input type="text" name="Cor" class="form-control" id="cor" required="required" data-validation-required-message="Digite a cor" />
                                </div>
                                <div class="form-group col-md-6">
                                  <label for="ano" class="control-label">Ano:</label>
                                  <select class="custom-select" name="Ano" id="ano">
                                    <option selected>Selecionar ano</option>
                                    <option>-----</option>
                                    <?php
                                    for ($ano = 2040; $ano > 1900; $ano--) {
                                      echo "<option value='$ano'>$ano</option>";
                                    }
                                    ?>
                                  </select>
                                </div>
                              </div>

                              <div class="row">
                                <div class="form-group col-md-12">
                                  <label for="modelo" class="control-label">Modelo:</label>
                                  <input type="text" name="Modelo" id="modelo" class="form-control" required="required" data-validation-required-message="Digite o Modelo" />
                                </div>
                              </div>

                              <div class="modal-footer">
                                <button type="reset" class="btn btn-danger">Limpar <i class="fas fa-backspace"></i></button>
                                <button type="submit" name="Enviar" value="Enviar" class="btn btn-success">Alterar <i class="fas fa-check"></i></button>
                              </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>

                </table>
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
  <script src="TipoCliente_script.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
  <script src="janela_modal/js_confirm/personalizado.js"></script>

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="janela_modal/style/js/bootstrap.min.js"></script>
  <script src="janela_modal/style/css/bootstrap.min.css"></script>
  <script type="text/javascript">
    $('#exampleModal').on('show.bs.modal', function(event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var recipient = button.data('whatever') // Extract info from data-* attributes
      var recipientclientes = button.data('whateverclientes')
      var recipientmarca = button.data('whatevermarca')
      var recipientcor = button.data('whatevercor')
      var recipientano = button.data('whateverano')
      var recipientmodelo = button.data('whatevermodelo')
      // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
      // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
      var modal = $(this)
      modal.find('.modal-title').text('Veículo Nº ' + recipient)
      modal.find('#placa').val(recipient)
      modal.find('#clientes').val(recipientclientes)
      modal.find('#marca').val(recipientmarca)
      modal.find('#cor').val(recipientcor)
      modal.find('#ano').val(recipientano)
      modal.find('#modelo').val(recipientmodelo)
    })
  </script>

  <!-- jQuery -->
  <script src="../plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- DataTables -->
  <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="../dist/js/demo.js"></script>
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