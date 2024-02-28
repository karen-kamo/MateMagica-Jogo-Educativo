<?php
session_start();
require("logica-autenticacao.php");

if (!autenticado()) {
    $_SESSION["restrito"] = true;
    redireciona(("protecao.php"));
    die();
}

require "conexao.php";

$id = $_SESSION["usuario_id"];

$username_usu = trim(filter_input(INPUT_POST, "username_usu", FILTER_SANITIZE_SPECIAL_CHARS));
$nome_usu = trim(filter_input(INPUT_POST, "nome_usu", FILTER_SANITIZE_SPECIAL_CHARS));
$senha_usu = filter_input(INPUT_POST, "senha_usu");
$confSenha_usu = filter_input(INPUT_POST, "confSenha_usu");

if (empty($senha_usu)) {
    $sql = "UPDATE usuario SET
                    nome_usu = ?,
                    username_usu = ?
                WHERE id_usu = ?";

    try {
        $stmt = $conn->prepare($sql);
        $result = $stmt->execute([$nome_usu, $username_usu, $id]);
    } catch (Exception $e) {
        $result= false;
        $error = $e->getMessage();
    }

    if ($result == true) {
        $_SESSION["result"] = true;
    } else {
        $_SESSION["result"] = false;
        $_SESSION["erro"] = $error;
    }
} else {
    if ($senha_usu == $confSenha_usu){
        $sql = "UPDATE usuario SET
                        nome_usu = ?,
                        senha_usu = crypt(?, gen_salt('bf', 8)),
                        username_usu = ?
                    WHERE id_usu = ?";
    
        try {
            $stmt = $conn->prepare($sql);
            $result = $stmt->execute([$nome_usu, $senha_usu, $username_usu, $id]);
        } catch (Exception $e) {
            $result= false;
            $error = $e->getMessage();
        }
    
        if ($result == true) {
            $_SESSION["result"] = true;
            $_SESSION["erro"] = "Dados gravados corretamente.";
        } else {
            $_SESSION["result"] = false;
            $_SESSION["erro"] = $error;
        }
    } else {
        $_SESSION["result"] = false;
        $_SESSION["erro"] = "Coloque a mesma senha nos dois campos!";
    }
}
redireciona("./form-alterar.php")

?>

