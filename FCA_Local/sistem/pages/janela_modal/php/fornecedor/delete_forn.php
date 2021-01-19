<?php
session_start();

include_once("../../conexao_banco.php");

$id_forn = $_GET['Id_Fornecedor'];

$query = "DELETE FROM fornecedores WHERE Id_Fornecedor = '$id_forn'";
mysqli_query($conn, $query);

$_SESSION['msg'] = "<p style='color: red; font-weight: bold;'>FORNECEDOR EXCLUÍDO COM SUCESSO!</p>";
header("Location: ../../../cad_list_fornecedor.php");
