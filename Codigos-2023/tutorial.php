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

if (empty($id)) {
    ?>
        <div class="alert alert-danger" role="alert">
            <h4>Falha</h4>
            <p>ID de Usuário está vazio</p>
        </div>
    <?php
        exit;
}

$sql = "SELECT username_usu FROM usuario WHERE id_usu = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$id]);
$usuario = $stmt->fetch();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=VT323' rel='stylesheet'>
    <link rel="shortcut icon" type="imagex/png" href="./images/icones/icone.png">
    
    <link rel="stylesheet" href="./css/estilo.css"/>

    <title>MateMágica</title>
</head>
<body class="index">
    <audio autoplay loop>
        <source src="audios/musicaSelecao.wav" type="audio/mpeg">
        Seu navegador não suporta áudio tag.
    </audio> 

    <div class="row">     
        <div class="col text-end">
            <img src="./images/personagens/coruja.png" alt="" class="imgCoruja">
        </div>
        <div class="col msgTutorial">
            <p> Olá, <span> <?= $usuario["username_usu"]?></span>! Bem-vindo ao <span> MateMágica </span>! </p>
            <p> Nossos amigos foram enfeitiçados e precisam da sua ajuda! Utilize o poder da MateMágica para salvá-los. </p>
            <p> Ao iniciar sua aventura você irá se deparar com diversos Mundos, e em cada um deles encontrará um de nossos amigos enfeitiçados, para trazê-los de volta a realidade você vai precisar usar o poder da MateMágica! </p>
            <p> Para liberar o seu poder você deve escolher corretamente o resultado da conta proposta. Mas tome cuidado!! Se você errar a conta correrá o risco de ser enfeitiçado!  </p>
            <p> Boa sorte! Contamos com você, <span> <?= $usuario["username_usu"]?></span>! </p>
        </div>
        <div class="col-2"></div>
    </div>

    <footer class="areaTutorial">
        <div class="row text-end">
            <div class="col">
                <a href="index.php"> 
                    Avançar 
                    <img src="./images/icones/direita.png" alt="">
                </a>
            </div>  
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>    

</body>
</html>