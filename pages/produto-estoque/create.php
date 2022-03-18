<?php
$title = "Padaria - Adicionar produto no estoque";
require_once "../../components/header.php";
require_once "../../components/select-produto.php";
require_once "../../components/select-unidade.php";
require_once "../../components/select-estoque.php";

if (isset($_POST["produto"], $_POST["unidade"], $_POST["estoque"], $_POST["quantidade"])) {
    include("../../db/database.php");
    include("../../db/crud.php");

    $produto = $_POST["produto"];
    $unidade = $_POST["unidade"];
    $estoque = $_POST["estoque"];
    $quantidade = $_POST["quantidade"];

    $db = new PadariaDB();
    $conn = $db->return_connection();

    createEntity($conn, "produtoestoque", ["produto_id" => $produto, "unidade_id" => $unidade, "estoque_id" => $estoque, "quantidade" => $quantidade]);

    // $conn->close();
}
?>

Adicionar produto no estoque

<form id="produtoestoque" name="cadastro" method="post" action="#">
    <?php selectProduto()?>
    <?php selectUnidade()?>
    <?php selectEstoque()?>
    <br/    >
    <label for="quantidade">Quantidade</label>
    <span class="">*</span>
    <input name="quantidade" type="text" id="quantidade" size="70" maxlength="255" placeholder="Digite a quantidade disponível..." required />

    <input name="Cadastrar" type="submit" id="cadastrar" value="Concluir cadastro" />
</form>
<button onclick="location.href = './'">Voltar</button>

<?php require_once "../../components/footer.php" ?>