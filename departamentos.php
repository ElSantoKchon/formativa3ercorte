<?PHP
require_once("conexion.php");
$con = new Conexion();
$buscarDepartamentos = $_POST['buscarDepartamentos'];

if ($_POST['buscarDepartamentos']) {
    $con->conectar();
    $sql = "SELECT * FROM departamento WHERE id = '$buscarDepartamentos'";
    $result = $link->query($sql);
    $arr = '';
    while ($fil = $result->fetch_assoc()) $arr .= ',' . $fil['nombre'] .= ',' .  $fil['quejas'];
}

echo $arr; //Retorno la Info Solicitada
$con->desconectar();