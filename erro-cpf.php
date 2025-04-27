<?php
$cpfBusca = $_GET['cpf'] ?? 'CPF não informado';
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>CPF Já Cadastrado</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        body {
            background-image: url(img/fundo-turquinho.png);
            font-family: Arial, sans-serif;
            text-align: center;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;

        }
        a:hover {
            background-color: #5a131c;
        }
    </style>
</head>

<body>
    <div class="container-erro-cpf">
        <h1 class="cpf-errado"><?= htmlspecialchars($cpfBusca) ?></h1>
        <h3>CPF já cadastrado</h3>
        <p>Este CPF já foi registrado anteriormente.</p>
        <a href="index.html">Voltar para o formulário</a>
    </div>
</body>

</html>