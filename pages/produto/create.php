<?php
$title = "Padaria - Adicionar produto";
require_once "../../components/header.php";
require_once "../../components/select-categoria-produto.php";

if (isset($_POST["nome"], $_POST["preco"], $_POST["categoria"])) {
    include("../../db/database.php");
    include("../../db/crud.php");

    $nome = $_POST["nome"];
    $preco = $_POST["preco"];
    $categoria = $_POST["categoria"];

    $db = new PadariaDB();
    $conn = $db->return_connection();

    createEntity($conn, "produto", ["nome" => $nome, "preco" => $preco, "categoria_id" => $categoria]);

    // $conn->close();
}
?>

Adicionar produto

<form id="produto" name="cadastro" method="post" action="#">
    <label for="nome">Nome do Produto</label>
    <span class="">*</span>
    <input name="nome" type="text" id="nome" size="70" maxlength="255" placeholder="Digite o nome do produto..." required />
    
    <label for="preco">Preço do Produto</label>
    <span class="">*</span>
    <br/>
    <input name="preco" type="text" id="preco" size="70" maxlength="255" placeholder="Digite o preço do produto..." required />

    <?php selectCategoriaProduto() ?>

    <input name="Cadastrar" type="submit" id="cadastrar" value="Concluir cadastro" />
</form>
<button onclick="location.href = './'">Voltar</button>

<?php require_once "../../components/footer.php" ?>