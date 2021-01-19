<?php
session_start();

include_once("../../conexao_banco.php");

$placa = $_GET['Placa'];

$query = "DELETE FROM veiculos WHERE Placa = '$placa'";
mysqli_query($conn, $query);

$_SESSION['msg'] = "<p style='color: red; font-weight: bold;'>VEÍCULO EXCLUÍDO COM SUCESSO!</p>";
header("Location: ../../../cad_list_veiculos.php");
