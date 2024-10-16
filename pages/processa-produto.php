<?php

require_once '../classes/Produto.php'; // Inclui o script do arquivo
require_once '../classes/ProdutoDAO.php'; // Inclui o script do arquivo

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if ($_POST['acao'] === 'cadastrar') {

        try {
            // Instância da classe produto
            $produto = new Produto(null, $_POST['nome'], $_POST['direcao'], $_POST['preco'], $_POST['id_forn']);
            // Instância da classe produtoDAO
            $produtoDAO = new ProdutoDAO();
            $produtoDAO->create($produto);

        } catch (Exception $e) {
            echo $e->getMessage();
        }
    
    } elseif ($_POST['acao'] === 'alterar') {

        try {
            // Instância da classe produto
            $produto = new Produto($_POST['id'], $_POST['nome'], $_POST['direcao'], $_POST['preco'], $_POST['id_forn']);
            // Instância da classe produtoDAO
            $produtoDAO = new ProdutoDAO();

            $produtoDAO->update($produto);

        } catch (Exception $e) {
            echo $e->getMessage();
        }

    } else {
        echo 'Operação inválida!';
    }

} elseif ($_GET) {
    if (!empty($_GET['id'])) {
        $produto = new ProdutoDAO();

        $produto->delete($_GET['id']);
    } else {
        echo 'Nenhum valor foi passado.';
    }
} else {
    echo 'Acesso inválido!';
}