<?php
$title = "Padaria - Adicionar Cargo";
require_once "../../components/header.php";

if (isset($_POST["nome"])) {
    include("../../db/database.php");
    include("../../db/crud.php");

    $nome = $_POST["nome"];

    $db = new PadariaDB();
    $conn = $db->return_connection();

    createEntity($conn, "cargo", ["nome" => $nome]);

    $conn->close();
}
?>

Adicionar cargo

<form id="cargo" name="cadastro" method="post" action="#">
    <label for="nome">Nome do Cargo</label>
    <span class="">*</span>
    <input name="nome" type="text" id="nome" size="70" maxlength="255" placeholder="Digite o nome do cargo..." required />

    <input name="Cadastrar" type="submit" id="cadastrar" value="Concluir cadastro" />
</form>
<button onclick="location.href = './'">Voltar</button>

<?php require_once "../../components/footer.php" ?>