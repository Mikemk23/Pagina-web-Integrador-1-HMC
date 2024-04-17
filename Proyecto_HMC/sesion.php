<?php
session_start();
    error_reporting(0);
    ini_set('display_errors', 0);
    
    $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "HMC";
        
        
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
    
    
    if (isset($_POST['HMC_id_sesion']) && isset($_POST['HMC_password_sesion']) && isset($_POST['HMC_password_secreto'])) 
    {
    $condicion_id = $_POST['HMC_id_sesion'];
    $condicion_password = $_POST['HMC_password_sesion'];
    $condicion_password_secreto = $_POST['HMC_password_secreto'];
    
    date_default_timezone_set('America/Mexico_City');
    $fecha_iniciada = date('Y/m/d');
    $tiempo_iniciada = date('H:i:s');                    
                                
    
    $sql0 = "SELECT HMC_id_registro, HMC_password_registro, HMC_password_secreto FROM HMC_registro WHERE HMC_id_registro = '$condicion_id' ";
    $result0 = mysqli_query($conn, $sql0);
    
        
    $sql = "INSERT INTO HMC_sesion_iniciada (HMC_id_sesion, HMC_password_sesion, HMC_password_secreto, HMC_fecha_inicio, HMC_hora_inicio) 
    VALUES ('$condicion_id', '$condicion_password', '$condicion_password_secreto', '$fecha_iniciada', '$tiempo_iniciada')";
    
    
    if (!empty($condicion_id) && !empty($condicion_password) && !empty($condicion_password_secreto)) 
    {
               $data = array();
               if ($row = mysqli_fetch_assoc($result0))
                  {
                    $valor_id = $row['HMC_id_registro'];
                    $valor_password = $row['HMC_password_registro'];
                    $valor_password_secreto = $row['HMC_password_secreto'];
                    $_SESSION['HMC_id_registro'] = $valor_id;
                    $_SESSION['HMC_password_registro'] = $valor_password;
                  }
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

    <style>
        a
        {
            text-decoration: none;
            color: purple;
            text-align: center;
        }
    </style>
      <div class="container">
    
        <?php
        
        if($condicion_id == $valor_id)
        {
            echo '<h2>Información de sesión</h2>';
            echo '<div class="datos">';
            echo '<p><strong>ID:</strong> Correcto </p>';
            echo '</div>';                                                                                                 
        }
        else
        {
            echo '<h2>Información de sesion</h2>';
            echo '<div class="datos">';
            echo '<p><strong>ID:</strong> Incorrecto </p>';
            echo '</div>';
        }
    
        if($condicion_password == $valor_password)
        {
            echo '<div class="datos">';
            echo '<p><strong>PASSWORD:</strong> Correcto </p>';
            echo '</div>';
        }
        else
        {
            echo '<div class="datos">';
            echo '<p><strong>PASSWORD:</strong> Incorrecto </p>';
            echo '</div>';
        }

        if($condicion_password_secreto == $valor_password_secreto)
        {
            echo '<div class="datos">';
            echo '<p><strong>PASSWORD SECRETO:</strong> Correcto </p>';
            echo '</div>';
        }
        else
        {
            echo '<div class="datos">';
            echo '<p><strong>PASSWORD SECRETO:</strong> Incorrecto </p>';
            echo '</div>';
        }
    
        if($condicion_id == $valor_id && $condicion_password == $valor_password && $condicion_password_secreto == $valor_password_secreto)
        {                                                
            if($conn->query($sql) === TRUE )
               {

                echo '<div class="datos">';
                echo '<p><strong>DATOS:</strong> Guardados </p>';
                echo '<p><strong>FECHA INICIADA:</strong> '.$fecha_iniciada.' </p>';
                echo '<p><strong>HORA INICIADA:</strong> '.$tiempo_iniciada.' </p>';
                echo '<p style="text-align: center;"> <a href="ppl_usuario.php">Ir a la pagina</a></p>';
                echo '</div>';                                                                                   
               }
        }
        
        if($condicion_id == $valor_id && $condicion_password != $valor_password)
        {
                echo '<div class="datos">';
                echo '<p><strong>DATOS:</strong> No guardados </p>';
                echo '<p><strong>SUGERENCIA:</strong> Cambia el PASSWORD, esta erroneo </p>';
                echo '</div>';
            if($condicion_password_secreto != $valor_password_secreto)
            {
                echo '<div class="datos">';
                echo '<p><strong>DATO EXTRA:</strong> De igual forma tu PASSWORD SECRETO, esta erroneo </p>';
                echo '</div>';
            }
            else
            {
                echo '<div class="datos">';
                echo '<p><strong>SUGERENCIA:</strong> Pero tu PASSWORD SECRETO, no esta erroneo </p>';
                echo '</div>';
            }
            
        }               
        
        
                    
        $conn->close();
    
    
    
          
    }
    else
    {
        echo '<div style = "' .$estilos. '" <p> Un campo o varios de ellos estan vacios, llenalos </p> </div><br>';
    }
    
    
    }

    


    
    ?>
    </div>
    </body>
    </html>
    




