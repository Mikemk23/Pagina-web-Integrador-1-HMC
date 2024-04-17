<?php

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




    if(isset($_POST['HMC_id_registro']) && isset($_POST['HMC_nombre']) && isset($_POST['HMC_apellido_paterno']) && isset($_POST['HMC_apellido_materno'])
    && isset($_POST['HMC_genero']) && isset($_POST['HMC_fecha_nacimiento']) && isset($_POST['HMC_calle']) && isset($_POST['HMC_numero_interior']) 
    && isset($_POST['HMC_numero_exterior']) && isset($_POST['HMC_municipio']) && isset($_POST['HMC_telefono_personal'])
    && isset($_POST['HMC_telefono_casa']) && isset($_POST['HMC_estado']) && isset($_POST['HMC_cuatrimestre']) && isset($_POST['HMC_carrera']))
    {
        $id = $_POST['HMC_id_registro'];
        $nombre = $_POST['HMC_nombre'];
        $apellido_paterno = $_POST['HMC_apellido_paterno'];
        $apellido_materno = $_POST['HMC_apellido_materno'];
        $genero = $_POST['HMC_genero'];
        $fecha_nacimiento = $_POST['HMC_fecha_nacimiento'];
        $calle = $_POST['HMC_calle'];
        $numero_interior = $_POST['HMC_numero_interior'];
        $numero_exterior = $_POST['HMC_numero_exterior'];
        $municipio = $_POST['HMC_municipio'];
        $telefono_personal = $_POST['HMC_telefono_personal'];
        $telefono_casa = $_POST['HMC_telefono_casa'];
        $estado = $_POST['HMC_estado'];
        $cuatrimestre = $_POST['HMC_cuatrimestre'];
        $carrera = $_POST['HMC_carrera'];

        if(!empty($id) && !empty($nombre) && !empty($apellido_paterno) && !empty($apellido_materno) && !empty($genero) && !empty($fecha_nacimiento)
        && !empty($calle) && !empty($numero_interior) && !empty($numero_exterior) && !empty($municipio) && !empty($telefono_personal) 
        && !empty($telefono_casa) && !empty($estado) && !empty($cuatrimestre) && !empty($carrera))
        {
            ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Información Registrada</title>
  <link rel="stylesheet" href="xd2.css">
</head>
<body>
  <div class="container">
    <?php 
            $sql = "SELECT HMC_password_secreto FROM HMC_registro WHERE HMC_id_registro = '$id' ";
            $result = mysqli_query($conn, $sql);
            $data = array();
               if ($row = mysqli_fetch_assoc($result))
                  {
                    $valor_password_secreto = $row['HMC_password_secreto'];
                  }
    
           $sql_insertar = "INSERT INTO HMC_$id (HMC_id_registro, HMC_nombre, HMC_apellido_paterno, HMC_apellido_materno, HMC_genero,
           HMC_fecha_nacimiento, HMC_calle, HMC_numero_interior, HMC_numero_exterior, HMC_municipio, HMC_telefono_personal, HMC_telefono_casa,
           HMC_estado, HMC_cuatrimestre, HMC_carrera, HMC_password_secreto) VALUES ('$id', '$nombre', '$apellido_paterno', '$apellido_materno', '$genero',
           '$fecha_nacimiento', '$calle', '$numero_interior', '$numero_exterior', '$municipio', '$telefono_personal', '$telefono_casa',
           '$estado', '$cuatrimestre', '$carrera', '$valor_password_secreto')";


           if($conn->query($sql_insertar) === TRUE)
           {
            echo '<h2>Información registrada</h2>';
             echo '<div class="datos">';
             echo '<p><strong>ID:</strong> '.$id.' </p>';
             echo '<p><strong>NOMBRE:</strong> '.$nombre.' </p>';
             echo '<p><strong>APELLIDO PATERNO:</strong> '.$apellido_paterno.' </p>';
             echo '<p><strong>APELLIDO MATERNO:</strong> '.$apellido_materno.' </p>';
             echo '<p><strong>GENERO:</strong> '.$genero.' </p>';
             echo '<p><strong>FECHA DE NACIMIENTO:</strong> '.$fecha_nacimiento.' </p>';
             echo '<p><strong>CALLE:</strong> '.$calle.' </p>';
             echo '<p><strong>NUMERO INT:</strong> '.$numero_interior.' </p>';
             echo '<p><strong>NUMERO EXT:</strong> '.$numero_exterior.' </p>';
             echo '<p><strong>MUNICIPIO:</strong> '.$municipio.' </p>';
             echo '<p><strong>TELEFONO PERSONAL:</strong> '.$telefono_personal.' </p>';
             echo '<p><strong>TELEFONO DE CASA:</strong> '.$telefono_casa.' </p>';
             echo '<p><strong>ESTADO:</strong> '.$estado.' </p>';
             echo '<p><strong>CUATRIMESTRE:</strong> '.$cuatrimestre.' </p>';
             echo '<p><strong>CARRERA:</strong> '.$carrera.' </p>';
             echo '<p><strong>DATOS:</strong> Guardados </p>';
             echo '</div>';
           }
           else
           {
            echo "Error en la inserción: " . mysqli_error($conn);
           }
        }
        else
        {
            echo '<div style = "' .$estilos. '" class="datos"> <p> Un campo u otros campos estan vacios </p> </div><br>';
        }

    }

    ?>
</div>
</body>
</html>


    <?php
    
    $conn->close();


?>