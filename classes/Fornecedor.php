<?php

class Fornecedor 
{
    private $id, $nome, $contato, $telefone;

    // Construtor
    public function __construct($id = null, $nome, $contato, $telefone)
    {
        // Invoca os métodos setters
        if (!empty($id)) {
            $this->setId($id);
        }
        $this->setNome($nome);
        $this->setContato($contato);
        $this->setTelefone($telefone);
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

    public function getContato()
    {
        return $this->contato;
    }

    public function getTelefone()
    {
        return $this->telefone;
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

    public function setContato($contato)
    {
        if (empty($contato)) {
            // Lança uma exceção
            throw new Exception("Contato é obrigatório.");
        }

        $this->contato = $contato;

    }
    public function setTelefone($telefone)
    {
        if (empty($telefone)) {
            // Lança uma exceção
            throw new Exception("Telefone é obrigatório.");
        }
        
        $this->telefone = $telefone;
    }
}