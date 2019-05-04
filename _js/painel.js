window.addEventListener('load', function(){
    const verQuantidade = () =>{
        qt = document.querySelectorAll('td').length;
        return qt;
    };
    var qtde = verQuantidade();
    questionario = document.querySelector('.quantidade-questionarios');
    questionario.innerText = qtde < 1 ? 'Ops... Sem perguntas criadas !' :  'Você tem ' + qtde + ' formulário(s) de perguntas' ; 
});

const editarQuestionario = () =>{

    titulo = document.querySelector('.');

};


const excluirQuestionario = () =>{
    

    document.querySelector('.fechar-modal').setAttribute('data-dismiss', 'modal'); 
};

const jogarQuestionario = (nomejogo) =>{
    
};