<?php

function abrirBanco()
{
    $conexao = new mysqli("localhost", "root", "", "grems");
    return $conexao;
}


function selectAllPessoa()
{
    $banco = abrirBanco();
    $sql = "SELECT produtos.Id_Produto , produtos.Descricao_Produto, produtos.Preco_Produto, produtos.Tipo_Produto, fornecedores.Descricao_Fornecedor AS fornecedores FROM produtos INNER JOIN fornecedores ON produtos.fk_id_forn = fornecedores.Id_Fornecedor ";
    $resultado = $banco->query($sql);
    $banco->close();
    while ($row = mysqli_fetch_array($resultado)) {
        $grupo[] = $row;
    }
    return $grupo;
}

function selectIdPessoa($id)
{
    $banco = abrirBanco();
    $sql = "SELECT produtos.Id_Produto , produtos.Descricao_Produto, produtos.Preco_Produto, produtos.Tipo_Produto, fornecedores.Descricao_Fornecedor AS fornecedores FROM produtos INNER JOIN fornecedores ON produtos.fk_id_forn = fornecedores.Id_Fornecedor ";
    $resultado = $banco->query($sql);
    $banco->close();
    $pessoa = mysqli_fetch_assoc($resultado);
    return $pessoa;
}
