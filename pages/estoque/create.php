<?php
$title = "Padaria - Adicionar Estoque";
require_once "../../components/header.php";

if (isset($_POST["localizacao"])) {
    include("../../db/database.php");
    include("../../db/crud.php");

    $localizacao = $_POST["localizacao"];

    $db = new PadariaDB();
    $conn = $db->return_connection();

    createEntity($conn, "estoque", ["localizacao" => $localizacao]);

    $conn->close();
}
?>

<span class="tituloSubPagina">
        Adicionar estoque
</span>

    <br/>
    <form id="estoque" class="boxInput"  name="cadastro" method="post" action="#">
        <label for="localizacao">Localização do Estoque</label>
        <span class="labelInputRequired">*</span>
        <input name="localizacao" type="text" id="localizacao" size="70" maxlength="255" placeholder="Digite o nome da localização do estoque..." required />
        <br/>
        <input name="Cadastrar" type="submit" id="cadastrar" value="Concluir cadastro" />
        <button class="voltar" onclick="location.href = './'">Voltar</button>
    </form>
    
<?php require_once "../../components/footer.php" ?>