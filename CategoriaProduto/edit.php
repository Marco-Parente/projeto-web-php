<?php
$title = "Padaria - Editar Categoria de Produto";

require_once "../Components/header.php";
require_once "../db/database.php";
require_once "../db/crud.php";
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

Editar categoria

<form id="categoria" name="cadastro" method="post" action="#">
    <label for="nome">Nome da Categoria</label>
    <span class="">*</span>
    <input name="nome" type="text" id="nome" size="70" maxlength="255" placeholder="Digite o nome da categoria..." value="<?= htmlspecialchars($entity['nome']) ?>" required />

    <input name="Cadastrar" type="submit" id="cadastrar" value="Editar" />
</form>
<button onclick="location.href = '../CategoriaProduto'">Voltar</button>

<?php require_once "../Components/footer.php" ?>