<?php
require_once '../classes/FornecedorDAO.php';
require_once '../funcoes/login.php';

isNotLogged();

$fornecedor = new FornecedorDAO();

$dados_forn = $fornecedor->search($_GET['id']);

?>

<section class="form-section">
    <div class="container">
    <h2 class="text-center mt-3 mb-3">Alterar Dados do Fornecedor</h2>
    <form action="?page=processa-fornecedor" method="post">

        <div class="mb-3">
        <label class="form-label" for="id">ID</label>
        <div class="input-group">
            <div class="input-group-text">
            <i class="bi bi-key"></i>
            </div>
        <input class="form-control" type="text" id="id" name="id" value="<?php echo $dados_forn['id'] ?>" readonly>
        </div>
        </div>

        <div class="mb-3">
        <label class="form-label" for="nome">Nome</label>
        <div class="input-group">
                <div class="input-group-text">
                <i class="bi bi-person"></i>
                </div>
        <input class="form-control" type="text" id="nome" name="nome" value="<?php echo $dados_forn['nome'] ?>">
        </div>
        </div>

        <div class="mb-3">
        <label class="form-label" for="contato">Contato</label>
        <div class="input-group">
                <div class="input-group-text">
                <i class="bi bi-person-badge"></i>
                </div>
        <input class="form-control" type="text" id="contato" name="contato" value="<?php echo $dados_forn['contato'] ?>">
        </div>
        </div>

        <div class="mb-3">
        <label class="form-label" for="telefone">Telefone</label>
        <div class="input-group">
                <div class="input-group-text">
                <i class="bi bi-telephone"></i>
                </div>
        <input class="form-control" type="text" id="telefone" name="telefone" value="<?php echo $dados_forn['telefone'] ?>">
        </div>
        </div>

        <div class="mb-3 mt-3 text-center">
        <button class="btn btn-success bi bi-floppy-fill" type="submit" name="acao" value="alterar"> Salvar</button>
        </div>
    </form>
    </div>
</section>   