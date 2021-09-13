
function excluir(){
    let tabela = this.parentElement.parentElement.parentElement;
    this.parentElement.parentElement.remove();
    console.log(tabela.children.length);
    exibirTabela(tabela)
}

function exibirTabela(tabela){
    tabela.parentElement.style.display= tabela.children.length == 0 ? "none" : "table";
}

document.addEventListener("DOMContentLoaded", function (){
    let btn_excluir = document.querySelectorAll("button[class*=danger]");
    console.log(btn_excluir.length);
    for (let i = 0; i < btn_excluir.length; i++) {
        btn_excluir[i].addEventListener("click", excluir, false);
    }
    let tabela = document.querySelector("table tbody");
    exibirTabela(tabela);
}, false);
