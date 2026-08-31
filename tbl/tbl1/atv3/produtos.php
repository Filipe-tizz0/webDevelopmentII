<?php

namespace Produtos;

class produto
{
    public $desc;
    public $preco;
    public $codigo;

    public function __construct($desc, $preco, $codigo)
    {
        $this->desc = $desc;
        $this->preco = $preco;
        $this->codigo = $codigo;
    }
}
