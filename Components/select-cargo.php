<?php

function selectCargo($id = null)
{
    require_once "../../db/crud.php";
    require_once "../../db/database.php";

    $db = new PadariaDB();
    $conn = $db->return_connection();

    $cargos = listEntities($conn, "cargo");

    $conn->close();

    echo "<select name=\"cargo\" id=\"cargo\">";
    echo "option<option value=\"\" selected disabled hidden>Selecione o cargo...</option>";
    foreach ($cargos as $cargo) {
        if (isset($id) && $cargo["id"] == $id) {
            echo "<option selected value='{$cargo["id"]}'>{$cargo["nome"]}</option>";
        } else {
            echo "<option value='{$cargo["id"]}'>{$cargo["nome"]}</option>";
        }
    }
    echo "</select>";
}

?>