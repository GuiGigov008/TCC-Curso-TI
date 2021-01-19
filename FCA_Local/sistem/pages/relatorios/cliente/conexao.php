<?php

function abrirBanco()
{
    $conexao = new mysqli("localhost", "root", "", "grems");
    return $conexao;
}


function selectAllPessoa()
{
    $banco = abrirBanco();
    $sql = "SELECT * FROM clientes ORDER BY Id_Cliente";
    $resultado = $banco->query($sql);
    $banco->close();
    while ($row = mysqli_fetch_array($resultado)) {
        $grupo[] = $row;
    }
    return $grupo;
}

