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

    <title>MateMágica</title>
</head>
<body class="index">
    <header>
        <div class="row p-3 fixed-top text-center">
            <div class="col"></div>
            <div class="col">
                <img src="./images/logo.png" alt="" class="logo">
            </div>
            <div class="col"></div>
        </div>
    </header>

    <main class="mainCarrossel">
        <div id="carouselExampleCaptions" class="carousel slide">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 3"></button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="4" aria-label="Slide 3"></button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="5" aria-label="Slide 3"></button>

            </div>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="images/mundos/mundoVermelho.png" alt="..." class="img-mundoVermelho">
                <div class="carousel-caption d-none d-md-block">
                  <h1>Mundo Vermelho</h1>
                </div>
              </div>
              <div class="carousel-item">
                <img src="images/mundos/mundoLaranja.png" alt="..." class="img-mundoLaranja">
                <div class="carousel-caption d-none d-md-block">
                  <h1>Mundo Laranja</h1>
                </div>
              </div>
              <div class="carousel-item">
                <img src="images/mundos/mundoAmarelo.png" alt="..." class="img-mundoAmarelo">
                <div class="carousel-caption d-none d-md-block">
                  <h1>Mundo Amarelo</h1>
                </div>
              </div>
              <div class="carousel-item">
                <img src="images/mundos/mundoVerde.png" alt="..." class="img-mundoVerde">
                <div class="carousel-caption d-none d-md-block">
                  <h1>Mundo Verde</h1>
                </div>
              </div>
              <div class="carousel-item">
                <img src="images/mundos/mundoAzul.png" alt="..." class="img-mundoAzul">
                <div class="carousel-caption d-none d-md-block">
                  <h1>Mundo Azul</h1>
                </div>
              </div>
              <div class="carousel-item">
                <img src="images/mundos/mundoRoxo.png" alt="..." class="img-mundoRoxo">
                <div class="carousel-caption d-none d-md-block">
                  <h1>Mundo Roxo</h1>
                </div>
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
        </div>
    </main>
        
        <div class="modalFase modal">
            <div class="modalConteudoFase">
                <div class="d-flex justify-content-between linhaModal">
                    <p>Mundo Sei lá</p>
                    <a>
                        <img src="./images/icones/fechar.png" alt="" class="sairModal">
                    </a>
                </div>
                <div class="d-flex justify-content-evenly barraFase">
                    <a href="./tela.html">1</a>
                    <a href="./tela.html">2</a>
                    <a href="./tela.html">3</a>
                </div>
            </div>
        </div>


    <footer class="fixed-bottom area-final p-3">
        <div class="row">
            <div class="col">
                <a href="./formulario-login.html" class="btn-sair mx-5 px-4"> 
                    Sair 
                    <img src="./images/icones/sair.png" alt="" class="btn-sair">
                </a>
            </div>
            <div class="col d-flex justify-content-end">
                <a href="./loja.html" class="btn-loja mx-5 px-4"> 
                    Lojinha 
                    <img src="./images/icones/sacola.png" alt="" class="btn-sacola">                   
                </a>
                <a href="./form-alterar.html">
                    <img src="./images/icones/usuario.png" alt="" class="btn-usuario">
                </a>
            </div>
        </div>
    </footer>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>    
    <script src="./js/funcoesOperacao.js"></script>
    <script src="./js/funcoesInicial.js"></script>
</body>
</html>