<?php
session_start();
require("logica-autenticacao.php");

if (!autenticado()) {
    $_SESSION["restrito"] = true;
    redireciona(("protecao.php"));
    die();
}

require "conexao.php";


$nome_usu = filter_input(INPUT_POST, "nome_usu", FILTER_SANITIZE_SPECIAL_CHARS);
$email_usu = filter_input(INPUT_POST, "email_usu", FILTER_SANITIZE_SPECIAL_CHARS);
$data_usu = filter_input(INPUT_POST, "data_usu", FILTER_SANITIZE_NUMBER_INT);
$senha_usu = filter_input(INPUT_POST, "senha_usu", FILTER_SANITIZE_SPECIAL_CHARS);
$confSenha_usu = filter_input(INPUT_POST, "confSenha_usu", FILTER_SANITIZE_SPECIAL_CHARS);

if ($senha_usu === $confSenha_usu){
    $sql = "insert into usuario (nome_usu, email_usu, data_usu, senha_usu) values (?, ?, ?, ?)";

    try {
        $stmt = $conn->prepare($sql);
        $result = $stmt->execute([$nome_usu, $email_usu, $data_usu, $senha_usu]);

    } catch (Exception $e) {
        $result= false;
        $error = $e->getMessage();
    }

    if ($result == true) {
        $_SESSION["result"] = true;
        $_SESSION["msg"] = "Dados gravados corretamente.";
    } else {
        $_SESSION["result"] = false;
        $_SESSION["erro"] = $error;
    }

    redireciona("../index.php");
} else {
    $_SESSION["msg"] = "Coloque a mesma senha nos dois campos!";
}

?>
