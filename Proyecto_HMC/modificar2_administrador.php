<?php
session_start();
$admin = $_SESSION['HMC_idAdmin_registro'];

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

            if(isset($_POST['HMC_passwordAdmin_secreto']))
            {
                $password_secreto = $_POST['HMC_passwordAdmin_secreto'];
                if(!empty($password_secreto))
                {
                  $sql_verificar = "SELECT HMC_passwordAdmin_secreto FROM HMC_$admin WHERE HMC_idAdmin_registro = '$admin'";
                  $result_verificar = mysqli_query($conn, $sql_verificar);
                  $dato = array();
                  if($row = mysqli_fetch_assoc($result_verificar))
                  {
                    $pass = $row['HMC_passwordAdmin_secreto'];
                  }                

                  if($password_secreto == $pass)
                  {
                    $sql_consulta = "SELECT HMC_nombre1, HMC_apellido_paterno1, HMC_apellido_materno1, HMC_genero1, HMC_fecha_nacimiento1,
                    HMC_calle1, HMC_numero_interior1, HMC_numero_exterior1, HMC_municipio1, HMC_telefono_personal1, HMC_telefono_casa1,
                    HMC_estado1, HMC_id_registro FROM HMC_$admin WHERE HMC_passwordAdmin_secreto = '$password_secreto'";
                    $result_consulta = mysqli_query($conn, $sql_consulta);

                    $data = array();
                    if ($row = mysqli_fetch_assoc($result_consulta))
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
                         $id = $row['HMC_id_registro'];                        
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
  <form action="modificar1_administrador.php" method="POST">

    <label for="HMC_idAdmin_registro">ID:</label>
    <input type="text" id="HMC_idAdmin_registro" name="HMC_idAdmin_registro" maxlength="20" value="<?php echo $admin; ?>" readonly>

    <label for="HMC_nombre1">Nombre:</label>
    <input type="text" id="HMC_nombre1" name="HMC_nombre1" maxlength="50" value="<?php echo $nombre; ?>">

    <label for="HMC_apellido_paterno1">Apellido Paterno:</label>
    <input type="text" id="HMC_apellido_paterno1" name="HMC_apellido_paterno1" maxlength="30" value="<?php echo $apellido_paterno; ?>">

    <label for="HMC_apellido_materno1">Apellido Materno:</label>
    <input type="text" id="HMC_apellido_materno1" name="HMC_apellido_materno1" maxlength="30" value="<?php echo $apellido_materno; ?>">

    <label for="HMC_genero1">Género:</label>
    <input type="text" id="HMC_genero1" name="HMC_genero1" maxlength="20" value="<?php echo $genero; ?>">

    <label for="HMC_fecha_nacimiento1">Fecha de Nacimiento:</label>
    <input type="date" id="HMC_fecha_nacimiento1" name="HMC_fecha_nacimiento1" value="<?php echo $fecha_nacimiento; ?>">

    <label for="HMC_calle1">Calle:</label>
    <input type="text" id="HMC_calle1" name="HMC_calle1" maxlength="60" value="<?php echo $calle; ?>">

    <label for="HMC_numero_interior1">Número Interior:</label>
    <input type="number" id="HMC_numero_interior1" name="HMC_numero_interior1" min="1" max="999" value="<?php echo $numero_interior; ?>">

    <label for="HMC_numero_exterior1">Número Exterior:</label>
    <input type="text" id="HMC_numero_exterior1" name="HMC_numero_exterior1" maxlength="2" value="<?php echo $numero_exterior; ?>">

    <label for="HMC_municipio1">Municipio:</label>
    <input type="text" id="HMC_municipio1" name="HMC_municipio1" maxlength="60" value="<?php echo $municipio; ?>">

    <label for="HMC_telefono_personal1">Teléfono Personal:</label>
    <input type="number" id="HMC_telefono_personal1" name="HMC_telefono_personal1" pattern="[0-9]{10}" value="<?php echo $telefono_personal; ?>">

    <label for="HMC_telefono_casa1">Teléfono de Casa:</label>
    <input type="number" id="HMC_telefono_casa1" name="HMC_telefono_casa1" pattern="[0-9]{10}" value="<?php echo $telefono_casa; ?>">

    <label for="HMC_estado1">Estado:</label>
    <input type="text" id="HMC_estado1" name="HMC_estado1" maxlength="20" value="<?php echo $estado; ?>">

    <label for="HMC_id_registro">ID:</label>
    <input type="text" id="HMC_id_registro" name="HMC_id_registro" maxlength="20" value="<?php echo $id; ?>" readonly>

    <input type="submit" value="Actualizar" name="actualizar">
    <input type="reset" value="Limpiar">
  </form>
  <div class="back-link">
    <a href="modificar_administrador.html">Regresar</a>
  </div>

  <?php

}
else
{
  echo '<div style = "' .$estilos. '"> <p> Tu contraseña es incorrecta, revisala </p> </div><br>';                     
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

