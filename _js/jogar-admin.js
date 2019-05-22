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
                for(var i = 0; dados.length>i; i++)
                $('.usuarios').append('<tr> <th>Nome</th><th> Pontos </th> </tr> <tr><td>' + dados[i].userName + '</td> Pontos: <td>' + dados[i].pontos + '</td></tr>');
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
                $('.navbar').append('<button class="btn" id="proximo" onclick="proxPergunta('+ codigo +')">Proxima Pergunta</button>');
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
        data: { 'roomId' : codigo} , 
        success: function(data){
                var data = JSON.parse(data);
                $('.pergunta').empty();
                $(".pergunta").prepend(data['question']);
                $('#temporizador').empty();
                $("#temporizador").append(data['time']);
                console.log(data);
        }
    });
}

var tempo = setInterval(timer, 1000);

function timer(){
    var zero = 0;
    var tempo = Number(document.querySelector("#temporizador").innerHTML);
    if(tempo != zero)
    document.querySelector("#temporizador").innerHTML = tempo -= 1;
}


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