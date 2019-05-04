function validarSenha(){
    senha = document.querySelector('#pswinput').value;
    csenha = document.querySelector('#rppswinput').value;

    if(senha != csenha){
        document.querySelector('.senhaIncorreta').classList.remove('senhaIncorreta');
        return false;
    }else{
        return true;
    }
}

var cores = ['#803cd8', '#d33bd6', '#d63b65', '#d69d3b', '#d6d63b',
    '#6fd63b', '#3bd6c9', '#3b98d6', '#3b4dd3', '#703bd3'];
var i = 0;
setInterval(() => {
    document.querySelector('#fila').style.background = cores[i];
    i = (i == (cores.length -1)) ? 0 : i+1;
}, 3000);
