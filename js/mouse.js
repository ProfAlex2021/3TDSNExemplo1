function carregar() {
    let submit = document.querySelector("#submit");
    submit.addEventListener("click", cadastrar, false);
}

function cadastrar() {
    let dados = lerFormulario();
    
    let formdata = new FormData();
    formdata.append("marca", dados.marca);
    formdata.append("modelo", dados.modelo);
    formdata.append("cor", dados.cor);
    formdata.append("formato", dados.formato);
    formdata.append("cabo", dados.cabo);
    formdata.append("wireless", dados.wireless);
    formdata.append("botoes", dados.botoes);
    //formdata.append("cod", "2");

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

function lerFormulario(){
    let dados = {
        'botoes' : document.querySelector("#botoes").value,
        'marca' : document.querySelector("#marca").value,
        'modelo' : document.querySelector("#modelo").value,
        'cor' : document.querySelector("#cor").value,
        'formato' : document.querySelector("#formato").value,
        'cabo' : document.querySelector("#cabo").checked ? 1 : 0,
        'wireless' : document.querySelector("#wireless").checked ? 1 : 0
    };
    return dados;
}

document.addEventListener("DOMContentLoaded", carregar, false);