<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>FCA | Login</title>
  <link rel="icon" href="../img/FCA_Logo.png" type="image/x-icon" sizes="16x16">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <!-- CSS da barra de carregamento de login (teste) -->
  <!-- <style>
    body {
      justify-content: center;
      align-items: center;
      background: #000;
      display: flex;
      height: 100vh;
      padding: 0;
      margin: 0;
    }

    .progress {
      background: rgba(255, 255, 255, 0.1);
      justify-content: flex-start;
      border-radius: 100px;
      align-items: center;
      position: relative;
      padding: 0 5px;
      display: flex;
      height: 40px;
      width: 500px;
    }

    .progress-value {
      animation: load 3s normal forwards;
      box-shadow: 0 10px 40px -10px #fff;
      border-radius: 100px;
      background: #fff;
      height: 30px;
      width: 0;
    }

    @keyframes load {
      0% {
        width: 0;
      }

      100% {
        width: 100%;
      }
    }
  </style> -->
</head>

<body class="hold-transition login-page" style="background-image: url(../img/fundo_login.png); background-size: cover; background-repeat: no-repeat; background-color: #000000">
  <div class="login-box">
    <div class="login-logo">
      <img src="../img/FCA_Logo.png" alt="AdminLTE Logo" style="height: 150px; width: 150px;"><br>
      <span style="font-weight: bold; color: #FFFFFF">FCA - Fluxo de Caixa Automotivo</span>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">

        <p class="login-box-msg" style="font-size: 150%;"><b>Login de usuário</b></p>

        <?php
        if (isset($_SESSION['msg'])) {
          echo $_SESSION['msg'];
          unset($_SESSION['msg']);
        }
        if (isset($_SESSION['msgcad'])) {
          echo $_SESSION['msgcad'];
          unset($_SESSION['msgcad']);
        }
        ?>

        <form method="POST" action="acoes/login.php">
          <div class="input-group mb-3">
            <input type="text" style="font-size: large;" name="email" id="email" class="form-control" placeholder="E-mail" autocomplete="off">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-at"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" style="font-size: large;" name="senha" id="password" class="form-control" placeholder="Senha" autocomplete="off">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">


            <!-- /.col -->
            <div class="col-12">
              <button type="submit" class="btn btn-dark btn-sn btn-block">Entrar <span class="fas fa-share"></span></button>
            </div>
            <!-- /.col -->
          </div>

        </form>


        <p class="text-center text-danger">
          <?php if (isset($_SESSION['loginErro'])) {
            echo $_SESSION['loginErro'];
            unset($_SESSION['loginErro']);
          } ?>
        </p>
        <p class="text-center text-success">
          <?php
          if (isset($_SESSION['logindeslogado'])) {
            echo $_SESSION['logindeslogado'];
            unset($_SESSION['logindeslogado']);
          }
          ?>
        </p>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>

  <!-- Barra de carregamento de login (teste) -->
  <!-- <div class="progress" style="display: none;">
    <div class="progress-value"></div>
  </div> -->
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="../../plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../../dist/js/adminlte.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>

</body>

</html>