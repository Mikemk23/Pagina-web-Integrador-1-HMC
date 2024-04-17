<?php
session_start();
$ID = $_SESSION['HMC_id_registro'];

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


                    $sql = "SELECT HMC_id_registro, HMC_nombre, HMC_apellido_paterno, HMC_apellido_materno, HMC_genero, HMC_fecha_nacimiento,
                    HMC_calle, HMC_numero_interior, HMC_numero_exterior, HMC_municipio, HMC_telefono_personal, HMC_telefono_casa,
                    HMC_estado, HMC_cuatrimestre, HMC_carrera FROM HMC_$ID WHERE HMC_id_registro = '$ID'";
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
    <a class="button" href="registrar.html">Registrar Datos</a>
    <a class="button" href="modificar.html">Modificar Datos</a>
    <a class="button" href="eliminar.html">Eliminar Datos</a>
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
      <th>Cuatrimestre</th>
      <th>Carrera</th>
    </tr>

    <tr>
      <td><?php echo $ID; ?></td>
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

  <form action="cerrar_sesion.php" method="post">  
  <div class="button-container-cerrar"> 
    <input class="button-bottom" type="submit" id="cerrar" name="cerrar" value="Cerrar Sesión">   
  </div>
  
  </form>  

  <div class="button-container-bottom">  
  <a class="button-bottom" href="borrar.html">Borrar Cuenta</a> 
  </div>
  


</body>
</html>
