# Madereira
index.html
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Madeira e Cia</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="container">
        <h1>Madeira e Cia</h1>
        <p>Promoção de aniversário</p>

        <form action="processa.php" method="POST">

            <label for="txtNome">Nome do cliente:</label>
            <input type="text" id="txtNome" name="txtNome" required>

            <label for="txtValorCompra">Valor da compra:</label>
            <input type="number" id="txtValorCompra" name="txtValorCompra" step="0.01" required>

            <label for="cmbPag">Forma de pagamento:</label>
            <select id="cmbPag" name="cmbPag" required>
                <option value="">Selecione</option>
                <option value="deposito">Depósito</option>
                <option value="boleto">Boleto</option>
                <option value="cartaoCredito">Cartão de crédito</option>
            </select>

            <button type="submit">Calcular desconto</button>

        </form>
    </div>

</body>
</html>
processa.php
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome = $_POST["txtNome"];
    $valorCompra = $_POST["txtValorCompra"];
    $formaPagamento = $_POST["cmbPag"];

    if ($formaPagamento == "deposito") {

        $desconto = $valorCompra * 0.10;
        $forma = "Depósito";

    } elseif ($formaPagamento == "boleto") {

        $desconto = $valorCompra * 0.08;
        $forma = "Boleto";

    } elseif ($formaPagamento == "cartaoCredito") {

        $desconto = 0;
        $forma = "Cartão de crédito";

    } else {

        echo "Forma de pagamento inválida.";
        exit;
    }

    $valorFinal = $valorCompra - $desconto;

    echo "<h1>Madeira e Cia</h1>";

    echo "<p>Olá, $nome!</p>";
    echo "<p>Forma de pagamento: $forma</p>";
    echo "<p>Valor da compra: R$ " . number_format($valorCompra, 2, ',', '.') . "</p>";
    echo "<p>Desconto: R$ " . number_format($desconto, 2, ',', '.') . "</p>";
    echo "<p><strong>Valor final: R$ " . number_format($valorFinal, 2, ',', '.') . "</strong></p>";

} else {

    echo "Acesso inválido.";
}


/*
Comentário reflexivo:

Primeiro analisei o código recebido e identifiquei que os percentuais
de desconto do depósito e do boleto estavam invertidos. Corrigi o
depósito para 10% e o boleto para 8%, enquanto o cartão de crédito
permaneceu sem desconto.

Depois, utilizei estruturas condicionais para identificar a forma de
pagamento escolhida pelo cliente. Em seguida, calculei o desconto e
subtraí esse valor da compra para obter o valor final.

Também utilizei o number_format para apresentar os valores com duas
casas decimais. O formulário HTML envia os dados através do método POST
para este arquivo PHP, que recebe as informações e apresenta o resultado.

Por fim, foram realizados testes com as três formas de pagamento para
verificar se os descontos e os valores finais estavam corretos.
*/

?>
estilo.css
* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}

body {
    font-family: Arial, Helvetica, sans-serif;
    background-color: #f2eee8;
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
}

.container {
    background-color: white;
    width: 400px;
    padding: 30px;
    border-radius: 15px;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.15);
}

h1 {
    text-align: center;
    color: #5c3b20;
    margin-bottom: 8px;
}

p {
    text-align: center;
    margin-bottom: 25px;
    color: #777;
}

label {
    display: block;
    margin-top: 15px;
    margin-bottom: 6px;
    font-weight: bold;
}

input,
select {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 8px;
}

button {
    width: 100%;
    margin-top: 25px;
    padding: 12px;
    border: none;
    border-radius: 8px;
    background: #6b4528;
    color: white;
    font-size: 16px;
    cursor: pointer;
}

button:hover {
    background: #4d301c;
}
 


