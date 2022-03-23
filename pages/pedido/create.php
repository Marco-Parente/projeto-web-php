<?php
$title = "Padaria - Criar pedido";
require_once "../../components/header.php";
require_once "../../components/select-cliente.php";
require_once "../../components/select-funcionario.php";

if (isset($_POST["cliente"], $_POST["funcionario"])) {
    include("../../db/database.php");
    include("../../db/crud.php");

    $cliente = $_POST["cliente"];
    $funcionario = $_POST["funcionario"];

    $db = new PadariaDB();
    $conn = $db->return_connection();

    createEntity($conn, "pedido", ["cliente_id" => $cliente, "funcionario_id" => $funcionario]);

    // $conn->close();
}
?>
<span class="tituloSubPagina">
Criar pedido
</span>
<form id="pedido" name="cadastro"  class="boxInput" method="post" action="#">

    <?php selectCliente() ?>
    <?php selectFuncionario() ?>
    <br/>
    <input name="Cadastrar" type="submit" id="cadastrar" value="Concluir cadastro" />
    <button class="voltar" onclick="location.href = './'">Voltar</button>
</form>

<?php require_once "../../components/footer.php" ?>