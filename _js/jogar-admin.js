window.onload = function () {
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
                $('.usuarios').append('<tr><td>' + dados[i].userName + '</td></tr>');
            }
        })
    }
        setInterval(att, 3000);
    };



   
function iniciar(codigo){
    $.ajax({
        type: "POST",
        url: "servidor/inicia-jogo.php",
        data: {codsala : codigo},
        success: function(dado){
            if(dado != false){
                $('.navbar').append('<button class="btn" id="proximo" onclicl="">Proximo</button>');
                $('#iniciar').remove();
            }
        },
        error: console.log("erro")
    });
}