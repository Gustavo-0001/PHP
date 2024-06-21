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

$nomeAutor = $_GET['autor'];

$sql = "SELECT * FROM tbautor WHERE nomeAutor LIKE '%$nomeAutor%'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr><th>Código do Autor</th><th>Nome do Autor</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["codAutor"]."</td><td>".$row["nomeAutor"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "Nenhum autor encontrado com esse nome.";
}

$conn->close();
?>
