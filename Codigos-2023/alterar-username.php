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
$primeiravez_usu = 'false';


$sql = "UPDATE usuario SET
                username_usu = ?,
                primeiravez_usu = ?
            WHERE id_usu = ?";
try {
    $stmt = $conn->prepare($sql);
    $result = $stmt->execute([$username_usu, $primeiravez_usu, $id]);
} catch (Exception $e) {
    $result= false;
    $error = $e->getMessage();
}
    
redireciona(("tutorial.php"));
?>