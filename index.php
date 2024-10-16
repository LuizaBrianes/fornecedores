<?php
session_start();// Inicializa a sessão

require_once 'funcoes/login.php';
require_once 'classes/Admin.php';
require_once 'classes/AdminDAO.php';

isLogged();

$mensagem = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $admin = new Admin(null, null, $_POST['user'], $_POST['pass']);
        $adminDAO = new AdminDAO();
                
        if ($adminDAO->login($admin)) {
            header('Location: pages/');
        } else {
            $mensagem = 'Dados inválidos!';
        }
    } catch (Exception $e) {
        $mensagem = $e->getMessage();
    }
}

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Cadastro de Produtos e Fornecedores</title>
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body style="background-color: #8d99ae;">
    <header>
        <h2>Login - Sistema de Cadastro de Produtos e Fornecedores</h2>
    </header>
    <main class="index-login">
        <?php
        if (!empty($mensagem)) {
            echo $mensagem . '<br>';
        }
        ?>
        <form class="login" method="post">

            <div class="mb-3">
            <label class="form-label" for="user">Usuário</label> 
            <div class="input-group">
                <div class="input-group-text">
                <i class="bi bi-person"></i>
                </div>
                <input class="form-control" type="text" name="user" id="user">
            </div>
            </div>

            <div class="mb-3">
            <label class="form-label" for="pass">Senha</label>
            <div class="input-group">
                    <div class="input-group-text">
                    <i class="bi bi-shield-check"></i>
                    </div>
            <input class="form-control" type="password" id="pass" name="pass">
            </div>
            </div>

            <div class="text-center">
            <button class="btn btn-primary bi bi-box-arrow-in-right" type="submit"> Entrar</button>
            </div>
        </form>
    </main>
</body>

</html>