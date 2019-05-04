const validar = () =>{
    var senha = document.querySelector('#psw').value;
    var senharp = document.querySelector('#rpt-psw').value;

    if (senha != senharp){
        alert('A senha não confere !');
        return false;
    } else{
        return true;
    }
}