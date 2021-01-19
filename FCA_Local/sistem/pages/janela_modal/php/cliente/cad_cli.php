<?php
session_start();

include_once("../../conexao_banco.php");

$tipo = mysqli_real_escape_string($conn, $_POST['Tipo_Cliente']);
$nome = mysqli_real_escape_string($conn, $_POST['Descricao_Cliente']);
$cod = mysqli_real_escape_string($conn, $_POST['Cod_Cliente']);
$rg = mysqli_real_escape_string($conn, $_POST['RG_Cliente']);
$cep = mysqli_real_escape_string($conn, $_POST['Cep_Cliente']);
$rua = mysqli_real_escape_string($conn, $_POST['Endereco_Cliente']);
$bairro = mysqli_real_escape_string($conn, $_POST['Bairro_Cliente']);
$cidade = mysqli_real_escape_string($conn, $_POST['Cidade_Cliente']);
$uf = mysqli_real_escape_string($conn, $_POST['Estado_Cliente']);
$numero = mysqli_real_escape_string($conn, $_POST['Numero_Cliente']);
$celular = mysqli_real_escape_string($conn, $_POST['Celular_Cliente']);
$telefone = mysqli_real_escape_string($conn, $_POST['Telefone_Cliente']);
$email = mysqli_real_escape_string($conn, $_POST['Email_Cliente']);

$query = "INSERT INTO clientes(Id_Cliente, Tipo_Cliente, Descricao_Cliente, CPF_CNPJ, RG_IE, Cep_Cliente, Endereco_Cliente, Bairro_Cliente, Cidade_Cliente, 
Estado_Cliente, Numero_Cliente, Celular_Cliente, Telefone_Cliente, Email_Cliente) VALUES (default, '$tipo', '$nome', '$cod', '$rg', '$cep', '$rua', 
'$bairro', '$cidade', '$uf', '$numero', '$celular', '$telefone', '$email')";
$busca = mysqli_query($conn, $query);

if (mysqli_affected_rows($conn) != 0) {
	$_SESSION['msg_cad'] = "<p style='color:green; font-weight: bold;'>CLIENTE CADASTRADO COM SUCESSO!</p>";
	header("Location: ../../../cad_list_cliente.php");
} else {
	$_SESSION['msg_err'] = "<p style='color:darkred; font-weight: bold;'>ERRO NO CADASTRO!</p>";
	header("Location: ../../../cad_list_cliente.php");
}
