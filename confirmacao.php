<?php
session_start();
$form = $_SESSION['formData'];
if (!$form) {
    echo "Nenhum dado recebido.";
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">

</head>

<body>
    <h2 style="color: #fff;" class="title">
        Confirme suas informações:
    </h2>
    <div class="col-md-12 confirm-section">
        <div class="row">
            <div class="info">
                <label><b>Nome:</b> <?= $form['nome'] ?></label>

            </div>
        </div>

        <div class="row">
            <div class="info">
                <label><b>Email:</b> <?= $form['email'] ?></label>

            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-sm-12 info">
                <label> <b> Telefone: </b> <?= $form['telefone'] ?></label>

            </div>
        </div>

        <div class="row">
            <div class="col-md-6 col-sm-12 info">
                <label> <b> RG: </b> <?= $form['rg'] ?></label>

            </div>
            <div class="col-md-6 col-sm-12 info">
                <label> <b> CPF: </b> <?= $form['cpf'] ?></label>

            </div>
        </div>

        <div class="row">
            <div class="sub-confirm">Endereço</div>

            <div class="col-md-6 col-sm-12 info">
                <label> <b> Logradouro: </b> <?= $form['logradouro'] ?></label>

            </div>

            <div class="col-md-6 col-sm-12 info">
                <label> <b> Bairro: </b> <?= $form['bairro'] ?></label>

            </div>
        </div>

        <div class="row">

            <div class="col-md-12 col-sm-12 info">
                <label> <b> Cidade: </b> <?= $form['cidade'] ?></label>

            </div>
        </div>

        <div class="row">

            <div class="col-md-4 col-sm-12 info">
                <label> <b> Nº: </b> <?= $form['numero'] ?></label>

            </div>
            <div class="col-md-4 col-sm-12 info">
                <label> <b> Estado: </b> <?= $form['estado'] ?></label>

            </div>


            <div class="col-md-4 col-sm-12 info">
                <label> <b> CEP: </b> <?= $form['cep'] ?></label>

            </div>
        </div>

        <div class="row">

            <div class="sub-confirm">Informações Adicionais</div>
            <div class="col-md-6 col-sm-12 info">
                <label> <b> Tipo de Artesanato: </b> <?= $form['artesanato'] ?></label>

            </div>
            <?php if ($form['temAjudante'] === 'sim'): ?>
                <div class="col-md-6 col-sm-12 info">
                    <label> <b> Quantidade de ajudantes: </b> <?= $form['qtdAjudantes'] ?></label>

                </div>

                <?php if (!empty($form['ajudante1'])): ?>
                    <div class="col-md-12 info">
                        <label> <b> Nome do ajudante 1: </b> <?= $form['ajudante1'] ?></label>

                    </div>
                <?php endif; ?>

                <?php if (!empty($form['ajudante2'])): ?>
                    <div class="col-md-12 info">
                        <label> <b> Nome do ajudante 2: </b> <?= $form['ajudante2'] ?></label>

                    </div>
                <?php endif; ?>

            <?php endif; ?>
        </div>
    </div>



    <div class="botoes">
        <button class="botao-voltar" onclick="history.back()">Voltar e Corrigir</button>

        <form action="dados.php" method="post" style="display:inline;">
            <button type="submit" class="botao-confirmar">Confirmar e Enviar</button>
        </form>
    </div>


</body>

</html>