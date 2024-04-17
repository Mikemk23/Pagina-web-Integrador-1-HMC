<?php

session_start();
$admin = $_SESSION['HMC_idAdmin_registro'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "HMC";

error_reporting(0);
ini_set('display_errors', 0);

// Establecer la conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar si hay errores en la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$estilos = 'background-image: linear-gradient(to bottom right, #1e90ff, #87cefa);
color: #ffffff;
padding: 20px;
border: 1px solid #ddd;
border-radius: 10px;
font-size: 18px;
text-align: center;
box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
margin: 0 auto;
max-width: 400px;';

                   if(isset($_POST['HMC_passwordAdmin_secreto']) && isset($_POST['HMC_id_registro']))
                   {
                    $id = $_POST['HMC_id_registro'];
                    $password = $_POST['HMC_passwordAdmin_secreto'];
                    if(!empty($id) && !empty($password))
                    {

                      $sql_verificar = "SELECT HMC_id_registro, HMC_passwordAdmin_secreto FROM HMC_$admin WHERE HMC_idAdmin_registro = '$admin'";
                      $result_verificar = mysqli_query($conn, $sql_verificar);
                      $dato = array();
                      if($row = mysqli_fetch_assoc($result_verificar))
                      {
                        $prueba_id = $row['HMC_id_registro'];
                        $prueba_pass = $row['HMC_passwordAdmin_secreto'];                        
                      }

                      if($id == $prueba_id && $password == $prueba_pass)
                      {
                        $sql = "SELECT HMC_nombre, HMC_apellido_paterno, HMC_apellido_materno, HMC_genero, HMC_fecha_nacimiento,
                    HMC_calle, HMC_numero_interior, HMC_numero_exterior, HMC_municipio, HMC_telefono_personal, HMC_telefono_casa,
                    HMC_estado, HMC_cuatrimestre, HMC_carrera FROM HMC_$id WHERE HMC_id_registro = '$id'";
                    $result = mysqli_query($conn, $sql);                    

                    $data = array();
                    if ($row = mysqli_fetch_assoc($result))
                       {
                         $nombre = $row['HMC_nombre'];
                         $apellido_paterno = $row['HMC_apellido_paterno'];
                         $apellido_materno = $row['HMC_apellido_materno'];                     
                         $genero = $row['HMC_genero'];
                         $fecha_nacimiento = $row['HMC_fecha_nacimiento'];
                         $calle = $row['HMC_calle'];
                         $numero_interior = $row['HMC_numero_interior'];
                         $numero_exterior = $row['HMC_numero_exterior'];
                         $municipio = $row['HMC_municipio'];
                         $telefono_personal = $row['HMC_telefono_personal'];
                         $telefono_casa = $row['HMC_telefono_casa'];
                         $estado = $row['HMC_estado'];
                         $cuatrimestre = $row['HMC_cuatrimestre'];
                         $carrera = $row['HMC_carrera'];
                       }                      

?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bienvenido</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 20px;
      text-align: center;
    }
    h1 {
      text-align: center;
    }
    table {
      border-collapse: collapse;
      width: 100%;
      margin-top: 20px;
    }
    th, td {
      border: 1px solid #dddddd;
      text-align: left;
      padding: 8px;
    }
    th {
      background-color: #f2f2f2;
    }
    tr:nth-child(even) {
      background-color: #f2f2f2;
    }
    .button-container {
      text-align: center;
      margin-top: 20px;
    }
    .button {
      display: inline-block;
      background-color: #4CAF50;
      color: white;
      padding: 10px 20px;
      text-align: center;
      text-decoration: none;
      margin: 10px;
      border-radius: 5px;
    }
    .button:hover {
      background-color: #45a049;
    }

    .button-container-bottom {
      text-align: center;
      margin-top: 20px;
    }
    .button-container-cerrar {
    text-align: center;
    margin-top: 20px;
  }
    .button-bottom {
      display: inline-block;
      background-color: #f44336; /* Rojo */
      color: white;
      padding: 10px 20px;
      text-align: center;
      text-decoration: none;
      margin: 10px;
      border-radius: 5px;
    }
    .button-bottom:hover {
      background-color: #d32f2f; /* Rojo oscuro al pasar el cursor */
    }
  </style>
</head>
<body>
  <h1>Consultando a <?php echo $id; ?></h1>

  <table>
    <tr>
      <th>ID</th>
      <th>Nombre</th>
      <th>Apellido paterno</th>
      <th>Apellido materno</th>
      <th>Genero</th>
      <th>Fecha de nacimiento</th>
      <th>Calle</th>
      <th>Numero int</th>
      <th>Numero ext</th>
      <th>Municipio</th>
      <th>Telefono personal</th>
      <th>Telefono de casa</th>
      <th>Estado</th>
      <th>Cuatrimestre</th>      
      <th>Carrera</th>
    </tr>

    <tr>
      <td><?php echo $id; ?></td>
      <td><?php echo $nombre; ?></td>
      <td><?php echo $apellido_paterno; ?></td>
      <td><?php echo $apellido_materno; ?></td>
      <td><?php echo $genero; ?></td>
      <td><?php echo $fecha_nacimiento; ?></td>
      <td><?php echo $calle; ?></td>
      <td><?php echo $numero_interior; ?></td>
      <td><?php echo $numero_exterior; ?></td>
      <td><?php echo $municipio; ?></td>
      <td><?php echo $telefono_personal; ?></td>
      <td><?php echo $telefono_casa; ?></td>
      <td><?php echo $estado; ?></td>
      <td><?php echo $cuatrimestre; ?></td>
      <td><?php echo $carrera; ?></td>
    </tr>
  </table>


<?php



$sql_sesiones_inicio_fecha = "SELECT HMC_fecha_inicio FROM HMC_sesion_iniciada WHERE HMC_id_sesion = '$id'";
$result_inicio_fecha = mysqli_query($conn, $sql_sesiones_inicio_fecha); 
$sesiones_inicio_fecha = array();
while ($row = mysqli_fetch_assoc($result_inicio_fecha)) 
{
    $sesiones_inicio_fecha[] = $row['HMC_fecha_inicio'];
}
//--------------------------------------------------------------------------------------------------------
$sql_sesiones_inicio_hora = "SELECT HMC_hora_inicio FROM HMC_sesion_iniciada WHERE HMC_id_sesion = '$id'";
$result_inicio_hora = mysqli_query($conn, $sql_sesiones_inicio_hora); 
$sesiones_inicio_hora = array();
while ($row = mysqli_fetch_assoc($result_inicio_hora)) 
{
    $sesiones_inicio_hora[] = $row['HMC_hora_inicio'];
}
//---------------------------------------------------------------------------------------------------------
$sql_sesiones_finales_fecha = "SELECT HMC_fecha_final FROM HMC_sesion_finalizada WHERE HMC_id_sesion = '$id'";
$result_final_fecha = mysqli_query($conn, $sql_sesiones_finales_fecha); 
$sesiones_final_fecha = array();
while ($row = mysqli_fetch_assoc($result_final_fecha)) 
{
    $sesiones_final_fecha[] = $row['HMC_fecha_final'];
}
//----------------------------------------------------------------------------------------------------------
$sql_sesiones_finales_hora = "SELECT HMC_hora_final FROM HMC_sesion_finalizada WHERE HMC_id_sesion = '$id'";
$result_final_hora = mysqli_query($conn, $sql_sesiones_finales_hora); 
$sesiones_final_hora = array();
while ($row = mysqli_fetch_assoc($result_final_hora)) 
{
    $sesiones_final_hora[] = $row['HMC_hora_final'];
}


echo "<h1>Inicios de sesión de $id</h1>";
echo "<table>";
echo "<tr>
<th>FECHA INICIO</th>
<th>HORA INICIO</th>
<th>FECHA FINAL</th>
<th>HORA FINAL</th>
</tr>";

$count = min(count($sesiones_inicio_fecha), count($sesiones_inicio_hora), count($sesiones_final_fecha), count($sesiones_final_hora));
for ($i = 0; $i < $count; $i++) {
    $fecha_inicio = $sesiones_inicio_fecha[$i];
    $hora_inicio = $sesiones_inicio_hora[$i];
    $fecha_final = $sesiones_final_fecha[$i];
    $hora_final = $sesiones_final_hora[$i];

    echo "<tr>
    <td>$fecha_inicio</td>
    <td>$hora_inicio</td>
    <td>$fecha_final</td>
    <td>$hora_final</td>
    </tr>";
}
echo "</table>";
?>
<br>
<a href="administrador.php" class="button-bottom">Regresar</a>

</body>
</html>


<?php 
}
else
{
  echo '<div style = "' .$estilos. '"> <p> Tu ID o contraseña son incorrecta(s), cambialo </p> </div><br>';                     
}                                                                                            
                    }
                    else
                    {
                        echo "un(os) campo(s) vacio(s)";
                    }
                   }
                                       

?>