<?php
session_start();

include_once("../../conexao_banco.php");

$id_produto = $_GET['Id_Produto'];

$query = "DELETE FROM produtos WHERE Id_Produto = '$id_produto'";
mysqli_query($conn, $query);

$_SESSION['msg'] = "<p style='color: red; font-weight: bold;'>PRODUTO EXCLUÍDO COM SUCESSO!</p>";
header("Location: ../../../cad_list_pro.php");
