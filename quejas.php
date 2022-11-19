<?php
require_once("conexion.php");
$con = new Conexion();
$departamento = $_POST['ciudades'];
if ($_POST['ciudades']) {
    $link = $con->conectar();
    $sql = "SELECT nombre FROM ciudad WHERE departamento = '$departamento'";
    $result = $link->query($sql);
    $arr = '';
    while ($fil = $result->fetch_assoc()) $arr .= ',' . $fil['nombre'];
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <label>Ciudades: </label>
    <form method="POST">
        <select class="form-control" name="ciudad">
            <?php
            foreach ($result as $value) {
                echo "<option value=$value[nombre]>$value[nombre]</option>";
            }
            ?>
        </select>
    </form>

<?php
}
$con->desconectar();
