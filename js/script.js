

//MÁSCARAS
var cpf = document.getElementById("cpf");
$(document).ready(function () { 
    var $seuCampoCpf = $("#cpf");
    $seuCampoCpf.mask('000.000.000-00', {reverse: false});
});

var cep = document.getElementById("cep");
$(document).ready(function () { 
    var $seuCampoCep = $("#cep");
    $seuCampoCep.mask('00000-000', {reverse: false});
});

var tel = document.getElementById("tel");
$(document).ready(function () { 
    var $seuCampoTel = $("#tel");
    $seuCampoTel.mask('(00)00000-0000', {reverse: false});
});

var rg = document.getElementById("rg");
$(document).ready(function () { 
    var $seuCampoRg = $("#rg");
    $seuCampoRg.mask('00.000.000-0', {reverse: false});
});