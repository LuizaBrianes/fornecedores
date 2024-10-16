<?php

class Produto
{
    private $id, $nome, $direcao, $preco, $id_forn;

    // Construtor
    public function __construct($id = null, $nome, $direcao, $preco, $id_forn)
    {
        // Invoca os métodos setters
        if (!empty($id)) {
            $this->setId($id);
        }
        $this->setNome($nome);
        $this->setDirecao($direcao);
        $this->setPreco($preco);
        $this->setId_forn($id_forn);
    }

    // Getters: acessar os valores privados
    public function getId()
    {
        return $this->id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getDirecao()
    {
        return $this->direcao;
    }

    public function getPreco()
    {
        return $this->preco;
    }

    public function getId_forn()
    {
        return $this->id_forn;
    }

    // Setters: definir/modificar os valores privados
    public function setId($id)
    {
        $this->id = $id;
    }

    public function setNome($nome)
    {
        if (empty($nome)) {
            // Lança uma exceção
            throw new Exception("Nome é obrigatório.");
        }

        $this->nome = $nome;
    }

    public function setDirecao($direcao)
    {
        if (empty($direcao)) {
            // Lança uma exceção
            throw new Exception("Direção é obrigatório.");
        }

        $this->direcao = $direcao; 

    }

    public function setPreco($preco)
    {
        if (empty($preco)) {
            // Lança uma exceção
            throw new Exception("Preço é obrigatório.");
        }
        $this->preco = $preco;
    }

    public function setId_forn($id_forn)
    {
        if (empty($id_forn)) {
            // Lança uma exceção
            throw new Exception("Id do fornecedor é obrigatório.");
        }
        $this->id_forn = $id_forn;
    }
}