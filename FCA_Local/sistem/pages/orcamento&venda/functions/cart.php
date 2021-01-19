<?php

if (!isset($_SESSION['carrinho'])) {
	$_SESSION['carrinho'] = array();
}

function addCart($id, $quantity)
{
	if (!isset($_SESSION['carrinho'][$id])) {
		$_SESSION['carrinho'][$id] = $quantity;
	}
}

function deleteCart($id)
{
	if (isset($_SESSION['carrinho'][$id])) {
		unset($_SESSION['carrinho'][$id]);
	}
}

function updateCart($id, $quantity)
{
	if (isset($_SESSION['carrinho'][$id])) {
		if ($quantity > 0) {
			$_SESSION['carrinho'][$id] = $quantity;
		} else {
			deleteCart($id);
		}
	}
}

function getContentCart($pdo)
{

	$results = array();

	if ($_SESSION['carrinho']) {

		$cart = $_SESSION['carrinho'];
		$products =  getProductsByIds($pdo, implode(',', array_keys($cart)));

		foreach ($products as $product) {

			$results[] = array(
				'id' => $product['Id_Produto'],
				'type' => $product['Tipo_Produto'],
				'name' => $product['Descricao_Produto'],
				'price' => $product['Preco_Produto'],
				'quantity' => $cart[$product['Id_Produto']],
				'subtotal' => $cart[$product['Id_Produto']] * $product['Preco_Produto'],
			);
		}
	}

	return $results;
}

function getTotalCart($pdo)
{

	$total = 0;

	foreach (getContentCart($pdo) as $product) {
		$total += $product['subtotal'];
	}
	return $total;
}
