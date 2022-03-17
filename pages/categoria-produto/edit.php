<?php
$title = "Padaria - Editar Categoria de Produto";

require_once "../../components/header.php";
require_once "../../db/database.php";
require_once "../../db/crud.php";
$db = new PadariaDB();
$conn = $db->return_connection();

$id = $_GET["id"];

if (isset($_POST["nome"])) {
    $nome = $_POST["nome"];

    echo "Atualizando <br/>";

    updateEntity($conn, "CategoriaProduto", $id, ["nome" => $nome]);
}

$entity = findEntity($conn, "CategoriaProduto", $id);
?>
<span class="tituloSubPagina">
    Editar categoria
</span> 
<form id="categoria" class="boxInput" name="cadastro" method="post" action="#">
    <label for="nome">Nome da Categoria</label>
    <span class="labelInputRequired">*</span>
    <input name="nome" type="text" id="nome" size="70" maxlength="255" placeholder="Digite o nome da categoria..." value="<?= htmlspecialchars($entity['nome']) ?>" required />

    <input name="Cadastrar" type="submit" id="cadastrar" value="Editar" />
    <button class="voltar" onclick="location.href = './'">Voltar</button>
</form>

<?php require_once "../../components/footer.php" ?>