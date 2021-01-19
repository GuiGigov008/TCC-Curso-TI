<?php
session_start();

include_once("../../conexao_banco.php");

$id = mysqli_real_escape_string($conn, $_POST['Id_Fornecedor']);
$nome = mysqli_real_escape_string($conn, $_POST['Descricao_Fornecedor']);
$cep = mysqli_real_escape_string($conn, $_POST['Cep_Fornecedor']);
$rua = mysqli_real_escape_string($conn, $_POST['Endereco_Fornecedor']);
$bairro = mysqli_real_escape_string($conn, $_POST['Bairro_Fornecedor']);
$cidade = mysqli_real_escape_string($conn, $_POST['Cidade_Fornecedor']);
$uf = mysqli_real_escape_string($conn, $_POST['Estado_Fornecedor']);
$numero = mysqli_real_escape_string($conn, $_POST['Numero_Fornecedor']);
$repres = mysqli_real_escape_string($conn, $_POST['Representante_Fornecedor']);
$telefone = mysqli_real_escape_string($conn, $_POST['Telefone_Fornecedor']);
$email = mysqli_real_escape_string($conn, $_POST['Email_Fornecedor']);

$query = "UPDATE fornecedores SET Id_Fornecedor = '$id', Descricao_Fornecedor = '$nome', Cep_Fornecedor = '$cep', Endereco_Fornecedor = '$rua', 
Bairro_Fornecedor = '$bairro', Cidade_Fornecedor = '$cidade', Estado_Fornecedor = '$uf', Numero_Fornecedor = '$numero', 
Representante_Fornecedor = '$repres', Telefone_Fornecedor = '$telefone', Email_Fornecedor = '$email' WHERE Id_Fornecedor = $id";
$busca = mysqli_query($conn, $query);

if (mysqli_affected_rows($conn) != 0) {
	$_SESSION['msg_edit'] = "<p style='color:blue; font-weight: bold;'>FORNECEDOR ATUALIZADO COM SUCESSO!</p>";
	header("Location: ../../../cad_list_fornecedor.php");
} else {
	$_SESSION['msg_err'] = "<p style='color:darkred; font-weight: bold;'>ERRO NA ATUALIZAÇÃO!</p>";
	header("Location: ../../../cad_list_fornecedor.php");
}
