var temporizador = Number(document.querySelector('#temporizador').innerHTML);

setInterval(function(){
    if(temporizador >= 0 )
    document.querySelector('#temporizador').innerHTML = temporizador--;

}, 1000);