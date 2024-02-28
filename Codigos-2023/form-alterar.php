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
            <h4>Falha ao abrir formulário para edição.</h4>
            <p>ID de Usuário está vazio</p>
        </div>
    <?php
        exit;
}

$sql = "SELECT nome_usu, email_usu, username_usu FROM usuario WHERE id_usu = ?";
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="./css/estilo_form.css"/>
    <link href='https://fonts.googleapis.com/css?family=VT323' rel='stylesheet'>
    <link rel="shortcut icon" type="imagex/png" href="./images/icones/icone.png">
    
    <title>MateMágica</title>
</head>
<body class="alterar">
    <audio autoplay loop>
        <source src="audios/musicaLoja.mp3" type="audio/mpeg">
        Seu navegador não suporta áudio tag.
    </audio> 

    <form class="mb-5" action="alterar-usu.php" method="post">
        <div class="row btn-voltar">
            <a href="./index.php">
                <img src="./images/icones/voltar.png" alt="" class="">
                Voltar
            </a>
        </div>

        <br>

        <div class="row justify-content-md-center">
            <div class="col-6">
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
                            if (isset($_SESSION["erro"])) {
                                //não inseriu deu erro
                                $erro = $_SESSION["erro"];
                                unset($_SESSION["erro"]);
                                ?>
                                <div class="alert alert-danger alertas" role="alert">
                                    <h4 class="alert-heading"> Falha ao efetuar gravação.</h4>
                                    <p> Erro: <?php echo $erro ?> </p>
                                </div>
                                
                                <?php
                            } 
                        }
                        
                        unset($_SESSION["result"]);
                    }
                    ?>
            </div>
        </div>

        
        <div class="row">

            <div class="col"></div>
  
            <div class="col form p-5 mt-5 ">  
                <img class="logo mb-4" src="./images/logo.png"/>

                <p class="mb-3 tituloAlteracao"> Alteração dos dados </p>
                
                <div class="form-floating mb-4">
                    <input type="email" name="email_usu" id="email_usu" placeholder="contato@email.com" value="<?= $usuario["email_usu"] ?>" class="form-control" disabled>
                    <label for="email_usu" class="label-dif"> Email </label>
                </div>
                <div class="form-floating mb-4">
                    <input type="text" name="username_usu" id="username_usu" placeholder="Seu username" value="<?= $usuario["username_usu"] ?>" class="form-control" required>
                    <label for="username_usu"> Username </label>
                </div>

                <div class="form-floating mb-4">
                    <input type="text" name="nome_usu" id="nome_usu" placeholder="Seu nome" value="<?= $usuario["nome_usu"] ?>" class="form-control" required>
                    <label for="nome_usu"> Nome </label>
                </div>               
                <div class="form-floating mb-4">
                    <input type="password" name="senha_usu" id="senha_usu" placeholder="Nova senha" class="form-control">
                    <label for="senha_usu"> Nova senha </label>
                </div>

                <div class="form-floating mb-5">
                    <input type="password" name="confSenha_usu" id="confSenha_usu" placeholder="Confirme a nova senha" class="form-control">
                    <label for="confSenha_usu"> Confirme a nova senha </label>
                </div>

                <div class="container text-center">
                    <div class="row">
                        <div class="col">
                            <button class="btn-alterar" type="submit"> 
                                Alterar 
                                <img src="./images/icones/alterar.png" alt="">
                            </button>
                        </div> 
                        
                    </form>
                        <form action="excluir-usu.php" method="post">
                            <div class="col mt-3">
                                <button class="btn-alterar" type="submit" onclick="if(!confirm('Tem certeza que deseja exluir?')) return false;"> 
                                    Excluir 
                                    <img src="./images/icones/excluir.png" alt="">
                                </button>
                            </div>  
                        </form>                     
                    </div>
                </div>
            </div>
            
            <div class="col"></div>
        </div>

</body>
</html>