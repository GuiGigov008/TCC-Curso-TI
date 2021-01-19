<?php
session_start();

include_once("../../conexao_banco.php");

$id = mysqli_real_escape_string($conn, $_POST['Id_Cliente']);
$tipo = mysqli_real_escape_string($conn, $_POST['Tipo_Cliente']);
$nome = mysqli_real_escape_string($conn, $_POST['Descricao_Cliente']);
$cod = mysqli_real_escape_string($conn, $_POST['Cod_Cliente']);
$rg = mysqli_real_escape_string($conn, $_POST['RG_IE']);
$cep = mysqli_real_escape_string($conn, $_POST['Cep_Cliente']);
$rua = mysqli_real_escape_string($conn, $_POST['Endereco_Cliente']);
$bairro = mysqli_real_escape_string($conn, $_POST['Bairro_Cliente']);
$cidade = mysqli_real_escape_string($conn, $_POST['Cidade_Cliente']);
$uf = mysqli_real_escape_string($conn, $_POST['Estado_Cliente']);
$numero = mysqli_real_escape_string($conn, $_POST['Numero_Cliente']);
$celular = mysqli_real_escape_string($conn, $_POST['Celular_Cliente']);
$telefone = mysqli_real_escape_string($conn, $_POST['Telefone_Cliente']);
$email = mysqli_real_escape_string($conn, $_POST['Email_Cliente']);


$query = "UPDATE clientes SET Id_Cliente = '$id', Tipo_Cliente = '$tipo', Descricao_Cliente = '$nome', CPF_CNPJ = '$cod', RG_IE = '$rg', Cep_Cliente = '$cep', Endereco_Cliente = '$rua', 
Bairro_Cliente = '$bairro', Cidade_Cliente = '$cidade', Estado_Cliente = '$uf', Numero_Cliente = '$numero', 
Celular_Cliente = '$celular', Telefone_Cliente = '$telefone', Email_Cliente = '$email' WHERE Id_Cliente = $id";
$busca = mysqli_query($conn, $query);

if (mysqli_affected_rows($conn) != 0) {
	$_SESSION['msg_edit'] = "<p style='color:blue; font-weight: bold;'>CLIENTE ATUALIZADO COM SUCESSO!</p>";
	header("Location: ../../../cad_list_cliente.php");
} else {
	$_SESSION['msg_err'] = "<p style='color:darkred; font-weight: bold;'>ERRO NA ATUALIZAÇÃO!</p>";
	header("Location: ../../../cad_list_cliente.php");
}
