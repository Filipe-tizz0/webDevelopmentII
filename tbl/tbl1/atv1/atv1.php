<?php
require "Produto.php";

use produtosClass\Produto;

$prod = new Produto("brahma", 3.19, 20);

$prod->aplicarDesconto(0.50);
$prod->reporEstoque(20);
if ($prod->vender(5)){
    echo "Novo estoque: " . $prod->getEstoque() . "<br>";
} else {
     echo "Não é possível vender, quantidade maior que no estoque <br>";
}

$prod2 = new Produto("breja", 2.09, 10);
$prod2->aplicarDesconto(0.50);

if ($prod2->vender(5)){
    echo "Novo estoque: " . $prod2->getEstoque() . "<br>";
} else {
     echo "Não é possível vender, quantidade maior que no estoque <br>";
}
$prod2->reporEstoque(20);

if ($prod2->vender(5)){
    echo "Novo estoque: " . $prod2->getEstoque() . "<br>";
} else {
     echo "Não é possível vender, quantidade maior que no estoque <br>";
}