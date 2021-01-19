<?php

function abrirBanco()
{
  $conexao = new mysqli("localhost", "root", "", "grems");
  return $conexao;
}


function selectAllPessoa()
{
  $banco = abrirBanco();
  $sql =  "SELECT * FROM usuarios ORDER BY id ASC";
  $resultado = $banco->query($sql);
  $banco->close();
  while ($row = mysqli_fetch_array($resultado)) {
    $grupo[] = $row;
  }
  return $grupo;

  while ($dados = mysqli_fetch_array($busca)) {
    $id_user = $dados['id'];
    if ($dados['adm'] == 1) {
      $tipo = "Administrador";
    } else {
      $tipo = "Colaborador";
    }
  }
}
