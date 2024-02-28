<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <link href='https://fonts.googleapis.com/css?family=VT323' rel='stylesheet'>
    <link rel="stylesheet" href="./css/estilo.css"/>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"> </script>
    
    <title>MateMágica</title>
</head>
<body class="jogo" >
    <main class="text-center mainJogo mundoVermelho">
        <div class="row align-items-start">
            <div class="col barraVida">
                <div class="row text-center">
                    <div class="col"></div>
                    <div class="col coracaoUsu">
                        <img src="./images/personagens/coracao.png" alt="" class="coracao">
                    </div>
                    <div class="col coracaoUsu">
                        <img src="./images/personagens/coracao.png" alt="" class="coracao">
                    </div>
                    <div class="col coracaoUsu">
                        <img src="./images/personagens/coracao.png" alt="" class="coracao">
                    </div>
                </div>
            </div>
            <div class="col-4">
                <span class="barraTempo"></span>
            </div>
            <div class="col barraVida">
                <div class="row">
                    <div class="col coracaoIni">
                        <img src="./images/personagens/coracao.png" alt="" class="coracao">
                    </div>
                    <div class="col coracaoIni">
                        <img src="./images/personagens/coracao.png" alt="" class="coracao">
                    </div>
                    <div class="col coracaoIni">
                        <img src="./images/personagens/coracao.png" alt="" class="coracao">
                    </div>
                    <div class="col pt-2">
                        <a href="./index.html" class="btn-voltar">Voltar</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col"></div>
            <div class="col-4 barraExpressao">
                <p class="p-1">  </p>
            </div>
            <div class="col"></div>
        </div>

        <div class="row pb-5 barraPersonagens">
            <div class="col">
                <img src="./images/personagens/gata.png" alt="" class="personagens">
            </div>
            <div class="col"></div>
            <div class="col">
                <img src="./images/personagens/sapo.png" alt="" class="personagens inimigo">
            </div>
        </div>

  
        <div class="modalJogo modal">
            <div class="modalConteudoJogo">
                <div>
                    <img src="" alt="" class="iconMsg mb-4">
                    <p class="msg"> </p> 
                    
                    <div class="d-flex justify-content-center">
                        <p class="msgMoeda"></p> 
                        <img src="" alt="" class="iconMoeda">
                    </div>                  
                </div>
                <div class="d-flex justify-content-evenly botaoesModal">
                    <div>
                        <a href="index.html"> Voltar </a>
                    </div>
                    <div class="btnOutroModal"></div>
                </div>
            </div>
        </div>

        
    </main>

    <footer class="row barraAlternativas fixed-bottom">
        <div class="col my-1">
            <button class="alternativas">  </button>
        </div>

        <div class="col my-1">
            <button class="alternativas">  </button>
        </div>

        <div class="col my-1">
            <button class="alternativas">  </button>
        </div>

        <div class="col my-1">
            <button class="alternativas">  </button>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="./js/funcoesOperacao.js"> </script>
    <script src="./js/funcoes.js"></script>
</body>
</html>