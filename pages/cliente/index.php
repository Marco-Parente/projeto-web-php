<?php
$title = "Padaria - Clientes";
require_once "../../components/header.php";
require_once "../../db/crud.php";
require_once "../../db/database.php";

$db = new PadariaDB();
$conn = $db->return_connection();

$entidades = listEntities($conn, "cliente");

$conn->close();
?>

<session class="titulo">
    Clientes
</session> </br>
<button class="buttonCadastro" onclick="location.href = 'create.php'">Cadastrar novo cliente</button>
<table class="tabela">
    <tr>
        <th>Nome</th>
        <th>CPF</th>
        <th>Editar</th>
        <th>Remover</th>
    </tr>
    
    <?php foreach ($entidades as $row) : ?>
        <tr>
            <td><?=$row['nome']?></td>
            <td><?=$row['cpf']?></td>
            <td>
                <a class="buttonEdicao" href="./edit.php?id=<?= $row['id'] ?>">Editar</a>
            </td>
            <td>
                <a class="buttonRemover" href="./delete.php?id=<?= $row['id'] ?>">Remover</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<?php require_once "../../components/footer.php" ?>