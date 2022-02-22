<?php
$title = "Padaria - Adicionar Cliente";
require_once "../../components/header.php";

if (isset($_POST["nome"])) {
    include("../../db/database.php");
    include("../../db/crud.php");

    $nome = $_POST["nome"];
    $cpf = $_POST["cpf"];

    $db = new PadariaDB();
    $conn = $db->return_connection();

    createEntity($conn, "Cliente", ["nome" => $nome, "cpf" => $cpf]);

    $conn->close();
}
?>

Adicionar cliente

<form id="cliente" name="cadastro" method="post" action="#">
    <label for="nome">Nome do Cliente</label>
    <span class="">*</span>
    <input name="nome" type="text" id="nome" size="70" maxlength="255" placeholder="Digite o nome do cliente..." required />

    
    <label for="cpf">CPF</label>
    <input name="cpf" type="text" id="cpf" size="70" maxlength="11" placeholder="Digite o cpf..."/>
    
    <input name="Cadastrar" type="submit" id="cadastrar" value="Concluir cadastro" />
</form>
<button onclick="location.href = './'">Voltar</button>

<?php require_once "../../components/footer.php" ?>