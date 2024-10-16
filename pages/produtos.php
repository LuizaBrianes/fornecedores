<?php
require_once '../funcoes/login.php';

isNotLogged();
?>
<section class="form-section">
    <div class="container">
            <h2 class="text-center mt-3 mb-3">Adicionar Produto</h2>
            <form action="?page=processa-produto" method="post">

                <div class="mb-3">
                <label class="form-label" for="nome">Nome</label>
                <div class="input-group">
                    <div class="input-group-text">
                    <i class="bi bi-caret-right"></i>
                    </div>
                <input class="form-control" type="text" id="nome" name="nome" required>
                </div>
                </div>

                <div class="mb-3">
                <label class="form-label" for="direcao">Direção</label>
                <div class="input-group">
                    <div class="input-group-text">
                    <i class="bi bi-geo-alt"></i>
                    </div>
                <input class="form-control" type="text" id="direcao" name="direcao" required>
                </div>
                </div>

                <div class="mb-3">
                <label class="form-label" for="preco">Preço</label>
                <div class="input-group">
                    <div class="input-group-text">
                    <i class="bi bi-currency-dollar"></i>
                    </div>
                <input class="form-control" type="number" id="preco" name="preco" min="0" required>
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
                <button class="btn btn-success" type="submit" name="acao" value="cadastrar">Cadastrar</button>
                </div>
            </form>
    </div>
</section>
<section class="list-section">
    <h2 class="text-center mb-3 mt-3">Produtos Cadastrados</h2>
    <div class="border p-1 rounded bg-light">
    <table class="table table-light table-striped table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Direção</th>
                <th>Preço</th>
                <th>Fornecedor</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $produtoDAO = new ProdutoDAO();
            $produtos = $produtoDAO->read(); // Invoca o método read()
            foreach ($produtos as $produto) {
            ?>
            <tr>
                <td><?php echo $produto['id'];    ?></td>
                <td><?php echo $produto['nome_produto'];  ?></td>
                <td><?php echo $produto['direcao']; ?></td>
                <td><?php echo number_format($produto['preco'], 2, ',', '.'); ?></td>
                <td><?php echo $produto['nome_fornecedor']?></td>
                <td>
                    <button class="btn btn-outline-warning" onclick="location.href='?page=edita-produto&id=<?php echo $produto['id'] ?>'"><i class="bi bi-pencil-square"></i></button>
                    <button class="btn btn-outline-danger" onclick="location.href='?page=processa-produto&id=<?php echo $produto['id'] ?>'"><i class="bi bi-trash"></i></button>
                </td>
            </tr>
            <?php
            }// endloop foreach
            ?>
        </tbody>
    </table>
    </div>
</section>