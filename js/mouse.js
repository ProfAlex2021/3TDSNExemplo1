function cadastrar() {
    let dados = lerFormulario();
    let formdata = gerarFormulario(dados);

    let requestOptions = {
        method: 'POST',
        body: formdata,
        redirect: 'follow'
    };

    fetch("http://localhost/3TDSN/Exemplo1/mouse/api/", requestOptions)
        .then(response => response.text())
        .then(result => console.log(result))
        .catch(error => console.log('error', error));

}

function gerarFormulario(dados) {
    let formdata = new FormData();
    formdata.append("marca", dados.marca);
    formdata.append("modelo", dados.modelo);
    formdata.append("cor", dados.cor);
    formdata.append("formato", dados.formato);
    formdata.append("cabo", dados.cabo);
    formdata.append("wireless", dados.wireless);
    formdata.append("botoes", dados.botoes);
    formdata.append("cod", dados.cod);
    return formdata;

}

function lerFormulario() {
    let dados = {
        'cod': document.querySelector("#cod").value,
        'botoes': document.querySelector("#botoes").value,
        'marca': document.querySelector("#marca").value,
        'modelo': document.querySelector("#modelo").value,
        'cor': document.querySelector("#cor").value,
        'formato': document.querySelector("#formato").value,
        'cabo': document.querySelector("#cabo").checked ? 1 : 0,
        'wireless': document.querySelector("#wireless").checked ? 1 : 0
    };
    return dados;
}


function excluir() {
    let tabela = this.closest("table");
    this.closest("tr").remove();
    exibirTabela(tabela);
}

function exibirTabela(tabela) {
    tabela.style.display = tabela.querySelector('tbody').children.length == 0 ? "none" : "table";
}

function carregarDados() {
    atualizarTabela(receberAPI());
}

function atualizarTabela(dados) {

    const tbody = document.querySelector("table tbody");
    tbody.innerHTML = "";

    for (let i = 0; i < dados.length; i++) {
        const mouse = dados[i];
        const linha = document.createElement('tr');
        linha.appendChild(document.createElement('td')).innerText = mouse.marca;
        linha.appendChild(document.createElement('td')).innerText = mouse.modelo;
        linha.setAttribute("data-cod", mouse.cod);

        const operacoes = document.createElement('td');
        operacoes.className = "text-center";
        operacoes.innerHTML = `
        <button type="button" class="btn btn-outline-primary visualizar">&#128065;</button>
        <button type="button" class="btn btn-outline-success flip-horizontal">&#9998;</button>
        <button type="button" class="btn btn-outline-danger">&#10006;</button>
        `;

        linha.appendChild(operacoes);
        console.log(linha.getAttribute('data-cod'));
        tbody.appendChild(linha);
    }
    botoesTabela();
}

function receberAPI() {
    return [
        { 'cod': 1, 'marca': 1, 'modelo': 1 },
        { 'cod': 2, 'marca': 2, 'modelo': 2 },
        { 'cod': 3, 'marca': 3, 'modelo': 3 }
    ];
}

function lerAPI() {
    let requestOptions = {
        method: 'GET',
        redirect: 'follow'
    };


    fetch("http://localhost/3TDSN/Exemplo1/mouse/api/", requestOptions)
        .then(response => response.text())
        .then(result => atualizarTabela(JSON.parse(result)))
        .catch(error => console.log('error', error));
}

function botoesExcluir() {
    let btn_excluir = document.querySelectorAll("button[class*=danger]");
    for (let i = 0; i < btn_excluir.length; i++) {
        btn_excluir[i].addEventListener("click", excluir, false);
    }
}

function botoesVisualizar() {
    let btn_visualizar = document.querySelectorAll("button[class*=visualizar]");
    for (let i = 0; i < btn_visualizar.length; i++) {
        btn_visualizar[i].addEventListener("click", visualizar, false);
    }
}

function visualizar() {
    let cod = this.closest("tr").getAttribute("data-cod");
    let requestOptions = {
        method: 'GET',
        redirect: 'follow'
    };
    console.log("http://localhost/3TDSN/Exemplo1/mouse/api/?cod=" + cod);
    fetch("http://localhost/3TDSN/Exemplo1/mouse/api/?cod=" + cod, requestOptions)
        .then(response => response.text())
        .then(result => atualizarFormulario(JSON.parse(result)))
        .catch(error => console.log('error', error));
}

function atualizarFormulario(dados) {
    document.querySelector("#cod").value = dados.cod;
    document.querySelector("#botoes").value = dados.botoes;
    document.querySelector("#marca").value = dados.marca;
    document.querySelector("#modelo").value = dados.modelo;
    document.querySelector("#cor").value = dados.cor;
    document.querySelector("#formato").value = dados.formato;
    document.querySelector("#cabo").checked = dados.cabo == 1;
    document.querySelector("#wireless").checked = dados.wireless == 1;

}

function botoesTabela(){
    botoesExcluir();
    botoesVisualizar();
    exibirTabela(document.querySelector("table"));
}

document.addEventListener("DOMContentLoaded", function () {
    document.querySelector("#cadastrar").addEventListener("click", cadastrar, false);
    document.querySelector("#carregarDados").addEventListener("click", carregarDados, false);
    document.querySelector("#lerAPI").addEventListener("click", lerAPI, false);
    botoesTabela();
}, false);