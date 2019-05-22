window.addEventListener('load', function(){
    const verQuantidade = () =>{
        qt = document.querySelectorAll('td').length;
        return qt;
    };
    var qtde = verQuantidade();
    questionario = document.querySelector('.quantidade-questionarios');
    questionario.innerText = qtde < 1 ? 'Sem perguntas criadas !' :  'Você tem ' + qtde + ' pergunta(s) !' ; 
});

const editarQuestionario = () =>{

    titulo = document.querySelector('.');

};


const excluirQuestionario = (row) =>{
    document.querySelector('.fechar-modal').href = "servidor/apagaresposta.php?id=" + row;
};

const jogarQuestionario = (nomejogo) =>{
    
};