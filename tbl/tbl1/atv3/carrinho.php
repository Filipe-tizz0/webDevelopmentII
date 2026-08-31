<?php

namespace Carinho;

require "produtos.php";

use Produtos\produto;

class carrinho
{
    private $produtos = [];
    public function addProd($desc, $preco, $codigo)
    {
        $this->produtos[] = new Produto($desc, $preco, $codigo);
    }

    public function calcularValorTotal()
    {
        $result = 0;
        foreach ($this->produtos as $p) {
            $result += $p->preco;
        }
        return $result;
    }

    public function calcularQuantidade()
    {
        $result = 0;
        foreach ($this->produtos as $p) {
            $result++;
        }
        return $result;
    }

    public function limparCarrinho()
    {
        $this->produtos = [];
    }
}
