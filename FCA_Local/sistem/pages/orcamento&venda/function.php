<?php
include_once("conexao.php");

function retorna($Placa, $conn)
{
	$result_produto = "SELECT v.Modelo, c.Descricao_Cliente, c.Id_Cliente FROM veiculos as v
	INNER JOIN clientes as c on c.Id_Cliente = v.fk_id_cliente
		WHERE Placa = '$Placa' LIMIT 1";
	$resultado_produto = mysqli_query($conn, $result_produto);
	if ($resultado_produto->num_rows) {
		$row_produto = mysqli_fetch_assoc($resultado_produto);
		// $valores['Marca'] = $row_produto['Marca'];
		$valores['Modelo'] = $row_produto['Modelo'];
		$valores['fk_nome_cliente'] = $row_produto['Descricao_Cliente'];
		$valores['fk_id_cliente'] = $row_produto['Id_Cliente'];
	} else {
		// $valores['Marca'] = 'Marca não encontrada';
		$valores['Modelo'] = 'Modelo não encontrado';
		$valores['fk_id_cliente'] = 'Cliente não encontrado';
	}
	return json_encode($valores);
}

if (isset($_GET['Placa'])) {
	echo retorna($_GET['Placa'], $conn);
}
