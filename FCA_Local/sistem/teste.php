<?php
$dia1 = '01';
$dia2 = '31';
$mes = '09';
$ano = '2020';

require('pages/conexao_banco.php');

$query = "SELECT * FROM orcamento WHERE fk_id_situacao = 1 AND Data_Emissao BETWEEN '$ano-$mes-$dia1' AND '$ano-$mes-$dia2' ORDER BY Data_Emissao DESC";
$busca = mysqli_query($link, $query);

$soma = "SELECT SUM(Total_Geral) as Receita FROM orcamento WHERE fk_id_situacao = 1 AND Data_Emissao BETWEEN '$ano-$mes-$dia1' AND '$ano-$mes-$dia2'";
$resultado = mysqli_query($link, $soma);
$receita = mysqli_fetch_assoc($resultado);

echo $receita['Receita'];
