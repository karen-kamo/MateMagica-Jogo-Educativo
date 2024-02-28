<?php
session_start();
require("logica-autenticacao.php");

require "conexao.php";

$nome_usu = trim(filter_input(INPUT_POST, "nome_usu", FILTER_SANITIZE_SPECIAL_CHARS));
$email_usu = trim(strtolower(filter_input(INPUT_POST, "email_usu", FILTER_SANITIZE_EMAIL)));
$dtNasc_usu = filter_input(INPUT_POST, "dtNasc_usu", FILTER_SANITIZE_NUMBER_INT);
$senha_usu = filter_input(INPUT_POST, "senha_usu");
$confSenha_usu = filter_input(INPUT_POST, "confSenha_usu");
$username_usu = trim(filter_input(INPUT_POST, "nome_usu", FILTER_SANITIZE_SPECIAL_CHARS));
$quantMoedas_usu = 0;
$pont_usu = 0;
$primeiravez_usu = true;

if ($senha_usu == $confSenha_usu){
    $sql = "INSERT INTO usuario (nome_usu, email_usu, dtNasc_usu, senha_usu, username_usu, quantMoedas_usu, pont_usu, primeiravez_usu) VALUES (?, ?, ?, crypt(?, gen_salt('bf', 8)), ?, ?, ?, ?)";

    try {
        $stmt = $conn->prepare($sql);
        $result = $stmt->execute([$nome_usu, $email_usu, $dtNasc_usu, $senha_usu, $username_usu, $quantMoedas_usu, $pont_usu, $primeiravez_usu]);

    } catch (Exception $e) {
        $result= false;
        $error = $e->getMessage();
    }

    if ($result == true) {
        $_SESSION["result"] = true;
    } else {
        if(stripos($error, "duplicate key") != false){
            $error = "Atenção: o email <b>\"$email_usu\"</b> já está registrado.";
        }
        $_SESSION["result"] = false;
        $_SESSION["erro"] = $error;
    }
} else {
    $_SESSION["result"] = false;
    $_SESSION["erro"] = "Coloque a mesma senha nos dois campos!";
}
redireciona("formulario-cadastro.php");

?>

