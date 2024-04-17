<?php 
session_start();
$ID = $_SESSION['HMC_id_registro'];
$PASSWORD = $_SESSION['HMC_password_registro'];

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

            if(isset($_POST['borrar']))
            {
                $sql_borrar = "TRUNCATE HMC_$ID"; 
                $sql_borrar_bd = "DROP TABLE HMC_$ID";
                $sql_borrar_sesion_finalizada = "DELETE FROM HMC_sesion_finalizada WHERE HMC_id_sesion = '$ID'";
                $sql_borrar_sesion_iniciada = "DELETE FROM HMC_sesion_iniciada WHERE HMC_id_sesion = '$ID'";                                               
                $sql_borrar_registro = "DELETE FROM HMC_registro WHERE HMC_id_registro = '$ID'";                                                                          

                if($conn->query($sql_borrar) === TRUE && $conn->query($sql_borrar_bd) === TRUE && $conn->query($sql_borrar_sesion_finalizada) === TRUE  
                && $conn->query($sql_borrar_sesion_iniciada) === TRUE && $conn->query($sql_borrar_registro) === TRUE)
                {
                    echo '<div style = "' .$estilos. '"> <p> Tu cuenta ha sido borrada </p> </div><br>';                    
                    echo '<div style = "' .$estilos. '"> <p> Tus sesiones fueron eliminadas </p> </div><br>';
                    echo '<div style = "' .$estilos. '"> <p> Tu registro fueron eliminados </p> </div><br>';
                    echo '<div style = "' .$estilos. '"> <p> Tu base de datos eliminada </p> </div><br>';
                    echo '<div style = "' .$estilos. '"> <a href="ppl.html"><p> Regresar </p></a> </div><br>';                
                }
                else
                {
                    echo '<div style = "' .$estilos. '"> <p> No se pudo borrar </p> </div><br>';
                }
            }                                        



            $conn->close();
?>