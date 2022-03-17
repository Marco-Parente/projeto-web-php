<?php
$title = "Padaria - Adicionar Categorias de produto";
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
<span class="tituloSubPagina">
    Adicionar categoria
</span>
<form id="categoria" class="boxInput" name="cadastro" method="post" action="#">
    <label for="nome">Nome da Categoria</label>
    <span class="labelInputRequired">*</span>
    <input name="nome" type="text" id="nome" size="70" maxlength="255" placeholder="Digite o nome da categoria..." required />

    <input  class="buttonConcluirCadastro" name="Cadastrar" type="submit" id="cadastrar" value="Concluir cadastro" />
    <button class="voltar" onclick="location.href = './'">Voltar</button>
</form>


<?php require_once "../../components/footer.php" ?>