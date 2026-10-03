<?php

$prods = [];
$prods[] = [
    'nome' => 'maça',
    'preco' => 1,
    'estoque' => 50
];

$prods[] = [
    'nome' => 'banana',
    'preco' => 1.50,
    'estoque' => 75
];

$prods[] = [
    'nome' => 'teclado',
    'preco' => 250,
    'estoque' => 25
];

$prods[] = [
    'nome' => 'mouse',
    'preco' => 79,
    'estoque' => 49
];

$prods[] = [
    'nome' => 'gpu',
    'preco' => 4500,
    'estoque' => 0
];
$valorTotalEstoque = 0;

foreach ($prods as $p) {
    if ($p['estoque'] > 0) {
        echo 'nome: ' . $p['nome'] . ', preco: ' . $p['preco'] . ', estoque: ' . $p['estoque'] . ', valor em estoque: ' . calcularValorEstoque($p['preco'], $p['estoque']) . '<br>';

        $valorTotalEstoque += calcularValorEstoque($p['preco'], $p['estoque']);
    }
}

echo '<br>Valor total em estoque:' . $valorTotalEstoque;


function calcularValorEstoque(float $preco, int $quantidade): float
{
    return $preco * $quantidade;
}
