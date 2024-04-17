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

            if (isset($_POST['HMC_idAdmin_registro'])) 
            {
                $admin = $_POST['HMC_idAdmin_registro'];
                if (!empty($admin)) 
                {
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

                            $sql_actualizar = "UPDATE HMC_$admin SET
                                    HMC_idAdmin_registro = '$admin',                    
                                    HMC_nombre1 = '$nombre',
                                    HMC_apellido_paterno1 = '$apellido_paterno',
                                    HMC_apellido_materno1 = '$apellido_materno',
                                    HMC_genero1 = '$genero',
                                    HMC_fecha_nacimiento1 = '$fecha_nacimiento',
                                    HMC_calle1 = '$calle',
                                    HMC_numero_interior1 = '$numero_interior',
                                    HMC_numero_exterior1 = '$numero_exterior',
                                    HMC_municipio1 = '$municipio',
                                    HMC_telefono_personal1 = '$telefono_personal',
                                    HMC_telefono_casa1 = '$telefono_casa',
                                    HMC_estado1 = '$estado',
                                    HMC_id_registro = '$id'                                   
                                    WHERE HMC_idAdmin_registro = '$admin'";

                            $result_actualizar = mysqli_query($conn, $sql_actualizar);
            
                            if ($conn->query($sql_actualizar) === TRUE) 
                            {
                                echo '<div style = "' . $estilos . '"> <p> Datos actualizados correctamente </p> </div><br>';
                            } else {
                                echo '<div style = "' . $estilos . '"> <p> Error al actualizar los datos: ' . $conn->error . ' </p> </div><br>';
                            }
                        }
                        else
                        {
                            echo '<div style = "' . $estilos . '"> <p> Tu campo está vacío, por favor llénalo </p> </div><br>';
                        }
            } 
            else 
            {
            echo '<div style = "' . $estilos . '"> <p> No se encontraron datos para el ID proporcionado </p> </div><br>';
            }
                 
                    
            
            
            $conn->close();
            ?>
                       

<!DOCTYPE html>
<html>
<head>
    <title>Consulta y Tabla PHP</title>
    <style>
        table {
            border-collapse: collapse;
            width: 50%;
            margin: 20px auto;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }

        a {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }


        a:hover {
            background-color: #0056b3;
        }

        body {
            text-align: center;
        }
    </style>
</head>
<body>

<?php


        echo "<table>";
      echo "<tr>
            <th>Nombre</th>
            <th>Apellido paterno</th>
            <th>Apellido materno</th>
            <th>Genero</th>
            <th>Fecha de nacimiento</th>
            <th>Calle</th>
            <th>Numero int</th>
            <th>Numero ext</th>
            <th>Municipio</th>
            <th>Telefono personal</th>
            <th>Telefono de casa</th>
            <th>Estado</th>
            <th>ID</th>            
            </tr>";
        echo "<tr>";
        echo "<td>" .$nombre. "</td>";
        echo "<td>" .$apellido_paterno. "</td>";
        echo "<td>" .$apellido_materno. "</td>";
        echo "<td>" .$genero."</td>";
        echo "<td>" .$fecha_nacimiento. "</td>";
        echo "<td>" .$calle. "</td>";
        echo "<td>" .$numero_interior. "</td>";
        echo "<td>" .$numero_exterior. "</td>";
        echo "<td>" .$municipio. "</td>";
        echo "<td>" .$telefono_personal. "</td>";
        echo "<td>" .$telefono_casa. "</td>";
        echo "<td>" .$estado. "</td>";
        echo "<td>" .$id. "</td>";
        echo "</tr>";
    
    echo "</table>";


?>
<a href="administrador.php">Regresar al usuario</a>
</body>
</html>

