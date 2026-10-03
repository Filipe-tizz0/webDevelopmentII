<?php
#$preco1 = 100;
#$quantidade1 = 2;
#$total1 = $preco1 * $quantidade1;
#$preco2 = 50;
#$quantidade2 = 4;
#$total2 = $preco2 * $quantidade2;
#$total = $total1 + $total2;
$total = calcularTotal(100, 2) + calcularTotal(50, 4);
echo $total;

function calcularTotal($preco, $quant)
{
    return $preco * $quant;
}

#resposta: a função agora pode ser reutilizada quando uma regra semelhante, evitando redundancia no código;
