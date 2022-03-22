<?php

function selectFuncionario($id = null)
{
    require_once "../../db/crud.php";
    require_once "../../db/database.php";

    $db = new PadariaDB();
    $conn = $db->return_connection();

    $funcionarios = listEntities($conn, "funcionarios");

    $conn->close();

    echo "<select name=\"funcionario\" id=\"funcionario\">";
    echo "option<option value=\"\" selected disabled hidden>Selecione o funcionario...</option>";
    foreach ($funcionarios as $funcionario) {
        if (isset($id) && $funcionario["id"] == $id) {
            echo "<option selected value='{$funcionario["id"]}'>{$funcionario["nome"]}</option>";
        } else {
            echo "<option value='{$funcionario["id"]}'>{$funcionario["nome"]}</option>";
        }
    }
    echo "</select>";
}

?>