<?php

function abrirBanco()
{
    $conexao = new mysqli("localhost", "root", "", "grems");
    return $conexao;
}


function selectAllPessoa()
{
    $banco = abrirBanco();
    $sql = "SELECT * FROM fornecedores ORDER BY Id_Fornecedor ASC";
    $resultado = $banco->query($sql);
    $banco->close();
    while ($row = mysqli_fetch_array($resultado)) {
        $grupo[] = $row;
    }
    return $grupo;
}

