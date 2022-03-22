<?php
$title = "Padaria - Editar produto";

require_once "../../components/header.php";
require_once "../../db/database.php";
require_once "../../db/crud.php";
require_once "../../components/select-categoria-produto.php";
$db = new PadariaDB();
$conn = $db->return_connection();

$id = $_GET["id"];

if (isset($_POST["nome"], $_POST["preco"], $_POST["categoria"])) {
    $nome = $_POST["nome"];
    $preco = $_POST["preco"];
    $categoria = $_POST["categoria"];

    echo updateEntity($conn, "produto",  $id,  ["nome" => $nome, "preco" => $preco, "categoria_id" => $categoria]);
}

$entity = findEntity($conn, "produto", $id);
?>
<span class="tituloSubPagina">
Editar produto
</span>
<form id="produto" class="boxInput" name="cadastro" method="post" action="#">
    <label for="nome">Nome do produto</label>
    <span class="labelInputRequired">*</span>
    <input name="nome" type="text" id="nome" size="70" maxlength="255" placeholder="Digite o nome do produto..." value="<?= htmlspecialchars($entity['nome']) ?>" required />
    <br/>
    <label for="preco">Preço do Produto</label>
    <span class="">*</span>
    <input name="preco" type="text" id="preco" size="70" maxlength="255" placeholder="Digite o preço do produto..." value="<?= htmlspecialchars($entity['preco']) ?>" required />
    <br/>
    <?php selectCategoriaProduto($entity["categoria_id"]) ?>
    <br/>
    <input name="Cadastrar" type="submit" id="cadastrar" value="Editar" />
    <button class="voltar" onclick="location.href = './'">Voltar</button>
</form>

<?php require_once "../../components/footer.php" ?>