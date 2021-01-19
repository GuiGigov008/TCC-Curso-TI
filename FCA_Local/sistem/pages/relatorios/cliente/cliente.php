<?php

include './fpdf/fpdf.php';
include './conexao.php';

$pessoas = selectAllPessoa();

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(195, 10, utf8_decode('Relatório de Clientes cadastrados'), 0, 0, "C");
$pdf->Ln(15);

$pdf->SetFont("Arial", "B", 10);
$pdf->Cell(10, 7, "ID", 1, 0, "C");
$pdf->Cell(40, 7, "Nome", 1, 0, "C");
$pdf->Cell(30, 7, "CPF", 1, 0, "C");
$pdf->Cell(30, 7, "Celular.", 1, 0, "C");
$pdf->Cell(30, 7, "Telefone", 1, 0, "C");
$pdf->Cell(55, 7,  utf8_decode("CEP"), 1, 0, "C");
$pdf->Ln();

foreach ($pessoas as $pessoa) {
    $pdf->SetFont("Arial", "I", 10);
    $pdf->Cell(10, 7, utf8_decode($pessoa["Id_Cliente"]), 1, 0, "C");
    $pdf->Cell(40, 7, utf8_decode($pessoa["Descricao_Cliente"]), 1, 0, "C");
    $pdf->Cell(30, 7,  utf8_decode($pessoa["CPF_CNPJ"]), 1, 0, "C");
    $pdf->Cell(30, 7,  utf8_decode($pessoa["Celular_Cliente"]), 1, 0, "C");
    $pdf->Cell(30, 7, $pessoa["Telefone_Cliente"], 1, 0, "C");
    $pdf->Cell(55, 7,  utf8_decode($pessoa["Cep_Cliente"]), 1, 0, "C");
    $pdf->Ln();
}

$pdf->Output();
