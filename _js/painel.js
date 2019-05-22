window.addEventListener('load', function(){
    const verQuantidade = () =>{
        qt = document.querySelectorAll('td').length;
        return qt;
    };
    var qtde = verQuantidade();
    questionario = document.querySelector('.quantidade-questionarios');
    questionario.innerText = qtde < 1 ? 'Ops... Sem questionários criados !' :  'Você tem ' + qtde + ' formulário(s) de perguntas' ; 
});

const editarQuestionario = () =>{

    titulo = document.querySelector('.');

};


const excluirQuestionario = (row) =>{
    document.querySelector('.fechar-modal').href = "servidor/apagarquestionario.php?id=" + row;
};

const jogarQuestionario = (nomejogo) =>{
    
};