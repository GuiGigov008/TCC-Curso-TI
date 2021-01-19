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
  <title>FCA | Usuários</title>
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
            <h1>Usuários cadastrados</h1>
            <h4 style="margin-top: 5%; font-style: italic;">• Total de <?php
                                                                        require('conexao_banco.php');
                                                                        $query = "SELECT * FROM usuarios";
                                                                        $busca = mysqli_query($link, $query);
                                                                        $cont = 0;
                                                                        while ($dados = mysqli_fetch_array($busca)) {
                                                                          $cont++;
                                                                        }
                                                                        echo $cont;
                                                                        ?> usuários.</h4>
          </div>
          <div class="col-md-4">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Início</a></li>
              <li class="breadcrumb-item active">Tabelas</li>
            </ol>
          </div>
          <div class="col-md-2">
            <a href="relatorios/usuario/usuario.php" class="btn btn-outline-dark btn-sn" target="_blank"><span class="fas fa-newspaper"></span> Gerar Relatório</a>
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
                      <th class="text-center">E-mail</th>
                      <th class="text-center" hidden>Senha</th>
                      <th class="text-center">Editar</th>
                      <th class="text-center">Excluir</th>
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

                  $query = "SELECT * FROM usuarios ORDER BY nome ASC";
                  $busca = mysqli_query($link, $query);

                  while ($dados = mysqli_fetch_array($busca)) {
                    $id_user = $dados['id'];
                    if ($dados['adm'] == 1) {
                      $tipo = "Administrador";
                    } else {
                      $tipo = "Colaborador";
                    }

                  ?>

                    <tr>
                      <td class="text-center"> <?php echo $dados['id'] ?> </td>
                      <td class="text-center"> <?php echo $tipo ?> </td>
                      <td class="text-center"> <?php echo $dados['nome'] ?> </td>
                      <td class="text-center"> <?php echo $dados['email'] ?> </td>
                      <td class="text-center" hidden> <?php echo $dados['senha'] ?> </td>
                      <td>
                        <center>
                          <button class="btn btn-info btn-sn" data-toggle="modal" data-target="#exampleModal" data-whatever="<?php echo $dados['id']; ?>" data-whatevertipo="<?php echo $dados['adm']; ?>" data-whateverdescricao="<?php echo $dados['nome']; ?>" data-whateveremail="<?php echo $dados['email']; ?>" data-whateveremail2="<?php echo $dados['email']; ?>" data-whateversenha="<?php echo $dados['senha']; ?>" data-whateversenha2="<?php echo $dados['senha']; ?>">
                            <i class="fas fa-pencil-alt">
                            </i>
                            Editar
                          </button>
                        </center>
                      </td>
                      <td>
                        <center>
                          <a class='btn btn-danger btn-sn' href="janela_modal/php/usuario/delete_user.php?id=<?php echo $dados['id']; ?>" data-confirm='Tem certeza de que deseja excluir o item selecionado?'>
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
                          <h4 class="modal-title text-center" id="myModalLabel">Cadastrando Usuário</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: red;"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                          <form method="POST" action="janela_modal/php/usuario/cad_user.php" enctype="multipart/form-data">
                            <div class="container">
                              <div class="row">
                                <div class="form-group col-md-12">
                                  <label for="tipo-text" class="control-label">Tipo:</label>
                                  <select name="Adm_User" class="custom-select" id="tipo-text" required="required" data-validation-required-message="Escolha uma opção">
                                    <option selected>Administrador</option>
                                    <option>------</option>
                                    <option value="1">Sim</option>
                                    <option value="2">Não</option>
                                  </select>
                                </div>
                              </div>

                              <div class="row">
                                <div class="form-group col-md-12">
                                  <label for="recipient-name" class="control-label">Descrição completa:</label>
                                  <input name="Nome_User" type="text" class="form-control" required="required" data-validation-required-message="Digite a descrição">
                                </div>
                              </div>

                              <div class="row">
                                <div class="form-group col-md-12">
                                  <label for="email-text" class="control-label">E-mail:</label>
                                  <input name="Email_User" type="email" class="form-control" required="required" data-validation-required-message="Digite o e-mail">
                                </div>
                              </div>

                              <div class="row">
                                <div class="form-group col-md-12">
                                  <label for="email2-text" class="control-label">Confirmar E-mail:</label>
                                  <input name="Email2_User" type="email" class="form-control" required="required" data-validation-required-message="Confirme o e-mail">
                                </div>
                              </div>

                              <div class="row">
                                <div class="form-group col-md-12">
                                  <label for="senha-text" class="control-label">Senha:</label>
                                  <input name="Senha_User" type="password" class="form-control" required="required" data-validation-required-message="Digite a senha">
                                </div>
                              </div>

                              <div class="row">
                                <div class="form-group col-md-12">
                                  <label for="senha2-text" class="control-label">Confirmar Senha:</label>
                                  <input name="Senha2_User" type="password" class="form-control" required="required" data-validation-required-message="Confirme a senha">
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
                          <h4 class="modal-title" id="exampleModalLabel">Alterando Usuário</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: red;"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                          <form method="POST" action="janela_modal/php/usuario/edit_user.php" enctype="multipart/form-data">
                            <div class="container">
                              <input name="Id_User" type="hidden" id="id" class="form-control">

                              <div class="row">
                                <div class="form-group col-md-12">
                                  <label for="tipo-text" class="control-label">Tipo:</label>
                                  <select name="Adm_User" class="custom-select" id="tipo-text" required="required" data-validation-required-message="Escolha uma opção">
                                    <option selected>Administrador</option>
                                    <option>------</option>
                                    <option value="1">Sim</option>
                                    <option value="2">Não</option>
                                  </select>
                                </div>
                              </div>

                              <div class="row">
                                <div class="form-group col-md-12">
                                  <label for="recipient-name" class="control-label">Descrição completa:</label>
                                  <input name="Nome_User" id="recipient-name" type="text" class="form-control" required="required" data-validation-required-message="Digite a descrição">
                                </div>
                              </div>

                              <div class="row">
                                <div class="form-group col-md-12">
                                  <label for="email-text" class="control-label">E-mail:</label>
                                  <input name="Email_User" id="email-text" type="email" class="form-control" required="required" data-validation-required-message="Digite o e-mail">
                                </div>
                              </div>

                              <div class="row">
                                <div class="form-group col-md-12">
                                  <label for="email2-text" class="control-label">Confirmar E-mail:</label>
                                  <input name="Email2_User" id="email2-text" type="email" class="form-control" required="required" data-validation-required-message="Confirme o e-mail">
                                </div>
                              </div>

                              <div class="row">
                                <div class="form-group col-md-12">
                                  <label for="senha-text" class="control-label">Senha:</label>
                                  <input name="Senha_User" id="senha-text" type="password" class="form-control" required="required" data-validation-required-message="Digite a senha">
                                </div>
                              </div>

                              <div class="row">
                                <div class="form-group col-md-12">
                                  <label for="senha2-text" class="control-label">Confirmar Senha:</label>
                                  <input name="Senha2_User" id="senha2-text" type="password" class="form-control" required="required" data-validation-required-message="Confirme a senha">
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
      var recipientemail = button.data('whateveremail')
      var recipientemail2 = button.data('whateveremail2')
      var recipientsenha = button.data('whateversenha')
      var recipientsenha2 = button.data('whateversenha2')
      // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
      // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
      var modal = $(this)
      modal.find('.modal-title').text('Usuário Nº ' + recipient)
      modal.find('#id').val(recipient)
      modal.find('#tipo-text').val(recipienttipo)
      modal.find('#recipient-name').val(recipientdescricao)
      modal.find('#email-text').val(recipientemail)
      modal.find('#email2-text').val(recipientemail2)
      modal.find('#senha-text').val(recipientsenha)
      modal.find('#senha2-text').val(recipientsenha2)
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