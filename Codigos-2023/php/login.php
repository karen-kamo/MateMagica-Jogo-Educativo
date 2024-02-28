<?php
session_start();

require("logica-autenticacao.php");

if (autenticado()) {
    redireciona("index.php");
    die();
}

require "conexao.php";

$email_usu = strtoupper(filter_input(INPUT_POST, "email_usu", FILTER_SANITIZE_EMAIL));
$senha_usu = filter_input(INPUT_POST, "senha_usu");

$sql = "select id_usu, username_usu, senha_usu from usuario where email_usu = ?";

$stmt = $conn->prepare($sql);
$result = $stmt->execute([$email_usu]);

$row = $stmt->fetch();

if (!empty($row["senha_usu"])) {

    if ($senha_usu == $row["senha_usu"]) {
        //senha está OK
        $_SESSION["usuario_nome"] = $row["nome_usu"];
        $_SESSION["usuario_email"] = $email_usu;
        $_SESSION["usuario_id"] = $row["id_usu"];
        $_SESSION["usuario_tipo"] = "usuno";
        $_SESSION["usuario_result"] = true;
        redireciona("index.php");
    } else {
        //senha ERRADA
        $_SESSION["usuario_result"] = false;
        $_SESSION["erro"] = "Senha incorreta";
        redireciona("formulario-login.php");
    }
} else {
    $_SESSION["usuario_result"] = false;
    $_SESSION["erro"] = "Nenhum Usuário encontrado com este email. Faça seu cadastro!";
    redireciona("formulario-login.php");
}
