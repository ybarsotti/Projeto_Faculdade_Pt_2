    const verificaPartida = (codigo) =>{
        var status = false;
        function verifica(){
        if(status != true){
                $.ajax({
                    type: 'post',
                    url: 'servidor/verifica-status.php',
                    data: {codsala : codigo},
                    success: function(dado){
                        if(dado == 1){
                            status = true;
                            document.querySelector(".aguardando").style.display = "none";
                            document.querySelector(".container-fluid").style.display = "block";
                            questionario(codigo);
                        }
                    }
            });
        }
    }
    setInterval(verifica,400);
};


//Contador da pergunta
function envio(a){
    var contador = a;

    var tempo = setInterval(function(){
        contador--;

        if(contador === 0){
            clearInterval(tempo);
            enviar();
        }
    }, 1000);

    //temporizador = setInterval(tempo, 1000);
}

//funcao para chamar a proxima pergunta
function tempoProx(){
    $('.questao').append("Proxima pergunta em breve !");
    var tempo = 12;
    var tempo1 = setInterval(function(){
        tempo--;
        if(tempo === 0){
            clearInterval(tempo1);
            setTimeout(questionario(id), 1000);
        }
    }, 1000);
};


//Envia a resposta selecionada pelo jogador
const enviar = () =>{ 
    var selecionado = document.querySelector('input[name="resposta"]:checked').value;
    player          = document.querySelector('.btn').value;

    $.ajax({
        type: 'post',
        url: 'servidor/analisa-resposta.php',
        data:{resposta : selecionado,
              idsala : id,
              jogador : player},
        success: function(dado){
            if(dado == 'Resposta Correta!'){
                play1();
                $(".questao").empty();
                $('.div-resposta-1').empty();
                $('.div-resposta-2').empty();
                $('.div-resposta-3').empty();
                $('.div-resposta-4').empty();
                tempoProx();
            }

            if(dado == 'Resposta Errada!'){
                play2();
                $(".questao").empty();
                $('.div-resposta-1').empty();
                $('.div-resposta-2').empty();
                $('.div-resposta-3').empty();
                $('.div-resposta-4').empty();
                tempoProx();
            }

            
        }

    });
};


// Funcao que verifica a pergunta atual
function perguntaAtual(){
    $.ajax({
        url: "servidor/pegar-num-pergunta.php",
        method: "post",
        data: { 'roomId' : id, 
                'usuario' : player} ,
        success: function(dado){
            console.log(dado);
            if(dado == 1){
                questionario(id);
            }
        }
    });
}

//Pegar a pergunta do banco de dados
function questionario(codigo){
    player  = document.querySelector('.btn').value;
    id      = codigo;
    $(".questao").empty();
    $('.div-resposta-1').empty();
    $('.div-resposta-2').empty();
    $('.div-resposta-3').empty();
    $('.div-resposta-4').empty();
    $.ajax({
        url: "servidor/pegar-pergunta-jogador.php",
        method: "post",
        dataType: 'json',
        data: { 'roomId' : id,
                'jogador' : player} , 
        success: function(data){
            //var data = JSON.parse(data);
            $(".questao").append(data['question']);
            $('.div-resposta-1').append(data['ans1']);
            $('.div-resposta-2').append(data['ans2']);
            $('.div-resposta-3').append(data['ans3']);
            $('.div-resposta-4').append(data['ans4']);
            envio(data['time']);
        }
    })
    
};



const sair = () =>{
    document.saida.submit();
}

/* Musica fundo */

audio1 = document.getElementById('audio1');
audio2 = document.getElementById('audio2');

function play1(){
   audio1.volume = 0.3;
   audio1.play();
}

function play2(){
   audio2.volume = 0.1;
   audio2.play();
}


