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
<span class="tituloSubPagina">
    Editar unidade
</span>

<span class="labelInputRequired">*</span>
<form id="unidade" class="boxInput" name="cadastro" method="post" action="#">
    <label for="nome">Nome</label>
    <input name="nome" type="text" id="nome" size="70" maxlength="255" placeholder="Digite o nome da unidade de medida..." value="<?= htmlspecialchars($entity['nome']) ?>" required />
    <br/>

    <label for="sigla">Sigla</label>
    <input name="sigla" type="text" id="sigla" size="70" maxlength="255" placeholder="Digite a sigla..." value="<?= htmlspecialchars($entity['sigla']) ?>" />
    <br/>
    <input name="Cadastrar" type="submit" id="cadastrar" value="Editar" />
    <button class="voltar" onclick="location.href = './'">Voltar</button>
</form>
<?php require_once "../../components/footer.php" ?>
