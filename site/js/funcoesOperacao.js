const elementosMundo = document.querySelectorAll('.mainCarrossel .mundo')
const nomeMundo = document.querySelector('.modal .modalNomeFase')

elementosMundo.forEach(function() {
    elementosMundo[0].addEventListener('click', function() {
        nomeMundo.innerText = 'Mundo da Adição'
        localStorage.setItem("operacao", "+")
        localStorage.setItem("operacao2", "")
        localStorage.setItem("operacao3", "")
    });

    elementosMundo[1].addEventListener('click', function() {
        nomeMundo.innerText = 'Mundo da Subtração'
        localStorage.setItem("operacao", "-")
        localStorage.setItem("operacao2", "")
        localStorage.setItem("operacao3", "")
    });

    elementosMundo[2].addEventListener('click', function() {
        nomeMundo.innerText = 'Mundo da Multiplicação'
        localStorage.setItem("operacao", "*")
        localStorage.setItem("operacao2", "")
        localStorage.setItem("operacao3", "")
    });

    elementosMundo[3].addEventListener('click', function() {
        nomeMundo.innerText = 'Mundo da Adição e Subtração'
        localStorage.setItem("operacao", "+")
        localStorage.setItem("operacao2", "-")
        localStorage.setItem("operacao3", "")
    });

    elementosMundo[4].addEventListener('click', function() {
        nomeMundo.innerText = 'Mundo da Divisão'
        localStorage.setItem("operacao", "/")
        localStorage.setItem("operacao2", "")
        localStorage.setItem("operacao3", "")
    });

    elementosMundo[5].addEventListener('click', function() {
        nomeMundo.innerText = 'Mundo da Adição, Subtração e Mutiplicação'
        localStorage.setItem("operacao", "+")
        localStorage.setItem("operacao2", "-")
        localStorage.setItem("operacao3", "*")
    });
});

const elementosFase = document.querySelectorAll('.barraFase a')

elementosFase.forEach(function() {
    elementosFase[0].addEventListener('click', function() {
        localStorage.setItem("fase", "1")
    });

    elementosFase[1].addEventListener('click', function() {
        localStorage.setItem("fase", "2")
    });

    elementosFase[2].addEventListener('click', function() {
        localStorage.setItem("fase", "3")
    });
});

