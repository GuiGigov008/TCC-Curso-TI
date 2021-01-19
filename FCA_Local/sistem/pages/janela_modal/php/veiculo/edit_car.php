<?php
session_start();

include_once("../../conexao_banco.php");

$placa = mysqli_real_escape_string($conn, $_POST['Placa']);
$modelo = mysqli_real_escape_string($conn, $_POST['Modelo']);
$marca = mysqli_real_escape_string($conn, $_POST['Marca']);
$ano = mysqli_real_escape_string($conn, $_POST['Ano']);
$cor = mysqli_real_escape_string($conn, $_POST['Cor']);
$id_cliente = mysqli_real_escape_string($conn, $_POST['Nome_Cliente']);

$query = "UPDATE despesas SET Descricao_Despesa='$nome', Valor_Despesa = '$valor' WHERE Id_Despesa = $id";
$busca = mysqli_query($conn, $query);

if (mysqli_affected_rows($conn) != 0) {
	$_SESSION['msg_edit'] = "<p style='color:blue; font-weight: bold;'>VEÍCULO ATUALIZADO COM SUCESSO!</p>";
	header("Location: ../../../cad_list_veiculos.php");
} else {
	$_SESSION['msg_err'] = "<p style='color:darkred; font-weight: bold;'>ERRO NA ATUALIZAÇÃO!</p>";
	header("Location: ../../../cad_list_veiculos.php");
}
