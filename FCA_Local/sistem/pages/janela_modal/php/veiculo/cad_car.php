<?php
session_start();

include_once("../../conexao_banco.php");

$placa = mysqli_real_escape_string($conn, $_POST['Placa']);
$modelo = mysqli_real_escape_string($conn, $_POST['Modelo']);
$marca = mysqli_real_escape_string($conn, $_POST['Marca']);
$ano = mysqli_real_escape_string($conn, $_POST['Ano']);
$cor = mysqli_real_escape_string($conn, $_POST['Cor']);
$id_cliente = mysqli_real_escape_string($conn, $_POST['Nome_Cliente']);

$query = "INSERT INTO veiculos(Placa, Modelo, Marca, Ano, cor, fk_id_cliente) VALUES ('$placa', '$modelo', '$marca', '$ano', '$cor', 
'$id_cliente')";
$busca = mysqli_query($conn, $query);

if (mysqli_affected_rows($conn) != 0) {
	$_SESSION['msg_cad'] = "<p style='color:green; font-weight: bold;'>VEÍCULO CADASTRADO COM SUCESSO!</p>";
	header("Location: ../../../cad_list_veiculos.php");
} else {
	$_SESSION['msg_err'] = "<p style='color:darkred; font-weight: bold;'>ERRO NO CADASTRO!</p>";
	header("Location: ../../../cad_list_veiculos.php");
}
