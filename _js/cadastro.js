const cadastroAluno = () =>{
    document.querySelector('.escolha').style.display = 'none';
    document.querySelector('h2').style.display = 'none';
    //document.querySelector('.resposta-criacao').style.display = 'none';
    /* aparece o menu*/
    document.querySelector('.btn-voltar').style.display = 'block';
    document.querySelector('.form-aluno').style.display = 'block';
    /* Abaixo o link de cadastro muda para aluno */
    // document.querySelector('.form-aluno').action = 'cadastro.php';

}


const cadastroProf = () =>{
    document.querySelector('.escolha').style.display = 'none';
    document.querySelector('h2').style.display = 'none';
    //document.querySelector('.resposta-criacao').style.display = 'none';
    /* Aparece o menu */
    document.querySelector('.btn-voltar').style.display = 'block';
    document.querySelector('.form-aluno').style.display = 'block';

    /* Abaixo o link de cadastro muda para professor */
   // document.querySelector('.form-aluno').action = 'cadastro.php';
}

const voltamenu = () =>{
    /* Some com o formulario e volta com a opcao de usuario */
    document.querySelector('.btn-voltar').style.display = 'none';
    document.querySelector('.form-aluno').style.display = 'none';

    document.querySelector('.escolha').style.display = '';
    document.querySelector('h2').style.display = '';    
}

