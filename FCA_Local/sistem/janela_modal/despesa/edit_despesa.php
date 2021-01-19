<?php
include_once("conexao_banco.php");
$id = mysqli_real_escape_string($conn, $_POST['Id_Despesa']);
$nome = mysqli_real_escape_string($conn, $_POST['Descricao_Despesa']);
$valor = mysqli_real_escape_string($conn, $_POST['Valor_Despesa']);
$valor = mysqli_real_escape_string($conn, $_POST['Data_Despesa']);
$valor = mysqli_real_escape_string($conn, $_POST['id_situacao_fk']);

$query = "UPDATE despesas SET Descricao_Despesa = '$nome', Valor_Despesa = '$valor', Data_Despesa = default, id_situacao_fk = default WHERE Id_Despesa = $id";
$busca = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="utf-8">
</head>

<body> <?php
		if (mysqli_affected_rows($conn) != 0) {
			echo "
				<script type=\"text/javascript\">
					alert(\"Despesa alterada.\");
				</script>
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../../valores.php'>
			";
		} else {
			echo "
				<script type=\"text/javascript\">
					alert(\"Erro ao alterar.\");
				</script>
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../../valores.php'>
			";
		} ?>
</body>

</html>
<?php $conn->close(); ?>