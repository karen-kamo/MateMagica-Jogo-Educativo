<?php
session_start();
require("logica-autenticacao.php");
if (!autenticado()) {
    $_SESSION["restrito"] = true;
    redireciona(("protecao.php"));
    die();
}

$id = $_SESSION["usuario_id"];

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="./css/estilo_inicio.css"/>
    <link href='https://fonts.googleapis.com/css?family=Irish Grover' rel='stylesheet'>
    
    <title>MateMágica</title>
</head>
<body>
    <form class="container mt-5 mb-5" action="inserir-usu.php" method="POST">
        <div class="row">

            <div class="col"></div>
  
            <div class="col form p-5">  
                <img class="logo mb-4" src="./images/logoo.png"/>


                <div class="form-floating mb-4">
                    <input type="text" name="nome_usu" id="nome_usu" placeholder="Seu nome" class="form-control">
                    <label for="nome_usu"> Nome </label>
                </div>

                <div class="form-floating mb-4">
                    <input type="email" name="email_usu" id="email_usu" placeholder="contato@email.com" class="form-control">
                    <label for="email_usu" class="label-dif"> Email </label>
                </div>

                <div class="form-floating mb-4">
                    <input type="date" name="data_usu" id="data_usu" placeholder="Data de nascimento" class="form-control">
                    <label for="data_usu"> Data de nascimento </label>
                </div>

                <div class="form-floating mb-4">
                    <input type="password" name="senha_usu" id="senha_usu" placeholder="Senha" class="form-control">
                    <label for="senha_usu"> Senha </label>
                </div>

                <div class="form-floating mb-5">
                    <input type="password" name="confSenha_usu" id="confSenha_usu" placeholder="Confirme a senha" class="form-control">
                    <label for="confSenha_usu"> Confirme a senha </label>
                </div>

                <div class="container text-center">
                    <div class="row">
                        <div class="col">
                            <p class="texto-link"> Já possui conta?</p> 
                            <a class="link" href="formulario-login.php">Faça login</a>
                        </div> 

                        <div class="col">
                            <button class="btn" type="submit"> Cadastrar </button>
                        </div>                       
                    </div>
                </div>
            </div>

            <div class="col"></div>
        </div>
    </form>

    <br>

    <?php
    if (isset($_SESSION["result"])) {
        if ($_SESSION["result"]) {
            //inseriu certo
    ?>
            <div class="alert alert-success alertas" role="alert">
                <h4 class="alert-heading"> Sucesso! </h4>
                <p>Dados gravados corretamente.</p>
            </div>
        <?php
        } else {
            //não inseriu deu erro
            $erro = $_SESSION["erro"];
            unset($_SESSION["erro"]);
        ?>
            <div class="alert alert-danger alertas" role="alert">
                <h4 class="alert-heading"> Falha ao efetuar gravação.</h4>
                <p> Erro: <?= $erro ?> </p>
            </div>

    <?php

        }
        unset($_SESSION["result"]);
    }
    ?>

</body>
</html>