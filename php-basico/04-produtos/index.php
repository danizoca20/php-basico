
<?php
$produtos = [
    [
        "nome" => "Notebook",
        "preco" => 2500.00,
        "estoque" => 5
    ],
    [
        "nome" => "Mouse",
        "preco" => 50.00,
        "estoque" => 10
    ],
    [
        "nome" => "Teclado",
        "preco" => 120.00,
        "estoque" => 0
    ],
    [
        "nome" => "Monitor",
        "preco" => 850.00,
        "estoque" => 3
    ]
];

function formatarPreco($preco) {
    return "R$ " . number_format($preco, 2, ",", ".");
}

$totalProdutos = 0;
$valorTotal = 0;
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Lista de Produtos</title>
</head>
<body>
    <h1>Lista de Produtos</h1>

    <table border="1" cellpadding="8">
        <tr>
            <th>Produto</th>
            <th>Preço</th>
            <th>Estoque</th>
            <th>Situação</th>
        </tr>

        <?php foreach ($produtos as $produto): ?>
            <tr>
                <td>
                    <?= htmlspecialchars($produto["nome"]) ?>
                </td>
                <td>
                    <?= formatarPreco($produto["preco"]) ?>
                </td>
                <td><?= $produto["estoque"] ?></td>
                <td>
                    <?= $produto["estoque"] > 0
                        ? "Disponível"
                        : "Indisponível" ?>
                </td>
            </tr>

            <?php
            $totalProdutos += $produto["estoque"];
            $valorTotal += $produto["preco"] * $produto["estoque"];
            ?>
        <?php endforeach; ?>
    </table>

    <h2>Resumo do estoque</h2>
    <p>Quantidade total de unidades: <?= $totalProdutos ?></p>
    <p>Valor total do estoque: <?= formatarPreco($valorTotal) ?></p>
</body>
</html>
