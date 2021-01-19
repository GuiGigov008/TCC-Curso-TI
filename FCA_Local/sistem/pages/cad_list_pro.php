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
  <title>FCA | Produtos</title>
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
            <h1>Produtos cadastrados</h1>
            <h4 style="margin-top: 5%; font-style: italic;">• Total de <?php
                                                                        require('conexao_banco.php');
                                                                        $query = "SELECT * FROM produtos";
                                                                        $busca = mysqli_query($link, $query);
                                                                        $cont = 0;
                                                                        while ($dados = mysqli_fetch_array($busca)) {
                                                                          $cont++;
                                                                        }
                                                                        echo $cont;
                                                                        ?> itens.</h4>
          </div>
          <div class="col-md-4">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Início</a></li>
              <li class="breadcrumb-item active">Tabelas</li>
            </ol>
          </div>
          <div class="col-md-2">
            <a href="relatorios/produto/produto.php" class="btn btn-outline-dark btn-sn" target="_blank"><span class="fas fa-newspaper"></span> Gerar Relatório</a>
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
                      <th class="text-center">Código</th>
                      <th class="text-center">Tipo</th>
                      <th class="text-center">Nome</th>
                      <th class="text-center">Preço</th>
                      <th class="text-center">Fornecedor</th>
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

                  $query = "SELECT produtos.Id_Produto , produtos.Descricao_Produto, produtos.Preco_Produto, produtos.Tipo_Produto, fornecedores.Descricao_Fornecedor 
                  AS fornecedores FROM produtos INNER JOIN fornecedores ON produtos.fk_id_forn = fornecedores.Id_Fornecedor ";
                  $busca = mysqli_query($link, $query);

                  while ($dados = mysqli_fetch_array($busca)) {
                    $id_produto = $dados['Id_Produto'];
                    if ($dados['Tipo_Produto'] == "Servico") {
                      $tipo = "Serviço";
                    } else {
                      $tipo = "Peça";
                    }

                  ?>

                    <tr>
                      <td class='text-center'> <?php echo $dados['Id_Produto'] ?> </td>
                      <td class='text-center'> <?php echo $tipo ?> </td>
                      <td class='text-center'> <?php echo $dados['Descricao_Produto'] ?> </td>
                      <td class='text-center'> <?php echo $dados['Preco_Produto'] ?> </td>
                      <td class='text-center'> <?php echo $dados['fornecedores'] ?> </td>

                      <td>
                        <center>
                          <button class='btn btn-info btn-sn' data-toggle="modal" data-target="#exampleModal" data-whatever="<?php echo $dados['Id_Produto']; ?>" data-whatevertipo="<?php echo $dados['Tipo_Produto']; ?>" data-whateverdescricao="<?php echo $dados['Descricao_Produto']; ?>" data-whateverpreco="<?php echo $dados['Preco_Produto']; ?>" data-whateverfornecedor="<?php echo $dados['fk_id_forn']; ?>">
                            <i class='fas fa-pencil-alt'>
                            </i>
                            Editar
                          </button>
                        </center>
                      </td>
                      <td>
                        <center>
                          <a class='btn btn-danger btn-sn' href="janela_modal/php/produto/delete_pro.php?Id_Produto=<?php echo $dados['Id_Produto']; ?>" data-confirm='Tem certeza de que deseja excluir o item selecionado?'>
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
                          <h4 class="modal-title text-center" id="myModalLabel">Cadastrando Produto</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: red;"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                          <form method="POST" action="janela_modal/php/produto/cad_pro.php" enctype="multipart/form-data">
                            <div class="container">
                              <div class="row">
                                <div class="form-group col-md-12">
                                  <label for="recipient-name" class="control-label">Descrição completa:</label>
                                  <input name="Descricao_Produto" type="text" class="form-control">
                                </div>
                              </div>

                              <div class="row">
                                <div class="form-group col-md-6">
                                  <label for="tipo-text" class="control-label">Tipo:</label>
                                  <select name="Tipo_Produto" class="custom-select" id="options">
                                    <option selected>----</option>
                                    <option value="Servico">Serviço</option>
                                    <option value="Peca">Peça</option>
                                  </select>
                                </div>
                                <div class="form-group col-md-6">
                                  <label for="preco-text" class="control-label">Preço:</label>
                                  <input type="text" name="Preco_Produto" class="form-control" min="0" placeholder="Preço" maxlength="14" required="required" data-validation-required-message="Digite o valor do preço" onkeypress="return somenteNumeros(event)" />
                                </div>
                              </div>

                              <div class="row">
                                <div class="form-group col-md-12">
                                  <label for="forn-text" class="control-label">Fornecedor</label>
                                  <select type='text' name="Id_Fornecedor" class="custom-select" style='width: 100%;' placeholder=''>
                                    <option> ID | Nome | Representante </option>
                                    <option> ------------ </option>
                                    <?php

                                    require('conexao_banco.php');

                                    $query = "SELECT * FROM fornecedores";
                                    $busca = mysqli_query($link, $query);

                                    while ($dados = mysqli_fetch_array($busca)) {
                                      $id_forn = $dados['Id_Fornecedor'];
                                      $nome = $dados['Descricao_Fornecedor'];
                                      $repres = $dados['Representante_Fornecedor'];
                                      echo " 
                                  <option> $id_forn | $nome | $repres </option>";
                                    }
                                    ?>
                                  </select>
                                </div>
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
                          <h4 class="modal-title" id="exampleModalLabel">Alterando Produto</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: red;"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                          <form method="POST" action="janela_modal/php/produto/edit_pro.php" enctype="multipart/form-data">
                            <div class="container">
                              <input name="Id_Produto" type="hidden" id="id" class="form-control">

                              <div class="row">
                                <div class="form-group col-md-12">
                                  <label for="recipient-name" class="control-label">Descrição completa:</label>
                                  <input name="Descricao_Produto" id="recipient-name" type="text" class="form-control">
                                </div>
                              </div>

                              <div class="row">
                                <div class="form-group col-md-6">
                                  <label for="tipo-text" class="control-label">Tipo:</label>
                                  <select name="Tipo_Produto" class="custom-select" id="tipo-text">
                                    <option selected>----</option>
                                    <option value="1">Serviço</option>
                                    <option value="2">Peça</option>
                                  </select>
                                </div>
                                <div class="form-group col-md-6">
                                  <label for="preco-text" class="control-label">Preço:</label>
                                  <input name="Preco_Produto" id="preco-text" type="text" class="form-control" maxlength="14" required="required" data-validation-required-message="Digite o código de identificação" onkeypress="return somenteNumeros(event)">
                                </div>
                              </div>

                              <div class="row">
                                <div class="form-group col-md-12">
                                  <label for="forn-text" class="control-label">Fornecedor</label>
                                  <select type="text" name="Id_Fornecedor" id="forn-text" class="custom-select" style='width: 100%;' placeholder=''>
                                    <option> ID | Nome | Representante </option>
                                    <option> ------------ </option>
                                    <?php

                                    require('conexao_banco.php');

                                    $query = "SELECT * FROM fornecedores";
                                    $busca = mysqli_query($link, $query);

                                    while ($dados = mysqli_fetch_array($busca)) {
                                      $id_forn = $dados['Id_Fornecedor'];
                                      $nome = $dados['Descricao_Fornecedor'];
                                      $repres = $dados['Representante_Fornecedor'];
                                      echo " 
                                  <option> $id_forn | $nome | $repres </option>";
                                    }
                                    ?>
                                  </select>
                                </div>
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
      var recipientpreco = button.data('whateverpreco')
      var recipientfornecedor = button.data('whateverfornecedor')
      // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
      // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
      var modal = $(this)
      modal.find('.modal-title').text('Item Nº ' + recipient)
      modal.find('#id').val(recipient)
      modal.find('#tipo-text').val(recipienttipo)
      modal.find('#recipient-name').val(recipientdescricao)
      modal.find('#preco-text').val(recipientpreco)
      modal.find('#forn-text').val(recipientfornecedor)
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