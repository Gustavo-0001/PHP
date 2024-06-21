<?php
    include_once("conn.php");
    $selAut = $_POST['selectAutor'];
    $selGen = $_POST['selectGeneros'];
    $selStatus = $_POST['selectStatus'];
    $txtLivro = $_POST['txtNomeLivro'];
    $txtLancamento = $_POST['txtAnoLivro'];
    $txtEdicao = $_POST['txtEdicaoLivro'];
    $txtDescricao = $_POST['txtDescricaoLivro'];

    if ($selStatus == "Disponível") {
        $selStatus = 1;
    }
    else {
        $selStatus = 0;
    }

    $result_usuario = "INSERT INTO tblivro(nomeLivro, codAutor, codGenero, anoLancamento, edicaoLivro, statusLivro, descricaoLivro) 
    VALUES ('$txtLivro', '$selAut', '$selGen', '$txtLancamento', '$txtEdicao', '$selStatus', '$txtDescricao')";

    $resultado_usuario = mysqli_query($conn, $result_usuario);
    
    if (mysqli_affected_rows($conn) != 0) {
        echo "
            <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=cadLivro.php'>
            <script type=\"text/javascript\">
                alert(\"Livro cadastrado com sucesso!\");
            </script>
        ";
    } else {
        echo "
        <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=cadLivro.php'>
        <script type=\"text/javascript\">
            alert(\"Falha no cadastro do Livro.\");
        </script>
        ";
    }
?>