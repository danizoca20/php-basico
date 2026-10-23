
<?php
date_default_timezone_set("America/Sao_Paulo");

$data = date("d/m/Y");
$hora = date("H:i:s");
$horaAtual = (int) date("H");

if ($horaAtual < 12) {
    $saudacao = "Bom dia!";
} elseif ($horaAtual < 18) {
    $saudacao = "Boa tarde!";
} else {
    $saudacao = "Boa noite!";
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Data e Hora</title>
</head>
<body>
    <h1>Data e Hora Atual</h1>

    <p>Data: <?= $data ?></p>
    <p>Hora: <?= $hora ?></p>
    <h2><?= $saudacao ?></h2>
</body>
</html>
