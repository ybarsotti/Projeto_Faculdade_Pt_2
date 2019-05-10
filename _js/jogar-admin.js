window.onload(jogadoresEmSala());
window.onload(setInterval(jogadoresEmSala(), 2000));

function jogadoresEmSala(){
    $.ajax({
        type: "POST",
        url: "../servidor/jogadores-em-sala.php",
        data: $("#room-id").serialize(),
        error: function (){
            alert("Erro ao chamar funcao");
        }
    });
}

function iniciar(codsala){
    $.ajax({
        type: "POST",
        url: "../servidor/inicia-jogo.php",
        data: 'codsala': codsala
    });
}