<?php
$title = "Padaria - Editar produto";

require_once "../../components/header.php";
require_once "../../db/database.php";
require_once "../../db/crud.php";
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

Editar produto

<form id="produto" name="cadastro" method="post" action="#">
    <label for="nome">Nome do produto</label>
    <span class="">*</span>
    <input name="nome" type="text" id="nome" size="70" maxlength="255" placeholder="Digite o nome do produto..." value="<?= htmlspecialchars($entity['nome']) ?>" required />

    <label for="preco">Preço do Produto</label>
    <span class="">*</span>
    <input name="preco" type="text" id="preco" size="70" maxlength="255" placeholder="Digite o preço do produto..." value="<?= htmlspecialchars($entity['preco']) ?>" required />

    <?php require_once "../../components/select-categoria-produto.php" ?>

    <input name="Cadastrar" type="submit" id="cadastrar" value="Editar" />
</form>
<button onclick="location.href = './'">Voltar</button>

<?php require_once "../../components/footer.php" ?>