<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Vista ingresar quejas</title>
</head>

</html>
<?php
require_once("conexion.php");
$con = new Conexion();
$link = $con->conectar();
$sql = "SELECT * FROM departamento";
$result = $link->query($sql);
$arr = '';
while ($fil = $result->fetch_assoc()) $arr .= ',' . $fil['nombre'];
?>

<body>
    <div class="container mt-4">
        <div class="card border-info">
            <div class="card-header bg-info text-white">
                <center>
                    <form method="POST">
                        <h1>Quejas: </h1>
                        <label>Departamentos: </label>
                        <select class="form-control" name="departamento" onchange="ciudades(this.value)">
                            <option value="none"></option>
                            <?php
                            foreach ($result as $value) {
                                echo "<option value=$value[nombre]>$value[nombre]</option>";
                            }
                            ?>
                        </select><br>
                        <div id="listaCiudades" name="ciudad"></div><br>
                        <label>Escriba su queja: </label>
                        <input class="form-control" type="text" name="queja"><br>
                        <input type="submit" name="enviar" class="btn btn-primary"><br><br>
                        <input type="button" onclick="location='index.html'" value="Volver" name="volver" class="btn btn-danger">
                    </form>
                </center>
            </div>
        </div>
    </div>
</body>

<script>
    function ciudades(str) {
        var ciudadElegida = str;
        var xmlhttp;
        var contenidosRecibidos = new Array();
        var nodoMostrarResultados = document.getElementById("listaCiudades");
        var contenidosAMostrar = "";

        xmlhttp = new XMLHttpRequest();

        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                contenidosRecibidos = xmlhttp.responseText.split(",");
                for (var i = 0; i < contenidosRecibidos.length; i++) {
                    contenidosAMostrar = contenidosAMostrar + contenidosRecibidos[i];
                }
                nodoMostrarResultados.innerHTML = contenidosAMostrar;
            }
        };
        var cadenaParametros = "ciudades=" + encodeURIComponent(ciudadElegida);
        xmlhttp.open("POST", "quejas.php");
        xmlhttp.setRequestHeader(
            "Content-type",
            "application/x-www-form-urlencoded"
        );
        xmlhttp.send(cadenaParametros);
    }
</script>

<?php
if (isset($_POST["enviar"])) {
    $ciudad = $_POST['ciudad'];
    $departamento = $_POST["departamento"];
    $queja = $_POST["queja"];
    $sql = "INSERT INTO quejas (id,queja,ciudad,departamentos) VALUES ('','$queja','$ciudad','$departamento')";
    $link->query($sql);
}
?>