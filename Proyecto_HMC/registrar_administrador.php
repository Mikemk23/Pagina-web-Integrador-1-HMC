<?php

$servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "HMC";


    error_reporting(E_ALL);
ini_set('display_errors', 1);
    
    
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




    if(isset($_POST['HMC_idAdmin_registro']) && isset($_POST['HMC_nombre1']) && isset($_POST['HMC_apellido_paterno1']) && isset($_POST['HMC_apellido_materno1'])
    && isset($_POST['HMC_genero1']) && isset($_POST['HMC_fecha_nacimiento1']) && isset($_POST['HMC_calle1']) && isset($_POST['HMC_numero_interior1']) 
    && isset($_POST['HMC_numero_exterior1']) && isset($_POST['HMC_municipio1']) && isset($_POST['HMC_telefono_personal1'])
    && isset($_POST['HMC_telefono_casa1']) && isset($_POST['HMC_estado1']) && isset($_POST['HMC_id_registro']))
    {
        $admin = $_POST['HMC_idAdmin_registro'];
        $nombre = $_POST['HMC_nombre1'];
        $apellido_paterno = $_POST['HMC_apellido_paterno1'];
        $apellido_materno = $_POST['HMC_apellido_materno1'];
        $genero = $_POST['HMC_genero1'];
        $fecha_nacimiento = $_POST['HMC_fecha_nacimiento1'];
        $calle = $_POST['HMC_calle1'];
        $numero_interior = $_POST['HMC_numero_interior1'];
        $numero_exterior = $_POST['HMC_numero_exterior1'];
        $municipio = $_POST['HMC_municipio1'];
        $telefono_personal = $_POST['HMC_telefono_personal1'];
        $telefono_casa = $_POST['HMC_telefono_casa1'];
        $estado = $_POST['HMC_estado1'];
        $id = $_POST['HMC_id_registro'];

        if(!empty($admin) && !empty($nombre) && !empty($apellido_paterno) && !empty($apellido_materno) && !empty($genero) && !empty($fecha_nacimiento)
        && !empty($calle) && !empty($numero_interior) && !empty($numero_exterior) && !empty($municipio) && !empty($telefono_personal) 
        && !empty($telefono_casa) && !empty($estado) && !empty($id))
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
            $sql = "SELECT HMC_passwordAdmin_secreto FROM HMC_registroAdmin WHERE HMC_idAdmin_registro = '$admin' ";
            $result = mysqli_query($conn, $sql);
            $data = array();
               if ($row = mysqli_fetch_assoc($result))
                  {
                    $valor_password_secreto = $row['HMC_passwordAdmin_secreto'];
                  }
    
           $sql_insertar = "INSERT INTO HMC_$admin (HMC_idAdmin_registro, HMC_nombre1, HMC_apellido_paterno1, HMC_apellido_materno1, HMC_genero1,
           HMC_fecha_nacimiento1, HMC_calle1, HMC_numero_interior1, HMC_numero_exterior1, HMC_municipio1, HMC_telefono_personal1, HMC_telefono_casa1,
           HMC_estado1, HMC_passwordAdmin_secreto, HMC_id_registro) VALUES ('$admin', '$nombre', '$apellido_paterno', '$apellido_materno', '$genero',
           '$fecha_nacimiento', '$calle', '$numero_interior', '$numero_exterior', '$municipio', '$telefono_personal', '$telefono_casa',
           '$estado', '$valor_password_secreto', '$id')";


           if($conn->query($sql_insertar) === TRUE)
           {
            echo '<h2>Información registrada</h2>';
             echo '<div class="datos">';
             echo '<p><strong>ID ADMIN:</strong> '.$admin.' </p>';
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
             echo '<p><strong>ID:</strong> '.$id.' </p>';
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