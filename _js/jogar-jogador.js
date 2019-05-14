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
                            console.log(dado);
                        }
                    },
                    error: function(dado){
                    console.log(dado);
                }
            });
        }
    }
    setInterval(verifica,400);
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
            $(".questao").append(data['question']);
            $('#temporizador').append(data['time']);
            $('.div-resposta-1').append(data['ans1']);
            $('.div-resposta-2').append(data['ans2']);
            $('.div-resposta-3').append(data['ans3']);
            $('.div-resposta-4').append(data['ans4']);
        }
    })
    
};


var tempo = setInterval(timer, 1000);

function timer(){
    var zero = 0;
    var tempo = Number(document.querySelector("#temporizador").innerHTML);
    if(tempo != zero)
    document.querySelector("#temporizador").innerHTML = tempo -= 1;
    else {
        enviar();
    }
}

const enviar = () =>{ 
    var selecionado = $("[name=resposta]").val();
    $.ajax({
        type: 'post',
        url: 'servidor/analisa-resposta.php',
        data:{resposta : selecionado},
        success: function(dado){
            console.log(dado);
        }

    });
};

const sair = () =>{
    document.saida.submit();
}