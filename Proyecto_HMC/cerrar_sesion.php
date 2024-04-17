<?php

session_start();
$ID = $_SESSION['HMC_id_registro'];

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


                    $sql_final = "SELECT HMC_id_sesion, HMC_password_sesion, HMC_password_secreto FROM HMC_sesion_iniciada WHERE HMC_id_sesion = '$ID' ";
                    $result_final = mysqli_query($conn, $sql_final);

                    $data = array();
                    if ($row = mysqli_fetch_assoc($result_final))
                       {
                         $id_sesion = $row['HMC_id_sesion'];
                         $password_sesion = $row['HMC_password_sesion'];
                         $password_secreto_sesion = $row['HMC_password_secreto'];
                       }

                       if(isset($_POST['cerrar']))
                       {
                        date_default_timezone_set('America/Mexico_City');
                        $fecha_finalizada = date('Y/m/d');
                        $tiempo_finalizada = date('H:i:s'); 
                        
                        $sql = "INSERT INTO HMC_sesion_finalizada (HMC_id_sesion, HMC_password_sesion, HMC_password_secreto, HMC_fecha_final, HMC_hora_final) 
                        VALUES ('$id_sesion', '$password_sesion', '$password_secreto_sesion', '$fecha_finalizada', '$tiempo_finalizada')";

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
