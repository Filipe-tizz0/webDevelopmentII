<?php

namespace produtosClass;

class Produto{
    private $nome;
    private $preco;
    private $estoque;

    public function __construct($nome, $preco, $estoque) {
        $this->nome = $nome;
        $this->preco = $preco;
        $this->estoque = $estoque;
    }

    public function show_details(){
        echo $this->nome . ", " . $this->preco . ", " . $this->estoque;
    }

    public function aplicarDesconto(float $percentual){
        if ($percentual != 0){
            $desconto = $this->preco * $percentual;
            if($this->preco > $desconto){

                $this->preco = $this->preco - $desconto;
                echo "Preco descontado: " . $this->preco  . "<br>";
            } else {
                echo "Desconto maior ou igual ao preço"  . "<br>";
            }
        }
    }

    public function reporEstoque(int $quantidade){
        $this->estoque += $quantidade;
        echo "Novo estoque: " . $this->estoque . "<br>";
    }

    public function vender(int $quantidade): bool{
        if ($quantidade >= $this->estoque){
            return false;
        } else {
            $this->estoque -= $quantidade;
            return true;
        }
    }

    public function getNome(): string {
        return $this->nome;
    }

    public function getPreco(): float{
        return $this->preco;
    }

    public function getEstoque(): int{
        return $this->estoque;
    }
}