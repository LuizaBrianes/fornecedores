<?php 

require_once '../classes/Fornecedor.php'; // Inclui o script do arquivo
require_once '../classes/Conexao.php'; // Inclui o script do arquivo


class FornecedorDAO
{
    public function create(Fornecedor $fornecedor)
    {
        $pdo = Conexao::getConnection();

        try {
            // Declarar a consulta
            $query = 'INSERT INTO fornecedores (nome, contato, telefone) VALUES (:NOME, :CONTATO, :TELEFONE)';

            $stmt = $pdo->prepare($query); // declaração ou statement

            // Ligação dos valores com seus rótulos
            $stmt->bindValue(':NOME',  $fornecedor->getNome());
            $stmt->bindValue(':CONTATO', $fornecedor->getContato());
            $stmt->bindValue(':TELEFONE', $fornecedor->getTelefone());

            // Executar a consulta
            $stmt->execute();
            ?>
            <div class="alert alert-success" role="alert">
            <h4 class="text-center mt-3 mb-3"><?php echo 'Fornecedor cadastrado com sucesso!'; ?></h4>
            <p class="text-center">Clique <a href="../pages/?page=fornecedores" class="alert-link">aqui</a> para voltar a lista de fornecedores.</p>
            </div>
        <?php
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function read()
    {
        $pdo = Conexao::getConnection();

        try {
            // Declarar a consulta
            $query = 'SELECT * FROM fornecedores';

            $result = $pdo->query($query);// Executa a consulta

            return $result; // Vetor (resultado da consulta)

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function update(Fornecedor $fornecedor)
    {
        $pdo = Conexao::getConnection();

        try {
            // Declarar a consulta
            $query = 'UPDATE fornecedores SET nome = :NOME, contato = :CONTATO, telefone = :TELEFONE WHERE id = :ID';
            // Preparar a consulta (statement)
            $stmt = $pdo->prepare($query);
            // Ligação dos valores
            $stmt->bindValue(':ID',  $fornecedor->getId());
            $stmt->bindValue(':NOME',  $fornecedor->getNome());
            $stmt->bindValue(':CONTATO', $fornecedor->getContato());
            $stmt->bindValue(':TELEFONE', $fornecedor->getTelefone());
            // Executar a consulta
            $stmt->execute();
            // Exibe uma mensagem
            ?>
            <div class="alert alert-success" role="alert">
            <h4 class="text-center mt-3 mb-3"><?php echo 'Dados alterados com sucesso!'; ?></h4>
            <p class="text-center">Clique <a href="../pages/?page=fornecedores" class="alert-link">aqui</a> para voltar a lista de fornecedores.</p>
            </div>

            <?php

        } catch (PDOException $e) {
            echo $e->getMessage();
        }

    }

    public function delete($id)
    {
        $pdo = Conexao::getConnection();

        try {
            // Declarar a consulta
            $query = 'DELETE FROM fornecedores WHERE id = :ID';

            $stmt = $pdo->prepare($query); // declaração ou statement

            // Ligação dos valores com seus rótulos
            $stmt->bindValue(':ID',  $id);

            // Executar a consulta
            $stmt->execute();
            ?>

            <div class="alert alert-danger" role="alert">
            <h4 class="text-center mt-3 mb-3 alert-heading"><?php echo 'Fornecedor deletado com sucesso!';?></h4>
            <p class="text-center">Clique <a href="../pages/?page=fornecedores" class="alert-link">aqui</a> para voltar a lista de fornecedores.</p>
            </div>

            <?php
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function search($id)
    {
        $pdo = Conexao::getConnection();

        try {
            // Declarar a consulta
            $query = 'SELECT * FROM fornecedores WHERE id = :ID';
            // Preparar a consulta
            $stmt = $pdo->prepare($query); // declaração ou statement
            // Ligação dos valores com seus rótulos
            $stmt->bindValue(':ID',  $id);
            // Executar a consulta
            $stmt->execute();
            // Retorna um vetor associativo
            return $stmt->fetch(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}