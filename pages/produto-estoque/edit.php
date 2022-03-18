<?php
$title = "Padaria - Editar produto no estoque";

require_once "../../components/header.php";
require_once "../../db/database.php";
require_once "../../db/crud.php";
require_once "../../components/select-produto.php";
require_once "../../components/select-unidade.php";
require_once "../../components/select-estoque.php";

$db = new PadariaDB();
$conn = $db->return_connection();

$id = $_GET["id"];

if (isset($_POST["produto"], $_POST["unidade"], $_POST["estoque"], $_POST["quantidade"])) {
    $produto = $_POST["produto"];
    $unidade = $_POST["unidade"];
    $estoque = $_POST["estoque"];
    $quantidade = $_POST["quantidade"];

    echo updateEntity($conn, "produtoestoque",  $id,  ["produto_id" => $produto, "unidade_id" => $unidade, "estoque_id" => $estoque, "quantidade" => $quantidade]);
}

$entity = findEntity($conn, "produtoestoque", $id);
?>

Editar produto no estoque

<form id="produtoestoque" name="cadastro" method="post" action="#">
    <?php selectProduto($entity["produto_id"])?>
    <?php selectUnidade($entity["unidade_id"])?>
    <?php selectEstoque($entity["estoque_id"])?>
    <br/    >
    <label for="quantidade">Quantidade</label>
    <span class="">*</span>
    <input name="quantidade" type="text" id="quantidade" size="70" maxlength="255" placeholder="Digite a quantidade disponível..." value="<?= htmlspecialchars($entity['quantidade']) ?>" required />


    <input name="Cadastrar" type="submit" id="cadastrar" value="Editar" />
</form>
<button onclick="location.href = './'">Voltar</button>

<?php require_once "../../components/footer.php" ?>