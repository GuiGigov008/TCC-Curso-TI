<?php

include './fpdf/fpdf.php';
include './conexao.php';

$pessoas = selectAllPessoa();

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(195, 10, utf8_decode('Relatório de Fornecedores cadastrados'), 0, 0, "C");
$pdf->Ln(15);

$pdf->SetFont("Arial", "B", 10);
$pdf->Cell(10, 7, "ID", 1, 0, "C");
$pdf->Cell(50, 7, "Emprea", 1, 0, "C");
$pdf->Cell(60, 7, "Representante", 1, 0, "C");
$pdf->Cell(30, 7, "CEP", 1, 0, "C");
$pdf->Cell(45, 7,  utf8_decode("Telefone"), 1, 0, "C");
$pdf->Ln();

foreach ($pessoas as $pessoa) {
    $pdf->SetFont("Arial", "I", 10);
    $pdf->Cell(10, 7, utf8_decode($pessoa["Id_Fornecedor"]), 1, 0, "C");
    $pdf->Cell(50, 7, utf8_decode($pessoa["Descricao_Fornecedor"]), 1, 0, "C");
    $pdf->Cell(60, 7,  utf8_decode($pessoa["Representante_Fornecedor"]), 1, 0, "C");
    $pdf->Cell(30, 7,  utf8_decode($pessoa["Cep_Fornecedor"]), 1, 0, "C"); 
    $pdf->Cell(45, 7,  $pessoa["Telefone_Fornecedor"], 1, 0, "C");
    $pdf->Ln();
}

$pdf->Output();
