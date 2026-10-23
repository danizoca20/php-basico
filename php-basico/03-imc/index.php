
<?php
$resultado = null;
$classificacao = "";
$erro = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $peso = filter_input(INPUT_POST, "peso", FILTER_VALIDATE_FLOAT);
    $altura = filter_input(INPUT_POST, "altura", FILTER_VALIDATE_FLOAT);

    if ($peso === false || $peso === null ||
        $altura === false || $altura === null ||
        $peso <= 0 || $altura <= 0) {
        $erro = "Informe valores válidos para peso e altura.";
    } else {
        $resultado = $peso / ($altura * $altura);

        if ($resultado < 18.5) {
            $classificacao = "Abaixo do peso";
        } elseif ($resultado < 25) {
            $classificacao = "Peso normal";
        } elseif ($resultado < 30) {
            $classificacao = "Sobrepeso";
        } elseif ($resultado < 35) {
            $classificacao = "Obesidade grau I";
        } elseif ($resultado < 40) {
            $classificacao = "Obesidade grau II";
        } else {
            $classificacao = "Obesidade grau III";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Calculadora de IMC</title>
</head>
<body>
    <h1>Calculadora de IMC</h1>

    <form method="POST">
        <label for="peso">Peso (kg):</label>
        <input type="number" id="peso" name="peso"
               step="any" min="0.1" required>

        <br><br>

        <label for="altura">Altura (metros):</label>
        <input type="number" id="altura" name="altura"
               step="any" min="0.1" required>

        <br><br>

        <button type="submit">Calcular</button>
    </form>

    <?php if ($erro !== ""): ?>
        <p><?= htmlspecialchars($erro) ?></p>
    <?php endif; ?>

    <?php if ($resultado !== null): ?>
        <h2>Resultado do cálculo</h2>
        <p>IMC: <?= number_format($resultado, 2, ",", ".") ?></p>
        <p>Classificação: <?= htmlspecialchars($classificacao) ?></p>
    <?php endif; ?>
</body>
</html>
