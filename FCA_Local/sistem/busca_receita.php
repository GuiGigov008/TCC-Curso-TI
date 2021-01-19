<?php

//CONEXAO DATABASE
require('pages/conexao_banco.php');

//SE JANEIRO FOR RECEBIDO
if (isset($_POST['janeiro_rec'])) {
  $dia1 = '01';
  $dia2 = '31';
  $mes = '01';
  $anoreceita = $_POST['ano_receita'];

  $query = "SELECT * FROM orcamento WHERE fk_id_situacao = 1 AND Data_Emissao BETWEEN '$anoreceita-$mes-$dia1' AND '$anoreceita-$mes-$dia2' ORDER BY Data_Emissao DESC";
  $busca = mysqli_query($link, $query);

  $soma = "SELECT SUM(Total_Geral) AS Receita FROM orcamento WHERE fk_id_situacao = 1 AND Data_Emissao BETWEEN '$anoreceita-$mes-$dia1' AND '$anoreceita-$mes-$dia2'";
  $resultado = mysqli_query($link, $soma);
  $receita = mysqli_fetch_assoc($resultado);

  while ($dados = mysqli_fetch_array($busca)) {
    $id = $dados['Numero_Orcamento'];
    $data = $dados['Data_Emissao'];
    $date_format = date('d/m/Y', strtotime($data));
    $situacao = "Fechado";
    $total = $dados['Total_Geral'];

    echo "
                              <tr>
                                <td class='text-center'><a href='pages/orcamento&venda/orcamento_feito_fechado.php?Numero_Orcamento=$id'>" . $dados['Numero_Orcamento'] . "</a></td>
                                <td class='text-center'>" . "Fechado" . "</td>
                                <td class='text-center'>" . $date_format . "</td>
                                <td class='text-center'>R$ " . $dados['Total_Geral'] . ",00</td>
                              </tr>";
  }
  echo "
                              <tr>
                                <td></td>
                                <td></td>
                                <td class='text-center' style='font-size: 130%; color: white; background-color: teal; font-weight: bold;'><label>Receita:</label> R$ " . $receita['Receita'] . ",00</td>
                              </tr>";
}

//SE FEVEREIRO FOR RECEBIDO
if (isset($_POST['fevereiro_rec'])) {
  $dia1 = '01';
  $dia2 = '31';
  $mes = '02';
  $anoreceita = $_POST['ano_receita'];

  $query = "SELECT * FROM orcamento WHERE fk_id_situacao = 1 AND Data_Emissao BETWEEN '$anoreceita-$mes-$dia1' AND '$anoreceita-$mes-$dia2' ORDER BY Data_Emissao DESC";
  $busca = mysqli_query($link, $query);

  $soma = "SELECT SUM(Total_Geral) AS Receita FROM orcamento WHERE fk_id_situacao = 1 AND Data_Emissao BETWEEN '$anoreceita-$mes-$dia1' AND '$anoreceita-$mes-$dia2'";
  $resultado = mysqli_query($link, $soma);
  $receita = mysqli_fetch_assoc($resultado);

  while ($dados = mysqli_fetch_array($busca)) {
    $id = $dados['Numero_Orcamento'];
    $data = $dados['Data_Emissao'];
    $date_format = date('d/m/Y', strtotime($data));
    $cliente = $dados['Total_Geral'];

    echo "
                              <tr>
                                <td class='text-center'><a href='pages/orcamento&venda/orcamento_feito_fechado.php?Numero_Orcamento=$id'>" . $dados['Numero_Orcamento'] . "</a></td>
                                <td class='text-center'>" . "Fechado" . "</td>
                                <td class='text-center'>" . $date_format . "</td>
                                <td class='text-center'>R$ " . $dados['Total_Geral'] . ",00</td>
                              </tr>";
  }
  echo "
                              <tr>
                                <td></td>
                                <td></td>
                                <td class='text-center' style='font-size: 130%; color: white; background-color: teal; font-weight: bold;'><label>Receita:</label> R$ " . $receita['Receita'] . ",00</td>
                              </tr>";
}

//SE MARCO FOR RECEBIDO
if (isset($_POST['marco_rec'])) {
  $dia1 = '01';
  $dia2 = '31';
  $mes = '03';
  $anoreceita = $_POST['ano_receita'];

  $query = "SELECT * FROM orcamento WHERE fk_id_situacao = 1 AND Data_Emissao BETWEEN '$anoreceita-$mes-$dia1' AND '$anoreceita-$mes-$dia2' ORDER BY Data_Emissao DESC";
  $busca = mysqli_query($link, $query);

  $soma = "SELECT SUM(Total_Geral) AS Receita FROM orcamento WHERE fk_id_situacao = 1 AND Data_Emissao BETWEEN '$anoreceita-$mes-$dia1' AND '$anoreceita-$mes-$dia2'";
  $resultado = mysqli_query($link, $soma);
  $receita = mysqli_fetch_assoc($resultado);

  while ($dados = mysqli_fetch_array($busca)) {
    $id = $dados['Numero_Orcamento'];
    $data = $dados['Data_Emissao'];
    $date_format = date('d/m/Y', strtotime($data));
    $cliente = $dados['Total_Geral'];

    echo "
                              <tr>
                                <td class='text-center'><a href='pages/orcamento&venda/orcamento_feito_fechado.php?Numero_Orcamento=$id'>" . $dados['Numero_Orcamento'] . "</a></td>
                                <td class='text-center'>" . "Fechado" . "</td>
                                <td class='text-center'>" . $date_format . "</td>
                                <td class='text-center'>R$ " . $dados['Total_Geral'] . ",00</td>
                              </tr>";
  }
  echo "
                              <tr>
                                <td></td>
                                <td></td>
                                <td class='text-center' style='font-size: 130%; color: white; background-color: teal; font-weight: bold;'><label>Receita:</label> R$ " . $receita['Receita'] . ",00</td>
                              </tr>";
}

//SE ABRIL FOR RECEBIDO
if (isset($_POST['abril_rec'])) {
  $dia1 = '01';
  $dia2 = '31';
  $mes = '04';
  $anoreceita = $_POST['ano_receita'];

  $query = "SELECT * FROM orcamento WHERE fk_id_situacao = 1 AND Data_Emissao BETWEEN '$anoreceita-$mes-$dia1' AND '$anoreceita-$mes-$dia2' ORDER BY Data_Emissao DESC";
  $busca = mysqli_query($link, $query);

  $soma = "SELECT SUM(Total_Geral) AS Receita FROM orcamento WHERE fk_id_situacao = 1 AND Data_Emissao BETWEEN '$anoreceita-$mes-$dia1' AND '$anoreceita-$mes-$dia2'";
  $resultado = mysqli_query($link, $soma);
  $receita = mysqli_fetch_assoc($resultado);

  while ($dados = mysqli_fetch_array($busca)) {
    $id = $dados['Numero_Orcamento'];
    $data = $dados['Data_Emissao'];
    $date_format = date('d/m/Y', strtotime($data));
    $cliente = $dados['Total_Geral'];

    echo "
                              <tr>
                                <td class='text-center'><a href='pages/orcamento&venda/orcamento_feito_fechado.php?Numero_Orcamento=$id'>" . $dados['Numero_Orcamento'] . "</a></td>
                                <td class='text-center'>" . "Fechado" . "</td>
                                <td class='text-center'>" . $date_format . "</td>
                                <td class='text-center'>R$ " . $dados['Total_Geral'] . ",00</td>
                              </tr>";
  }
  echo "
                              <tr>
                                <td></td>
                                <td></td>
                                <td class='text-center' style='font-size: 130%; color: white; background-color: teal; font-weight: bold;'><label>Receita:</label> R$ " . $receita['Receita'] . ",00</td>
                              </tr>";
}

//SE MAIO FOR RECEBIDO
if (isset($_POST['maio_rec'])) {
  $dia1 = '01';
  $dia2 = '31';
  $mes = '05';
  $anoreceita = $_POST['ano_receita'];

  $query = "SELECT * FROM orcamento WHERE fk_id_situacao = 1 AND Data_Emissao BETWEEN '$anoreceita-$mes-$dia1' AND '$anoreceita-$mes-$dia2' ORDER BY Data_Emissao DESC";
  $busca = mysqli_query($link, $query);

  $soma = "SELECT SUM(Total_Geral) AS Receita FROM orcamento WHERE fk_id_situacao = 1 AND Data_Emissao BETWEEN '$anoreceita-$mes-$dia1' AND '$anoreceita-$mes-$dia2'";
  $resultado = mysqli_query($link, $soma);
  $receita = mysqli_fetch_assoc($resultado);

  while ($dados = mysqli_fetch_array($busca)) {
    $id = $dados['Numero_Orcamento'];
    $data = $dados['Data_Emissao'];
    $date_format = date('d/m/Y', strtotime($data));
    $cliente = $dados['Total_Geral'];

    echo "
                              <tr>
                                <td class='text-center'><a href='pages/orcamento&venda/orcamento_feito_fechado.php?Numero_Orcamento=$id'>" . $dados['Numero_Orcamento'] . "</a></td>
                                <td class='text-center'>" . "Fechado" . "</td>
                                <td class='text-center'>" . $date_format . "</td>
                                <td class='text-center'>R$ " . $dados['Total_Geral'] . ",00</td>
                              </tr>";
  }
  echo "
                              <tr>
                                <td></td>
                                <td></td>
                                <td class='text-center' style='font-size: 130%; color: white; background-color: teal; font-weight: bold;'><label>Receita:</label> R$ " . $receita['Receita'] . ",00</td>
                              </tr>";
}

//SE JUNHO FOR RECEBIDO
if (isset($_POST['junho_rec'])) {
  $dia1 = '01';
  $dia2 = '31';
  $mes = '06';
  $anoreceita = $_POST['ano_receita'];

  $query = "SELECT * FROM orcamento WHERE fk_id_situacao = 1 AND Data_Emissao BETWEEN '$anoreceita-$mes-$dia1' AND '$anoreceita-$mes-$dia2' ORDER BY Data_Emissao DESC";
  $busca = mysqli_query($link, $query);

  $soma = "SELECT SUM(Total_Geral) AS Receita FROM orcamento WHERE fk_id_situacao = 1 AND Data_Emissao BETWEEN '$anoreceita-$mes-$dia1' AND '$anoreceita-$mes-$dia2'";
  $resultado = mysqli_query($link, $soma);
  $receita = mysqli_fetch_assoc($resultado);

  while ($dados = mysqli_fetch_array($busca)) {
    $id = $dados['Numero_Orcamento'];
    $data = $dados['Data_Emissao'];
    $date_format = date('d/m/Y', strtotime($data));
    $cliente = $dados['Total_Geral'];

    echo "
                              <tr>
                                <td class='text-center'><a href='pages/orcamento&venda/orcamento_feito_fechado.php?Numero_Orcamento=$id'>" . $dados['Numero_Orcamento'] . "</a></td>
                                <td class='text-center'>" . "Fechado" . "</td>
                                <td class='text-center'>" . $date_format . "</td>
                                <td class='text-center'>R$ " . $dados['Total_Geral'] . ",00</td>
                              </tr>";
  }
  echo "
                              <tr>
                                <td></td>
                                <td></td>
                                <td class='text-center' style='font-size: 130%; color: white; background-color: teal; font-weight: bold;'><label>Receita:</label> R$ " . $receita['Receita'] . ",00</td>
                              </tr>";
}

//SE JULHO FOR RECEBIDO
if (isset($_POST['julho_rec'])) {
  $dia1 = '01';
  $dia2 = '31';
  $mes = '07';
  $anoreceita = $_POST['ano_receita'];

  $query = "SELECT * FROM orcamento WHERE fk_id_situacao = 1 AND Data_Emissao BETWEEN '$anoreceita-$mes-$dia1' AND '$anoreceita-$mes-$dia2' ORDER BY Data_Emissao DESC";
  $busca = mysqli_query($link, $query);

  $soma = "SELECT SUM(Total_Geral) AS Receita FROM orcamento WHERE fk_id_situacao = 1 AND Data_Emissao BETWEEN '$anoreceita-$mes-$dia1' AND '$anoreceita-$mes-$dia2'";
  $resultado = mysqli_query($link, $soma);
  $receita = mysqli_fetch_assoc($resultado);

  while ($dados = mysqli_fetch_array($busca)) {
    $id = $dados['Numero_Orcamento'];
    $data = $dados['Data_Emissao'];
    $date_format = date('d/m/Y', strtotime($data));
    $cliente = $dados['Total_Geral'];

    echo "
                              <tr>
                                <td class='text-center'><a href='pages/orcamento&venda/orcamento_feito_fechado.php?Numero_Orcamento=$id'>" . $dados['Numero_Orcamento'] . "</a></td>
                                <td class='text-center'>" . "Fechado" . "</td>
                                <td class='text-center'>" . $date_format . "</td>
                                <td class='text-center'>R$ " . $dados['Total_Geral'] . ",00</td>
                              </tr>";
  }
  echo "
                              <tr>
                                <td></td>
                                <td></td>
                                <td class='text-center' style='font-size: 130%; color: white; background-color: teal; font-weight: bold;'><label>Receita:</label> R$ " . $receita['Receita'] . ",00</td>
                              </tr>";
}

//SE AGOSTO FOR RECEBIDO
if (isset($_POST['agosto_rec'])) {
  $dia1 = '01';
  $dia2 = '31';
  $mes = '08';
  $anoreceita = $_POST['ano_receita'];

  $query = "SELECT * FROM orcamento WHERE fk_id_situacao = 1 AND Data_Emissao BETWEEN '$anoreceita-$mes-$dia1' AND '$anoreceita-$mes-$dia2' ORDER BY Data_Emissao DESC";
  $busca = mysqli_query($link, $query);

  $soma = "SELECT SUM(Total_Geral) AS Receita FROM orcamento WHERE fk_id_situacao = 1 AND Data_Emissao BETWEEN '$anoreceita-$mes-$dia1' AND '$anoreceita-$mes-$dia2'";
  $resultado = mysqli_query($link, $soma);
  $receita = mysqli_fetch_assoc($resultado);

  while ($dados = mysqli_fetch_array($busca)) {
    $id = $dados['Numero_Orcamento'];
    $data = $dados['Data_Emissao'];
    $date_format = date('d/m/Y', strtotime($data));
    $cliente = $dados['Total_Geral'];

    echo "
                              <tr>
                                <td class='text-center'><a href='pages/orcamento&venda/orcamento_feito_fechado.php?Numero_Orcamento=$id'>" . $dados['Numero_Orcamento'] . "</a></td>
                                <td class='text-center'>" . "Fechado" . "</td>
                                <td class='text-center'>" . $date_format . "</td>
                                <td class='text-center'>R$ " . $dados['Total_Geral'] . ",00</td>
                              </tr>";
  }
  echo "
                              <tr>
                                <td></td>
                                <td></td>
                                <td class='text-center' style='font-size: 130%; color: white; background-color: teal; font-weight: bold;'><label>Receita:</label> R$ " . $receita['Receita'] . ",00</td>
                              </tr>";
}

//SE SETEMBRO FOR RECEBIDO
if (isset($_POST['setembro_rec'])) {
  $dia1 = '01';
  $dia2 = '31';
  $mes = '09';
  $anoreceita = $_POST['ano_receita'];

  $query = "SELECT * FROM orcamento WHERE fk_id_situacao = 1 AND Data_Emissao BETWEEN '$anoreceita-$mes-$dia1' AND '$anoreceita-$mes-$dia2' ORDER BY Data_Emissao DESC";
  $busca = mysqli_query($link, $query);

  $soma = "SELECT SUM(Total_Geral) AS Receita FROM orcamento WHERE fk_id_situacao = 1 AND Data_Emissao BETWEEN '$anoreceita-$mes-$dia1' AND '$anoreceita-$mes-$dia2'";
  $resultado = mysqli_query($link, $soma);
  $valor = mysqli_fetch_assoc($resultado);
  $receita = $valor['Receita'];

  while ($dados = mysqli_fetch_array($busca)) {
    $id = $dados['Numero_Orcamento'];
    $data = $dados['Data_Emissao'];
    $date_format = date('d/m/Y', strtotime($data));
    $total = $dados['Total_Geral'];

    echo "
                              <tr>
                                <td class='text-center'><a href='pages/orcamento&venda/orcamento_feito_fechado.php?Numero_Orcamento=$id'>" . $dados['Numero_Orcamento'] . "</a></td>
                                <td class='text-center'>" . "Fechado" . "</td>
                                <td class='text-center'>" . $date_format . "</td>
                                <td class='text-center'>R$ " . $dados['Total_Geral'] . ",00</td>
                              </tr>";
  }
  echo "
                              <tr>
                                <td></td>
                                <td></td>
                                <td class='text-center' style='font-size: 130%; color: white; background-color: teal; font-weight: bold;'><label>Receita:</label> R$ " . $receita . ",00</td>
                              </tr>";
}

//SE OUTUBRO FOR RECEBIDO
if (isset($_POST['outubro_rec'])) {
  $dia1 = '01';
  $dia2 = '31';
  $mes = '10';
  $anoreceita = $_POST['ano_receita'];

  $query = "SELECT * FROM orcamento WHERE fk_id_situacao = 1 AND Data_Emissao BETWEEN '$anoreceita-$mes-$dia1' AND '$anoreceita-$mes-$dia2' ORDER BY Data_Emissao DESC";
  $busca = mysqli_query($link, $query);

  $soma = "SELECT SUM(Total_Geral) AS Receita FROM orcamento WHERE fk_id_situacao = 1 AND Data_Emissao BETWEEN '$anoreceita-$mes-$dia1' AND '$anoreceita-$mes-$dia2'";
  $resultado = mysqli_query($link, $soma);
  $valor = mysqli_fetch_assoc($resultado);
  $receita = $valor['Receita'];

  while ($dados = mysqli_fetch_array($busca)) {
    $id = $dados['Numero_Orcamento'];
    $data = $dados['Data_Emissao'];
    $date_format = date('d/m/Y', strtotime($data));
    $cliente = $dados['Total_Geral'];

    echo "
                              <tr>
                                <td class='text-center'><a href='pages/orcamento&venda/orcamento_feito_fechado.php?Numero_Orcamento=$id'>" . $dados['Numero_Orcamento'] . "</a></td>
                                <td class='text-center'>" . "Fechado" . "</td>
                                <td class='text-center'>" . $date_format . "</td>
                                <td class='text-center'>R$ " . $dados['Total_Geral'] . ",00</td>
                              </tr>";
  }
  echo "
                              <tr>
                                <td></td>
                                <td></td>
                                <td class='text-center' style='font-size: 130%; color: white; background-color: teal; font-weight: bold;'><label>Receita:</label> R$ " . $receita . ",00</td>
                              </tr>";
}

//SE NOVEMBRO FOR RECEBIDO
if (isset($_POST['novembro_rec'])) {
  $dia1 = '01';
  $dia2 = '31';
  $mes = '11';
  $anoreceita = $_POST['ano_receita'];

  $query = "SELECT * FROM orcamento WHERE fk_id_situacao = 1 AND Data_Emissao BETWEEN '$anoreceita-$mes-$dia1' AND '$anoreceita-$mes-$dia2' ORDER BY Data_Emissao DESC";
  $busca = mysqli_query($link, $query);

  $soma = "SELECT SUM(Total_Geral) AS Receita FROM orcamento WHERE fk_id_situacao = 1 AND Data_Emissao BETWEEN '$anoreceita-$mes-$dia1' AND '$anoreceita-$mes-$dia2'";
  $resultado = mysqli_query($link, $soma);
  $receita = mysqli_fetch_assoc($resultado);

  while ($dados = mysqli_fetch_array($busca)) {
    $id = $dados['Numero_Orcamento'];
    $data = $dados['Data_Emissao'];
    $date_format = date('d/m/Y', strtotime($data));
    $cliente = $dados['Total_Geral'];

    echo "
                              <tr>
                                <td class='text-center'><a href='pages/orcamento&venda/orcamento_feito_fechado.php?Numero_Orcamento=$id'>" . $dados['Numero_Orcamento'] . "</a></td>
                                <td class='text-center'>" . "Fechado" . "</td>
                                <td class='text-center'>" . $date_format . "</td>
                                <td class='text-center'>R$ " . $dados['Total_Geral'] . ",00</td>
                              </tr>";
  }
  echo "
                              <tr>
                                <td></td>
                                <td></td>
                                <td class='text-center' style='font-size: 130%; color: white; background-color: teal; font-weight: bold;'><label>Receita:</label> R$ " . $receita['Receita'] . ",00</td>
                              </tr>";
}

//SE DEZEMBRO FOR RECEBIDO
if (isset($_POST['dezembro_rec'])) {
  $dia1 = '01';
  $dia2 = '31';
  $mes = '12';
  $anoreceita = $_POST['ano_receita'];

  $query = "SELECT * FROM orcamento WHERE fk_id_situacao = 1 AND Data_Emissao BETWEEN '$anoreceita-$mes-$dia1' AND '$anoreceita-$mes-$dia2' ORDER BY Data_Emissao DESC";
  $busca = mysqli_query($link, $query);

  $soma = "SELECT SUM(Total_Geral) AS Receita FROM orcamento WHERE fk_id_situacao = 1 AND Data_Emissao BETWEEN '$anoreceita-$mes-$dia1' AND '$anoreceita-$mes-$dia2'";
  $resultado = mysqli_query($link, $soma);
  $receita = mysqli_fetch_assoc($resultado);

  while ($dados = mysqli_fetch_array($busca)) {
    $id = $dados['Numero_Orcamento'];
    $data = $dados['Data_Emissao'];
    $date_format = date('d/m/Y', strtotime($data));
    $cliente = $dados['Total_Geral'];

    echo "
                              <tr>
                                <td class='text-center'><a href='pages/orcamento&venda/orcamento_feito_fechado.php?Numero_Orcamento=$id'>" . $dados['Numero_Orcamento'] . "</a></td>
                                <td class='text-center'>" . "Fechado" . "</td>
                                <td class='text-center'>" . $date_format . "</td>
                                <td class='text-center'>R$ " . $dados['Total_Geral'] . ",00</td>
                              </tr>";
  }
  echo "
                              <tr>
                                <td></td>
                                <td></td>
                                <td class='text-center' style='font-size: 130%; color: white; background-color: teal; font-weight: bold;'><label>Receita:</label> R$ " . $receita['Receita'] . ",00</td>
                              </tr>";
}

//SE LIMPAR FOR RECEBIDO
if (isset($_POST['limpar_rec'])) {
  $dia1 = '00';
  $dia2 = '00';
  $mes = '00';
  $anoreceita = '0000';

  $query = "SELECT * FROM orcamento WHERE fk_id_situacao = 1 AND Data_Emissao BETWEEN '$anoreceita-$mes-$dia1' AND '$anoreceita-$mes-$dia2' ORDER BY Data_Emissao DESC";
  $busca = mysqli_query($link, $query);

  $soma = "SELECT SUM(Total_Geral) AS Receita FROM orcamento WHERE fk_id_situacao = 1 AND Data_Emissao BETWEEN '$anoreceita-$mes-$dia1' AND '$anoreceita-$mes-$dia2'";
  $resultado = mysqli_query($link, $soma);
  $receita = mysqli_fetch_assoc($resultado);

  while ($dados = mysqli_fetch_array($busca)) {
    $id = $dados['Numero_Orcamento'];
    $data = $dados['Data_Emissao'];
    $date_format = date('d/m/Y', strtotime($data));
    $cliente = $dados['Total_Geral'];

    echo "
                              <tr>
                                <td class='text-center'><a href='pages/orcamento&venda/orcamento_feito_fechado.php?Numero_Orcamento=$id'>" . $dados['Numero_Orcamento'] . "</a></td>
                                <td class='text-center'>" . $date_format . "</td>
                                <td class='text-center'>R$ " . $dados['Total_Geral'] . ",00</td>

                              </tr>";
  }
}
