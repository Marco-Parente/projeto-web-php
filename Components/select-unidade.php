<?php

function selectUnidade($id = null)
{
    require_once "../../db/crud.php";
    require_once "../../db/database.php";

    $db = new PadariaDB();
    $conn = $db->return_connection();

    $unidades = listEntities($conn, "unidade");

    $conn->close();

    echo "<select name=\"unidade\" id=\"unidade\">";
    echo "option<option value=\"\" selected disabled hidden>Selecione a unidade...</option>";
    foreach ($unidades as $unidade) {
        if (isset($id) && $unidade["id"] == $id) {
            echo "<option selected value='{$unidade["id"]}'>{$unidade["nome"]} - {$unidade["sigla"]}</option>";
        } else {
            echo "<option value='{$unidade["id"]}'>{$unidade["nome"]} - {$unidade["sigla"]}</option>";
        }
    }
    echo "</select>";
}

?>
