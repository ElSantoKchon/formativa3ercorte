<?PHP
require_once("conexion.php");
$con = new Conexion();
$buscarCiudades = $_POST['buscarCiudades'];

if ($_POST['buscarCiudades']) {
    $con->conectar();
    $sql = "SELECT * FROM ciudad WHERE id = '$buscarCiudades'";
    $result = $link->query($sql);
    $arr = '';
    while ($fil = $result->fetch_assoc()) $arr .= ',' . $fil['nombre'] .= ',' .  $fil['quejas'];
}


echo $arr; //Retorno la Info Solicitada
$con->desconectar();
