<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <title>Vista ingresar ciudades</title>
</head>

<body>
  <?php
  require_once("conexion.php");
  $con = new Conexion();
  $link = $con->conectar();
  $sql = "SELECT nombre FROM departamento";
  $result = $link->query($sql);
  $arr = '';
  while ($fil = $result->fetch_assoc()) $arr .= ',' . $fil['nombre'];
  ?>
  <div class="container mt-4">
    <div class="card border-info">
      <div class="card-header bg-info text-white">
        <center><h1>Ingresar ciudad</h1>
        <div class="card-body">
          <form method="post">
            <label>Nombre de la ciudad: </label>
            <input class="form-control" name="nombre" placeholder="Nombre de la ciudad" /><br />
            <label> Nombre departamento: </label>
            <select class="form-control" name="departamento" onchange="ciudades(this.value)">
              <option value="none"></option>
              <?php
              foreach ($result as $value) {
                echo "<option value=$value[nombre]>$value[nombre]</option>";
              }
              ?>
            </select><br>
            <input type="submit" name="enviar" class="btn btn-primary"><br><br>
            <input type="button" onclick="location='index.html'" value="Volver" name="volver" class="btn btn-danger">
          </form></center>
        </div>
      </div>
    </div>
  </div>

</body>

</html>

<?php
if (isset($_POST["enviar"])) {
  $nombre = $_POST["nombre"];
  $departamento = $_POST["departamento"];
  $sql2 = "INSERT INTO ciudad (id, nombre, departamento) VALUES('','$nombre','$departamento')";
  $result = $link->query($sql2);
}
?>