<?php

require_once '../classes/ProdutoDAO.php';
require_once '../funcoes/login.php';

isNotLogged();

$produto = new ProdutoDAO();

$dados_produto = $produto->search($_GET['id']);

?>

<section class="form-section">
    <div class="container">
    <h2 class="text-center mt-3 mb-3">Alterar Dados do Produto</h2>
    <form action="?page=processa-produto" method="post">

        <div class="mb-3">
        <label class="form-label" for="id">ID</label>
        <div class="input-group">
            <div class="input-group-text">
            <i class="bi bi-key"></i>
            </div>
        <input class="form-control" type="text" id="id" name="id" value="<?php echo $dados_produto['id'] ?>" readonly>
        </div>
        </div>

        <div class="mb-3">
        <label class="form-label" for="nome">Nome</label>
        <div class="input-group">
            <div class="input-group-text">
            <i class="bi bi-caret-right"></i>
            </div>
        <input class="form-control" type="text" id="nome" name="nome" value="<?php echo $dados_produto['nome'] ?>">
        </div>
        </div>

        <label class="form-label" for="direcao">Direção</label>
        <div class="input-group">
            <div class="input-group-text">
            <i class="bi bi-geo-alt"></i>
            </div>
        <input class="form-control" type="text" id="direcao" name="direcao" value="<?php echo $dados_produto['direcao'] ?>">
        </div>

        <div class="mb-3">
        <label class="form-label" for="preco">Preço</label>
        <div class="input-group">
            <div class="input-group-text">
            <i class="bi bi-currency-dollar"></i>
            </div>
            <input class="form-control" type="text" id="preco" name="preco" value="<?php echo $dados_produto['preco'] ?>">
        </div>
        </div>

        <div class="mb-3">
        <label class="form-label" for="id_forn">Fornecedor</label>
        <div class="input-group">
                    <div class="input-group-text">
                    <i class="bi bi-person"></i>
                    </div>
                    <select class="form-select" name="id_forn" id="id_forn" required>
                        <option value="">Selecione o fornecedor</option>
                        <?php 
                            // Instanciando ProdutoDAO
                            $produtoDAO = new ProdutoDAO();
                            // Recuperando os nomes dos fornecedores
                            $nomesFornecedores = $produtoDAO->nomeFornecedor();
    
                            // Iterando sobre os fornecedores para preencher o <select>
                            foreach ($nomesFornecedores as $fornecedor) { ?>
                                <option value="<?php echo $fornecedor['id']; ?>">
                                <?php echo $fornecedor['nome']; ?>
                                </option>
                        <?php } ?>
                </select>
        </div>
        </div>

        <div class="mb-3 mt-3 text-center">
        <button class="btn btn-success bi bi-floppy-fill" type="submit" name="acao" value="alterar"> Salvar</button>
        </div>
    </form>
    </div>
</section>   