<?php

namespace contaClass;

use Exception;

class ContaBancaria
{
    private float $saldo;

    public function __construct(float $saldo)
    {
        if ($saldo <= 0) {
            throw new Exception("Saldo menor ou igual a 0.");
        } else {
            $this->saldo = $saldo;
        }
    }

    public function depositar(float $valor)
    {
        $this->saldo += $valor;
    }
    public function sacar(float $valor)
    {
        if ($this->saldo >= $valor) {
            $this->saldo -= $valor;
        } else {
            throw new Exception("Erro no saque. Saldo menor que o valor a ser sacado.");
        }
    }
    public function getsaldo()
    {
        return $this->saldo;
    }
}
