<?php
    include_once("conn.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Livro</title>
</head>
<body>
    <h1>Cadastro de Livro</h1>
    <form method="POST" action="processa_cad_Livros.php">
        Nome do Livro: <input type="text" name="txtNomeLivro"><br/><br/>
        Ano de Lançamento: <input type="date" name="txtAnoLivro"><br/><br/>
        Edição do Livro: <input type="text" name="txtEdicaoLivro"><br/><br/>
        Descrição do Livro: <input type="text" name="txtDescricaoLivro"><br/><br/>
        Status:<select name="selectStatus" id="">
            <option>Disponível</option>
            <option>Indisponível</option>
        </select><br/><br/>
        <select name="selectGeneros" id="">
            <option>Selecione o Gênero</option>
            <?php
                $result_niveis_acessos = "SELECT * FROM tbgenero";
                $resultado_niveis_acesso = mysqli_query($conn, $result_niveis_acessos);
                while ($row_niveis_acessos = mysqli_fetch_assoc($resultado_niveis_acesso)) {    ?>
                    <option value="<?php echo $row_niveis_acessos['codGenero']; ?>">
                        <?php echo $row_niveis_acessos['genero']; ?>
                    </option><?php
                }
            ?>
        </select><br/><br/>
        <select name="selectAutor" id="">
        <option>Selecione o Autor</option>
            <?php
                $result_niveis_acessos = "SELECT * FROM tbautor";
                $resultado_niveis_acesso = mysqli_query($conn, $result_niveis_acessos);
                while ($row_niveis_acessos = mysqli_fetch_assoc($resultado_niveis_acesso)) {    ?>
                    <option value="<?php echo $row_niveis_acessos['codAutor']; ?>">
                        <?php echo $row_niveis_acessos['nomeAutor']; ?>
                    </option><?php
                }
            ?>
        </select><br/><br/>
        <input type="submit" value="Cadastrar">
    </form>
    
</body>
</html>