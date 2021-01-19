<?php

//CONEXAO DATABASE
require('pages/conexao_banco.php');

//SE JANEIRO FOR RECEBIDO
if (isset($_POST['janeiro_des'])) {
  $dia1 = '01';
  $dia2 = '31';
  $mes = '01';
  $anodespesa = $_POST['ano_despesa'];

  $query = "SELECT * FROM despesas WHERE Data_Despesa BETWEEN '$anodespesa-$mes-$dia1' AND '$anodespesa-$mes-$dia2' ORDER BY Data_Despesa DESC";
  $busca = mysqli_query($link, $query);

  while ($dados = mysqli_fetch_array($busca)) {
    $id = $dados['Id_Despesa'];
    $data = $dados['Data_Despesa'];
    $date_format = date('d/m/Y', strtotime($data));
    $situacao = $dados['id_situacao_fk'];
    if ($dados['id_situacao_fk'] == 1) {
      $status = "Fechada";
    } else {
      $status = "Em aberta";
    }

    echo "
    <tr>
    <td class='text-center'>" . $dados['Id_Despesa'] . "</td>
    <td class='text-center'>" . $status . "</td>
    <td class='text-center'>" . $dados['Descricao_Despesa'] . "</td>
    <td class='text-center'>" . $dados['Valor_Despesa'] . "</td>
    <td class='text-center'>" . $date_format . "</td>
    <td class='text-center'><button type='button' class='btn btn-warning col-md-7' data-toggle='modal' data-target='#exampleModal' data-whatever=" . $dados['Id_Despesa'] . " data-whatevernome=" . $dados['Descricao_Despesa'] . " data-whateverdetalhes=" . $dados['Valor_Despesa'] . " data-whateverdata=" . $dados['Data_Despesa'] . " data-whateverstatus=" . $dados['id_situacao_fk'] . ">Editar</button></td>
    <td class='text-center'><a href='janela_modal/despesa/delete_despesa.php?Id_Despesa=" . $dados['Id_Despesa'] . "'><button type='button' class='btn btn-danger col-md-7'>Deletar</button></a></td>
    <td class='text-center'><a href='janela_modal/despesa/pagar_despesa.php?Id_Despesa=" . $dados['Id_Despesa'] . "'><button type='button' class='btn btn-success col-md-7'>Pagar</button></a></td>
  </tr>";
  }
}

//SE FEVEREIRO FOR RECEBIDO
if (isset($_POST['fevereiro_des'])) {
  $dia1 = '01';
  $dia2 = '31';
  $mes = '02';
  $anodespesa = $_POST['ano_despesa'];

  $query = "SELECT * FROM despesas WHERE Data_Despesa BETWEEN '$anodespesa-$mes-$dia1' AND '$anodespesa-$mes-$dia2' ORDER BY Data_Despesa DESC";
  $busca = mysqli_query($link, $query);

  while ($dados = mysqli_fetch_array($busca)) {
    $id = $dados['Id_Despesa'];
    $data = $dados['Data_Despesa'];
    $date_format = date('d/m/Y', strtotime($data));
    $situacao = $dados['id_situacao_fk'];
    if ($dados['id_situacao_fk'] == 1) {
      $status = "Fechada";
    } else {
      $status = "Em aberta";
    }

    echo "
    <tr>
    <td class='text-center'>" . $dados['Id_Despesa'] . "</td>
    <td class='text-center'>" . $status . "</td>
    <td class='text-center'>" . $dados['Descricao_Despesa'] . "</td>
    <td class='text-center'>" . $dados['Valor_Despesa'] . "</td>
    <td class='text-center'>" . $date_format . "</td>
    <td class='text-center'><button type='button' class='btn btn-warning col-md-7' data-toggle='modal' data-target='#exampleModal' data-whatever=" . $dados['Id_Despesa'] . " data-whatevernome=" . $dados['Descricao_Despesa'] . " data-whateverdetalhes=" . $dados['Valor_Despesa'] . " data-whateverdata=" . $dados['Data_Despesa'] . " data-whateverstatus=" . $dados['id_situacao_fk'] . ">Editar</button></td>
    <td class='text-center'><a href='janela_modal/despesa/delete_despesa.php?Id_Despesa=" . $dados['Id_Despesa'] . "'><button type='button' class='btn btn-danger col-md-7'>Deletar</button></a></td>
    <td class='text-center'><a href='janela_modal/despesa/pagar_despesa.php?Id_Despesa=" . $dados['Id_Despesa'] . "'><button type='button' class='btn btn-success col-md-7'>Pagar</button></a></td>
  </tr>";
  }
}

//SE MARCO FOR RECEBIDO
if (isset($_POST['marco_des'])) {
  $dia1 = '01';
  $dia2 = '31';
  $mes = '03';
  $anodespesa = $_POST['ano_despesa'];

  $query = "SELECT * FROM despesas WHERE Data_Despesa BETWEEN '$anodespesa-$mes-$dia1' AND '$anodespesa-$mes-$dia2' ORDER BY Data_Despesa DESC";
  $busca = mysqli_query($link, $query);

  while ($dados = mysqli_fetch_array($busca)) {
    $id = $dados['Id_Despesa'];
    $data = $dados['Data_Despesa'];
    $date_format = date('d/m/Y', strtotime($data));
    $situacao = $dados['id_situacao_fk'];
    if ($dados['id_situacao_fk'] == 1) {
      $status = "Fechada";
    } else {
      $status = "Em aberta";
    }

    echo "
    <tr>
    <td class='text-center'>" . $dados['Id_Despesa'] . "</td>
    <td class='text-center'>" . $status . "</td>
    <td class='text-center'>" . $dados['Descricao_Despesa'] . "</td>
    <td class='text-center'>" . $dados['Valor_Despesa'] . "</td>
    <td class='text-center'>" . $date_format . "</td>
    <td class='text-center'><button type='button' class='btn btn-warning col-md-7' data-toggle='modal' data-target='#exampleModal' data-whatever=" . $dados['Id_Despesa'] . " data-whatevernome=" . $dados['Descricao_Despesa'] . " data-whateverdetalhes=" . $dados['Valor_Despesa'] . " data-whateverdata=" . $dados['Data_Despesa'] . " data-whateverstatus=" . $dados['id_situacao_fk'] . ">Editar</button></td>
    <td class='text-center'><a href='janela_modal/despesa/delete_despesa.php?Id_Despesa=" . $dados['Id_Despesa'] . "'><button type='button' class='btn btn-danger col-md-7'>Deletar</button></a></td>
    <td class='text-center'><a href='janela_modal/despesa/pagar_despesa.php?Id_Despesa=" . $dados['Id_Despesa'] . "'><button type='button' class='btn btn-success col-md-7'>Pagar</button></a></td>
  </tr>";
  }
}

//SE ABRIL FOR RECEBIDO
if (isset($_POST['abril_des'])) {
  $dia1 = '01';
  $dia2 = '31';
  $mes = '04';
  $anodespesa = $_POST['ano_despesa'];

  $query = "SELECT * FROM despesas WHERE Data_Despesa BETWEEN '$anodespesa-$mes-$dia1' AND '$anodespesa-$mes-$dia2' ORDER BY Data_Despesa DESC";
  $busca = mysqli_query($link, $query);

  while ($dados = mysqli_fetch_array($busca)) {
    $id = $dados['Id_Despesa'];
    $data = $dados['Data_Despesa'];
    $date_format = date('d/m/Y', strtotime($data));
    $situacao = $dados['id_situacao_fk'];
    if ($dados['id_situacao_fk'] == 1) {
      $status = "Fechada";
    } else {
      $status = "Em aberta";
    }

    echo "
    <tr>
    <td class='text-center'>" . $dados['Id_Despesa'] . "</td>
    <td class='text-center'>" . $status . "</td>
    <td class='text-center'>" . $dados['Descricao_Despesa'] . "</td>
    <td class='text-center'>" . $dados['Valor_Despesa'] . "</td>
    <td class='text-center'>" . $date_format . "</td>
    <td class='text-center'><button type='button' class='btn btn-warning col-md-7' data-toggle='modal' data-target='#exampleModal' data-whatever=" . $dados['Id_Despesa'] . " data-whatevernome=" . $dados['Descricao_Despesa'] . " data-whateverdetalhes=" . $dados['Valor_Despesa'] . " data-whateverdata=" . $dados['Data_Despesa'] . " data-whateverstatus=" . $dados['id_situacao_fk'] . ">Editar</button></td>
    <td class='text-center'><a href='janela_modal/despesa/delete_despesa.php?Id_Despesa=" . $dados['Id_Despesa'] . "'><button type='button' class='btn btn-danger col-md-7'>Deletar</button></a></td>
    <td class='text-center'><a href='janela_modal/despesa/pagar_despesa.php?Id_Despesa=" . $dados['Id_Despesa'] . "'><button type='button' class='btn btn-success col-md-7'>Pagar</button></a></td>
  </tr>";
  }
}

//SE MAIO FOR RECEBIDO
if (isset($_POST['maio_des'])) {
  $dia1 = '01';
  $dia2 = '31';
  $mes = '05';
  $anodespesa = $_POST['ano_despesa'];

  $query = "SELECT * FROM despesas WHERE Data_Despesa BETWEEN '$anodespesa-$mes-$dia1' AND '$anodespesa-$mes-$dia2' ORDER BY Data_Despesa DESC";
  $busca = mysqli_query($link, $query);

  while ($dados = mysqli_fetch_array($busca)) {
    $id = $dados['Id_Despesa'];
    $data = $dados['Data_Despesa'];
    $date_format = date('d/m/Y', strtotime($data));
    $situacao = $dados['id_situacao_fk'];
    if ($dados['id_situacao_fk'] == 1) {
      $status = "Fechada";
    } else {
      $status = "Em aberta";
    }

    echo "
    <tr>
    <td class='text-center'>" . $dados['Id_Despesa'] . "</td>
    <td class='text-center'>" . $status . "</td>
    <td class='text-center'>" . $dados['Descricao_Despesa'] . "</td>
    <td class='text-center'>" . $dados['Valor_Despesa'] . "</td>
    <td class='text-center'>" . $date_format . "</td>
    <td class='text-center'><button type='button' class='btn btn-warning col-md-7' data-toggle='modal' data-target='#exampleModal' data-whatever=" . $dados['Id_Despesa'] . " data-whatevernome=" . $dados['Descricao_Despesa'] . " data-whateverdetalhes=" . $dados['Valor_Despesa'] . " data-whateverdata=" . $dados['Data_Despesa'] . " data-whateverstatus=" . $dados['id_situacao_fk'] . ">Editar</button></td>
    <td class='text-center'><a href='janela_modal/despesa/delete_despesa.php?Id_Despesa=" . $dados['Id_Despesa'] . "'><button type='button' class='btn btn-danger col-md-7'>Deletar</button></a></td>
    <td class='text-center'><a href='janela_modal/despesa/pagar_despesa.php?Id_Despesa=" . $dados['Id_Despesa'] . "'><button type='button' class='btn btn-success col-md-7'>Pagar</button></a></td>
  </tr>";
  }
}

//SE JUNHO FOR RECEBIDO
if (isset($_POST['junho_des'])) {
  $dia1 = '01';
  $dia2 = '31';
  $mes = '06';
  $anodespesa = $_POST['ano_despesa'];

  $query = "SELECT * FROM despesas WHERE Data_Despesa BETWEEN '$anodespesa-$mes-$dia1' AND '$anodespesa-$mes-$dia2' ORDER BY Data_Despesa DESC";
  $busca = mysqli_query($link, $query);

  while ($dados = mysqli_fetch_array($busca)) {
    $id = $dados['Id_Despesa'];
    $data = $dados['Data_Despesa'];
    $date_format = date('d/m/Y', strtotime($data));
    $situacao = $dados['id_situacao_fk'];
    if ($dados['id_situacao_fk'] == 1) {
      $status = "Fechada";
    } else {
      $status = "Em aberta";
    }

    echo "
    <tr>
    <td class='text-center'>" . $dados['Id_Despesa'] . "</td>
    <td class='text-center'>" . $status . "</td>
    <td class='text-center'>" . $dados['Descricao_Despesa'] . "</td>
    <td class='text-center'>" . $dados['Valor_Despesa'] . "</td>
    <td class='text-center'>" . $date_format . "</td>
    <td class='text-center'><button type='button' class='btn btn-warning col-md-7' data-toggle='modal' data-target='#exampleModal' data-whatever=" . $dados['Id_Despesa'] . " data-whatevernome=" . $dados['Descricao_Despesa'] . " data-whateverdetalhes=" . $dados['Valor_Despesa'] . " data-whateverdata=" . $dados['Data_Despesa'] . " data-whateverstatus=" . $dados['id_situacao_fk'] . ">Editar</button></td>
    <td class='text-center'><a href='janela_modal/despesa/delete_despesa.php?Id_Despesa=" . $dados['Id_Despesa'] . "'><button type='button' class='btn btn-danger col-md-7'>Deletar</button></a></td>
    <td class='text-center'><a href='janela_modal/despesa/pagar_despesa.php?Id_Despesa=" . $dados['Id_Despesa'] . "'><button type='button' class='btn btn-success col-md-7'>Pagar</button></a></td>
  </tr>";
  }
}

//SE JULHO FOR RECEBIDO
if (isset($_POST['julho_des'])) {
  $dia1 = '01';
  $dia2 = '31';
  $mes = '07';
  $anodespesa = $_POST['ano_despesa'];

  $query = "SELECT * FROM despesas WHERE Data_Despesa BETWEEN '$anodespesa-$mes-$dia1' AND '$anodespesa-$mes-$dia2' ORDER BY Data_Despesa DESC";
  $busca = mysqli_query($link, $query);

  while ($dados = mysqli_fetch_array($busca)) {
    $id = $dados['Id_Despesa'];
    $data = $dados['Data_Despesa'];
    $date_format = date('d/m/Y', strtotime($data));
    $situacao = $dados['id_situacao_fk'];
    if ($dados['id_situacao_fk'] == 1) {
      $status = "Fechada";
    } else {
      $status = "Em aberta";
    }

    echo "
    <tr>
    <td class='text-center'>" . $dados['Id_Despesa'] . "</td>
    <td class='text-center'>" . $status . "</td>
    <td class='text-center'>" . $dados['Descricao_Despesa'] . "</td>
    <td class='text-center'>" . $dados['Valor_Despesa'] . "</td>
    <td class='text-center'>" . $date_format . "</td>
    <td class='text-center'><button type='button' class='btn btn-warning col-md-7' data-toggle='modal' data-target='#exampleModal' data-whatever=" . $dados['Id_Despesa'] . " data-whatevernome=" . $dados['Descricao_Despesa'] . " data-whateverdetalhes=" . $dados['Valor_Despesa'] . " data-whateverdata=" . $dados['Data_Despesa'] . " data-whateverstatus=" . $dados['id_situacao_fk'] . ">Editar</button></td>
    <td class='text-center'><a href='janela_modal/despesa/delete_despesa.php?Id_Despesa=" . $dados['Id_Despesa'] . "'><button type='button' class='btn btn-danger col-md-7'>Deletar</button></a></td>
    <td class='text-center'><a href='janela_modal/despesa/pagar_despesa.php?Id_Despesa=" . $dados['Id_Despesa'] . "'><button type='button' class='btn btn-success col-md-7'>Pagar</button></a></td>
  </tr>";
  }
}

//SE AGOSTO FOR RECEBIDO
if (isset($_POST['agosto_des'])) {
  $dia1 = '01';
  $dia2 = '31';
  $mes = '08';
  $anodespesa = $_POST['ano_despesa'];

  $query = "SELECT * FROM despesas WHERE Data_Despesa BETWEEN '$anodespesa-$mes-$dia1' AND '$anodespesa-$mes-$dia2' ORDER BY Data_Despesa DESC";
  $busca = mysqli_query($link, $query);

  while ($dados = mysqli_fetch_array($busca)) {
    $id = $dados['Id_Despesa'];
    $data = $dados['Data_Despesa'];
    $date_format = date('d/m/Y', strtotime($data));
    $situacao = $dados['id_situacao_fk'];
    if ($dados['id_situacao_fk'] == 1) {
      $status = "Fechada";
    } else {
      $status = "Em aberta";
    }

    echo "
    <tr>
    <td class='text-center'>" . $dados['Id_Despesa'] . "</td>
    <td class='text-center'>" . $status . "</td>
    <td class='text-center'>" . $dados['Descricao_Despesa'] . "</td>
    <td class='text-center'>" . $dados['Valor_Despesa'] . "</td>
    <td class='text-center'>" . $date_format . "</td>
    <td class='text-center'><button type='button' class='btn btn-warning col-md-7' data-toggle='modal' data-target='#exampleModal' data-whatever=" . $dados['Id_Despesa'] . " data-whatevernome=" . $dados['Descricao_Despesa'] . " data-whateverdetalhes=" . $dados['Valor_Despesa'] . " data-whateverdata=" . $dados['Data_Despesa'] . " data-whateverstatus=" . $dados['id_situacao_fk'] . ">Editar</button></td>
    <td class='text-center'><a href='janela_modal/despesa/delete_despesa.php?Id_Despesa=" . $dados['Id_Despesa'] . "'><button type='button' class='btn btn-danger col-md-7'>Deletar</button></a></td>
    <td class='text-center'><a href='janela_modal/despesa/pagar_despesa.php?Id_Despesa=" . $dados['Id_Despesa'] . "'><button type='button' class='btn btn-success col-md-7'>Pagar</button></a></td>
  </tr>";
  }
}

//SE SETEMBRO FOR RECEBIDO
if (isset($_POST['setembro_des'])) {
  $dia1 = '01';
  $dia2 = '31';
  $mes = '09';
  $anodespesa = $_POST['ano_despesa'];

  $query = "SELECT * FROM despesas WHERE Data_Despesa BETWEEN '$anodespesa-$mes-$dia1' AND '$anodespesa-$mes-$dia2' ORDER BY Data_Despesa DESC";
  $busca = mysqli_query($link, $query);

  while ($dados = mysqli_fetch_array($busca)) {
    $id = $dados['Id_Despesa'];
    $data = $dados['Data_Despesa'];
    $date_format = date('d/m/Y', strtotime($data));
    $situacao = $dados['id_situacao_fk'];
    if ($dados['id_situacao_fk'] == 1) {
      $status = "Fechada";
    } else {
      $status = "Em aberta";
    }

    echo "
    <tr>
    <td class='text-center'>" . $dados['Id_Despesa'] . "</td>
    <td class='text-center'>" . $status . "</td>
    <td class='text-center'>" . $dados['Descricao_Despesa'] . "</td>
    <td class='text-center'>" . $dados['Valor_Despesa'] . "</td>
    <td class='text-center'>" . $date_format . "</td>
    <td class='text-center'><button type='button' class='btn btn-warning col-md-7' data-toggle='modal' data-target='#exampleModal' data-whatever=" . $dados['Id_Despesa'] . " data-whatevernome=" . $dados['Descricao_Despesa'] . " data-whateverdetalhes=" . $dados['Valor_Despesa'] . " data-whateverdata=" . $dados['Data_Despesa'] . " data-whateverstatus=" . $dados['id_situacao_fk'] . ">Editar</button></td>
    <td class='text-center'><a href='janela_modal/despesa/delete_despesa.php?Id_Despesa=" . $dados['Id_Despesa'] . "'><button type='button' class='btn btn-danger col-md-7'>Deletar</button></a></td>
    <td class='text-center'><a href='janela_modal/despesa/pagar_despesa.php?Id_Despesa=" . $dados['Id_Despesa'] . "'><button type='button' class='btn btn-success col-md-7'>Pagar</button></a></td>
  </tr>";
  }
}

//SE OUTUBRO FOR RECEBIDO
if (isset($_POST['outubro_des'])) {
  $dia1 = '01';
  $dia2 = '31';
  $mes = '10';
  $anodespesa = $_POST['ano_despesa'];

  $query = "SELECT * FROM despesas WHERE Data_Despesa BETWEEN '$anodespesa-$mes-$dia1' AND '$anodespesa-$mes-$dia2' ORDER BY Data_Despesa DESC";
  $busca = mysqli_query($link, $query);

  while ($dados = mysqli_fetch_array($busca)) {
    $id = $dados['Id_Despesa'];
    $data = $dados['Data_Despesa'];
    $date_format = date('d/m/Y', strtotime($data));
    $situacao = $dados['id_situacao_fk'];
    if ($dados['id_situacao_fk'] == 1) {
      $status = "Fechada";
    } else {
      $status = "Em aberta";
    }

    echo "
    <tr>
    <td class='text-center'>" . $dados['Id_Despesa'] . "</td>
    <td class='text-center'>" . $status . "</td>
    <td class='text-center'>" . $dados['Descricao_Despesa'] . "</td>
    <td class='text-center'>" . $dados['Valor_Despesa'] . "</td>
    <td class='text-center'>" . $date_format . "</td>
    <td class='text-center'><button type='button' class='btn btn-warning col-md-7' data-toggle='modal' data-target='#exampleModal' data-whatever=" . $dados['Id_Despesa'] . " data-whatevernome=" . $dados['Descricao_Despesa'] . " data-whateverdetalhes=" . $dados['Valor_Despesa'] . " data-whateverdata=" . $dados['Data_Despesa'] . " data-whateverstatus=" . $dados['id_situacao_fk'] . ">Editar</button></td>
    <td class='text-center'><a href='janela_modal/despesa/delete_despesa.php?Id_Despesa=" . $dados['Id_Despesa'] . "'><button type='button' class='btn btn-danger col-md-7'>Deletar</button></a></td>
    <td class='text-center'><a href='janela_modal/despesa/pagar_despesa.php?Id_Despesa=" . $dados['Id_Despesa'] . "'><button type='button' class='btn btn-success col-md-7'>Pagar</button></a></td>
  </tr>";
  }
}

//SE NOVEMBRO FOR RECEBIDO
if (isset($_POST['novembro_des'])) {
  $dia1 = '01';
  $dia2 = '31';
  $mes = '11';
  $anodespesa = $_POST['ano_despesa'];

  $query = "SELECT * FROM despesas WHERE Data_Despesa BETWEEN '$anodespesa-$mes-$dia1' AND '$anodespesa-$mes-$dia2' ORDER BY Data_Despesa DESC";
  $busca = mysqli_query($link, $query);

  while ($dados = mysqli_fetch_array($busca)) {
    $id = $dados['Id_Despesa'];
    $data = $dados['Data_Despesa'];
    $date_format = date('d/m/Y', strtotime($data));
    $situacao = $dados['id_situacao_fk'];
    if ($dados['id_situacao_fk'] == 1) {
      $status = "Fechada";
    } else {
      $status = "Em aberta";
    }

    echo "
    <tr>
    <td class='text-center'>" . $dados['Id_Despesa'] . "</td>
    <td class='text-center'>" . $status . "</td>
    <td class='text-center'>" . $dados['Descricao_Despesa'] . "</td>
    <td class='text-center'>" . $dados['Valor_Despesa'] . "</td>
    <td class='text-center'>" . $date_format . "</td>
    <td class='text-center'><button type='button' class='btn btn-warning col-md-7' data-toggle='modal' data-target='#exampleModal' data-whatever=" . $dados['Id_Despesa'] . " data-whatevernome=" . $dados['Descricao_Despesa'] . " data-whateverdetalhes=" . $dados['Valor_Despesa'] . " data-whateverdata=" . $dados['Data_Despesa'] . " data-whateverstatus=" . $dados['id_situacao_fk'] . ">Editar</button></td>
    <td class='text-center'><a href='janela_modal/despesa/delete_despesa.php?Id_Despesa=" . $dados['Id_Despesa'] . "'><button type='button' class='btn btn-danger col-md-7'>Deletar</button></a></td>
    <td class='text-center'><a href='janela_modal/despesa/pagar_despesa.php?Id_Despesa=" . $dados['Id_Despesa'] . "'><button type='button' class='btn btn-success col-md-7'>Pagar</button></a></td>
  </tr>";
  }
}

//SE DEZEMBRO FOR RECEBIDO
if (isset($_POST['dezembro_des'])) {
  $dia1 = '01';
  $dia2 = '31';
  $mes = '12';
  $anodespesa = $_POST['ano_despesa'];

  $query = "SELECT * FROM despesas WHERE Data_Despesa BETWEEN '$anodespesa-$mes-$dia1' AND '$anodespesa-$mes-$dia2' ORDER BY Data_Despesa DESC";
  $busca = mysqli_query($link, $query);

  while ($dados = mysqli_fetch_array($busca)) {
    $id = $dados['Id_Despesa'];
    $data = $dados['Data_Despesa'];
    $date_format = date('d/m/Y', strtotime($data));
    $situacao = $dados['id_situacao_fk'];
    if ($dados['id_situacao_fk'] == 1) {
      $status = "Fechada";
    } else {
      $status = "Em aberta";
    }

    echo "
    <tr>
    <td class='text-center'>" . $dados['Id_Despesa'] . "</td>
    <td class='text-center'>" . $status . "</td>
    <td class='text-center'>" . $dados['Descricao_Despesa'] . "</td>
    <td class='text-center'>" . $dados['Valor_Despesa'] . "</td>
    <td class='text-center'>" . $date_format . "</td>
    <td class='text-center'><button type='button' class='btn btn-warning col-md-7' data-toggle='modal' data-target='#exampleModal' data-whatever=" . $dados['Id_Despesa'] . " data-whatevernome=" . $dados['Descricao_Despesa'] . " data-whateverdetalhes=" . $dados['Valor_Despesa'] . " data-whateverdata=" . $dados['Data_Despesa'] . " data-whateverstatus=" . $dados['id_situacao_fk'] . ">Editar</button></td>
    <td class='text-center'><a href='janela_modal/despesa/delete_despesa.php?Id_Despesa=" . $dados['Id_Despesa'] . "'><button type='button' class='btn btn-danger col-md-7'>Deletar</button></a></td>
    <td class='text-center'><a href='janela_modal/despesa/pagar_despesa.php?Id_Despesa=" . $dados['Id_Despesa'] . "'><button type='button' class='btn btn-success col-md-7'>Pagar</button></a></td>
  </tr>";
  }
}

//SE LIMPAR FOR RECEBIDO
if (isset($_POST['limpar_des'])) {
  $dia1 = '00';
  $dia2 = '00';
  $mes = '00';
  $anodespesa = '0000';

  $query = "SELECT * FROM despesas WHERE Data_Despesa BETWEEN '$anodespesa-$mes-$dia1' AND '$anodespesa-$mes-$dia2' ORDER BY Data_Despesa DESC";
  $busca = mysqli_query($link, $query);

  while ($dados = mysqli_fetch_array($busca)) {
    $id = $dados['Id_Despesa'];
    $data = $dados['Data_Despesa'];
    $date_format = date('d/m/Y', strtotime($data));
    $situacao = $dados['id_situacao_fk'];

    echo "
                              <tr>
                                <td class='text-center'>" . $dados['Id_Despesa'] . "</td>
                                <td class='text-center'>" . $situacao . "</td>
                                <td class='text-center'>" . $dados['Descricao_Despesa'] . "</td>
                                <td class='text-center'>" . $dados['Valor_Despesa'] . "</td>
                                <td class='text-center'>" . $date_format . "</td>
                                <td class='text-center'><button type='button' class='btn btn-warning col-md-7' data-toggle='modal' data-target='#exampleModal' data-whatever=" . $dados['Id_Despesa'] . " data-whatevernome=" . $dados['Descricao_Despesa'] . " data-whateverdetalhes=" . $dados['Valor_Despesa'] . " data-whateverdata=" . $dados['Data_Despesa'] . " data-whateverstatus=" . $dados['id_situacao_fk'] . ">Editar</button></td>
                                <td class='text-center'><a href='janela_modal/despesa/delete_despesa.php?Id_Despesa=" . $dados['Id_Despesa'] . "'><button type='button' class='btn btn-danger col-md-7'>Deletar</button></a></td>
                                <td class='text-center'><a href='janela_modal/despesa/pagar_despesa.php?Id_Despesa=" . $dados['Id_Despesa'] . "'><button type='button' class='btn btn-success col-md-7'>Pagar</button></a></td>
                              </tr>";
  }
}
