<?php
session_start();
$admin = $_SESSION['HMC_idAdmin_registro'];

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

            if(isset($_POST['HMC_passwordAdmin_secreto']))
            {
                $password_secreto = $_POST['HMC_passwordAdmin_secreto'];
                if(!empty($password_secreto))
                {
                    $sql_verificar = "SELECT HMC_passwordAdmin_secreto FROM HMC_$admin WHERE HMC_idAdmin_registro = '$admin'";
                  $result_verificar = mysqli_query($conn, $sql_verificar);
                  $dato = array();
                  if($row = mysqli_fetch_assoc($result_verificar))
                  {
                    $pass = $row['HMC_passwordAdmin_secreto'];
                  }                

                  if($password_secreto == $pass)
                  {

                    $sql_consulta = "SELECT HMC_nombre1, HMC_apellido_paterno1, HMC_apellido_materno1, HMC_genero1, HMC_fecha_nacimiento1,
                    HMC_calle1, HMC_numero_interior1, HMC_numero_exterior1, HMC_municipio1, HMC_telefono_personal1, HMC_telefono_casa1,
                    HMC_estado1, HMC_id_registro FROM HMC_$admin WHERE HMC_passwordAdmin_secreto = '$password_secreto'";
                    $result_consulta = mysqli_query($conn, $sql_consulta);

                    $data = array();
                    if ($row = mysqli_fetch_assoc($result_consulta))
                       {
                         $nombre = $row['HMC_nombre1'];
                         $apellido_paterno = $row['HMC_apellido_paterno1'];
                         $apellido_materno = $row['HMC_apellido_materno1'];                     
                         $genero = $row['HMC_genero1'];
                         $fecha_nacimiento = $row['HMC_fecha_nacimiento1'];
                         $calle = $row['HMC_calle1'];
                         $numero_interior = $row['HMC_numero_interior1'];
                         $numero_exterior = $row['HMC_numero_exterior1'];
                         $municipio = $row['HMC_municipio1'];
                         $telefono_personal = $row['HMC_telefono_personal1'];
                         $telefono_casa = $row['HMC_telefono_casa1'];
                         $estado = $row['HMC_estado1'];
                         $id = $row['HMC_id_registro'];
                       }

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



echo "<form action='eliminar1_administrador.php' method='post'>";
        echo "<table>";
      echo "<tr>
            <th>Usuario</th>
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
        echo "<td>" .$admin. "</td>";
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

        echo "<tr>";
        echo "<td> <input type='hidden' name='HMC_idAdmin_registro' value='" . $admin . "'> NO </td>";
        echo "<td> <input type='submit' value='Eliminar' name='eliminar1'> </td>";
        echo "<td> <input type='submit' value='Eliminar' name='eliminar2'> </td>";
        echo "<td> <input type='submit' value='Eliminar' name='eliminar3'> </td>";
        echo "<td> <input type='submit' value='Eliminar' name='eliminar4'> </td>";
        echo "<td> <input type='submit' value='Eliminar' name='eliminar5'> </td>";
        echo "<td> <input type='submit' value='Eliminar' name='eliminar6'> </td>";
        echo "<td> <input type='submit' value='Eliminar' name='eliminar7'> </td>";
        echo "<td> <input type='submit' value='Eliminar' name='eliminar8'> </td>";
        echo "<td> <input type='submit' value='Eliminar' name='eliminar9'> </td>";
        echo "<td> <input type='submit' value='Eliminar' name='eliminar10'> </td>";
        echo "<td> <input type='submit' value='Eliminar' name='eliminar11'> </td>";
        echo "<td> <input type='submit' value='Eliminar' name='eliminar12'> </td>";
        echo "<td> <input type='hidden' name='HMC_id_registro' value='". $id ."'>NO</td>";
        echo "</tr>";    
    echo "</table>";
echo "</form>";
    


?>
<a href="administrador.php">Regresar al usuario</a>
</body>
</html>

<?php
}
else
{
  echo '<div style = "' .$estilos. '"> <p> Tu contraseña es incorrecta, revisala </p> </div><br>';                     
}
                }
                else
                {
                    echo '<div style = "' .$estilos. '" <p> Tu campo esta vacio, por favor llenalo </p> </div><br>';
                }
            }

            $conn->close();
                
?>