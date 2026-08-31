<?php
require "Conta.php";

use contaClass\ContaBancaria;

try {
    $contas = [];

    $contas[] = new ContaBancaria(500.90);
    $contas[] = new ContaBancaria(30.69);
    $i = 1;

    foreach ($contas as $c) {
        echo "conta $i   =====<br><br>";
        echo $c->getsaldo() . "<br>";
        $c->depositar(89.03);
        echo $c->getsaldo() . "<br>";
        $c->sacar(300);
        echo $c->getsaldo() . "<br>";
        $i++;
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
