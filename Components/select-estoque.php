<?php

function selectEstoque($id = null)
{
    require_once "../../db/crud.php";
    require_once "../../db/database.php";

    $db = new PadariaDB();
    $conn = $db->return_connection();

    $estoques = listEntities($conn, "estoque");

    $conn->close();

    echo "<select name=\"estoque\" id=\"Selectmedio\">";
    echo "option<option value=\"\" selected disabled hidden>Selecione o estoque...</option>";
    foreach ($estoques as $estoque) {
        if (isset($id) && $estoque["id"] == $id) {
            echo "<option selected value='{$estoque["id"]}'>{$estoque["localizacao"]}</option>";
        } else {
            echo "<option value='{$estoque["id"]}'>{$estoque["localizacao"]}</option>";
        }
    }
    echo "</select>";
}

?>