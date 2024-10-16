<?php
session_start();

require_once '../classes/FornecedorDAO.php';
require_once '../classes/ProdutoDAO.php';
require_once '../classes/Conexao.php';

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Cadastro de Produtos e Fornecedores</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body style="background-color: #8d99ae;">
    <header class="container-fluid bg-dark">
        <div class="container">
        <h2>Sistema de Cadastro de Produtos e Fornecedores</h2>
        </div>
    </header>
    <main class="index-home">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav w-100 justify-content-center">
            <li class="nav-item"><a class="nav-link" href="?">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="?page=fornecedores">Fornecedores</a></li>
            <li class="nav-item"><a class="nav-link" href="?page=produtos">Produtos</a></li>
            <li class="nav-item"><a class="nav-link" href="?page=sair">Sair</a></li>
        </ul>
        </div>
        </div>
    </nav>
        <?php
        if (!empty($_GET['page'])) {
            $file = '../pages/' . $_GET['page'] . '.php';
            if (file_exists($file)) {
                require_once $file;
            } else {
                echo 'Arquivo não encontrado!';
            }
        } else {
            require_once '../pages/dash.php';
        }
        ?>
    </main>
</body>

</html>