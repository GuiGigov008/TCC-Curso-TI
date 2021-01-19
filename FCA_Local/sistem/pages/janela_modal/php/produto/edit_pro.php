<?php
session_start();

include_once("../../conexao_banco.php");

$id_produto = mysqli_real_escape_string($conn, $_POST['Id_Produto']);
$tipo = mysqli_real_escape_string($conn, $_POST['Tipo_Produto']);
$nome = mysqli_real_escape_string($conn, $_POST['Descricao_Produto']);
$preco = mysqli_real_escape_string($conn, $_POST['Preco_Produto']);
$forn = mysqli_real_escape_string($conn, $_POST['fk_id_forn']);

$query = "UPDATE produtos SET Id_Produto = '$id_produto', Tipo_Produto = '$tipo', Descricao_Produto = '$nome', Preco_Produto = '$preco', fk_id_forn = '$forn' WHERE Id_Produto = $id_produto";
$busca = mysqli_query($conn, $query);

if (mysqli_affected_rows($conn) != 0) {
	$_SESSION['msg_edit'] = "<p style='color:blue; font-weight: bold;'>PRODUTO ATUALIZADO COM SUCESSO!</p>";
	header("Location: ../../../cad_list_pro.php");
} else {
	$_SESSION['msg_err'] = "<p style='color:darkred; font-weight: bold;'>ERRO NA ATUALIZAÇÃO!</p>";
	header("Location: ../../../cad_list_pro.php");
}
