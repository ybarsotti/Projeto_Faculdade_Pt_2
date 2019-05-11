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
            },
            error: console.log("erro")
        })
    }
        setInterval(att, 3000);
    };

   
/*function iniciar(codsala){
    $.ajax({
        type: "POST",
        url: "../servidor/inicia-jogo.php",
        data: 'codsala': codsala
    });
}*/