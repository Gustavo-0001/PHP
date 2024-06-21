<!DOCTYPE html>
<html>
<head>
    <title>Buscar Livro</title>
</head>
<body>
    <form>
        <label for="livro">Digite o nome do livro:</label>
        <input type="text" id="livro" name="livro" onkeyup="buscarLivro(this.value)">
    </form>

    <div id="resultado"></div>

    <script>
        function buscarLivro(nome) {
            if (nome.length == 0) {
                document.getElementById("resultado").innerHTML = "";
                return;
            } else {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("resultado").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET", "buscar_livro.php?livro=" + nome, true);
                xmlhttp.send();
            }
        }
    </script>
</body>
</html>
