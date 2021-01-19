<?php

include './fpdf/fpdf.php';
include './conexao.php';

$pessoas = selectAllPessoa();

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(195, 10, utf8_decode('Relatório de Usuários cadastrados'), 0, 0, "C");
$pdf->Ln(15);

$pdf->SetFont("Arial", "B", 10);
$pdf->Cell(10, 7, "ID", 1, 0, "C");
$pdf->Cell(40, 7, "Nome", 1, 0, "C");
$pdf->Cell(55, 7, "Email", 1, 0, "C");
$pdf->Cell(55, 7, "Tipo", 1, 0, "C");

$pdf->Ln();

foreach ($pessoas as $pessoa) {
    $pdf->SetFont("Arial", "I", 10);
    $pdf->Cell(10, 7, utf8_decode($pessoa["id"]), 1, 0, "C");
    $pdf->Cell(40, 7, utf8_decode($pessoa["nome"]), 1, 0, "C");
    $pdf->Cell(55, 7,  utf8_decode($pessoa["email"]), 1, 0, "C");
    $pdf->Cell(55, 7,  utf8_decode($pessoa["adm"]), 1, 0, "C");

    $pdf->Ln();
}

$pdf->Output();
