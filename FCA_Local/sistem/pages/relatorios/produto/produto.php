<?php

include './fpdf/fpdf.php';
include './conexao.php';

$pessoas = selectAllPessoa();

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(190, 10, utf8_decode('Relatório de Itens cadastrados'), 0, 0, "C");
$pdf->Ln(15);

$pdf->SetFont("Arial", "B", 10);
$pdf->Cell(20, 7, "ID", 1, 0, "C");
$pdf->Cell(50, 7, "Produto", 1, 0, "C");
$pdf->Cell(40, 7, utf8_decode("Preço"), 1, 0, "C");
$pdf->Cell(40, 7, "Fornecedor", 1, 0, "C");
$pdf->Cell(40, 7, "Tipo", 1, 0, "C");
$pdf->Ln();

foreach ($pessoas as $pessoa) {
    $pdf->SetFont("Arial", "I", 10);
    $pdf->Cell(20, 7, utf8_decode($pessoa["Id_Produto"]), 1, 0, "C");
    $pdf->Cell(50, 7, utf8_decode($pessoa["Descricao_Produto"]), 1, 0, "C");
    $pdf->Cell(40, 7,  utf8_decode($pessoa["Preco_Produto"]), 1, 0, "C");
    $pdf->Cell(40, 7,  utf8_decode($pessoa["fornecedores"]), 1, 0, "C");
    $pdf->Cell(40, 7,  utf8_decode($pessoa["Tipo_Produto"]), 1, 0, "C");
    $pdf->Ln();
}

$pdf->Output();
