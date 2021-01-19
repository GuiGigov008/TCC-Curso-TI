<?php
session_start();

include_once("../../conexao_banco.php");

$tipo = mysqli_real_escape_string($conn, $_POST['Tipo_Produto']);
$nome = mysqli_real_escape_string($conn, $_POST['Descricao_Produto']);
$preco = mysqli_real_escape_string($conn, $_POST['Preco_Produto']);
$id_forn = mysqli_real_escape_string($conn, $_POST['Id_Fornecedor']);

$query = "INSERT INTO produtos (Id_Produto, Descricao_Produto, Preco_Produto, Tipo_Produto, fk_id_forn) 
VALUES (default, '$nome', '$preco', '$tipo', '$id_forn')";
$busca = mysqli_query($conn, $query);

if (mysqli_affected_rows($conn) != 0) {
    $_SESSION['msg_cad'] = "<p style='color:green; font-weight: bold;'>PRODUTO CADASTRADO COM SUCESSO!</p>";
    header("Location: ../../../cad_list_pro.php");
} else {
    $_SESSION['msg_err'] = "<p style='color:darkred; font-weight: bold;'>ERRO NO CADASTRO!</p>";
    header("Location: ../../../cad_list_pro.php");
}
