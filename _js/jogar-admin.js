const iniciar = () =>{
    $.ajax({
        type: "post",
        url: "../servidor/inicia-jogo.php",
        error: function (){
            alert("Erro ao chamar funcao");
        },
        data: {
            "iniciar": "TRUE"
        },
        complete: function(){
            alert("teste");
        }
    });
}