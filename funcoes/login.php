<?php

function isNotLogged()
{
    //Verifica se o usuário NÃO está logado
    if (empty($_SESSION['admin'])) {
        //O usuário não está logado
        //Redirecionar para o login
        header('Location:http://localhost/fornecedores/');
        exit;
    }
}

function isLogged()
{
    //Verifica se o usuário está logado
    if (!empty($_SESSION['admin'])) {
        //O usuário está logado
        //Redirecionar para o login
        header('Location:http://localhost/fornecedores/pages/index.php');
        exit;
    }
}

function logout()
{
    session_destroy();
    header('Location: http://localhost/fornecedores/');
    exit;
}