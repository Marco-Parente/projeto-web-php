<?php
$title = "Padaria - Editar funcionário";

require_once "../../components/header.php";
require_once "../../db/database.php";
require_once "../../components/select-cargo.php";
require_once "../../db/crud.php";
$db = new PadariaDB();
$conn = $db->return_connection();

$id = $_GET["id"];

if (isset($_POST["nome"], $_POST["cargo"])) {
    $nome = $_POST["nome"];
    $cargo = $_POST["cargo"];

    echo updateEntity($conn, "funcionarios",  $id,  ["nome" => $nome, "cargo_id" => $cargo]);
}

$entity = findEntity($conn, "funcionarios", $id);
?>
<span class="tituloSubPagina">
    Editar funcionario
</span>

<form id="funcionario" class="boxInput" name="cadastro" method="post" action="#">
    <label for="nome">Nome do funcionário</label>
    <span class="labelInputRequired">*</span>
    <input name="nome" type="text" id="nome" size="70" maxlength="255" placeholder="Digite o nome do funcionario..." value="<?= htmlspecialchars($entity['nome']) ?>" required />

    <?php selectCargo($entity["cargo_id"]) ?>
    <br/>
    <input name="Cadastrar" type="submit" id="cadastrar" value="Editar" />
</form>
<button class="voltar" onclick="location.href = './'">Voltar</button>

<?php require_once "../../components/footer.php" ?>