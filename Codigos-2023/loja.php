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

$sql = "SELECT quantmoedas_usu FROM usuario WHERE id_usu = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$id]);

$usuario = $stmt->fetch();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MateMágica</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="./css/estilo.css"/>
    <link href='https://fonts.googleapis.com/css?family=VT323' rel='stylesheet'>
    <link rel="shortcut icon" type="imagex/png" href="./images/icones/icone.png">

</head>
<body class="loja">
    <audio autoplay loop>
        <source src="audios/musicaLoja.mp3" type="audio/mpeg">
        Seu navegador não suporta áudio tag.
    </audio> 
    <header>
        <div class="row p-3 headerLoja">
            <div class="col">
                <a href="./index.php" class="btn-voltarLoja">
                    <img src="./images/icones/voltar.png" alt="" class="">
                    Voltar
                </a>
            </div>
            <div class="col">
                <img src="./images/logo.png" alt="" class="logo">
            </div>
            <div class="col">
                <div class="areaMoedaLoja mx-3">             
                    <p> <?= $usuario["quantmoedas_usu"] ?> </p>
                    <img src="./images/icones/quantMoeda.png" alt="" class="iconeMoeda mx-2">                    
                </div>
            </div>
        </div>
    </header>
    
    <div class="container text-center caixaRoupas">
        <div class="row">
            <div class="col"></div>
            <div class="col">
                <p class="tituloLoja">Loja Mágica</p>
            </div>
            <div class="col"></div>
        </div>
        <div class="row">
            <div class="col item">
                <img src="./images/icones/relogio.png" alt="">
                <p class="mt-2"> Roupa </p>
                <div class="d-flex justify-content-around">
                    <a href=""> Usar</a>
                    <a href=""> Comprar</a>
                </div>
            </div>
            <div class="col item">
                <img src="./images/icones/relogio.png" alt="">
                <p class="mt-2"> Roupa </p>
                <div class="d-flex justify-content-around">
                    <a href=""> Usar</a>
                    <a href=""> Comprar</a>
                </div>
            </div>
            <div class="col item">
                <img src="./images/icones/relogio.png" alt="">
                <p class="mt-2"> Roupa </p>
                <div class="d-flex justify-content-around">
                    <a href=""> Usar</a>
                    <a href=""> Comprar</a>
                </div>
            </div>
            <div class="col item">
                <img src="./images/icones/relogio.png" alt="">
                <p class="mt-2"> Roupa </p>
                <div class="d-flex justify-content-around">
                    <a href=""> Usar</a>
                    <a href=""> Comprar</a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col item">
                <img src="./images/icones/relogio.png" alt="">
                <p class="mt-2"> Roupa </p>
                <div class="d-flex justify-content-around">
                    <a href=""> Usar</a>
                    <a href=""> Comprar</a>
                </div>
            </div>
            <div class="col item">
                <img src="./images/icones/relogio.png" alt="">
                <p class="mt-2"> Roupa </p>
                <div class="d-flex justify-content-around">
                    <a href=""> Usar</a>
                    <a href=""> Comprar</a>
                </div>
            </div>
            <div class="col item">
                <img src="./images/icones/relogio.png" alt="">
                <p class="mt-2"> Roupa </p>
                <div class="d-flex justify-content-around">
                    <a href=""> Usar</a>
                    <a href=""> Comprar</a>
                </div>
            </div>
            <div class="col item">
                <img src="./images/icones/relogio.png" alt="">
                <p class="mt-2"> Roupa </p>
                <div class="d-flex justify-content-around">
                    <a href=""> Usar</a>
                    <a href=""> Comprar</a>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col item">
                <img src="./images/icones/relogio.png" alt="">
                <p class="mt-2"> Roupa </p>
                <div class="d-flex justify-content-around">
                    <a href=""> Usar</a>
                    <a href=""> Comprar</a>
                </div>
            </div>
            <div class="col item">
                <img src="./images/icones/relogio.png" alt="">
                <p class="mt-2"> Roupa </p>
                <div class="d-flex justify-content-around">
                    <a href=""> Usar</a>
                    <a href=""> Comprar</a>
                </div>
            </div>
            <div class="col item">
                <img src="./images/icones/relogio.png" alt="">
                <p class="mt-2"> Roupa </p>
                <div class="d-flex justify-content-around">
                    <a href=""> Usar</a>
                    <a href=""> Comprar</a>
                </div>
            </div>
            <div class="col item">
                <img src="./images/icones/relogio.png" alt="">
                <p class="mt-2"> Roupa </p>
                <div class="d-flex justify-content-around">
                    <a href=""> Usar</a>
                    <a href=""> Comprar</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>    
    <script src="./js/funcoesInicial.js"></script>
</body>
</html>