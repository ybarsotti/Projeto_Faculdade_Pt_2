window.onload = function jogadores() {
    var sql = document.querySelector("#room-id").value;
        function att() { 
            $(".usuarios").empty();
            $.ajax({
            type: "post",
            url: "servidor/jogadores-em-sala.php",
            dataType: "json",
            data: {
                roomid : sql
            },
            success: function(dados){
                $('.usuarios').append('<tr> <th>Nome</th><th> Pontos </th> </tr>');
                for(var i = 0; dados.length>i; i++){
                    $('.usuarios').append('<tr><td>' + dados[i].userName + '</td> Pontos: <td>' + dados[i].pontos + '</td></tr>');
                }
            }
        })
    }
        setInterval(att, 5000);
    };



   
function iniciar(codigo){
    $('.tempo').css('display', 'block');
    $('hr').css('display', 'block');
    $.ajax({
        type: "POST",
        url: "servidor/inicia-jogo.php",
        data: {codsala : codigo},
        success: function(dado){
            if(dado != false){
                //$('.navbar').append('<button class="btn" id="proximo" onclick="proxPergunta('+ codigo +')">Proxima Pergunta</button>');
                $('#iniciar').remove();
                proxPergunta(codigo);
            }
        }
    });
}

const proxPergunta = (codigo) =>{
    $.ajax({
        url: "servidor/pegar-pergunta.php",
        method: "post",
        dataType: 'json',
        data: { 'roomId' : codigo} , 
        success: function(data){
                //var data = JSON.parse(data);
                $('.pergunta').empty();
                $(".pergunta").prepend(data['question']);
                $('#temporizador').empty();
                $("#temporizador").append(data['time']);
                console.log(data);
                tempo(codigo);
                if(data == 'Fim de jogo'){
                    $('.tempo').css('display', 'none');
                    $('hr').css('display', 'none');
                }
        }
    });
}

// Tempo para acabar a pergunta
function tempo(id){
    var tempoo = setInterval(function(){
        var zero = 0;
        var tempo = Number(document.querySelector("#temporizador").innerHTML);
        if(tempo != zero){
            document.querySelector("#temporizador").innerHTML = tempo -= 1;
        }
        if(document.querySelector("#temporizador").innerHTML == '0'){
            setTimeout(tempoProx(id), 1000);
            clearInterval(tempoo);
        }
    }, 1000);
}

//Tempo para chamar a proxima pergunta
function tempoProx(id){
    document.querySelector("#temporizador").innerHTML = 11;
    $('.pergunta').empty();
    $('.pergunta').append("Tempo para proxima pergunta ...");
    var tempo1 = setInterval(function(){
        var tempo = Number(document.querySelector("#temporizador").innerHTML);
        if(tempo != 0){
            document.querySelector("#temporizador").innerHTML = tempo -= 1;
        }else{
            clearInterval(tempo1);
            setTimeout(proxPergunta(id), 2000);
        }
    }, 1000);
};


function questionario(codigo){
    var id = codigo;
    $(".questao").empty();
    $.ajax({
        url: "servidor/pegar-pergunta.php",
        method: "post",
        dataType: 'json',
        data: { 'roomId' : id} , 
        success: function(data){
            $('#temporizador').append(data['time']);
        }
    })
    
};