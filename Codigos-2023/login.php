<?php
session_start();

require("logica-autenticacao.php");

if (autenticado()) {
     redireciona("index.php");
     die();
}

require "conexao.php";

$email_usu = trim(strtolower(filter_input(INPUT_POST, "email_usu", FILTER_SANITIZE_EMAIL)));
$senha_usu = filter_input(INPUT_POST, "senha_usu", FILTER_SANITIZE_SPECIAL_CHARS);

$sql = "SELECT id_usu, quantMoedas_usu, pont_usu, senha_usu, primeiravez_usu FROM usuario WHERE email_usu = ?";

$stmt = $conn->prepare($sql);
$result = $stmt->execute([$email_usu]);

$row = $stmt->fetch();

if (!empty($row["senha_usu"])) {
    if (password_verify($senha_usu, $row['senha_usu'])) {
        //senha está OK
        $_SESSION["usuario_id"] = $row["id_usu"];
        $_SESSION["usuario_email"] = $email_usu;
        $_SESSION["usuario_result"] = true;
    
        if (!empty($row["primeiravez_usu"]) && $row['primeiravez_usu'] == true) {
            redireciona("escolha-user.php");
        } else {
            redireciona("index.php");
        }

    } else {
        //senha ERRADA
        unset($_SESSION["usuario_email"]);
        unset($_SESSION["usuario_id"]);
        $_SESSION["usuario_result"] = false;
        $_SESSION["erro"] = "Senha incorreta";
        redireciona("formulario-login.php");

    }
} else {
    $_SESSION["usuario_result"] = false;
    $_SESSION["erro"] = "Nenhum Usuário encontrado com <b>\"$email_usu\"</b>. Faça seu cadastro!";
    redireciona("formulario-login.php");

}

?>
