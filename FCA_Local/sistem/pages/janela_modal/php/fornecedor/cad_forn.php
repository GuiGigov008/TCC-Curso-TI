<?php
session_start();

include_once("../../conexao_banco.php");

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


$query = "INSERT INTO fornecedores(Id_Fornecedor, Descricao_Fornecedor, Cep_Fornecedor, Endereco_Fornecedor, Bairro_Fornecedor, Cidade_Fornecedor, 
Estado_Fornecedor, Numero_Fornecedor, Representante_Fornecedor, Telefone_Fornecedor, Email_Fornecedor) VALUES (default, '$nome', '$cep', '$rua', 
'$bairro', '$cidade', '$uf', '$numero', '$repres', '$telefone', '$email')";
$busca = mysqli_query($conn, $query);

if (mysqli_affected_rows($conn) != 0) {
	$_SESSION['msg'] = "<p style='color:green; font-weight: bold;'>FORNECEDOR CADASTRADO COM SUCESSO!</p>";
	header("Location: ../../../cad_list_fornecedor.php");
} else {
	$_SESSION['msg_err'] = "<p style='color:darkred; font-weight: bold;'>ERRO NO CADASTRO!</p>";
	header("Location: ../../../cad_list_fornecedor.php");
}
