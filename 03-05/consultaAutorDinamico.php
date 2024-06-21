<!DOCTYPE html>
<html>
<head>
    <title>Buscar Autor</title>
</head>
<body>
    <form>
        <label for="autor">Digite o nome do autor:</label>
        <input type="text" id="autor" name="autor" onkeyup="buscarAutor(this.value)">
    </form>

    <div id="resultado"></div>

    <script>
        function buscarAutor(nome) {
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
                xmlhttp.open("GET", "buscar_autor.php?autor=" + nome, true);
                xmlhttp.send();
            }
        }
    </script>
</body>
</html>
