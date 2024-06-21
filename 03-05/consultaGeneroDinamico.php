<!DOCTYPE html>
<html>
<head>
    <title>Buscar Gênero</title>
</head>
<body>
    <form>
        <label for="genero">Digite o nome do gênero:</label>
        <input type="text" id="genero" name="genero" onkeyup="buscarGenero(this.value)">
    </form>

    <div id="resultado"></div>

    <script>
        function buscarGenero(nome) {
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
                xmlhttp.open("GET", "buscar_genero.php?genero=" + nome, true);
                xmlhttp.send();
            }
        }
    </script>
</body>
</html>
