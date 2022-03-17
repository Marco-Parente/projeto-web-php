<?php
$title = "Padaria - Editar cliente";

require_once "../../components/header.php";
require_once "../../db/database.php";
require_once "../../db/crud.php";
$db = new PadariaDB();
$conn = $db->return_connection();

$id = $_GET["id"];

if (isset($_POST["nome"])) {
    $nome = $_POST["nome"];
    $cpf = $_POST["cpf"];

    echo updateEntity($conn, "cliente",  $id,  ["nome" => $nome, "cpf" => $cpf]);
}

$entity = findEntity($conn, "cliente", $id);
?>
<span class="tituloSubPagina">
    Editar cliente
</span>
<br/>
<form id="cliente" class="boxInput" name="cadastro" method="post" action="#">
    <label for="nome">Nome do cliente</label>
    <span class="labelInputRequired">*</span>
    <input name="nome" type="text" id="nome" size="70" maxlength="255" placeholder="Digite o nome do cliente..." value="<?= htmlspecialchars($entity['nome']) ?>" required />

    <br/>
    <label for="cpf">CPF</label>
    <input name="cpf" type="text" id="cpf" size="70" maxlength="11" placeholder="Digite o CPF..." value="<?= htmlspecialchars($entity['cpf']) ?>" />
    <br/>
    <input name="Cadastrar" type="submit" id="cadastrar" value="Editar" />
    <button  class="voltar" onclick="location.href = './'">Voltar</button>
</form>

<?php require_once "../../components/footer.php" ?>