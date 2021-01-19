<?php
session_start();

include_once("../../conexao_banco.php");

$id_func = $_GET['Id_Func'];

$query = "DELETE FROM funcionarios WHERE Id_Func = '$id_func'";
mysqli_query($conn, $query);

$_SESSION['msg'] = "<p style='color: red; font-weight: bold;'>FUNCIONÁRIO EXCLUÍDO COM SUCESSO!</p>";
header("Location: ../../../cad_list_func.php");
