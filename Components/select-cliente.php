<?php

function selectCliente($id = null)
{
    require_once "../../db/crud.php";
    require_once "../../db/database.php";

    $db = new PadariaDB();
    $conn = $db->return_connection();

    $clientes = listEntities($conn, "cliente");

    $conn->close();

    echo "<select name=\"cliente\" id=\"cliente\">";
    echo "option<option value=\"\" selected disabled hidden>Selecione o cliente...</option>";
    foreach ($clientes as $cliente) {
        if (isset($id) && $cliente["id"] == $id) {
            echo "<option selected value='{$cliente["id"]}'>{$cliente["nome"]}</option>";
        } else {
            echo "<option value='{$cliente["id"]}'>{$cliente["nome"]}</option>";
        }
    }
    echo "</select>";
}

?>