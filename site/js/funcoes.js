//Variáveis globais
let result = 0

multFase1 = [2, 3, 10]
multFase2 = [4, 5, 6]
multFase3 = [7, 8, 9]

dividendo1 = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10]
dividendo2 = [0, 2, 4, 6, 8, 10, 12, 14, 16, 18, 20]
dividendo3 = [0, 3, 6, 9, 12, 15, 18, 21, 24, 27, 30]
dividendo4 = [8, 12, 16, 20, 24, 28, 32, 36, 40]
dividendo5 = [10, 15, 20, 25, 30, 35, 40, 45, 50]
dividendo6 = [12, 18, 24, 30, 36, 42, 48, 54, 60]
dividendo7 = [14, 21, 28, 35, 42, 49, 56, 63, 70]
dividendo8 = [16, 24, 32, 40, 48, 56, 64, 72, 80]
dividendo9 = [18, 27, 36, 45, 54, 63, 72, 81, 90]

//Variáveis do localStorage
const operacao = localStorage.getItem("operacao")
const operacao2 = localStorage.getItem("operacao2") 
const operacao3 = localStorage.getItem("operacao3")  

const fase = localStorage.getItem("fase")

const msgModal = document.querySelector('.modalJogo .msg')
const msgMoedaModal = document.querySelector('.modalJogo .msgMoeda')

const iconMsg = document.querySelector('.modalJogo .iconMsg')
const iconMoeda = document.querySelector('.modalJogo .iconMoeda')

const btnOutroModal = document.querySelector('.btnOutroModal')
const novoLink = document.createElement('a');

const modalJogo = document.querySelector('.modalJogo')
modalJogo.style.display = "none";

//Para ajustar a barra de alternativas na tela
const barraAlternativas = document.querySelector('.barraAlternativas');
const barraPersonagens = document.querySelector('.barraPersonagens');

const alturaAlternativas = barraAlternativas.clientHeight;

barraPersonagens.style.marginTop = (alturaAlternativas - 40) + 'px';

//Função para mudar o cenário e os personagens
function mudarCenario(){
    const main = document.querySelector('main')
    const imgInimigo = document.querySelector('.barraPersonagens .inimigo')
    const audioJogo = document.querySelector('.audioJogo')
    console.log(audioJogo)

    if (operacao == "+" && operacao2 == "" && operacao3 == ""){
        main.classList.remove('mundoLaranja', 'mundoAmarelo', 'mundoVerde', 'mundoAzul', 'mundoRoxo')
        main.classList.add('mundoVermelho')
        imgInimigo.src = './images/personagens/sapo.png'

    } else if (operacao == "-" && operacao2 == "" && operacao3 == ""){
        main.classList.remove('mundoVermelho', 'mundoAmarelo', 'mundoVerde', 'mundoAzul', 'mundoRoxo')
        main.classList.add('mundoLaranja')
        imgInimigo.src = './images/personagens/coelho.png'

    } else if (operacao == "*" && operacao2 == "" && operacao3 == ""){
        main.classList.remove('mundoVermelho', 'mundoLaranja', 'mundoVerde', 'mundoAzul', 'mundoRoxo')
        main.classList.add('mundoAmarelo')
        imgInimigo.src = './images/personagens/tartaruga.png'

    } else if (operacao == "+" && operacao2 == "-" && operacao3 == ""){
        main.classList.remove('mundoVermelho', 'mundoLaranja', 'mundoAmarelo', 'mundoAzul', 'mundoRoxo')
        main.classList.add('mundoVerde')
        imgInimigo.src = './images/personagens/cobra.png'
    
     } else if (operacao == "/" && operacao2 == "" && operacao3 == ""){
        main.classList.remove('mundoVermelho', 'mundoLaranja', 'mundoAmarelo', 'mundoVerde', 'mundoRoxo')
        main.classList.add('mundoAzul')
        imgInimigo.src = './images/personagens/catarina.png'

    } else if (operacao == "+" && operacao2 == "-" && operacao3 == "*"){
        main.classList.remove('mundoVermelho', 'mundoLaranja', 'mundoAmarelo', 'mundoVerde', 'mundoAzul')
        main.classList.add('mundoRoxo')
        imgInimigo.src = './images/personagens/rato.png'

    } 
}

//Função para escrever determinada expressão
function gerarContas(min, max, quant){
    let listNumeros = []

    //Criar um laço para criar de forma aleatória 2 ou mais números e colocar numa array
    if (operacao == "+" && operacao2 == "" && operacao3 == "") {
        for (let num = quant; num != 0; num--){
            let numAleatorio = Math.floor(Math.random() * (max - min + 1) + min);
            listNumeros.push(numAleatorio)
        }

    } else if (operacao == "-" && operacao2 == "" && operacao3 == "") {  
        if (fase == "1") {
            let minuendo = Math.floor(Math.random() * (20 - 5 + 1) + 5) 
            let subtraendo = Math.floor(Math.random() * (5 - 1 + 1) + 1)
            listNumeros.push(minuendo, subtraendo)
        } else if (fase == "2") {
            let minuendo = Math.floor(Math.random() * (30 - 10 + 1) + 10)
            let subtraendo1 = Math.floor(Math.random() * (5 - 1 + 1) + 1)
            let subtraendo2 = Math.floor(Math.random() * (5 - 1 + 1) + 1)
            listNumeros.push(minuendo, subtraendo1, subtraendo2)
        } else if (fase == "3") {
            let minuendo = Math.floor(Math.random() * (40 - 20 + 1) + 20)
            let subtraendo1 = Math.floor(Math.random() * (10 - 1 + 1) + 1)
            let subtraendo2 = Math.floor(Math.random() * (10 - 1 + 1) + 1)
            listNumeros.push(minuendo, subtraendo1, subtraendo2)
        }
  
    } else if (operacao == "*" && operacao2 == "" && operacao3 == "") {
        let mult = Math.floor(Math.random() * (10 - 1 + 1) + 1) 
        let multNumAleat = Math.floor(Math.random() * (2 - 0 + 1) + 0)

        if (fase == "1") {
            let multNumFase = multFase1[multNumAleat]
            listNumeros.push(multNumFase);
          
        } else if (fase == "2") {
            let multNumFase = multFase2[multNumAleat]
            listNumeros.push(multNumFase);
           
        } else if (fase == "3") {
            let multNumFase = multFase3[multNumAleat]
            listNumeros.push(multNumFase);
            
        }
        listNumeros.push(mult);

    } else if (operacao == "+" && operacao2 == "-" && operacao3 == "") {
        if (fase == "1") {
            let nSoma1 = Math.floor(Math.random() * (10 - 5 + 1) + 5)
            let nSoma2 = Math.floor(Math.random() * (10 - 5 + 1) + 5)
            let nSub = Math.floor(Math.random() * (10 - 1 + 1) + 1)
            listNumeros.push(nSoma1, nSoma2, nSub)
        } else if (fase == "2") {
            let nSoma1 = Math.floor(Math.random() * (20 - 10 + 1) + 10)
            let nSoma2 = Math.floor(Math.random() * (20 - 10 + 1) + 10)
            let nSub = Math.floor(Math.random() * (20 - 1 + 1) + 1)
            listNumeros.push(nSoma1, nSoma2, nSub)
        } else if (fase == "3") {
            let nSoma1 = Math.floor(Math.random() * (30 - 20 + 1) + 20)
            let nSoma2 = Math.floor(Math.random() * (30 - 20 + 1) + 20)
            let nSub = Math.floor(Math.random() * (40 - 1 + 1) + 1)
            listNumeros.push(nSoma1, nSoma2, nSub)
        }
        
        
    } else if (operacao == "/" && operacao2 == "" && operacao3 == "") {
        let divisor
        let dividendoAleat = Math.floor(Math.random() * (10 - 0 + 1) + 0) 

        if (fase == "1") {
            divisor = Math.floor(Math.random() * (3 - 1 + 1) + 1) 
            dividendoAleat = Math.floor(Math.random() * (10 - 0 + 1) + 0) 
            if (divisor == 1) {
                listNumeros.push(dividendo1[dividendoAleat]);
            } else if (divisor == 2) {
                listNumeros.push(dividendo2[dividendoAleat]);
            } else if (divisor == 3) {
                listNumeros.push(dividendo3[dividendoAleat]);
            }
        } else if (fase == "2") {
            divisor = Math.floor(Math.random() * (6 - 4 + 1) + 4) 
            dividendoAleat = Math.floor(Math.random() * (8 - 0 + 1) + 0) 
            if (divisor == 4) {
                listNumeros.push(dividendo4[dividendoAleat]);
            } else if (divisor == 5) {
                listNumeros.push(dividendo5[dividendoAleat]);
            } else if (divisor == 6) {
                listNumeros.push(dividendo6[dividendoAleat]);
            }
          
        } else if (fase == "3") {
            divisor = Math.floor(Math.random() * (9 - 7 + 1) + 7) 
            dividendoAleat = Math.floor(Math.random() * (8 - 0 + 1) + 0) 
            if (divisor == 7) {
                listNumeros.push(dividendo7[dividendoAleat]);
            } else if (divisor == 8) {
                listNumeros.push(dividendo8[dividendoAleat]);
            } else if (divisor == 9) {
                listNumeros.push(dividendo9[dividendoAleat]);
            } else if (divisor == 10) {
                listNumeros.push(dividendo10[dividendoAleat]);
            }
            
        }
        listNumeros.push(divisor);

    } else if (operacao == "+" && operacao2 == "-" && operacao3 == "*") {
        if (fase == "1") {
            let nSoma = Math.floor(Math.random() * (20 - 10 + 1) + 10)
            let nMult1 = Math.floor(Math.random() * (5 - 1 + 1) + 1)
            let nMult2 = Math.floor(Math.random() * (5 - 1 + 1) + 1)
            let nSub = Math.floor(Math.random() * (10 - 1 + 1) + 1)
            listNumeros.push(nSoma, nMult1, nMult2, nSub)
        } else if (fase == "2") {
            let nSoma = Math.floor(Math.random() * (30 - 20 + 1) + 20)
            let nMult1 = Math.floor(Math.random() * (10 - 1 + 1) + 1)
            let nMult2 = Math.floor(Math.random() * (10 - 1 + 1) + 1)
            let nSub = Math.floor(Math.random() * (10 - 1 + 1) + 1)
            listNumeros.push(nSoma, nMult1, nMult2, nSub)
        } else if (fase == "3") {
            let nSoma = Math.floor(Math.random() * (40 - 30 + 1) + 30)
            let nMult1 = Math.floor(Math.random() * (10 - 1 + 1) + 1)
            let nMult2 = Math.floor(Math.random() * (10 - 1 + 1) + 1)
            let nSub = Math.floor(Math.random() * (30 - 1 + 1) + 1)
            listNumeros.push(nSoma, nMult1, nMult2, nSub)
        }    
    }

    //Realizar a conta e mostrar a expressão
    let expressao = ""

    //Se for o final não coloca o operador
    for (let num = 0; num <= listNumeros.length-1; num++){
        if (num == listNumeros.length-1) {
            expressao += listNumeros[num]; 
        } else {
            if (operacao == "+" && operacao2 == "" && operacao3 == ""){
                expressao += listNumeros[num] + " + "

            } else if (operacao == "-" && operacao2 == "" && operacao3 == ""){
                expressao += listNumeros[num] + " - "
                
            } else if (operacao == "*" && operacao2 == "" && operacao3 == ""){
                expressao += listNumeros[0] + " x "
            } 
            else if (operacao == "+" && operacao2 == "-" && operacao3 == ""){                
                expressao = listNumeros[0] + " + " + listNumeros[1] + " - "                
            } 
            else if (operacao == "/" && operacao2 == "" && operacao3 == ""){
                expressao += listNumeros[0] + " : "
            } 
            else if (operacao == "+" && operacao2 == "-" && operacao3 == "*"){
                expressao = listNumeros[0] + " + " + listNumeros[1] + "  x " + listNumeros[2] + " - " 
            }
            
        }

        if (operacao == "+" && operacao2 == "" && operacao3 == ""){
            result += listNumeros[num]

        } else if (operacao == "-" && operacao2 == "" && operacao3 == ""){
            result = listNumeros.reduce((acumulador, numero) => acumulador - numero)

        } 
        else if (operacao == "*" && operacao2 == "" && operacao3 == ""){
            result = listNumeros[0] * listNumeros[1]
            
        }
        else if (operacao == "+" && operacao2 == "-" && operacao3 == ""){          
            result = listNumeros[0] + listNumeros[1] - listNumeros[2]
            
        } 
        else if (operacao == "/" && operacao2 == "" && operacao3 == ""){
            result = listNumeros[0] / listNumeros[1]
        }
        else if (operacao == "+" && operacao2 == "-" && operacao3 == "*"){
            result = listNumeros[0] + listNumeros[1] * listNumeros[2] - listNumeros[3]
        }
        
    }

    //Utilizar DOM para colocar a expressão numa caixa
    const divExpressao = document.querySelector(".barraExpressao p");
    divExpressao.innerHTML = expressao;

}

//Função de gerar aleatoriamente resultados 
function gerarAlternativas(min, max){

    //DOM para pegar todos os botões e transformar em class Alternativas
    const divButtons = document.querySelectorAll(".barraAlternativas button")
    divButtons.forEach(function(elemento, indice) {
        divButtons[indice].className = 'alternativas';
    });
    
    let listNumeros = []

    //DOM para pegar as alternativas
    const divCaixas = document.querySelectorAll(".alternativas")

    //Para colocar alguma dessas alternativas como sendo class certo
    const divAleatoria = divCaixas[Math.floor(Math.random() * divCaixas.length)];
    divAleatoria.classList.replace('alternativas', 'certo')

    //Verifica se algum número gerado não está na array
    while (listNumeros.length < 3){
        let numAleatorio = Math.floor(Math.random() * (max - min + 1) + min);
        if (listNumeros.includes(numAleatorio) == false && numAleatorio != result){
            listNumeros.push(numAleatorio)
        } 
    }

    //Colocar result(resultado) como uma das alternativas
    listNumeros.push(result)

    //Utilizar DOM para colocar os números nas caixas
    const divAlternativas = document.querySelectorAll(".alternativas")
    const divCerto = document.querySelector("button.certo")

    for (let num = 0; num <= 2; num++){       
        divAlternativas[num].innerHTML = listNumeros[num]
    } 
    
    divCerto.innerHTML = listNumeros[3];
    
}

//Função de tempo
let segundos = 30;
const contadorElemento = document.querySelector('.barraTempo');

function cronometrarTempo(){

    contadorElemento.innerHTML = segundos;
    segundos--;

    if (segundos < 0) {
        clearInterval(intervalID);
        contadorElemento.innerHTML = '0';

        novoLink.href = '';
        novoLink.innerText = 'Recomeçar';
        btnOutroModal.appendChild(novoLink);

        iconMsg.setAttribute('src', './images/icones/relogio.png');
        msgModal.innerText = 'Poxa! O tempo acabou! Você foi enfeitiçado!'

        iconMoeda.setAttribute('src', './images/icones/moeda.png');
        msgMoedaModal.innerText = 'Você não ganhou moedas'
        modalJogo.style.display = "block";
    }
}

const intervalID = setInterval(cronometrarTempo, 1000); // Atualiza a cada 1 segundo (1000 ms)

//Função para verificar fase clicada
function verificarFase() {
    if (fase == "1") {
        if (operacao == "+" && operacao2 == "" && operacao3 == "") {
            gerarContas(1, 10, 2)
            gerarAlternativas(3, 15)

        } else if (operacao == "-" && operacao2 == "" && operacao3 == "") {
            gerarContas(0, 0, 2)
            gerarAlternativas(3, 15)

        } else if (operacao == "*" && operacao2 == "" && operacao3 == "") {
            gerarContas(0, 0, 2)
            gerarAlternativas(3, 15)

        } else if (operacao == "+" && operacao2 == "-" && operacao3 == "") {
            gerarContas(0, 0, 3)
            gerarAlternativas(3, 15)

        } else if (operacao == "/" && operacao2 == "" && operacao3 == ""){
            gerarContas(0, 0, 2)
            gerarAlternativas(1, 10)
            
        } else if (operacao == "+" && operacao2 == "-" && operacao3 == "*") {
            gerarContas(0, 0, 4)
            gerarAlternativas(15, 40)

        }

    } else if (fase == "2") {
        if (operacao == "+" && operacao2 == "" && operacao3 == "") {
            gerarContas(1, 15, 3)
            gerarAlternativas(10, 40)

        } else if (operacao == "-" && operacao2 == "" && operacao3 == "") {
            gerarContas(0, 0, 3)
            gerarAlternativas(10, 25)

        } else if (operacao == "*" && operacao2 == "" && operacao3 == "") {
            gerarContas(0, 0, 3)
            gerarAlternativas(10, 45)

        } else if (operacao == "+" && operacao2 == "-" && operacao3 == "") {
            gerarContas(0, 0, 4)
            gerarAlternativas(20, 40)

        } else if (operacao == "/" && operacao2 == "" && operacao3 == ""){
            gerarContas(0, 0, 2)
            gerarAlternativas(1, 10)

        } else if (operacao == "+" && operacao2 == "-" && operacao3 == "*") {
            gerarContas(0, 0, 4)
            gerarAlternativas(30, 110)

        }

    } else if (fase == "3") {
        if (operacao == "+" && operacao2 == "" && operacao3 == "") {
            gerarContas(1, 15, 4)
            gerarAlternativas(20, 45)

        } else if (operacao == "-" && operacao2 == "" && operacao3 == "") {
            gerarContas(15, 25, 4)
            gerarAlternativas(15, 30)

        } else if (operacao == "*" && operacao2 == "" && operacao3 == "") {
            gerarContas(15, 25, 4)
            gerarAlternativas(15, 75)

        } else if (operacao == "+" && operacao2 == "-" && operacao3 == "") {
            gerarContas(15, 25, 4)
            gerarAlternativas(20, 45)

        } else if (operacao == "/" && operacao2 == "" && operacao3 == ""){
            gerarContas(10, 20, 2)
            gerarAlternativas(1, 10)

        } else if (operacao == "+" && operacao2 == "-" && operacao3 == "*") {
            gerarContas(0, 0, 4)
            gerarAlternativas(30, 120)

        }
    }
}

//Função de verificar resultado, tirar vida e ver o que acontece depois
function compararResultados(event) {
    const elementoClicado = event.target; 
    const classeDoElemento = elementoClicado.className; 

    const coracoesIni = document.querySelectorAll(".coracaoIni")
    const coracoesUsu = document.querySelectorAll(".coracaoUsu")

    if (classeDoElemento == "certo"){
        //Um for para apagar todos os corações
        for(let numIni = 0; numIni < coracoesIni.length; numIni++){
            coracoesIni[numIni].innerText = ""
        }

        //Remove o último elemento da nodelist
        coracoesIni[coracoesIni.length-1].remove();

        //serve para adicionar os corações novamente de acordo com o que foi removido
        if (coracoesIni.length-1 == 0){
            segundos += 1000;

            if (fase == "1") {
                localStorage.setItem("fase", "2")
                msgModal.innerText = 'Parabéns! Você venceu!'
                novoLink.href = './tela.php';
                novoLink.innerText = 'Próxima';
                btnOutroModal.appendChild(novoLink);
            } else if (fase == "2") {
                localStorage.setItem("fase", "3")
                msgModal.innerText = 'Parabéns! Você venceu!'
                novoLink.href = './tela.php';
                novoLink.innerText = 'Próxima';
                btnOutroModal.appendChild(novoLink);
            } else if (fase == "3") {
                btnOutroModal.parentNode.removeChild(btnOutroModal);
                msgModal.innerText = 'Parabéns! Você venceu! Você salvou o nosso amigo! Volte para selecionar outra fase!'
            }
            
            iconMsg.setAttribute('src', './images/icones/trofeu.png');
            
            msgMoedaModal.innerText = 'Você ganhou 10'
            iconMoeda.setAttribute('src', './images/icones/moeda.png');
            
            modalJogo.style.display = "block";
            
        } else {
            coracoesIni.forEach(function(elemento, indice) {
                const novaImagem = document.createElement('img');
                novaImagem.src = './images/personagens/coracao.png';
                coracoesIni[indice].appendChild(novaImagem);
            });
        }

        } else if (classeDoElemento == "alternativas"){
            for(let numUsu = 0; numUsu < coracoesUsu.length; numUsu++){
                coracoesUsu[numUsu].innerText = ""
            }

            coracoesUsu[coracoesUsu.length-1].remove();

            if (coracoesUsu.length-1 == 0){
                segundos += 1000;
                novoLink.href = '';
                novoLink.innerText = 'Recomeçar';
                btnOutroModal.appendChild(novoLink);

                iconMsg.setAttribute('src', './images/icones/perdeu.png');

                msgModal.innerText = 'Poxa! Você foi enfeitiçado!'

                msgMoedaModal.innerText = 'Você não ganhou 0'
                iconMoeda.setAttribute('src', './images/icones/moeda.png');
                modalJogo.style.display = "block";
            } else {
                coracoesUsu.forEach(function(elemento, indice) {
                    const novaImagem = document.createElement('img');
                    novaImagem.src = './images/personagens/coracao.png';
                    coracoesUsu[indice].appendChild(novaImagem);
                });
            }
        }

    result = 0

    mudarCenario()
    verificarFase();
    cronometrarTempo();
}

function iniciarJogo(){
    
    if (operacao == "+" && operacao2 == "" && operacao3 == "" || 
    operacao == "-" && operacao2 == "" && operacao3 == "" ||
    operacao == "*" && operacao2 == "" && operacao3 == "" || 
    operacao == "/" && operacao2 == "" && operacao3 == "") {
        if (fase == "2"){
            segundos += 30
        } else if (fase == "3"){
            segundos += 90
        }
    } else if (operacao == "+" && operacao2 == "-" && operacao3 == "" || operacao == "+" && operacao2 == "-" && operacao3 == "*") {
        if (fase == "1"){
            segundos += 40
        } else if (fase == "2"){
            segundos += 100
        } else if (fase == "3"){
            segundos += 150
        }
    }
    mudarCenario()
    verificarFase();
    cronometrarTempo();
}

//Iniciar um novo jogo quando a página é reiniciada
window.addEventListener("load", function() {
    // Sua função JavaScript aqui
    iniciarJogo();
});

//Inicia uma nova conta quando clica nas alternativas
const elementosHTML = document.querySelectorAll('.barraAlternativas button'); // Seleciona todos os elementos
elementosHTML.forEach(function(elemento) {
    elemento.addEventListener('click', compararResultados);
});


