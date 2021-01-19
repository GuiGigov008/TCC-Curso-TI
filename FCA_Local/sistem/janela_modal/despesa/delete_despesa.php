<?php
include_once("conexao_banco.php");

$id = $_GET['Id_Despesa'];

$query = "DELETE FROM despesas WHERE Id_Despesa = '$id'";
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
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../../valores.php'>
				<script type=\"text/javascript\">
					alert(\"Despesa apagada.\");
				</script>
			";
		} else {
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../../valores.php'>
				<script type=\"text/javascript\">
					alert(\"Erro ao apagar.\");
				</script>
			";
		} ?>
</body>

</html>
<?php $conn->close(); ?>