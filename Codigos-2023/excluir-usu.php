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

$sql = "delete from usuario where id_usu = ?";

try {
    $stmt = $conn->prepare($sql);
    $result = $stmt->execute([$id]);
} catch (Exception $e) {
    $result= false;
    $error = $e->getMessage();
}

if ($result == true) {
    $_SESSION["result"] = true;
    $_SESSION["erro"] = "Registro excluído com sucesso!";

} else {
    $_SESSION["result"] = false;
    $_SESSION["erro"] = $error;
}
redireciona("sair.php");
die();
?>