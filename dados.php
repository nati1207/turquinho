<?php
session_start();

if (!isset($_SESSION['formData'])) {
    die('Dados da inscrição não encontrados!');
}

$dados = $_SESSION['formData'];


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
$mail = new PHPMailer(true);

$mail->isSMTP();
$mail->Host       = 'smtp.gmail.com';
$mail->SMTPAuth   = true;
$mail->Username   = 'natalia.cristiani.russo.7@gmail.com'; // seu e-mail
$mail->Password   = 'mnub zyxj nwqc lrqe'; // senha do app, não a senha normal do Gmail
$mail->SMTPSecure = 'tls';
$mail->Port       = 587;


if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die('Acesso negado!');
}
$campos = [
    'nome',
    'email',
    'telefone',
    'rg',
    'cpf',
    'cep',
    'logradouro',
    'bairro',
    'cidade',
    'numero',
    'estado',
    'artesanato',
    'temAjudante',
    'qtdAjudantes',
    'ajudante1',
    'ajudante2',
    'aceite'
];

foreach ($campos as $campo) {
    if (!isset($dados[$campo]) || trim($dados[$campo]) === '') {
        $dados[$campo] = 'Sem informação/Não possui';
    }
    // Cria variáveis individuais como $nome, $email...
    $$campo = htmlspecialchars($dados[$campo]);
}



$dados['data_envio'] = date('Y-m-d H:i:s');


// Carrega dados anteriores se existir
$arquivo = __DIR__ . '/respostas.json';
$lista = [];

if (file_exists($arquivo)) {
    $lista = json_decode(file_get_contents($arquivo), true);
}
$cpfExiste = false;
foreach ($lista as $inscricao) {
    $cpfBusca = $inscricao['cpf'];
    if ($cpfBusca === $cpf) {
        $cpfExiste = true;
        break;
    }
}


$mail->setFrom('natalia.cristiani.russo.7@gmail.com', 'Teste');
$mail->addAddress($email, 'Inscrito na Feira como Teste');
$mail->isHTML(true);
$mail->CharSet = 'UTF-8';

// Conteúdo do e-mail
$mail->Subject = "Nova Inscrição teste na Feria do Turquinho - $nome";
$mail->Body =
    "<p style='margin: 0; font-size: 22px;'>$nome se inscreveu na feira do turquinho, com os seguintes dados:</p><br>
    <ul style='margin: 0; font-size: 16px;'>
        <li><strong>Nome:</strong> $nome</li>
        <li><strong>Email:</strong> $email</li>
        <li><strong>Telefone:</strong> $telefone</li>
        <li><strong>RG:</strong> $rg</li>
        <li><strong>CPF:</strong> $cpf</li>
        <li><strong>CEP:</strong> $cep</li>
        <li><strong>Logradouro:</strong> $logradouro</li>
        <li><strong>Bairro:</strong> $bairro</li>
        <li><strong>Cidade:</strong> $cidade</li>
        <li><strong>Número:</strong> $numero</li>
        <li><strong>Estado:</strong> $estado</li>
        <li><strong>Artesanato:</strong> $artesanato</li>
        <li><strong>Tem ajudante?:</strong> $temAjudante</li>
        <li><strong>Quantidade de ajudantes:</strong> $qtdAjudantes</li>
        <li><strong>Ajudante 1:</strong> $ajudante1</li>
        <li><strong>Ajudante 2:</strong> $ajudante2</li>
    </ul>";


if ($cpfExiste) {
    header('Location: erro-cpf.php?cpf=' . urlencode($cpfBusca));
    exit;
} else {

    // Adiciona os novos dados
    $lista[] = $dados;

    // Salva de volta no arquivo
    file_put_contents($arquivo, json_encode($lista, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    //$mail->send();
    unset($_SESSION['formData']);

    // Mostra uma página de confirmação
    header('Location: obrigado.html');
    exit;
}
