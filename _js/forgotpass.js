const validar = () =>{
    var email =  document.querySelector('#email').value;
    var emailcaixa =  document.querySelector('#email');

    if (email == '' || email == NaN){
        alert('Digite um email válido');
        return false;
    } else{
        return true;
    }
}