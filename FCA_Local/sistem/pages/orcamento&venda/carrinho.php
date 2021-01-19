<?php
session_start();
require_once "functions/product.php";
require_once "functions/cart.php";

$pdoConnection = require_once "connection.php";

if (isset($_GET['acao']) && in_array($_GET['acao'], array('add', 'del', 'up'))) {

	if ($_GET['acao'] == 'add' && isset($_GET['id']) && preg_match("/^[0-9]+$/", $_GET['id'])) {
		addCart($_GET['id'], 1);
	}

	if ($_GET['acao'] == 'del' && isset($_GET['id']) && preg_match("/^[0-9]+$/", $_GET['id'])) {
		deleteCart($_GET['id']);
	}

	if ($_GET['acao'] == 'up') {
		if (isset($_POST['prod']) && is_array($_POST['prod'])) {
			foreach ($_POST['prod'] as $id => $qtd) {
				updateCart($id, $qtd);
			}
		}
	}
	header('location: carrinho.php');
}

$resultsCarts = getContentCart($pdoConnection);
$totalCarts  = getTotalCart($pdoConnection);


?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Documento</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" />

</head>

<body>
	<div class="container">

		<?php if ($resultsCarts) : ?>
			<div class="card mt-5">
				<div class="card-body">
					<h4 class="card-title">Carrinho</h4>
					<a href="index.php">Lista de Produtos</a>
				</div>
			</div>

			<div class="card mt-5">
				<div class="card-body">
					<h5 class="card-title">Revisão de itens</h5>
				</div>
			</div>

			<form action="carrinho.php?acao=up" method="POST">
				<table class="table table-strip">
					<thead>
						<tr>
							<th>Produto</th>
							<th>Tipo</th>
							<th>Quantidade</th>
							<th>Preço</th>
							<th>Subtotal</th>
							<th>Ação</th>

						</tr>
					</thead>
					<tbody>
						<?php foreach ($resultsCarts as $result) : ?>
							<tr>
								<td name="nome_produto"><?php echo $result['name'] ?></td>
								<td name="tipo_produto"><?php echo $result['type'] ?></td>
								<td>
									<input type="text" name="prod[<?php echo $result['id'] ?>]" value="<?php echo $result['quantity'] ?>" size="1" />

								</td>
								<td name="preco">R$<?php echo number_format($result['price'], 2, ',', '.') ?></td>
								<td name="subtotal">R$<?php echo number_format($result['subtotal'], 2, ',', '.') ?></td>
								<td><a href="carrinho.php?acao=del&id=<?php echo $result['id'] ?>" class="btn btn-danger">Remover</a></td>

							</tr>
						<?php endforeach; ?>
						<tr>
							<td colspan="3" class="text-right"><b>Total: </b></td>
							<td name="total">R$<?php echo number_format($totalCarts, 2, ',', '.') ?></td>
							<td></td>
						</tr>
					</tbody>

				</table>

				<a class="btn btn-info" href="index.php">Continuar Comprando</a>
				<button class="btn btn-primary" type="submit">Atualizar Carrinho</button>
				<button type="submit" name="Enviar" value="Enviar" class="btn btn-outline-success btn-sn float-right">Confirmar Compra<span class="fas fa-backspace"></span></button>
			</form>

			<form id="formulario" method="POST">
				<h3 style="margin-top: 37%;">Dados do Orçamento</h3>
				<div class="col-md-6">
					<label>Data da Emissão</label>
					<input type="date" name="Data_Emissao" class="form-control" style="width: 100%;" placeholder="">
				</div>
				<div style="margin-top: 5%; margin-bottom: 10%;">
					<div class="col-md-4">
						<label>Placa</label>
						<select type="text" name="Placa" class="form-control" style="width: 100%;" placeholder="">
							<option> Placa </option>
							<?php

							require("../conexao_banco.php");

							$query = "SELECT * FROM veiculos ORDER BY Placa ASC";
							$busca = mysqli_query($link, $query);

							while ($dados = mysqli_fetch_array($busca)) {
								$Placa = $dados['Placa'];
								echo " 
                                  <option> $Placa </option>";
							}
							?>
						</select>
					</div>
					<!-- <div class='col-md-4'>
                      <label>Marca</label>
                      <input type="text" class="form-control" name="Marca" readonly="true" style="background-color: #FFFFFF;" />
                    </div> -->
					<div class='col-md-2'>
						<label>Modelo</label>
						<input type="text" class="form-control" name="Modelo" readonly="true" style="background-color: #FFFFFF;" />
					</div>
					<div class='col-md-6'>
						<label>Cliente</label>
						<input type="text" class="form-control" name="fk_id_cliente" readonly="true" style="background-color: #FFFFFF;" />
					</div>
				</div>

				<div class='col-md-6'>
					<label>Atendente</label>
					<select type='text' name="Atendente" class='form-control select2bs4' style='width: 100%;' placeholder=''>
						<option> Nome </option>
						<?php

						require('../conexao_banco.php');

						$query = "SELECT * FROM funcionarios WHERE Cargo_Func = 1";
						$busca = mysqli_query($link, $query);

						while ($dados = mysqli_fetch_array($busca)) {
							$nome = $dados['Nome_Func'];
							echo " 
                                  <option> $nome </option>";
						}
						?>
					</select>
				</div>
				<div class='col-md-6'>
					<label>Técnico</label>
					<select type="text" name="Tecnico" class="form-control select2bs4" style="width: 100%;" placeholder="">
						<option> Nome </option>
						<?php

						require("../conexao_banco.php");

						$query = "SELECT * FROM funcionarios WHERE Cargo_Func = 2";
						$busca = mysqli_query($link, $query);

						while ($dados = mysqli_fetch_array($busca)) {
							$nome = $dados['Nome_Func'];
							echo " 
                                  <option> $nome </option>";
						}
						?>
					</select>
				</div>

				<?php
				// ENVIANDO DADOS PARA FAZER ORCAMENTO 
				if (isset($_POST['Enviar'])) {
					//recebendos os valores do form

					//-----------------
					// ORCAMENTO MESTRE
					//-----------------
					$data = $_POST['Data_Emissao'];
					$placa = $_POST['Placa'];
					$modelo = $_POST['Modelo'];
					$cliente = $_POST['fk_id_cliente'];
					$atendente = $_POST['Atendente'];
					$tecnico = $_POST['Tecnico'];
					$produtos_mestre = $total;
					$descontos = $_POST['Descontos'];
					// $subtotal_geral = $_POST['Total'];
					$sugestao = $_POST['Sugestao'];
					//CALCULO DE DESCONTO
					$total_mestre = floatval($total) - (floatval($total) * (floatval($descontos) / 100));

					//-----------------
					//ORCAMENTO DETALHES
					//-----------------
					$item = $id;
					$produto_detalhes = $_POST['nome_produto'];
					$quantidade_detalhes = $_POST['quantidade_produto'];
					$valor_unico = $_POST['preco_produto'];
					$sub_total = $_POST['subtotal_produto'];

					//conexao banco 
					require('../conexao_banco.php');

					//ENVIAR DADOS | MESTRE
					$sqlinsert_MESTRE = "INSERT INTO orcamento(Numero_Orcamento, Data_Emissao, Cliente, Placa, Modelo, Tecnico, Atendente, Produtos, Descontos, Total_Geral, Sugestao) VALUES (default, '$data', '$cliente', '$placa', '$modelo', '$tecnico', 
                '$atendente', '$produtos_mestre', '$descontos', '$total_mestre', '$sugestao')";

					mysqli_query($link, $sqlinsert_MESTRE) or die("Deu erro!");
					$id_orcamento = mysqli_insert_id($link);

					//ENVIAR DADOS | DETALHES
					$sqlinsert_DETALHES = "INSERT INTO orcamento_detalhes(ID, FK_Detalhes, Produto, Quantidade, Valor_Unico, Sub_Total) VALUES (default, '$id_orcamento', '$produto_detalhes', '$quantidade_detalhes', '$valor_unico', '$sub_total')";

					mysqli_query($link, $sqlinsert_DETALHES) or die("Não foi possível fazer o orçamento!");

					echo "<script> alert('Orçamento feito!') </script>
                        <meta http-equiv='refresh' content=0.1;url='orcamento_finalizado.php?Numero_Orcamento=$id_orcamento'>";
				}

				?>

			</form>

		<?php endif ?>

	</div>

</body>

</html>