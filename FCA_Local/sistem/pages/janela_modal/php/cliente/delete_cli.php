<?php
session_start();

$id_cliente = $_GET['Id_Cliente'];

include_once("../../conexao_banco.php");

$query = "DELETE FROM clientes WHERE Id_Cliente = '$id_cliente'";
mysqli_query($conn, $query);

$_SESSION['msg'] = "<p style='color: red; font-weight: bold;'>CLIENTE EXCLUÍDO COM SUCESSO!</p>";
header("Location: ../../../cad_list_cliente.php");
