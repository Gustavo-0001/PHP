<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de Generos Dinamica</title>
</head>
<body>
    <form method="post" action="">

        <h1>Consultar Generos Cadastrados</h1>
    
        <input type="text" id="genero" name="genero">
        <br><br>

            <?php
            include_once("conn.php");

            // Construa sua consulta dinâmica aqui
            // Suponhamos que você receba um parâmetro chamado "nome" via GET ou POST
            $nome = $_POST['genero']; // ou $_GET['nome'] se for enviado via GET

            // Consulta dinâmica
            $sql = "SELECT * FROM tbgenero WHERE genero = '$nome'";

            // Executa a consulta
            $result = $conn->query($sql);

            // Verifica se a consulta retornou algum resultado
            if ($result->num_rows > 0) {
                // Exibe os resultados
                while($row = $result->fetch_assoc()) {
                    echo "<br><table border=1>
                    <tr>
                        <td>Código do Diretor</td>
                        <td>Nome do Diretor</td>
                    <tr>
                        <td>" . $row["codGenero"]. "<br>
                        <td>" . $row["genero"]. "<br>";
                    // Adicione mais campos conforme necessário
                }
            } else {
                echo "0 resultados encontrados.";
            }

            // Fecha a conexão com o banco de dados
            $conn->close();

            ?>

    </form>
</body>
</html>