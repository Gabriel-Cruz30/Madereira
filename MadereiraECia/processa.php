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