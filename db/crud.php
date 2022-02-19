<?php

function findEntity(mysqli $conn, string $nomeTabela, $id)
{
    $sql = "SELECT * FROM {$nomeTabela}  WHERE id = {$id}";

    $query = mysqli_query($conn, $sql);

    if($query === false)
        return false;

    return mysqli_fetch_assoc($query);
}

function createEntity(mysqli $conn, string $nomeTabela, array $variaveis, string $returnLocation = './index.php')
{
    $sql = mountCreateSql($nomeTabela, $variaveis);

    if (!$sql) {
        return false;
    }

    header("Location: {$returnLocation}");
    return mysqli_query($conn, $sql);
}

function listEntities(mysqli $conn, string $nomeTabela)
{
    $entities = [];

    $sql = "SELECT * FROM {$nomeTabela}";
    $result = mysqli_query($conn, $sql);

    $result_check = mysqli_num_rows($result);

    if ($result_check > 0)
        $entities = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return $entities;
}

function updateEntity(mysqli $conn, string $nomeTabela, $id, array $variaveis, string $returnLocation = './index.php')
{
    $sql = mountUpdateSql($nomeTabela, $id, $variaveis);

    echo "update sql = {$sql} <br/>";

    if (!$sql) {
        return false;
    }

    header("Location: {$returnLocation}");
    return mysqli_query($conn, $sql);
}

function deleteEntity(mysqli $conn, string $nomeTabela, $id, string $returnLocation = './index.php')
{
    $sql = "DELETE FROM {$nomeTabela} WHERE id={$id}";
    
    header("Location: {$returnLocation}");
    return mysqli_query($conn, $sql);
}

function mountCreateSql(string $nomeTabela, array $variaveis)
{
    $sqlInicial = "INSERT INTO {$nomeTabela} (";
    $sqlFinal = "VALUES (";

    foreach ($variaveis as $variavel => $valor) {
        if (!$valor) {
            echo "A variável {$variavel} não foi preenchida";
            return false;
        }
        $sqlInicial .= "{$variavel}, ";

        switch (gettype($valor)) {
            case 'string':
                $sqlFinal .= "'{$valor}', ";
                break;
            default:
                $sqlFinal .= "{$valor}, ";
                break;
        }
    }

    $sqlInicial = substr($sqlInicial, 0, -2);
    $sqlInicial .= ") ";

    $sqlFinal = substr($sqlFinal, 0, -2);
    $sqlFinal .= ")";

    return "{$sqlInicial}{$sqlFinal}";
}

function mountUpdateSql(string $nomeTabela, $id, array $variaveis)
{
    $sql = "UPDATE {$nomeTabela} SET ";

    foreach ($variaveis as $variavel => $valor) {
        if (!$valor) {
            echo "A variável {$variavel} não foi preenchida";
            return false;
        }

        $sql .= "{$variavel} = ";

        switch (gettype($valor)) {
            case 'string':
                $sql .= "'{$valor}', ";
                break;
            default:
                $sql .= "{$valor}, ";
                break;
        }
    }

    $sql = substr($sql, 0, -2);
    $sql .= " WHERE id={$id}";

    return "{$sql}";
}
