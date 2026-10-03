<?php
function calcularMedia(float $nota1, float $nota2, float $nota3): float
{
    return ($nota1 + $nota2 + $nota3) / 3;
}

$result = calcularMedia(9.87, 8.76, 8.99);

echo "Aluno: João;<br>";
$situacao = "";

if ($result >= 7) {
    $situacao = "aprovado";
} else if ($result < 7 && $result >= 5) {
    $situacao = "exame";
} else {
    $situacao = "reprovado";
}

echo "Média: $result;<br><br>Situação: $situacao.";
