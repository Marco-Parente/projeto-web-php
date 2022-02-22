<?php
$title = "Padaria - Adicionar funcionário";
require_once "../../components/header.php";

if (isset($_POST["nome"], $_POST["cargo"])) {
    include("../../db/database.php");
    include("../../db/crud.php");

    $nome = $_POST["nome"];
    $cargo = $_POST["cargo"];

    $db = new PadariaDB();
    $conn = $db->return_connection();

    createEntity($conn, "funcionarios", ["nome" => $nome, "cargo_id" => $cargo]);

    // $conn->close();
}
?>

Adicionar funcionário

<form id="funcionario" name="cadastro" method="post" action="#">
    <label for="nome">Nome do Funcionário</label>
    <span class="">*</span>
    <input name="nome" type="text" id="nome" size="70" maxlength="255" placeholder="Digite o nome do funcionário..." required />

    <?php require_once "../../components/select-cargo.php" ?>

    <input name="Cadastrar" type="submit" id="cadastrar" value="Concluir cadastro" />
</form>
<button onclick="location.href = './'">Voltar</button>

<?php require_once "../../components/footer.php" ?>