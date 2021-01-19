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
  <title>FCA | Clientes</title>
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


  <!-- Add Javascript -->
  <script type="text/javascript">
    function limpar() {
      //Limpa valores do formulário de cep.
      document.getElementById('Rua_Cliente').value = ("");
      document.getElementById('Bairro_Cliente').value = ("");
      document.getElementById('Cidade_Cliente').value = ("");
      document.getElementById('Estado_Cliente').value = ("");
    }

    function meu_callback(conteudo) {
      if (!("erro" in conteudo)) {
        //Atualiza os campos com os valores.
        document.getElementById('rua').value = (conteudo.logradouro);
        document.getElementById('bairro').value = (conteudo.bairro);
        document.getElementById('cidade').value = (conteudo.localidade);
        document.getElementById('uf').value = (conteudo.uf);
      } //end if.
      else {
        //CEP não Encontrado.
        limpar();
        alert("CEP não encontrado.");
      }
    }

    function cep(valor) {

      //Nova variável "cep" somente com dígitos.
      var cep = valor.replace(/\D/g, '');

      //Verifica se campo cep possui valor informado.
      if (cep != "") {

        //Expressão regular para validar o CEP.
        var validacep = /^[0-9]{8}$/;

        //Valida o formato do CEP.
        if (validacep.test(cep)) {

          //Preenche os campos com "..." enquanto consulta webservice.
          document.getElementById('rua').value = "...";
          document.getElementById('bairro').value = "...";
          document.getElementById('cidade').value = "...";
          document.getElementById('uf').value = "...";

          //Cria um elemento javascript.
          var script = document.createElement('script');

          //Sincroniza com o callback.
          script.src = 'https://viacep.com.br/ws/' + cep + '/json/?callback=meu_callback';

          //Insere script no documento e carrega o conteúdo.
          document.body.appendChild(script);

        } //end if.
        else {
          //cep é inválido.
          limpar();
          alert("Formato de CEP inválido.");
        }
      } //end if.
      else {
        //cep sem valor, limpa formulário.
        limpar();
      }
    };

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
</head>

<body class="hold-transition sidebar-mini">
  <div class=" wrapper">
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
            <h1>Clientes cadastrados</h1>
            <h4 style="margin-top: 5%; font-style: italic;">• Total de <?php
                                                                        require('conexao_banco.php');
                                                                        $query = "SELECT * FROM clientes";
                                                                        $busca = mysqli_query($link, $query);
                                                                        $cont = 0;
                                                                        while ($dados = mysqli_fetch_array($busca)) {
                                                                          $cont++;
                                                                        }
                                                                        echo $cont;
                                                                        ?> clientes.</h4>
          </div>
          <div class="col-md-4">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Início</a></li>
              <li class="breadcrumb-item active">Tabelas</li>
            </ol>
          </div>
          <div class="col-md-2">
            <a href="relatorios/cliente/cliente.php" class="btn btn-outline-dark btn-sn" target="_blank"><span class="fas fa-newspaper"></span> Gerar Relatório</a>
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
                      <th class="text-center">ID</th>
                      <th class="text-center">Tipo</th>
                      <th class="text-center">Nome</th>
                      <th class="text-center">CPF/CNPJ</th>
                      <th class="text-center">RG/IE</th>
                      <th></th>
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

                  $query = "SELECT * FROM clientes ORDER BY Id_Cliente ASC";
                  $busca = mysqli_query($link, $query);

                  while ($dados = mysqli_fetch_array($busca)) {
                    $id = $dados['Id_Cliente'];
                    if ($dados['Tipo_Cliente'] == 1) {
                      $tipo = "Físico";
                    } else {
                      $tipo = "Jurídico";
                    }
                  ?>

                    <tr>
                      <td class="text-center"> <?php echo $dados['Id_Cliente']; ?> </td>
                      <td class="text-center"> <?php echo $tipo; ?> </td>
                      <td class="text-center"> <?php echo $dados['Descricao_Cliente']; ?> </td>
                      <td class="text-center"> <?php echo $dados['CPF_CNPJ']; ?> </td>
                      <td class="text-center"> <?php echo $dados['RG_IE']; ?> </td>

                      <td>
                        <center>
                          <a class='btn btn-warning btn-sn' data-toggle="modal" data-target="#myModal<?php echo $dados['Id_Cliente']; ?>">
                            <i class='fas fa-eye'>
                            </i>
                            Detalhes
                          </a>
                        </center>
                      </td>
                      <td>
                        <center>
                          <button class='btn btn-info btn-sn' data-toggle="modal" data-target="#exampleModal" data-whatever="<?php echo $dados['Id_Cliente']; ?>" data-whatevertipo="<?php echo $dados['Tipo_Cliente']; ?>" data-whateverdescricao="<?php echo $dados['Descricao_Cliente']; ?>" data-whatevercod="<?php echo $dados['CPF_CNPJ']; ?>" data-whatevercod2="<?php echo $dados['RG_IE']; ?>" data-whatevercep="<?php echo $dados['Cep_Cliente']; ?>" data-whateverendereco="<?php echo $dados['Endereco_Cliente']; ?>" data-whateverbairro="<?php echo $dados['Bairro_Cliente']; ?>" data-whatevercidade="<?php echo $dados['Cidade_Cliente']; ?>" data-whateverestado="<?php echo $dados['Estado_Cliente']; ?>" data-whatevernumero="<?php echo $dados['Numero_Cliente']; ?>" data-whatevercelular="<?php echo $dados['Celular_Cliente']; ?>" data-whatevertelefone="<?php echo $dados['Telefone_Cliente']; ?>" data-whateveremail="<?php echo $dados['Email_Cliente']; ?>">
                            <i class='fas fa-pencil-alt'>
                            </i>
                            Editar
                          </button>
                        </center>
                      <td>
                        <center>
                          <a class='btn btn-danger btn-sn' href="janela_modal/php/cliente/delete_cli.php?Id_Cliente=<?php echo $dados['Id_Cliente']; ?>" data-confirm='Tem certeza de que deseja excluir o item selecionado?'>
                            <i class='fas fa-trash'>
                            </i>
                            Excluir
                          </a>
                        </center>
                      </td>
                    </tr>

                    <!-- Inicio Modal -->
                    <div class="modal fade" id="myModal<?php echo $dados['Id_Cliente']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title text-bold" id="myModalLabel"><?php echo $dados['Descricao_Cliente']; ?></h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: red;"><span aria-hidden="true">&times;</span></button>
                          </div>
                          <div class="modal-body">
                            <div class="container">
                              <div class="row">
                                <div class="form-group col-md-6">
                                  <p><span style="font-weight: bold;">ID: </span><?php echo $dados['Id_Cliente']; ?></p>
                                </div>
                                <div class="form-group col-md-6">
                                  <p><span style="font-weight: bold;">Tipo: </span><?php echo $tipo; ?></p>
                                </div>
                              </div>

                              <div class="row">
                                <div class="form-group col-md-6">
                                  <p><span style="font-weight: bold;">Nome: </span><?php echo $dados['Descricao_Cliente']; ?></p>
                                </div>
                                <div class="form-group col-md-6">
                                  <p><span style="font-weight: bold;">CPF/CNPJ: </span><?php echo $dados['CPF_CNPJ']; ?></p>
                                </div>
                              </div>

                              <div class="row">
                                <div class="form-group col-md-6">
                                  <p><span style="font-weight: bold;">RG/IE: </span><?php echo $dados['RG_IE']; ?></p>
                                </div>
                                <div class="form-group col-md-6">
                                  <p><span style="font-weight: bold;">CEP: </span><?php echo $dados['Cep_Cliente']; ?> </p>
                                </div>
                              </div>

                              <div class="row">
                                <div class="form-group col-md-6">
                                  <p><span style="font-weight: bold;">Endereço: </span><?php echo $dados['Endereco_Cliente']; ?> </p>
                                </div>
                                <div class="form-group col-md-6">
                                  <p><span style="font-weight: bold;">Bairro: </span><?php echo $dados['Bairro_Cliente']; ?> </p>
                                </div>
                              </div>

                              <div class="row">
                                <div class="form-group col-md-6">
                                  <p><span style="font-weight: bold;">Cidade: </span><?php echo $dados['Cidade_Cliente']; ?> </p>
                                </div>
                                <div class="form-group col-md-6">
                                  <p><span style="font-weight: bold;">Estado: </span><?php echo $dados['Estado_Cliente']; ?> </p>
                                </div>
                              </div>

                              <div class="row">
                                <div class="form-group col-md-6">
                                  <p><span style="font-weight: bold;">Nº: </span><?php echo $dados['Numero_Cliente']; ?> </p>
                                </div>
                                <div class="form-group col-md-6">
                                  <p><span style="font-weight: bold;">Celular: </span><?php echo $dados['Celular_Cliente']; ?> </p>
                                </div>
                              </div>

                              <div class="row">
                                <div class="form-group col-md-6">
                                  <p><span style="font-weight: bold;">Telefone: </span><?php echo $dados['Telefone_Cliente']; ?> </p>
                                </div>
                                <div class="form-group col-md-6">
                                  <p><span style="font-weight: bold;">E-mail: </span><?php echo $dados['Email_Cliente']; ?> </p>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Fim Modal -->

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
                          <h4 class="modal-title text-center" id="myModalLabel">Cadastrando Cliente</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: red;"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                          <form method="POST" action="janela_modal/php/cliente/cad_cli.php" enctype="multipart/form-data">
                            <div class="container">
                              <div class="row">
                                <div class="form-group col-md-4">
                                  <label for="tipo-text" class="control-label">Tipo:</label>
                                  <select name="Tipo_Cliente" class="custom-select" id="options">
                                    <option selected>----</option>
                                    <option value="1">Físico</option>
                                    <option value="2">Jurídico</option>
                                  </select>
                                </div>
                                <div class="form-group col-md-8">
                                  <label for="recipient-name" class="control-label">Descrição completa:</label>
                                  <input name="Descricao_Cliente" type="text" class="form-control" required="required" data-validation-required-message="Digite o código de identificação">
                                </div>
                              </div>

                              <div class="row">
                                <div class="form-group col-md-6">
                                  <label for="cod-text" class="control-label">CPF/CNPJ:</label>
                                  <input name="Cod_Cliente" type="text" class="form-control" maxlength="14" required="required" data-validation-required-message="Digite o código de identificação" onkeypress="return somenteNumeros(event)">
                                </div>
                                <div class="form-group col-md-6">
                                  <label for="cod2-text" class="control-label">RG/IE:</label>
                                  <input name="RG_Cliente" type="text" class="form-control" maxlength="9" required="required" data-validation-required-message="Digite o RG|IE" onkeypress="return somenteNumeros(event)">
                                </div>
                              </div>

                              <div class="row">
                                <div class="form-group col-md-6">
                                  <label for="cep-text" class="control-label">CEP:</label>
                                  <input name="Cep_Cliente" type="text" class="form-control" id="Cep_Cliente" onblur="cep(this.value);" maxlength="9" onblur="cep(this.value);" required="required" data-validation-required-message="Digite o CEP" onkeypress="return somenteNumeros(event)">
                                </div>
                                <div class="form-group col-md-6">
                                  <label for="endereco-text" class="control-label">Endereço:</label>
                                  <input name="Endereco_Cliente" type="text" class="form-control" id="rua" required="required" data-validation-required-message="Digite a rua">
                                </div>
                              </div>

                              <div class="row">
                                <div class="form-group col-md-6">
                                  <label for="bairro-text" class="control-label">Bairro:</label>
                                  <input name="Bairro_Cliente" type="text" class="form-control" id="bairro" required="required" data-validation-required-message="Digite o bairro">
                                </div>
                                <div class="form-group col-md-6">
                                  <label for="cidade-text" class="control-label">Cidade:</label>
                                  <input name="Cidade_Cliente" type="text" class="form-control" id="cidade" maxlength="11" required="required" data-validation-required-message="Digite a cidade">
                                </div>
                              </div>

                              <div class="row">
                                <div class="form-group col-md-6">
                                  <label for="estado-text" class="control-label">Estado:</label>
                                  <input name="Estado_Cliente" type="text" class="form-control" id="uf" required="required" data-validation-required-message="Digite o estado">
                                </div>
                                <div class="form-group col-md-6">
                                  <label for="numero-text" class="control-label">Número:</label>
                                  <input name="Numero_Cliente" type="text" class="form-control" id="numero" maxlength="5" required="required" data-validation-required-message="Digite o número">
                                </div>
                              </div>

                              <div class="row">
                                <div class="form-group col-md-6">
                                  <label for="celular-text" class="control-label">Celular:</label>
                                  <input name="Celular_Cliente" type="text" class="form-control" maxlength="11" required="required" data-validation-required-message="Digite o celular" data-inputmask='"mask": "(999) 999-9999"' data-mask onkeypress="return somenteNumeros(event)">
                                </div>
                                <div class="form-group col-md-6">
                                  <label for="telefone-text" class="control-label">Telefone:</label>
                                  <input name="Telefone_Cliente" type="text" class="form-control" maxlength="11" required="required" data-validation-required-message="Digite o telefone" data-inputmask="'mask': ['999-999-9999 [x99999]', '+099 99 99 9999[9]-9999']" data-mask onkeypress="return somenteNumeros(event)">
                                </div>
                              </div>

                              <div class="form-group">
                                <label for="email-text" class="control-label">E-mail:</label>
                                <input name="Email_Cliente" type="text" class="form-control" required="required" data-validation-required-message="Digite o e-mail">
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
                          <h4 class="modal-title" id="exampleModalLabel">Alterando Cliente</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: red;"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                          <form method="POST" action="janela_modal/php/cliente/edit_cli.php" enctype="multipart/form-data">
                            <div class="container">
                              <input name="Id_Cliente" type="hidden" id="id" class="form-control">

                              <div class="row">
                                <div class="form-group col-md-6">
                                  <label for="tipo-text" class="control-label">Tipo:</label>
                                  <select name="Tipo_Cliente" class="custom-select" id="tipo-text">
                                    <option selected>Tipo</option>
                                    <option value="1">Físico</option>
                                    <option value="2">Jurídico</option>
                                  </select>
                                </div>
                                <div class="form-group col-md-6">
                                  <label for="recipient-name" class="control-label">Descrição completa:</label>
                                  <input name="Descricao_Cliente" id="recipient-name" type="text" class="form-control" required="required" data-validation-required-message="Digite o código de identificação">
                                </div>
                              </div>

                              <div class="row">
                                <div class="form-group col-md-6">
                                  <label for="cod-text" class="control-label">CPF/CNPJ:</label>
                                  <input name="Cod_Cliente" id="cod-text" type="text" class="form-control" maxlength="14" required="required" data-validation-required-message="Digite o código de identificação" onkeypress="return somenteNumeros(event)">
                                </div>
                                <div class="form-group col-md-6">
                                  <label for="cod2-text" class="control-label">RG/IE:</label>
                                  <input name="RG_IE" type="text" id="cod2-text" class="form-control" maxlength="9" required="required" data-validation-required-message="Digite o RG|IE" onkeypress="return somenteNumeros(event)">
                                </div>
                              </div>

                              <div class="row">
                                <div class="form-group col-md-6">
                                  <label for="cep-text" class="control-label">CEP:</label>
                                  <input name="Cep_Cliente" id="cep-text" type="text" class="form-control" id="Cep_Cliente" onblur="cep(this.value);" maxlength="9" onblur="cep(this.value);" required="required" data-validation-required-message="Digite o CEP" onkeypress="return somenteNumeros(event)">
                                </div>
                                <div class="form-group col-md-6">
                                  <label for="endereco-text" class="control-label">Endereço:</label>
                                  <input name="Endereco_Cliente" id="endereco-text" type="text" class="form-control" id="rua" required="required" data-validation-required-message="Digite a rua">
                                </div>
                              </div>

                              <div class="row">
                                <div class="form-group col-md-6">
                                  <label for="bairro-text" class="control-label">Bairro:</label>
                                  <input name="Bairro_Cliente" id="bairro-text" type="text" class="form-control" id="bairro" required="required" data-validation-required-message="Digite o bairro">
                                </div>
                                <div class="form-group col-md-6">
                                  <label for="cidade-text" class="control-label">Cidade:</label>
                                  <input name="Cidade_Cliente" id="cidade-text" type="text" class="form-control" id="cidade" maxlength="11" required="required" data-validation-required-message="Digite a cidade">
                                </div>
                              </div>

                              <div class="row">
                                <div class="form-group col-md-6">
                                  <label for="estado-text" class="control-label">Estado:</label>
                                  <input name="Estado_Cliente" id="estado-text" type="text" class="form-control" id="uf" required="required" data-validation-required-message="Digite o estado">
                                </div>
                                <div class="form-group col-md-6">
                                  <label for="numero-text" class="control-label">Número:</label>
                                  <input name="Numero_Cliente" id="numero-text" type="text" class="form-control" id="numero" maxlength="5" required="required" data-validation-required-message="Digite o número">
                                </div>
                              </div>

                              <div class="row">
                                <div class="form-group col-md-6">
                                  <label for="celular-text" class="control-label">Celular:</label>
                                  <input name="Celular_Cliente" id="celular-text" type="text" class="form-control" maxlength="11" required="required" data-validation-required-message="Digite o celular" data-inputmask='"mask": "(999) 999-9999"' data-mask onkeypress="return somenteNumeros(event)">
                                </div>
                                <div class="form-group col-md-6">
                                  <label for="telefone-text" class="control-label">Telefone:</label>
                                  <input name="Telefone_Cliente" id="telefone-text" type="text" class="form-control" maxlength="11" required="required" data-validation-required-message="Digite o telefone" data-inputmask="'mask': ['999-999-9999 [x99999]', '+099 99 99 9999[9]-9999']" data-mask onkeypress="return somenteNumeros(event)">
                                </div>
                              </div>

                              <div class="form-group">
                                <label for="email-text" class="control-label">E-mail:</label>
                                <input name="Email_Cliente" id="email-text" type="text" class="form-control" required="required" data-validation-required-message="Digite o e-mail">
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
      var recipienttipo = button.data('whatevertipo')
      var recipientdescricao = button.data('whateverdescricao')
      var recipientcod = button.data('whatevercod')
      var recipientcod2 = button.data('whatevercod2')
      var recipientcep = button.data('whatevercep')
      var recipientendereco = button.data('whateverendereco')
      var recipientbairro = button.data('whateverbairro')
      var recipientcidade = button.data('whatevercidade')
      var recipientestado = button.data('whateverestado')
      var recipientnumero = button.data('whatevernumero')
      var recipientcelular = button.data('whatevercelular')
      var recipienttelefone = button.data('whatevertelefone')
      var recipientemail = button.data('whateveremail')
      // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
      // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
      var modal = $(this)
      modal.find('.modal-title').text('Cliente Nº ' + recipient)
      modal.find('#id').val(recipient)
      modal.find('#tipo-text').val(recipienttipo)
      modal.find('#recipient-name').val(recipientdescricao)
      modal.find('#cod-text').val(recipientcod)
      modal.find('#cod2-text').val(recipientcod2)
      modal.find('#cep-text').val(recipientcep)
      modal.find('#endereco-text').val(recipientendereco)
      modal.find('#bairro-text').val(recipientbairro)
      modal.find('#cidade-text').val(recipientcidade)
      modal.find('#estado-text').val(recipientestado)
      modal.find('#numero-text').val(recipientnumero)
      modal.find('#celular-text').val(recipientcelular)
      modal.find('#telefone-text').val(recipienttelefone)
      modal.find('#email-text').val(recipientemail)
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