<?php
session_start();
require("logica-autenticacao.php");

if (!autenticado()) {
    $_SESSION["restrito"] = true;
    redireciona(("protecao.php"));
    die();
}

require "conexao.php";

$id_usu = filter_input(INPUT_POST, "id_usu", FILTER_SANITIZE_NUMBER_INT);
$nome_usu = filter_input(INPUT_POST, "nome_usu", FILTER_SANITIZE_SPECIAL_CHARS);
$data_usu = filter_input(INPUT_POST, "data_usu", FILTER_SANITIZE_NUMBER_INT);
$senha_usu = filter_input(INPUT_POST, "senha_usu", FILTER_SANITIZE_SPECIAL_CHARS);
$username_usu = filter_input(INPUT_POST, "username_usu", FILTER_SANITIZE_SPECIAL_CHARS);

$sql = "update usuario set
                    nome_usu = ?,
                    data_usu = ?,
                    senha_usu = ?
                    username_usu = ?,
                   where id_usu = ?";

try {
    $stmt = $conn->prepare($sql);
    $result = $stmt->execute([$nome_usu, $data_usu, $senha_usu, $username_usu]);
} catch (Exception $e) {
    $result = false;
    $error = $e->getMessage();
}

if ($result == true) {
    $_SESSION["result"] = true;
    $_SESSION["msg"] = "Dados gravados corretamente.";
} else {
    $_SESSION["result"] = false;
    $_SESSION["erro"] = $error;
}

redireciona("../index.php")
?>