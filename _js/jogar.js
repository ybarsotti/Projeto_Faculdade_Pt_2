/* Carregar o loader*/
/*
document.getElementsByClassName("principal")[0].style.display = "none";

window.addEventListener("load", function(){
            document.getElementsByClassName("principal")[0].
            style.display = "block";
            document.querySelector('.loader')
            .style.display = "none";
});*/

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
    var codigo = document.querySelector('#codigo').value;
    if(codigo.length < 1 ){
        document.querySelector('#codigo').classList.add('erro');
        document.querySelector('#codigo').focus();
    }
        if(codigo.length > 0 ){
        verifica();
    }
}

const verifica = () =>{

    if(document.querySelector('#userid') != null){
        document.querySelector('.envio-jogar').submit();
    } else
    novoUsuario();
        
}

const novoUsuario = () =>{
    
    document.querySelector('.text-center').innerHTML = "Insira o nickname";
    document.querySelector('#codigo').type = "hidden";
    document.querySelector('.botao').setAttribute("onclick", "validaNick()");

        if(!document.querySelector("input[name='nickname']")){
            var inpu = document.createElement("input");    
            inpu.setAttribute("type", "text");
            inpu.setAttribute("name", "nickname");
            inpu.setAttribute("class", "form-control mb-1");
            inpu.setAttribute("placeholder", "Nickname");
            inpu.setAttribute("minlength", 4);
            inpu.setAttribute("maxlength", 25);
            $(inpu).appendTo(document.querySelector("#nickinput"));
    }
}

const validaNick = () =>{

    document.querySelector("input[name='nickname']").value.length < 4? alert("Digite pelo menos 4 caracteres.") : document.querySelector(".envio-jogar").submit(); 


}

/* Musica fundo */

audio = document.getElementById('audio');

function play(){
   audio.volume = 0.2;
   audio.play();
}