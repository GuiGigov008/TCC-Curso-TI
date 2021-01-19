<?php

include './fpdf/fpdf.php';
include './conexao.php';

$pessoas = selectAllPessoa();

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(190, 10, utf8_decode('Relatório de Veículos cadastrados'), 0, 0, "C");
$pdf->Ln(15);

$pdf->SetFont("Arial", "B", 12);
$pdf->Cell(20, 7, "Placa", 1, 0, "C");
$pdf->Cell(40, 7, "Modelo", 1, 0, "C");
$pdf->Cell(40, 7, "Marca", 1, 0, "C");
$pdf->Cell(12, 7, "Ano", 1, 0, "C");
$pdf->Cell(25, 7, "Cor", 1, 0, "C");
$pdf->Cell(60, 7, "Cliente/Dono", 1, 0, "C");
$pdf->Ln();

foreach ($pessoas as $pessoa) {
    $pdf->SetFont("Arial", "I", 10);
    $pdf->Cell(20, 7, utf8_decode($pessoa["Placa"]), 1, 0, "C");
    $pdf->Cell(40, 7, utf8_decode($pessoa["Modelo"]), 1, 0, "C");
    $pdf->Cell(40, 7,  utf8_decode($pessoa["Marca"]), 1, 0, "C");
    $pdf->Cell(12, 7,  utf8_decode($pessoa["Ano"]), 1, 0, "C");
    $pdf->Cell(25, 7,  utf8_decode($pessoa["cor"]), 1, 0, "C");
    $pdf->Cell(60, 7,  utf8_decode($pessoa["cliente"]), 1, 0, "C");
    $pdf->Ln();
}

$pdf->Output();
