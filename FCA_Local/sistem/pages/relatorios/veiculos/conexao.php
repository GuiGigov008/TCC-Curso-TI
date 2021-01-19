<?php

function abrirBanco()
{
    $conexao = new mysqli("localhost", "root", "", "grems");
    return $conexao;
}


function selectAllPessoa()
{
    $banco = abrirBanco();
    $sql = "SELECT veiculos.Placa, veiculos.Modelo, veiculos.Marca, veiculos.Ano, veiculos.cor, clientes.Descricao_Cliente AS cliente FROM veiculos INNER JOIN clientes ON veiculos.fk_id_cliente = clientes.Id_Cliente ";
    $resultado = $banco->query($sql);
    $banco->close();
    while ($row = mysqli_fetch_array($resultado)) {
        $grupo[] = $row;
    }
    return $grupo;
}

function selectIdPessoa($placa)
{
    $banco = abrirBanco();
    $sql = "SELECT veiculos.Placa, veiculos.Modelo, veiculos.Marca, veiculos.Ano, veiculos.cor, clientes.Descricao_Cliente AS cliente FROM veiculos INNER JOIN clientes ON veiculos.fk_id_cliente = clientes.Id_Cliente ";
    $resultado = $banco->query($sql);
    $banco->close();
    $pessoa = mysqli_fetch_assoc($resultado);
    return $pessoa;
}
