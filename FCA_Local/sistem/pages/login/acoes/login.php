<?php
require("conexao.php");

if (isset($_POST["email"]) && isset($_POST["senha"]) && $conexao != null) {
    $query = $conexao->prepare("SELECT * FROM usuarios WHERE email = ? AND senha = ?");
    $query->execute(array($_POST["email"], $_POST["senha"]));

    if ($query->rowCount()) {
        $user = $query->fetchAll(PDO::FETCH_ASSOC)[0];

        // $tempolimite = 5; //tempo para expirar sessão em segundos (1200 / 60 = 20 minutos)
        // $_SESSION['usuario'] = time();
        // $_SESSION['limite'] = $tempolimite;

        session_start();
        $_SESSION["usuario"] = array($user["nome"], $user["adm"]);
        echo "<script>window.location = '../../../index.php'</script>";
    } else {
        $_SESSION['msg'] = "<div class='alert alert-danger'>Login ou senha incorreto!</div>";
        echo "<script> alert('E-mail e/ou senha incorreto(s).') </script>
                <meta http-equiv='refresh'>";
        echo "<script>window.location = '../index.php'</script>";
    }
} else {
    $_SESSION['msg'] = "<div class='alert alert-danger'>Login ou senha incorreto!</div>";
    echo "<script> alert('E-mail e/ou senha incorreto(s).') </script>
                <meta http-equiv='refresh'>";
    echo "<script>window.location = '../index.php'</script>";
}
