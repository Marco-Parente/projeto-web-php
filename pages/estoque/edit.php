<?php
$title = "Padaria - Editar estoque";

require_once "../../components/header.php";
require_once "../../db/database.php";
require_once "../../db/crud.php";
$db = new PadariaDB();
$conn = $db->return_connection();

$id = $_GET["id"];

if (isset($_POST["localizacao"])) {
    $localizacao = $_POST["localizacao"];

    echo updateEntity($conn, "estoque",  $id,  ["localizacao" => $localizacao]);
}

$entity = findEntity($conn, "estoque", $id);
?>
<span class="tituloSubPagina">
    Editar estoque    
</span>

<form id="estoque" class="boxInput" name="cadastro" method="post" action="#">
    <label for="localizacao">Localização do estoque</label>
    <span class="labelInputRequired">*</span>
    <input name="localizacao" type="text" id="localizacao" size="70" maxlength="255" placeholder="Digite o nome da localização do estoque..." value="<?= htmlspecialchars($entity['localizacao']) ?>" required />
    <br/>
    <input name="Cadastrar" type="submit" id="cadastrar" value="Editar" />
    <button class="voltar" onclick="location.href = './'">Voltar</button>
</form>

<?php require_once "../../components/footer.php" ?>