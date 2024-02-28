<?php
session_start();
require("logica-autenticacao.php");

if (!autenticado()) {
    $_SESSION["restrito"] = true;
    redireciona(("protecao.php"));
    die();
}

require "conexao.php";
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

    <form action="alterar-username.php" method="post" class="container mt-5 modalEscolhaUser">
        <div class="row">     
            <div class="col form p-5">
                <p class="text-center">Qual é o <span>nome</span> do seu personagem?</p>
                <div class="form-floating mb-4">
                    <input type="text" name="username_usu" id="username_usu" class="form-control" placeholder="Username" required>
                    <label for="username_usu"> Digite o nome</label>
                </div>

                <div class="container text-center">
                    <div class="row">
                        <div class="col">
                            <button type="submit"> Escolhi o nome </button>
                        </div>     
                       
                    </div>
                </div>
            </div>
        </div>
    </form> 

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>    

</body>
</html>