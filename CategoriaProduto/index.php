<?php
$title = "Padaria - Categorias de produto";
require_once "../Components/header.php";
require_once "../db/crud.php";
require_once "../db/database.php";

$db = new PadariaDB();
$conn = $db->return_connection();

$categorias = listEntities($conn, "CategoriaProduto");

$conn->close();
?>

Categoria index
<button onclick="location.href = 'create.php'">Cadastrar nova categoria</button>
<table>
    <tr>
        <th>Nome</th>
    </tr>
    <?php foreach ($categorias as $row) : ?>
        <tr>
            <td><?=$row['nome']?></td>
            <td>
                <a class="btn btn-primary text-white" href="./edit.php?id=<?= $row['id'] ?>">Editar</a>
            </td>
            <td>
                <a class="btn btn-danger text-white" href="./delete.php?id=<?= $row['id'] ?>">Remover</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<?php require_once "../Components/footer.php" ?>