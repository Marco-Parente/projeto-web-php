<?php
$title = "Padaria - Produtos";
require_once "../../components/header.php";
require_once "../../db/crud.php";
require_once "../../db/database.php";

$db = new PadariaDB();
$conn = $db->return_connection();

$entidades = customSelectSql($conn, "SELECT p.id, p.nome, p.preco, c.nome as categoria FROM produto AS p JOIN categoriaproduto AS c ON p.categoria_id=c.id");

$conn->close();
?>

<session class="titulo">
    Produtos
</session> </br>
<button class="buttonCadastro" onclick="location.href = 'create.php'">Cadastrar novo produto</button>
<table class="tabela">
    <tr>
        <th>Nome</th>
        <th>Preço</th>
        <th>Categoria</th>
        <th>Editar</th>
        <th>Remover</th>
    </tr>
    
    <?php while ($row =  mysqli_fetch_assoc($entidades)) : ?>
        <tr>
            <td><?=$row['nome']?></td>
            <td><?=$row['preco']?></td>
            <td><?=$row['categoria']?></td>
            <td>
                <a class="buttonEdicao" href="./edit.php?id=<?= $row['id'] ?>">Editar</a>
            </td>
            <td>
                <a class="buttonRemover" href="./delete.php?id=<?= $row['id'] ?>">Remover</a>
            </td>
        </tr>
    <?php endwhile; ?>
</table>

<?php require_once "../../components/footer.php" ?>