<?php
session_start();

include_once("../../conexao_banco.php");

$id_user = $_GET['id'];

$query = "DELETE FROM usuarios WHERE id = '$id_user'";
mysqli_query($conn, $query);

$_SESSION['msg'] = "<p style='color: red; font-weight: bold;'>USUÁRIO EXCLUÍDO COM SUCESSO!</p>";
header("Location: ../../../cad_list_users.php");
