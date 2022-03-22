<?php
class PadariaDB
{
    private $servername = "localhost";
    private $username = "projetouser";
    private $password = "Web@2022";
    private $dbname = "PadariaDB";

    private $queries = [
        "CREATE TABLE `Cliente` (
            `id` INT NOT NULL AUTO_INCREMENT,
            `cpf` VARCHAR(255),
            `nome` VARCHAR(255),
            PRIMARY KEY (`id`)
        );",

        "CREATE TABLE `Produto` (
            `id` INT NOT NULL AUTO_INCREMENT,
            `nome` VARCHAR(255) NOT NULL,
            `preco` FLOAT NOT NULL,
            `categoria_id` INT NOT NULL,
            PRIMARY KEY (`id`)
        );",

        "CREATE TABLE `Estoque` (
            `id` INT NOT NULL AUTO_INCREMENT,
            `localizacao` VARCHAR(255) NOT NULL,
            PRIMARY KEY (`id`)
        );",

        "CREATE TABLE `Funcionarios` (
            `id` INT NOT NULL AUTO_INCREMENT,
            `nome` VARCHAR(255) NOT NULL,
            `cargo_id` INT NOT NULL,
            PRIMARY KEY (`id`)
        );",

        "CREATE TABLE `Cargo` (
            `id` INT NOT NULL AUTO_INCREMENT,
            `nome` VARCHAR(255) NOT NULL,
            PRIMARY KEY (`id`)
        );",

        "CREATE TABLE `Pedido` (
            `id` INT NOT NULL AUTO_INCREMENT,
            `cliente_id` INT NOT NULL,
            `funcionario_id` INT NOT NULL,
            PRIMARY KEY (`id`)
        );",

        "CREATE TABLE `CategoriaProduto` (
            `id` INT NOT NULL AUTO_INCREMENT,
            `nome` VARCHAR(255) NOT NULL,
            PRIMARY KEY (`id`)
        );",

        "CREATE TABLE `Unidade` (
            `id` INT NOT NULL AUTO_INCREMENT,
            `nome` VARCHAR(255) NOT NULL,
            `sigla` VARCHAR(255),
            PRIMARY KEY (`id`)
        );",

        "CREATE TABLE `PedidoProduto` (
            `pedido_id` INT NOT NULL,
            `produto_id` INT NOT NULL,
            `quantidade` INT NOT NULL,
            `id` INT NOT NULL AUTO_INCREMENT,
            PRIMARY KEY (`id`)
        );",

        "CREATE TABLE `ProdutoEstoque` (
            `produto_id` INT NOT NULL,
            `estoque_id` INT NOT NULL,
            `unidade_id` INT NOT NULL,
            `quantidade` INT NOT NULL,
            `id` INT NOT NULL AUTO_INCREMENT,
            PRIMARY KEY (`id`)
        );",

        "ALTER TABLE `Produto` ADD CONSTRAINT `Produto_fk0` FOREIGN KEY (`categoria_id`) REFERENCES `CategoriaProduto`(`id`);",

        "ALTER TABLE `Funcionarios` ADD CONSTRAINT `Funcionarios_fk0` FOREIGN KEY (`cargo_id`) REFERENCES `Cargo`(`id`);",

        "ALTER TABLE `Pedido` ADD CONSTRAINT `Pedido_fk0` FOREIGN KEY (`cliente_id`) REFERENCES `Cliente`(`id`);",

        "ALTER TABLE `Pedido` ADD CONSTRAINT `Pedido_fk1` FOREIGN KEY (`funcionario_id`) REFERENCES `Funcionarios`(`id`);",

        "ALTER TABLE `PedidoProduto` ADD CONSTRAINT `PedidoProduto_fk0` FOREIGN KEY (`pedido_id`) REFERENCES `Pedido`(`id`);",

        "ALTER TABLE `PedidoProduto` ADD CONSTRAINT `PedidoProduto_fk1` FOREIGN KEY (`produto_id`) REFERENCES `Produto`(`id`);",

        "ALTER TABLE `ProdutoEstoque` ADD CONSTRAINT `ProdutoEstoque_fk0` FOREIGN KEY (`produto_id`) REFERENCES `Produto`(`id`);",

        "ALTER TABLE `ProdutoEstoque` ADD CONSTRAINT `ProdutoEstoque_fk1` FOREIGN KEY (`estoque_id`) REFERENCES `Estoque`(`id`);",

        "ALTER TABLE `ProdutoEstoque` ADD CONSTRAINT `ProdutoEstoque_fk2` FOREIGN KEY (`unidade_id`) REFERENCES `Unidade`(`id`);",
    ];

    function create_database()
    {
        // Create connection
        $conn = new mysqli($this->servername, $this->username, $this->password);

        // Check connection
        if ($conn->connect_error) {
            die("Erro de conexão: " . $conn->connect_error);
        }

        $sql = "CREATE DATABASE IF NOT EXISTS {$this->dbname}";
        if ($conn->query($sql) !== TRUE) {
            die("Erro ao criar banco: " . $conn->error);
        }
        mysqli_close($conn);
    }

    function delete_database()
    {
        $conn = new mysqli($this->servername, $this->username, $this->password);

        $sql = "DROP DATABASE IF EXISTS {$this->dbname}";
        if ($conn->query($sql) !== TRUE) {
            die("Erro ao deletar banco: " . $conn->error);
        }
    }

    function initialize_database()
    {
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

        foreach ($this->queries as $query) {
            if ($conn->query($query) === TRUE) {
                echo "Querie rodada com sucesso<br>";
            } else {
                echo "Error creating table: {$conn->error} <br>";
            }
        }
        mysqli_close($conn);
    }

    function return_connection()
    {
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Erro de conexão: " . $conn->connect_error);
        } else {
            return $conn;
        }
    }
}
