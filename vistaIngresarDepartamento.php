<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Vista ingresar departamento</title>
</head>

<body>
    <div class="container mt-4">
        <div class="card border-info">
            <div class="card-header bg-info text-white">
                <center>
                    <h1>Ingresar departamento</h1>
                    <div class="card-body">
                        <form method="post">
                            <label>Nombre de la departamento: </label>
                            <input class="form-control" name="nombreDep" placeholder="Nombre del departamento" /><br>
                            <input type="submit" name="enviar" class="btn btn-primary"><br><br>
                            <input type="button" onclick="location='index.html'" value="Volver" name="volver" class="btn btn-danger">
                        </form>
                    </div>
                </center>
            </div>
        </div>
    </div>
</body>

</html>
<?php
require_once("conexion.php");
$con = new Conexion();
$link = $con->conectar();
if (isset($_POST["enviar"])) {
    $nombreDep = $_POST["nombreDep"];
    $sql = "INSERT INTO departamento (id, nombre) VALUES('','$nombreDep')";
    $result = $link->query($sql);
}
?>