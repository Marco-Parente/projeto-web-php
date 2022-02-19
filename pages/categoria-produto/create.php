<?php
$title = "Padaria - Criar Categorias de produto";
require_once "../../components/header.php";

if (isset($_POST["nome"])) {
    include("../../db/database.php");
    include("../../db/crud.php");

    $nome = $_POST["nome"];

    $db = new PadariaDB();
    $conn = $db->return_connection();

    createEntity($conn, "CategoriaProduto", ["nome" => $nome]);

    $conn->close();
}
?>

Criar categoria

<form id="categoria" name="cadastro" method="post" action="#">
    <label for="nome">Nome da Categoria</label>
    <span class="">*</span>
    <input name="nome" type="text" id="nome" size="70" maxlength="255" placeholder="Digite o nome da categoria..." required />

    <input name="Cadastrar" type="submit" id="cadastrar" value="Concluir cadastro" />
</form>
<button onclick="location.href = '../categoria-produto'">Voltar</button>

<?php require_once "../../components/footer.php" ?>