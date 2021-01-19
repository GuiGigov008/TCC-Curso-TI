<?php

if (isset($_SESSION["usuario"]) && is_array($_SESSION["usuario"])) {
  require("login/acoes/conexao.php");
  $adm = $_SESSION["usuario"][1];
  $nome = $_SESSION["usuario"][0];
} else {
}
?>


<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-list"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="https://grems.azurewebsites.net/" target="_blank" class="nav-link">Info <i class="nav-icon fas fa-info-circle"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="login/acoes/logout.php" class="nav-link">Sair <i class="nav-icon fas fa-chevron-circle-right"></i></a>
    </li>
  </ul>

  <!-- FORMULARIO DE PESQUISA -->
  <!-- <form class="form-inline ml-3">
    <div class="input-group input-group-sm">
      <input class="form-control form-control-navbar" type="search" placeholder="Pesquise" aria-label="Search">
      <div class="input-group-append">
        <button class="btn btn-navbar" type="submit">
          <i class="fas fa-search"></i>
        </button>
      </div>
    </div>
  </form> -->
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-secundary elevation-4">
  <!-- Brand Logo -->
  <a href="../index.php" class="brand-link">
    <img src="img\FCA_Logo.png" alt="FCA Logo" title="FCA - Fluxo de Caixa Automotivo" style="height: 65px; width: 65px;">
    <span style="font-weight: bold; font-size: 150%;">FCA</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="info">
        <a href="#" class="d-block"><?php echo $nome; ?></a>
      </div>
    </div>

    <!-- Sidebar Menu -->

    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-cog"></i>
            <p>
              Menu
              <i class="right fas fa-chevron-circle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="../index.php" class="nav-link">
                <i class="nav-icon fas fa-compass"></i>
                <p>Painel de Controle</p>
              </a><a href="orcamento&venda/orcamento.php" class="nav-link">
                <i class="nav-icon fas fa-bolt"></i>
                <p>Fazer Orçamento</p>
              </a>
              <?php if ($adm == 1) : ?>
                <a href="../valores.php" class="nav-link">
                  <i class="nav-icon fas fa-dollar-sign"></i>
                  <p>Receita e Despesas</p>
                </a>
              <?php endif; ?>
            </li>
          </ul>
        </li>

        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-table"></i>
            <p>
              Cadastros e Listagens
              <i class="fas fa-chevron-circle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item has-treeview">
              <a href="cad_list_cliente.php" class="nav-link">
                <i class="nav-icon fas fa-cube"></i>
                <p>
                  Clientes
                </p>
              </a>
            </li>
            <?php if ($adm == 1) : ?>
              <li class="nav-item has-treeview">
                <a href="cad_list_func.php" class="nav-link">
                  <i class="nav-icon fas fa-table"></i>
                  <p>
                    Funcionários
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="cad_list_fornecedor.php" class="nav-link">
                  <i class="fas fa-shapes nav-icon"></i>
                  <p>Fornecedores</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="cad_list_pro.php" class="nav-link">
                  <i class="fas fa-folder-open nav-icon"></i>
                  <p>Produtos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="cad_list_users.php" class="nav-link">
                  <i class="fas fa-puzzle-piece nav-icon"></i>
                  <p>Usuários</p>
                </a>
              </li>
            <?php endif; ?>
            <li class="nav-item">
              <a href="cad_list_veiculos.php" class="nav-link">
                <i class="fas fa-key nav-icon"></i>
                <p>Veículos</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="fas fa-bookmark nav-icon"></i>
                <p>Orçamentos</p>
                <i class="right fas fa-angle-left"></i>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="orcamento&venda/registro_orcamento_fechado.php" class="nav-link">
                    <i class="far fa-dot-circle nav-icon"></i>
                    <p>Fechados</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="orcamento&venda/registro_orcamento_aberto.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Em Aberto</p>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </li>
      </ul>
    </nav>