<?php
$title = "Padaria - Editar Categoria de Produto";

require_once "../../components/header.php";
require_once "../../db/database.php";
require_once "../../db/crud.php";
$db = new PadariaDB();
$conn = $db->return_connection();

$id = $_GET["id"];

if (isset($_POST["nome"])) {
    $nome = $_POST["nome"];
    $sigla = $_POST["sigla"];

    echo updateEntity($conn, "Unidade",  $id,  ["nome" => $nome, "sigla" => $sigla]);
}

$entity = findEntity($conn, "Unidade", $id);
?>

Editar unidade

<form id="unidade" name="cadastro" method="post" action="#">
    <label for="nome">Nome da Unidade de Medida</label>
    <span class="">*</span>
    <input name="nome" type="text" id="nome" size="70" maxlength="255" placeholder="Digite o nome da unidade de medida..." value="<?= htmlspecialchars($entity['nome']) ?>" required />


    <label for="sigla">Sigla</label>
    <input name="sigla" type="text" id="sigla" size="70" maxlength="255" placeholder="Digite a sigla..." value="<?= htmlspecialchars($entity['sigla']) ?>" />

    <input name="Cadastrar" type="submit" id="cadastrar" value="Editar" />
</form>
<button onclick="location.href = './'">Voltar</button>

<?php require_once "../../components/footer.php" ?>