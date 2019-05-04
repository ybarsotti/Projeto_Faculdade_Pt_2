const validar = () =>{
    var usr = document.querySelector('#usr').value;
    var email = document.querySelector('#email').value;


    if ( usr == '' && email == ''){
        alert ('Altere pelo menos um dado');
        return false;
    } else{
        return true;
    }
}