<?php
session_start();
require("logica-autenticacao.php");

if (!autenticado()) {
    $_SESSION["restrito"] = true;
    redireciona(("protecao.php"));
    die();
}

require "conexao.php";

$id_usu = intval(filter_input(INPUT_GET, "id_usu", FILTER_SANITIZE_NUMBER_INT));


$sql = "delete from usuario where id_usu = ?";

$stmt = $conn->prepare($sql);
$result = $stmt->execute([$id_usu]);

if ($result == true) {
    $_SESSION["result"] = true;
    $_SESSION["msg"] = "Registro excluído com sucesso!";

} else {
    $_SESSION["result"] = false;
    $_SESSION["erro"] = $error;
}
redireciona("../index.php");

?>