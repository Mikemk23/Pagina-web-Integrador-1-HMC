<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "HMC";


    error_reporting(0);
    ini_set('display_errors', 0);
    
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    
    if ($conn->connect_error) {
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
        

    if (isset($_POST['HMC_id_registro']) && isset($_POST['HMC_password_registro']) && isset($_POST['HMC_password_secreto'])) 
    {
        $id_registro = $_POST['HMC_id_registro'];
        $password_registro = $_POST['HMC_password_registro'];
        $password_secreto = $_POST['HMC_password_secreto'];

        $sql1 = "SELECT HMC_id_registro FROM HMC_registro WHERE HMC_id_registro = '$id_registro'";
    $result1 = mysqli_query($conn, $sql1);
    
        
if (!empty($id_registro) && !empty($password_registro)) 
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
    if (mysqli_num_rows($result1) > 0) 
    {
        echo '<div style = "' .$estilos. '" class="datos"> <p> Ese ID ya existe, por favor introduce otro nuevo </p> </div><br>';
    } 
    else
    {    
    $sql = "INSERT INTO HMC_registro (HMC_id_registro, HMC_password_registro, HMC_password_secreto) VALUES ('$id_registro', '$password_registro', '$password_secreto')";
    $sql2 = "CREATE TABLE HMC_$id_registro (HMC_id_registro varchar(10),    
    HMC_nombre varchar(50), 
    HMC_apellido_paterno varchar(30),
    HMC_apellido_materno varchar(30),
    HMC_genero varchar(20), 
    HMC_fecha_nacimiento date,
    HMC_calle varchar(60),
    HMC_numero_interior int(3),
    HMC_numero_exterior varchar(2),
    HMC_municipio varchar(60),
    HMC_telefono_personal varchar(10),
    HMC_telefono_casa varchar(10),                             
    HMC_estado varchar(20),
    HMC_cuatrimestre int(2),
    HMC_carrera varchar(30),
    HMC_password_secreto varchar(5),
    foreign key(HMC_id_registro) references HMC_registro(HMC_id_registro)
    );";
    
        if ($conn->query($sql) === TRUE && $conn->query($sql2) === TRUE) 
        {
            echo '<h2>Información registrada</h2>';
             echo '<div class="datos">';
             echo '<p><strong>ID:</strong> '.$id_registro.' </p>';
             echo '<p><strong>PASSWORD:</strong> '.$password_registro.' </p>';
             echo '<p><strong>PASSWORD SECRETO:</strong> '.$password_secreto.' </p>';
             echo '<p><strong>DATOS:</strong> Guardados </p>';
             echo '<p><strong>BASE DE DATOS:</strong> Creada  </p>';
             echo '</div>';
        } else {
            echo "Error en la inserción: " . mysqli_error($conn);
        }
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

