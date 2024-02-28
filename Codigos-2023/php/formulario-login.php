<?php
session_start();
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
    <form action="login.php" method="POST" class="container mt-5">
        <div class="row">     
            <div class="col"> </div>

            <div class="col form p-5">
                <img src="images/logoo.png" alt="" class="logo mb-4">

                <div class="form-floating mb-4">
                    <input type="email" name="email_usu" id="email_usu" class="form-control" placeholder="Email">
                    <label for="email_usu"> Email</label>
                </div>

                <div class="form-floating mb-5"> 
                    <input type="password" name="senha_usu" id="senha_usu" class="form-control" placeholder="Senha">
                    <label for="senha_usu"> Senha</label>
                </div>
                <div class="container text-center">
                    <div class="row">
                        <div class="col">
                            <p class="texto-link"> Não possui conta?</p> 
                            <a class="link" href="formulario-cadastro.php">Cadastre-se</a>
                        </div> 

                        <div class="col">
                            <button class="btn" type="submit"> Entrar </button>
                        </div>                       
                    </div>
                </div>
            </div>

            <div class="col"> </div>
        </div>
    </form> 

</body>

</html>