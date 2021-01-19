<?php
session_start();

include_once("../../conexao_banco.php");

$adm_user = mysqli_real_escape_string($conn, $_POST['Adm_User']);
$nome_user = mysqli_real_escape_string($conn, $_POST['Nome_User']);
$email_user = mysqli_real_escape_string($conn, $_POST['Email_User']);
$email2_user = mysqli_real_escape_string($conn, $_POST['Email2_User']);
$senha_user = mysqli_real_escape_string($conn, $_POST['Senha_User']);
$senha2_user = mysqli_real_escape_string($conn, $_POST['Senha2_User']);

if ($senha2_user != $senha_user && $email2_user != $email_user || $senha2_user != $senha_user || $email2_user != $email_user) {

	$_SESSION['msg_err'] = "<p style='color:darkred; font-weight: bold;'>ERRO NA CONFIRMAÇÃO DE E-MAIL OU SENHA!</p>";
	header("Location: ../../../cad_list_users.php");
} else {
	$query = "INSERT INTO usuarios (id, adm, nome, email, senha) 
	VALUES (default, '$adm_user', '$nome_user', '$email_user', '$senha_user')";
	$busca = mysqli_query($conn, $query);

	$_SESSION['msg_cad'] = "<p style='color:green; font-weight: bold;'>USUÁRIO CADASTRADO COM SUCESSO!</p>";
	header("Location: ../../../cad_list_users.php");
}
