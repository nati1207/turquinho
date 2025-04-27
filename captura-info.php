<?php
session_start();

$_SESSION['formData'] = [
    'email' => htmlspecialchars(trim($_POST['email'])),
    'nome' => htmlspecialchars(trim($_POST['nome'])),
    'telefone' => htmlspecialchars(trim($_POST['telefone'])),
    'rg' => htmlspecialchars(trim($_POST['rg'])),
    'cpf' => htmlspecialchars(trim($_POST['cpf'])),
    'logradouro' => htmlspecialchars(trim($_POST['logradouro'])),
    'bairro' => htmlspecialchars(trim($_POST['bairro'])),
    'cidade' => htmlspecialchars(trim($_POST['cidade'])),
    'numero' => htmlspecialchars(trim($_POST['numero'])),
    'estado' => htmlspecialchars(trim($_POST['estado'])),
    'cep' => htmlspecialchars(trim($_POST['cep'])),
    'artesanato' => htmlspecialchars(trim($_POST['artesanato'])),
    'temAjudante' => htmlspecialchars(trim($_POST['temAjudante'])),
    'qtdAjudantes' => htmlspecialchars(trim($_POST['qtdAjudantes'])),
];

$temAjudante = htmlspecialchars(trim($_POST['temAjudante']));
if($temAjudante){

    $qtdAjudantes = htmlspecialchars(trim($_POST['qtdAjudantes']));
    $_SESSION['formData']['ajudante1'] = htmlspecialchars(trim($_POST['ajudante1']));
    if($qtdAjudantes == 2){
        $_SESSION['formData']['ajudante2'] = htmlspecialchars(trim($_POST['ajudante2']));
    }
}




// redireciona para a página de confirmação
header("Location: confirmacao.php");
exit;

?>