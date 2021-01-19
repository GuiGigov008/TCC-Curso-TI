<?php
include_once("conexao_banco.php");

$id = $_GET['Id_Despesa'];

$query = "UPDATE despesas SET id_situacao_fk = 1 WHERE Id_Despesa = $id";
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
					alert(\"Despesa paga com sucesso.\");
				</script>
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../../valores.php'>
			";
		} else {
			echo "
				<script type=\"text/javascript\">
					alert(\"Erro ao pagar.\");
				</script>
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../../valores.php'>
			";
		} ?>
</body>

</html>
<?php $conn->close(); ?>