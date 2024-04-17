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


    $estilos = 'background-color: #f0f0f0; 
                padding: 10px; 
                border: 2px solid #ccc;
                border-radius: 5px;
                font-size: 18px;
                text-align: center;';

                if (isset($_POST['HMC_idAdmin_registro']) && isset($_POST['HMC_passwordAdmin_registro']) 
                && isset($_POST['HMC_id_registro']) && isset($_POST['HMC_passwordAdmin_secreto'])) 
                {
                    $id_registroAdmin = $_POST['HMC_idAdmin_registro'];
                    $password_registroAdmin = $_POST['HMC_passwordAdmin_registro'];
                    $password_secreto = $_POST['HMC_passwordAdmin_secreto'];
                    $id_registro = $_POST['HMC_id_registro'];
                
                    if (!empty($id_registroAdmin) && !empty($password_registroAdmin) && !empty($password_secreto) && !empty($id_registro))
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
                      $sql1 = "SELECT HMC_idAdmin_registro FROM HMC_registroAdmin WHERE HMC_idAdmin_registro = '$id_registroAdmin'";
                      $result1 = mysqli_query($conn, $sql1);


                      $sqlx = "SELECT HMC_id_registro FROM HMC_registro WHERE HMC_id_registro = '$id_registro'";  
                      $resultx = mysqli_query($conn, $sqlx);


                      $data = array();
                      if ($row = mysqli_fetch_assoc($resultx))
                         {
                          $id = $row['HMC_id_registro'];                          
                         }
                  
                      $sql_verificar_administradores = "SELECT COUNT(*) AS HMC_idAdmin_registro FROM HMC_registroAdmin WHERE HMC_id_registro = '$id_registro'";
                      $result_verificar_administradores = mysqli_query($conn, $sql_verificar_administradores);                  
                      $row_verificar_administradores = mysqli_fetch_assoc($result_verificar_administradores);
                      $num_administradores_actuales = $row_verificar_administradores['HMC_idAdmin_registro']; 
                  
                      $sql = "INSERT INTO HMC_registroAdmin (HMC_idAdmin_registro, HMC_passwordAdmin_registro, HMC_passwordAdmin_secreto, 
                      HMC_id_registro) VALUES ('$id_registroAdmin', '$password_registroAdmin', '$password_secreto', '$id_registro')";
                      
                                $sql2 ="CREATE TABLE HMC_$id_registroAdmin (HMC_idAdmin_registro varchar(20),
                                HMC_nombre1 varchar(50),
                                HMC_apellido_paterno1 varchar(30),
                                HMC_apellido_materno1 varchar(30),
                                HMC_genero1 varchar(20), 
                                HMC_fecha_nacimiento1 date,
                                HMC_calle1 varchar(60),
                                HMC_numero_interior1 int(3),
                                HMC_numero_exterior1 varchar(2),
                                HMC_municipio1 varchar(60),
                                HMC_telefono_personal1 varchar(10),
                                HMC_telefono_casa1 varchar(10),                             
                                HMC_estado1 varchar(20),
                                HMC_passwordAdmin_secreto varchar(5),
                                HMC_id_registro varchar(20),
                                foreign key(HMC_id_registro) references HMC_$id_registro(HMC_id_registro)
                                );";
                  
                              if (mysqli_num_rows($result1) > 0) 
                                {
                                  echo '<div style = "' .$estilos. '" <p> Ese ID ya existe en la base de datos, por favor cambialo </p> </div><br>';
                                } 
                                else
                                {    
                                  if ($num_administradores_actuales >= 2)
                                   {
                                     echo '<div style = "' .$estilos. '" <p> No pueden existir mas de dos administradores de una cuenta, lo siento. </p> </div><br>';
                                   }
                                   else
                                   {
                                    if($id_registro == $id)
                                    {
                                      if ($conn->query($sql) === TRUE && $conn->query($sql2) === TRUE) 
                                          {
                                            echo '<h2>Información registrada</h2>';
                                            echo '<div class="datos">';
                                            echo '<p><strong>ID:</strong> '.$id_registroAdmin.' </p>';
                                            echo '<p><strong>PASSWORD:</strong> '.$password_registroAdmin.' </p>';
                                            echo '<p><strong>PASSWORD SECRETO:</strong> '.$password_secreto.' </p>';
                                            echo '<p><strong>ID A SEGUIR:</strong> '.$id_registro.' </p>';
                                            echo '<p><strong>DATOS:</strong> Guardados </p>';
                                            echo '<p><strong>BASE DE DATOS:</strong> Creada  </p>';
                                            echo '</div>';
                                          } 
                                          else 
                                          {
                                            echo "Error en la inserción: " . mysqli_error($conn);
                                          }
                                    }
                                    else
                                    {
                                      echo '<div style = "' .$estilos. '" <p> Ese ID no existe, escribe uno valido o pregunta el verdadero</p> </div><br>';
                                    }
                                      
                                   }              
                                }
                    }
                    else
                    {
                      echo '<div style = "' .$estilos. '" class="datos"> <p> Tu campo o todos estan vacios, llenalos </p> </div><br>';
                    }
                }
                ?>
                </div>
</body>
</html> 

    <?php
    $conn->close();


?>