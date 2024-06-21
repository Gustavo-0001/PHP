<?php
// Conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bd0305";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

$nomeLivro = $_GET['livro'];

$sql = "SELECT * FROM tblivro WHERE nomeLivro LIKE '%$nomeLivro%'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr><th>Código do Livro</th><th>Nome do Livro</th><th>Código do Autor</th><th>Código do Gênero</th><th>Ano de Lançamento</th><th>Edição</th><th>Status</th><th>Descrição</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["codLivro"]."</td><td>".$row["nomeLivro"]."</td><td>".$row["codAutor"]."</td><td>".$row["codGenero"]."</td><td>".$row["anoLancamento"]."</td><td>".$row["edicaoLivro"]."</td><td>".$row["statusLivro"]."</td><td>".$row["descricaoLivro"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "Nenhum livro encontrado com esse nome.";
}

$conn->close();
?>
