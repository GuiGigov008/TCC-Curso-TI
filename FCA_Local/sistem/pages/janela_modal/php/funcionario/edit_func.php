<?php
session_start();

include_once("../../conexao_banco.php");

$id = mysqli_real_escape_string($conn, $_POST['Id_Func']);
$nome = mysqli_real_escape_string($conn, $_POST['Nome_Func']);
$cpf = mysqli_real_escape_string($conn, $_POST['CPF_Func']);
$rg = mysqli_real_escape_string($conn, $_POST['RG_Func']);
$telefone = mysqli_real_escape_string($conn, $_POST['Telefone_Func']);
$celular = mysqli_real_escape_string($conn, $_POST['Celular_Func']);
$cep = mysqli_real_escape_string($conn, $_POST['CEP_Func']);
$rua = mysqli_real_escape_string($conn, $_POST['Endereco_Func']);
$bairro = mysqli_real_escape_string($conn, $_POST['Bairro_Func']);
$cidade = mysqli_real_escape_string($conn, $_POST['Cidade_Func']);
$uf = mysqli_real_escape_string($conn, $_POST['Estado_Func']);
$numero = mysqli_real_escape_string($conn, $_POST['Numero_Func']);
$email = mysqli_real_escape_string($conn, $_POST['Email_Func']);
$cargo = mysqli_real_escape_string($conn, $_POST['Cargo_Func']);

$query = "UPDATE funcionarios SET Id_Func = '$id', Nome_Func = '$nome', CPF_Func = '$cpf', RG_Func = '$rg', Telefone_Func = '$telefone', 
Celular_Func = '$celular', CEP_Func = '$cep', Endereco_Func = '$rua', Bairro_Func = '$bairro', Cidade_Func = '$cidade', Estado_Func = '$uf', 
Numero_Func = '$numero', Email_Func = '$email', Cargo_Func = '$cargo' WHERE Id_Func = $id";
$busca = mysqli_query($conn, $query);

if (mysqli_affected_rows($conn) != 0) {
	$_SESSION['msg_edit'] = "<p style='color:blue; font-weight: bold;'>FUNCIONÁRIO ATUALIZADO COM SUCESSO!</p>";
	header("Location: ../../../cad_list_func.php");
} else {
	$_SESSION['msg_err'] = "<p style='color:darkred; font-weight: bold;'>ERRO NA ATUALIZAÇÃO!</p>";
	header("Location: ../../../cad_list_func.php");
}
