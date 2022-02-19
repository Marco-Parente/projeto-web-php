<?php
$title = "Padaria - Deletar Categoria de Produto";

require_once "../../components/header.php";
require_once "../../db/database.php";
require_once "../../db/crud.php";
$db = new PadariaDB();
$conn = $db->return_connection();

$id = $_GET["id"];

if (array_key_exists('deleteEntity', $_POST)) {    
    deleteEntity($conn, "CategoriaProduto", $id);
}

$entity = findEntity($conn, "CategoriaProduto", $id);
?>

Deletar categoria

<form id="categoria" name="cadastro" method="post" action="#">
    Você tem certeza de que quer deletar essa entidade? <br>
    <label for="nome">Nome da Categoria</label>
    <span class="">*</span>
    <input readonly name="nome" type="text" id="nome" size="70" maxlength="255" placeholder="Digite o nome da categoria..." value="<?= htmlspecialchars($entity['nome']) ?>" required />
    <br>
    <input type="submit" name="deleteEntity" class="buttonCadastro" value="Deletar entidade" />
</form>
<button onclick="location.href = '../categoria-produto'">Voltar</button>

<?php require_once "../../components/footer.php" ?>