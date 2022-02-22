<?php
$title = "Padaria - Editar cargo";

require_once "../../components/header.php";
require_once "../../db/database.php";
require_once "../../db/crud.php";
$db = new PadariaDB();
$conn = $db->return_connection();

$id = $_GET["id"];

if (isset($_POST["nome"])) {
    $nome = $_POST["nome"];

    echo updateEntity($conn, "cargo",  $id,  ["nome" => $nome]);
}

$entity = findEntity($conn, "cargo", $id);
?>

Editar cargo

<form id="cargo" name="cadastro" method="post" action="#">
    <label for="nome">Nome do cargo</label>
    <span class="">*</span>
    <input name="nome" type="text" id="nome" size="70" maxlength="255" placeholder="Digite o nome do cargo..." value="<?= htmlspecialchars($entity['nome']) ?>" required />

    <input name="Cadastrar" type="submit" id="cadastrar" value="Editar" />
</form>
<button onclick="location.href = './'">Voltar</button>

<?php require_once "../../components/footer.php" ?>