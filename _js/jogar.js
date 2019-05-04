/* Carregar o loader*/

document.getElementsByClassName("principal")[0].style.display = "none";

window.addEventListener("load", function(){
            document.getElementsByClassName("principal")[0].
            style.display = "block";
            document.querySelector('.loader')
            .style.display = "none";
});

/* Transicao de cores */
var cores = ['#803cd8', '#d33bd6', '#d63b65', '#d69d3b', '#d6d63b',
    '#6fd63b', '#3bd6c9', '#3b98d6', '#3b4dd3', '#703bd3'];
var i = 0;
setInterval(() => {
    document.querySelector('.principal').style.background = cores[i];
    i = (i == (cores.length -1)) ? 0 : i+1;
}, 3000);


/* Validar input */

const validar = () =>{
    var senha = document.querySelector('#senha').value;
    if(senha == '' || senha==NaN){
        document.querySelector('#senha').classList.add('erro');
        return false;
    }else{
        return true;
    }
}

