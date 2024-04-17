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



                if(isset($_POST['HMC_idAdmin_sesion']) && isset($_POST['HMC_passwordAdmin_sesion']) && isset($_POST['HMC_passwordAdmin_secreto']) 
                && isset($_POST['HMC_id_registro']))
                {
                    $condicion_id = $_POST['HMC_idAdmin_sesion'];
                    $condicion_password = $_POST['HMC_passwordAdmin_sesion'];
                    $condicion_password_secreto = $_POST['HMC_passwordAdmin_secreto'];
                    $condicion_id_registro = $_POST['HMC_id_registro'];                      

                    date_default_timezone_set('America/Mexico_City');
                    $fecha_iniciada = date('Y/m/d');
                    $tiempo_iniciada = date('H:i:s');
                    
                    if(!empty($condicion_id) && !empty($condicion_password) && !empty($condicion_password_secreto) && !empty($condicion_id_registro))
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
                        $sql0 = "SELECT HMC_idAdmin_registro, HMC_passwordAdmin_registro, 
                        HMC_passwordAdmin_secreto, HMC_id_registro FROM HMC_registroAdmin WHERE HMC_idAdmin_registro = '$condicion_id' ";
                        $result0 = mysqli_query($conn, $sql0);

                        $sql = "INSERT INTO HMC_sesionAdmin_iniciada (HMC_idAdmin_sesion, HMC_passwordAdmin_sesion, 
                        HMC_passwordAdmin_secreto, HMC_id_registro, HMC_fecha_inicioAdmin, HMC_hora_inicioAdmin) 
                        VALUES ('$condicion_id', '$condicion_password', ' $condicion_password_secreto', '$condicion_id_registro', '$fecha_iniciada' , '$tiempo_iniciada')";

                        $data = array();
                        if ($row = mysqli_fetch_assoc($result0))
                        {
                          $valor_id = $row['HMC_idAdmin_registro'];
                          $valor_password = $row['HMC_passwordAdmin_registro'];
                          $valor_password_secreto = $row['HMC_passwordAdmin_secreto'];
                          $valor_id_registro = $row['HMC_id_registro'];                          
                          $_SESSION['HMC_idAdmin_registro'] = $valor_id;
                          $_SESSION['HMC_passwordAdmin_registro'] = $valor_password;
                        }

                      //-----------------------------------------------------------
                        if($condicion_id == $valor_id)
                          {
                            echo '<h2>Información de sesión</h2>';
                            echo '<div class="datos">';
                            echo '<p><strong>ID:</strong> Correcto </p>';
                            echo '</div>';                                                                                                                            
                          }
                        else
                          {
                            echo '<h2>Información de sesión</h2>';
                            echo '<div class="datos">';
                            echo '<p><strong>ID:</strong> Incorrecto </p>';
                            echo '</div>';
                          }
                      //----------------------------------------------------------
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

                      //----------------------------------------------------------

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
                      
                      //----------------- -----------------------------------------
                        if($condicion_id_registro == $valor_id_registro)
                          {
                            echo '<div class="datos">';
                            echo '<p><strong>ID A SEGUIR:</strong> Correcto </p>';
                            echo '</div>';
                          }
                        else
                          {
                            echo '<div class="datos">';
                            echo '<p><strong>ID A SEGUIR:</strong> Incorrecto </p>';
                            echo '</div>';
                          }
                      //----------------------------------------------------------
                        if($condicion_id == $valor_id && $condicion_password == $valor_password && $condicion_password_secreto == $valor_password_secreto
                          && $condicion_id_registro == $valor_id_registro )
                          {
                            if($conn->query($sql) === TRUE)
                              {
                                echo '<div class="datos">';
                                echo '<p><strong>DATOS:</strong> Guardados </p>';
                                echo '<p><strong>FECHA INICIADA:</strong> '.$fecha_iniciada.' </p>';
                                echo '<p><strong>HORA INICIADA:</strong> '.$tiempo_iniciada.' </p>';
                                echo '<p style="text-align: center;"><a href="ppl_administrador.php">Ir a la pagina</a></p>';
                                echo '</div>';
                                                                
                              }
                          }
                        else
                          {
                            echo '<div class="datos">';
                            echo '<p><strong>DATOS:</strong> No guardados </p>';
                            echo '</div>';
                          }
        //------------------------------------------------------------------        
                         if($condicion_id == $valor_id && $condicion_password != $valor_password)
                           {
                            echo '<div class="datos">';
                            echo '<p><strong>SUGERENCIA:</strong> Tu ID es correcto, pero revisa tu PASSWORD </p>';
                            echo '</div>';
                               if($condicion_id_registro != $valor_id_registro)
                                {
                                  echo '<div class="datos">';
                                  echo '<p><strong>DATO EXTRA:</strong> Ademas, tu ID a administrar es diferente o no existe al que registraste </p>';
                                  echo '</div>'; 
                                  
                                     if($condicion_password_secreto != $valor_password_secreto)
                                      {
                                        echo '<div class="datos">';
                                        echo '<p><strong>ULTIMO EXTRA:</strong> De igual forma tu PASSWORD SECRETO, esta erroneo </p>';
                                        echo '</div>';
                                      }
                                      else
                                      {
                                        echo '<div class="datos">';
                                        echo '<p><strong>ULTIMO EXTRA:</strong> Pero tu PASSWORD SECRETO, no esta erroneo </p>';
                                        echo '</div>';
                                      }                                                       
                                 }
                                else
                                 {
                                    echo '<div class="datos">';
                                    echo '<p><strong>DATO EXTRA:</strong> Pero, tu ID a administrar es igual al que registraste </p>';
                                    echo '</div>';
                                 }
                           }                    
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

<?php

    $conn->close();

?>