<?php
$_SESSION["pont-verif"] = 10;

function autenticado()
{
    //Código php para proteger uma página, só deve abrir se fez login
    if (!isset($_SESSION["usuario_email"]) || empty($_SESSION["usuario_email"])) {
        return false;
    } else {
        return true;
    }
}

function isProf()
{

    if (isset($_SESSION["usuario_tipo"]) && $_SESSION["usuario_tipo"] == "prof") {
        return true;
    } else {
        return false;
    }
}

function redireciona($pagina)
{
    if (empty($pagina)) {
        $pagina = "formulario-login.php";
    }
    header("Location: " . $pagina);
}

function nome_usuario()
{
    return $_SESSION["usuario_nome"];
}

function email_usuario()
{
    return $_SESSION["usuario_email"];
}

function id_usuario()
{
    return $_SESSION["usuario_id"];
}
