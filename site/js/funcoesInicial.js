const modalFase = document.querySelector('.modalFase')

function verFase(){
    modalFase.style.display = "block";
}

function desverFase(){
    modalFase.style.display = "none";
}

const mundos = document.querySelectorAll('.mainCarrossel .mundo')

mundos.forEach(function(elemento) {
    elemento.addEventListener('click', verFase);
});

const sair = document.querySelector('.sairModal'); // Seleciona todos os elementos
sair.addEventListener('click', desverFase);

