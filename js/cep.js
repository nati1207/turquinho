function buscaCep(){
    let cep = document.getElementById('cep').value;

    if(cep.length === 9){
        let url = "https://brasilapi.com.br/api/cep/v1/" + cep;

        let req = new XMLHttpRequest();
        req.open("GET", url);
        req.send();

        //tratar resposta
        req.onload = function (){
            if (req.status === 200){
                let endereco = JSON.parse(req.response);
                document.getElementById("logradouro").value = endereco.street;
                document.getElementById("bairro").value = endereco.neighborhood;
                document.getElementById("cidade").value = endereco.city;
                document.getElementById("estado").value = endereco.state;
            }
            else if(req.status === 404){
                alert("CEP inválido");
                limparCampos();
            }
            else{
                alert("Erro ao fazer a requisição");
                limparCampos();
            }
        }
    }
    else if (cep.length < 9){
        limparCampos();
    }
}

window.onload = function(){
    let txtCep = document.getElementById("cep")
    txtCep.addEventListener("blur", buscaCep);
}

function limparCampos() {
    document.getElementById("logradouro").value = "";
    document.getElementById("bairro").value = "";
    document.getElementById("cidade").value = "";
}