<?php
session_start();
$ID = $_SESSION['HMC_id_registro'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "HMC";


error_reporting(0);
ini_set('display_errors', 0);


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) 
{
    die("Conexión fallida: " . $conn->connect_error);
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

            if(isset($_POST['HMC_password_secreto']))
            {
                $password_secreto = $_POST['HMC_password_secreto'];
                if(!empty($password_secreto))
                {
                  $sql_verificar = "SELECT HMC_password_secreto FROM HMC_$ID WHERE HMC_id_registro = '$ID'";
                  $result_verificar = mysqli_query($conn, $sql_verificar);

                  $dato = array();
                  if($row = mysqli_fetch_assoc($result_verificar))
                  {
                    $pass = $row['HMC_password_secreto'];
                  }
                  
                  if($password_secreto == $pass)
                  {                                                
                    $sql_consulta = "SELECT HMC_nombre, HMC_apellido_paterno, HMC_apellido_materno, HMC_genero, HMC_fecha_nacimiento,
                    HMC_calle, HMC_numero_interior, HMC_numero_exterior, HMC_municipio, HMC_telefono_personal, HMC_telefono_casa,
                    HMC_estado, HMC_cuatrimestre, HMC_carrera FROM HMC_$ID WHERE HMC_password_secreto = '$password_secreto'";
                    $result_consulta = mysqli_query($conn, $sql_consulta);

                    $data = array();
                    if ($row = mysqli_fetch_assoc($result_consulta))
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
  <title>Formulario de Registro</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 20px;
    }
    h1 {
      text-align: center;
    }
    form {
      max-width: 500px;
      margin: 0 auto;
      padding: 20px;
      border: 1px solid black;
      border-radius: 5px;
    }
    input, select {
      display: block;
      margin-bottom: 10px;
      width: 95%;
      padding: 8px;
      font-size: 16px;
      border: 1px solid black;
      border-radius: 5px;
      background-color: black;
      color: white;
    }
    label
    {
        color: yellow;
    }
    input[type="submit"], input[type="reset"] {
      background-color: #4CAF50;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      width: auto;
      display: inline-block; 
      margin-right: 10px; 
    }
    input[type="submit"]:hover, input[type="reset"]:hover {
      background-color: #45a049;
    }
    .back-link {
      text-align: center;
      margin-top: 20px;
    }
    .back-link a {
      color: #007BFF;
      text-decoration: none;
      font-size: 14px;
    }
    .back-link a:hover {
      text-decoration: underline;
      color: purple;
    }

  </style>
</head>
<body background="fondo de sesion.jpg">


  <h1>Formulario de Registro</h1>
  <form action="modificar1.php" method="POST">
    <label for="HMC_id_registro">ID:</label>
    <input type="text" id="HMC_id_registro" name="HMC_id_registro" maxlength="20" value="<?php echo $ID; ?>" readonly>

    <label for="HMC_nombre">Nombre:</label>
    <input type="text" id="HMC_nombre" name="HMC_nombre" maxlength="50" value="<?php echo $nombre; ?>">

    <label for="HMC_apellido_paterno">Apellido Paterno:</label>
    <input type="text" id="HMC_apellido_paterno" name="HMC_apellido_paterno" maxlength="30" value="<?php echo $apellido_paterno; ?>">

    <label for="HMC_apellido_materno">Apellido Materno:</label>
    <input type="text" id="HMC_apellido_materno" name="HMC_apellido_materno" maxlength="30" value="<?php echo $apellido_materno; ?>">

    <label for="HMC_genero">Género:</label>
    <input type="text" id="HMC_genero" name="HMC_genero" maxlength="20" value="<?php echo $genero; ?>">

    <label for="HMC_fecha_nacimiento">Fecha de Nacimiento:</label>
    <input type="date" id="HMC_fecha_nacimiento" name="HMC_fecha_nacimiento" value="<?php echo $fecha_nacimiento; ?>">

    <label for="HMC_calle">Calle:</label>
    <input type="text" id="HMC_calle" name="HMC_calle" maxlength="60" value="<?php echo $calle; ?>">

    <label for="HMC_numero_interior">Número Interior:</label>
    <input type="number" id="HMC_numero_interior" name="HMC_numero_interior" min="1" max="999" value="<?php echo $numero_interior; ?>">

    <label for="HMC_numero_exterior">Número Exterior:</label>
    <input type="text" id="HMC_numero_exterior" name="HMC_numero_exterior" maxlength="2" value="<?php echo $numero_exterior; ?>">

    <label for="HMC_municipio">Municipio:</label>
    <input type="text" id="HMC_municipio" name="HMC_municipio" maxlength="60" value="<?php echo $municipio; ?>">

    <label for="HMC_telefono_personal">Teléfono Personal:</label>
    <input type="number" id="HMC_telefono_personal" name="HMC_telefono_personal" pattern="[0-9]{10}" value="<?php echo $telefono_personal; ?>">

    <label for="HMC_telefono_casa">Teléfono de Casa:</label>
    <input type="number" id="HMC_telefono_casa" name="HMC_telefono_casa" pattern="[0-9]{10}" value="<?php echo $telefono_casa; ?>">

    <label for="HMC_estado">Estado:</label>
    <input type="text" id="HMC_estado" name="HMC_estado" maxlength="20" value="<?php echo $estado; ?>">

    <label for="HMC_cuatrimestre">Cuatrimestre:</label>
    <input type="number" id="HMC_cuatrimestre" name="HMC_cuatrimestre" min="1" max="99" value="<?php echo $cuatrimestre; ?>">

    <label for="HMC_carrera">Carrera:</label>
    <input type="text" id="HMC_carrera" name="HMC_carrera" maxlength="30" value="<?php echo $carrera; ?>">

    <input type="submit" value="Actualizar" name="actualizar">
    <input type="reset" value="Limpiar">
  </form>
  <div class="back-link">
    <a href="modificar.html">Regresar</a>
  </div>

  <?php

}
else
{
  echo '<div style = "' .$estilos. '"> <p> Tu contraseña es incorrecta, cambiala </p> </div><br>';
}
  
                }
                else
                {
                    echo '<div style = "' .$estilos. '" <p> Tu campo esta vacio, por favor llenalo </p> </div><br>';                    
                }
            }

            ?>

</body>
</html>

<?php

$conn->close();             

?>

