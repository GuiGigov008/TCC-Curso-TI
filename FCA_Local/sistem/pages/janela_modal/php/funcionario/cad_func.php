<?php
session_start();

include_once("../../conexao_banco.php");

$nome =  mysqli_real_escape_string($conn, $_POST['Nome_Func']);
$cpf =  mysqli_real_escape_string($conn, $_POST['CPF_Func']);
$rg =  mysqli_real_escape_string($conn, $_POST['RG_Func']);
$telefone =  mysqli_real_escape_string($conn, $_POST['Telefone_Func']);
$celular =  mysqli_real_escape_string($conn, $_POST['Celular_Func']);
$cep =  mysqli_real_escape_string($conn, $_POST['CEP_Func']);
$rua =  mysqli_real_escape_string($conn, $_POST['Endereco_Func']);
$bairro =  mysqli_real_escape_string($conn, $_POST['Bairro_Func']);
$cidade =  mysqli_real_escape_string($conn, $_POST['Cidade_Func']);
$uf =  mysqli_real_escape_string($conn, $_POST['Estado_Func']);
$numero =  mysqli_real_escape_string($conn, $_POST['Numero_Func']);
$email =  mysqli_real_escape_string($conn, $_POST['Email_Func']);
$cargo =  mysqli_real_escape_string($conn, $_POST['Cargo_Func']);

$query = "INSERT INTO funcionarios (Id_Func, Nome_Func, CPF_Func, RG_Func, Telefone_Func, Celular_Func, CEP_Func, Endereco_Func, Cidade_Func, Estado_Func, Cargo_Func, Email_Func, Numero_Func, Bairro_Func) 
VALUES (default, '$nome', '$cpf', '$rg', '$telefone', '$celular', '$cep', '$rua', '$cidade', '$uf', '$cargo', '$email', '$numero', '$bairro')";
$busca = mysqli_query($conn, $query);

if (mysqli_affected_rows($conn) != 0) {
    $_SESSION['msg_cad'] = "<p style='color:green; font-weight: bold;'>FUNCIONÁRIO CADASTRADO COM SUCESSO!</p>";
    header("Location: ../../../cad_list_func.php");
} else {
    $_SESSION['msg_err'] = "<p style='color:darkred; font-weight: bold;'>ERRO NO CADASTRO!</p>";
    header("Location: ../../../cad_list_func.php");
}
