<?php
require "carrinho.php";

use Carinho\carrinho;

$carrinho = new carrinho();

$carrinho->addProd("Maça", 32, 1);
$carrinho->addProd("banana", 6, 2);
$carrinho->addProd("pera", 29, 3);
$carrinho->addProd("uva", 65, 4);
$carrinho->addProd("melao", 67, 5);

echo "Quantidade total de produtos: " . $carrinho->calcularQuantidade() . "<br>";
echo "Valor total do carrinho: " . $carrinho->calcularValorTotal() . "<br>";

$carrinho->limparCarrinho();

echo "Quantidade total de produtos: " . $carrinho->calcularQuantidade() . "<br>";
echo "Valor total do carrinho: " . $carrinho->calcularValorTotal() . "<br>";
