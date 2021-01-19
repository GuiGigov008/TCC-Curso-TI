<?php
include_once("conexao_banco.php");
$nome = mysqli_real_escape_string($conn, $_POST['Descricao_Despesa']);
$valor = mysqli_real_escape_string($conn, $_POST['Valor_Despesa']);

$query = "INSERT INTO despesas (Id_Despesa, Descricao_Despesa, Valor_Despesa, Data_Despesa, id_situacao_fk) VALUES (default,'$nome', '$valor', default, '4')";
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
					alert(\"Despesa cadastrada.\");
				</script>
			";
		} else {
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../../valores.php'>
				<script type=\"text/javascript\">
					alert(\"Erro ao cadastrar.\");
				</script>
			";
		} ?>
</body>

</html>
<?php $conn->close(); ?>