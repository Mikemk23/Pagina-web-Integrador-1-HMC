<?php
session_start();
$ID_administrador = $_SESSION['HMC_idAdmin_registro'];

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


                    $sql = "SELECT HMC_idAdmin_registro, HMC_nombre1, HMC_apellido_paterno1, HMC_apellido_materno1, HMC_genero1, HMC_fecha_nacimiento1,
                    HMC_calle1, HMC_numero_interior1, HMC_numero_exterior1, HMC_municipio1, HMC_telefono_personal1, HMC_telefono_casa1,
                    HMC_estado1, HMC_id_registro FROM HMC_$ID_administrador WHERE HMC_idAdmin_registro = '$ID_administrador'";
                    $result = mysqli_query($conn, $sql);                    

                    $data = array();
                    if ($row = mysqli_fetch_assoc($result))
                       {
                         $nombre = $row['HMC_nombre1'];
                         $apellido_paterno = $row['HMC_apellido_paterno1'];
                         $apellido_materno = $row['HMC_apellido_materno1'];                     
                         $genero = $row['HMC_genero1'];
                         $fecha_nacimiento = $row['HMC_fecha_nacimiento1'];
                         $calle = $row['HMC_calle1'];
                         $numero_interior = $row['HMC_numero_interior1'];
                         $numero_exterior = $row['HMC_numero_exterior1'];
                         $municipio = $row['HMC_municipio1'];
                         $telefono_personal = $row['HMC_telefono_personal1'];
                         $telefono_casa = $row['HMC_telefono_casa1'];
                         $estado = $row['HMC_estado1'];
                         $id_usuario = $row['HMC_id_registro'];
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
  <h1>Bienvenido</h1>
  <div class="button-container">
    <a class="button" href="registrar_administrador.html">Registrar Datos</a>
    <a class="button" href="modificar_administrador.html">Modificar Datos</a>
    <a class="button" href="eliminar_administrador.html">Eliminar Datos</a>
    <a class="button" href="consultar.html">Consultar USUARIO</a>
  </div>

  <table>
    <tr>
      <th>Usuario</th>
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
      <th>ID</th>
    </tr>

    <tr>
      <td><?php echo $ID_administrador; ?></td>
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
      <td><?php echo $id_usuario; ?></td>
    </tr>
  </table>

  <?php
$sql_sesiones_inicio_fecha = "SELECT HMC_fecha_inicioAdmin FROM HMC_sesionAdmin_iniciada WHERE HMC_idAdmin_sesion = '$ID_administrador'";
$result_inicio_fecha = mysqli_query($conn, $sql_sesiones_inicio_fecha); 
$sesiones_inicio_fecha = array();
while ($row = mysqli_fetch_assoc($result_inicio_fecha)) 
{
    $sesiones_inicio_fecha[] = $row['HMC_fecha_inicioAdmin'];
}
//--------------------------------------------------------------------------------------------------------
$sql_sesiones_inicio_hora = "SELECT HMC_hora_inicioAdmin FROM HMC_sesionAdmin_iniciada WHERE HMC_idAdmin_sesion = '$ID_administrador'";
$result_inicio_hora = mysqli_query($conn, $sql_sesiones_inicio_hora); 
$sesiones_inicio_hora = array();
while ($row = mysqli_fetch_assoc($result_inicio_hora)) 
{
    $sesiones_inicio_hora[] = $row['HMC_hora_inicioAdmin'];
}
//---------------------------------------------------------------------------------------------------------
$sql_sesiones_finales_fecha = "SELECT HMC_fecha_finalAdmin FROM HMC_sesionAdmin_finalizada WHERE HMC_idAdmin_sesion = '$ID_administrador'";
$result_final_fecha = mysqli_query($conn, $sql_sesiones_finales_fecha); 
$sesiones_final_fecha = array();
while ($row = mysqli_fetch_assoc($result_final_fecha)) 
{
    $sesiones_final_fecha[] = $row['HMC_fecha_finalAdmin'];
}
//----------------------------------------------------------------------------------------------------------
$sql_sesiones_finales_hora = "SELECT HMC_hora_finalAdmin FROM HMC_sesionAdmin_finalizada WHERE HMC_idAdmin_sesion = '$ID_administrador'";
$result_final_hora = mysqli_query($conn, $sql_sesiones_finales_hora); 
$sesiones_final_hora = array();
while ($row = mysqli_fetch_assoc($result_final_hora)) 
{
    $sesiones_final_hora[] = $row['HMC_hora_finalAdmin'];
}


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

  <form action="cerrar_sesion_administrador.php" method="post">  
  <div class="button-container-cerrar"> 
    <input class="button-bottom" type="submit" id="cerrar" name="cerrar" value="Cerrar Sesión">   
  </div>
  
  </form>  

  <div class="button-container-bottom">  
  <a class="button-bottom" href="borrar_administrador.html">Borrar Cuenta</a> 
  </div>
  


</body>
</html>
