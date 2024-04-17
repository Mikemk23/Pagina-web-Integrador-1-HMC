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

            if (isset($_POST['HMC_id_registro'])) 
            {
                $id = $_POST['HMC_id_registro'];
                if (!empty($id)) 
                {
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

                            $sql_actualizar = "UPDATE HMC_$id SET
                                    HMC_id_registro = '$id',                    
                                    HMC_nombre = '$nombre',
                                    HMC_apellido_paterno = '$apellido_paterno',
                                    HMC_apellido_materno = '$apellido_materno',
                                    HMC_genero = '$genero',
                                    HMC_fecha_nacimiento = '$fecha_nacimiento',
                                    HMC_calle = '$calle',
                                    HMC_numero_interior = '$numero_interior',
                                    HMC_numero_exterior = '$numero_exterior',
                                    HMC_municipio = '$municipio',
                                    HMC_telefono_personal = '$telefono_personal',
                                    HMC_telefono_casa = '$telefono_casa',
                                    HMC_estado = '$estado',
                                    HMC_cuatrimestre = '$cuatrimestre',
                                    HMC_carrera = '$carrera'
                                    WHERE HMC_id_registro = '$id'";

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
            <th>Cuatrimestre</th>
            <th>Carrera</th>
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
        echo "<td>" .$cuatrimestre. "</td>";
        echo "<td>" .$carrera. "</td>";
        echo "</tr>";
    
    echo "</table>";


?>
<a href="usuario.php">Regresar al usuario</a>
</body>
</html>

