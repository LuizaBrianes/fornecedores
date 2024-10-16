<?php
require_once '../funcoes/login.php';

isNotLogged();
?>
<section class="form-section"> 
    <div class="container">
            <h2 class="text-center mt-3 mb-3">Adicionar Fornecedor</h2> 
            <form action="?page=processa-fornecedor" method="post">

                <div class="mb-3">
                <label class="form-label" for="nome">Nome</label>
                <div class="input-group">
                    <div class="input-group-text">
                    <i class="bi bi-person"></i>
                    </div>
                <input class="form-control" type="text" id="nome" name="nome">
                </div>
                </div>

                <div class="mb-3">
                <label class="form-label" for="contato">Contato</label>
                <div class="input-group">
                    <div class="input-group-text">
                    <i class="bi bi-person-badge"></i>
                    </div>
                <input class="form-control" type="text" id="contato" name="contato">
                </div>
                </div>

                <div class="mb-3">
                <label class="form-label" for="telefone">Telefone</label>
                <div class="input-group">
                    <div class="input-group-text">
                    <i class="bi bi-telephone"></i>
                    </div>
                <input class="form-control" type="text" id="telefone" name="telefone">
                </div>
                </div>

                <div class="mb-3 mt-3 text-center">
                <button class="btn btn-success" type="submit" name="acao" value="cadastrar">Cadastrar</button>
                </div>
            </form>
            </div>
</section>
<section class="list-section">
    <h2 class="text-center mb-3 mt-3">Fornecedores Cadastrados</h2>
    <div class="border p-1 rounded bg-light">
    <table class="table table-light table-striped table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Contato</th>
                <th>Telefone</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $fornecedorDAO = new FornecedorDAO();
            $fornecedores = $fornecedorDAO->read(); // Invoca o método read()
            foreach ($fornecedores as $fornecedor) {
            ?>
            <tr>
                <td><?php echo $fornecedor['id'];    ?></td>
                <td><?php echo $fornecedor['nome'];  ?></td>
                <td><?php echo $fornecedor['contato']; ?></td>
                <td><?php echo $fornecedor['telefone']; ?></td>
                <td>
                    <button class="btn btn-outline-warning" onclick="location.href='?page=edita-fornecedor&id=<?php echo $fornecedor['id'] ?>'"><i class="bi bi-pencil-square"></i></button>
                    <button class="btn btn-outline-danger" onclick="location.href='?page=processa-fornecedor&id=<?php echo $fornecedor['id'] ?>'"><i class="bi bi-trash"></i></button>
                </td>
            </tr>
            <?php
            }// endloop foreach
            ?>
        </tbody>
    </table>
    </div>
</section>