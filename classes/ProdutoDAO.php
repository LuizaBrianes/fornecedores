<?php

require_once '../classes/Produto.php'; // Inclui o script do arquivo
require_once '../classes/Conexao.php'; // Inclui o script do arquivo


class ProdutoDAO
{
    public function create(Produto $produto)
    {
        $pdo = Conexao::getConnection();

        try {
            // Declarar a consulta
            $query = 'INSERT INTO produtos (nome, direcao, preco, id_forn) VALUES (:NOME, :DIRECAO, :PRECO, :ID_FORN)';

            $stmt = $pdo->prepare($query); // declaração ou statement

            // Ligação dos valores com seus rótulos
            $stmt->bindValue(':NOME',  $produto->getNome());
            $stmt->bindValue(':DIRECAO', $produto->getDirecao());
            $stmt->bindValue(':PRECO', $produto->getPreco());
            $stmt->bindValue(':ID_FORN', $produto->getId_forn());

            // Executar a consulta
            $stmt->execute();

            ?>
            <div class="alert alert-success" role="alert">
            <h4 class="text-center mt-3 mb-3"><?php echo 'Produto cadastrado com sucesso!'; ?></h4>
            <p class="text-center">Clique <a href="../pages/?page=produtos" class="alert-link">aqui</a> para voltar a lista de produtos.</p>
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
            $query = "SELECT p.id, p.nome AS nome_produto, p.direcao, p.preco, f.nome AS nome_fornecedor
            FROM produtos p
            JOIN fornecedores f ON p.id_forn = f.id";

            $result = $pdo->query($query);// Executa a consulta

            return $result; // Vetor (resultado da consulta)

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function update(Produto $produto)
    {
        $pdo = Conexao::getConnection();

        try {
            // Declarar a consulta
            $query = 'UPDATE produtos SET nome = :NOME, direcao = :DIRECAO, preco = :PRECO, id_forn = :ID_FORN WHERE id = :ID';
            // Preparar a consulta (statement)
            $stmt = $pdo->prepare($query);
            // Ligação dos valores
            $stmt->bindValue(':ID',  $produto->getId());
            $stmt->bindValue(':NOME',  $produto->getNome());
            $stmt->bindValue(':DIRECAO', $produto->getDirecao());
            $stmt->bindValue(':PRECO', $produto->getPreco());
            $stmt->bindValue(':ID_FORN', $produto->getId_forn());
            // Executar a consulta
            $stmt->execute();
            // Exibe uma mensagem
            ?>
            <div class="alert alert-success" role="alert">
            <h4 class="text-center mt-3 mb-3"><?php echo 'Dados alterados com sucesso!'; ?></h4>
            <p class="text-center">Clique <a href="../pages/?page=produtos" class="alert-link">aqui</a> para voltar a lista de produtos.</p>
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
            $query = 'DELETE FROM produtos WHERE id = :ID';

            $stmt = $pdo->prepare($query); // declaração ou statement

            // Ligação dos valores com seus rótulos
            $stmt->bindValue(':ID',  $id);

            // Executar a consulta
            $stmt->execute();

            ?>

            <div class="alert alert-danger" role="alert">
            <h4 class="text-center mt-3 mb-3 alert-heading"><?php echo 'Produto deletado com sucesso!';?></h4>
            <p class="text-center">Clique <a href="../pages/?page=produtos" class="alert-link">aqui</a> para voltar a lista de produtos.</p>
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
            $query = 'SELECT * FROM produtos WHERE id = :ID';
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

    public static function nomeFornecedor()
    {
        $pdo = Conexao::getConnection();

        $query = "SELECT id, nome FROM fornecedores";

        $stmt = $pdo->prepare($query);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Retorna como array associativo
    }
}