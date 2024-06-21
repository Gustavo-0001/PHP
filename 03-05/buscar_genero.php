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

$nomeGenero = $_GET['genero'];

$sql = "SELECT * FROM tbgenero WHERE genero LIKE '%$nomeGenero%'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr><th>Código do Gênero</th><th>Gênero</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["codGenero"]."</td><td>".$row["genero"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "Nenhum gênero encontrado com esse nome.";
}

$conn->close();
?>
