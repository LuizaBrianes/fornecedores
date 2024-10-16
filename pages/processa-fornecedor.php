<?php

require_once '../classes/Fornecedor.php'; // Inclui o script do arquivo
require_once '../classes/FornecedorDAO.php'; // Inclui o script do arquivo

if ($_SERVER['REQUEST_METHOD'] === 'POST') { 

    if ($_POST['acao'] === 'cadastrar') {

        try {
            // Instância da classe fornecedor
            $fornecedor = new Fornecedor(null, $_POST['nome'], $_POST['contato'], $_POST['telefone']);
            // Instância da classe fornecedorDAO
            $fornecedorDAO = new FornecedorDAO();
            $fornecedorDAO->create($fornecedor);

        } catch (Exception $e) {
            echo $e->getMessage();
        }
    
    } elseif ($_POST['acao'] === 'alterar') {

        try {
            // Instância da classe fornecedor
            $fornecedor = new Fornecedor($_POST['id'], $_POST['nome'], $_POST['contato'], $_POST['telefone']);
            // Instância da classe fornecedorDAO
            $fornecedorDAO = new FornecedorDAO();

            $fornecedorDAO->update($fornecedor);

        } catch (Exception $e) {
            echo $e->getMessage();
        }

    } else {
        echo 'Operação inválida!';
    }

} elseif ($_GET) {
    if (!empty($_GET['id'])) {
        $fornecedor = new FornecedorDAO();

        $fornecedor->delete($_GET['id']);
    } else {
        echo 'Nenhum valor foi passado.';
    }
} else {
    echo 'Acesso inválido!';
}