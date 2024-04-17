<?php

session_start();
$admin = $_SESSION['HMC_idAdmin_registro'];

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


                    $sql_final = "SELECT HMC_idAdmin_sesion, HMC_passwordAdmin_sesion, HMC_passwordAdmin_secreto, HMC_id_registro FROM HMC_sesionAdmin_iniciada WHERE HMC_idAdmin_sesion = '$admin' ";
                    $result_final = mysqli_query($conn, $sql_final);

                    $data = array();
                    if ($row = mysqli_fetch_assoc($result_final))
                       {
                         $id_sesion = $row['HMC_idAdmin_sesion'];
                         $password_sesion = $row['HMC_passwordAdmin_sesion'];
                         $password_secreto_sesion = $row['HMC_passwordAdmin_secreto'];
                         $id = $row['HMC_id_registro'];
                       }

                       if(isset($_POST['cerrar']))
                       {
                        date_default_timezone_set('America/Mexico_City');
                        $fecha_finalizada = date('Y/m/d');
                        $tiempo_finalizada = date('H:i:s'); 
                        
                        $sql = "INSERT INTO HMC_sesionAdmin_finalizada (HMC_idAdmin_sesion, HMC_passwordAdmin_sesion, HMC_passwordAdmin_secreto, HMC_id_registro, HMC_fecha_finalAdmin, HMC_hora_finalAdmin) 
                        VALUES ('$id_sesion', '$password_sesion', '$password_secreto_sesion', '$id', '$fecha_finalizada', '$tiempo_finalizada')";

                        if($conn->query($sql))
                        {
                            echo 
                            '<div style = "' .$estilos. '"> 
                            <p> Se ha cerrado iniciado sesion con exito</p> 
                            <p> Su fecha cerrado: '.$fecha_finalizada.' </p>                             
                            <p> Su hora cerrada: '.$tiempo_finalizada.' </p>
                            <a href="ppl.html"><p>Regresar</p></a>
                            </div><br>';
                        }
                                                
                       }
                       else
                       {
                        echo "Boton no presionado";
                       }

                    $conn->close();
?>
