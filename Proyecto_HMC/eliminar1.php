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

                $sql_consulta = "SELECT HMC_nombre, HMC_apellido_paterno, HMC_apellido_materno, HMC_genero, HMC_fecha_nacimiento,
                    HMC_calle, HMC_numero_interior, HMC_numero_exterior, HMC_municipio, HMC_telefono_personal, HMC_telefono_casa,
                    HMC_estado, HMC_cuatrimestre, HMC_carrera FROM HMC_$id WHERE HMC_id_registro = '$id'";
                    $result_consulta = mysqli_query($conn, $sql_consulta);

                    $data = array();
                    if ($row = mysqli_fetch_assoc($result_consulta))
                       {
                         $nombre = $row['HMC_nombre'];
                         $apellido_paterno = $row['HMC_apellido_paterno'];
                         $apellido_materno = $row['HMC_apellido_materno'];                     
                         $genero = $row['HMC_genero'];
                         $fecha_nacimiento = $row['HMC_fecha_nacimiento'];
                         $calle = $row['HMC_calle'];
                         $numero_interior = $row['HMC_numero_interior'];
                         $numero_exterior = $row['HMC_numero_exterior'];
                         $municipio = $row['HMC_municipio'];
                         $telefono_personal = $row['HMC_telefono_personal'];
                         $telefono_casa = $row['HMC_telefono_casa'];
                         $estado = $row['HMC_estado'];
                         $cuatrimestre = $row['HMC_cuatrimestre'];
                         $carrera = $row['HMC_carrera'];
                       }





                    if (isset($_POST['eliminar1'])) 
                    {
                        $sql_campovacio1 = "SELECT HMC_nombre FROM HMC_$id WHERE HMC_id_registro = '$id'";
                        $result_campovacio1 = mysqli_query($conn, $sql_campovacio1);                        

                        if ($result_campovacio1) 
                        {
                            $row_campovacio1 = mysqli_fetch_assoc($result_campovacio1);
                            $nombre2 = $row_campovacio1['HMC_nombre'];                           
                            if(!empty($nombre2))
                            {
                                $sql_actualizar1 = "UPDATE HMC_$id SET HMC_nombre = '' WHERE HMC_id_registro = '$id'";
                                $result_actualizar1 = mysqli_query($conn, $sql_actualizar1);
                                    if($conn->query($sql_actualizar1))
                                      {
                                         echo '<div style = "' .$estilos. '"> 
                                         <p> El nombre "'.$nombre.'" se ha eliminado correctamente </p> 
                                         <a href="eliminar.html"><p> Volver </p></a>
                                         </div><br>';
                                      }
                            }
                            else
                            {
                                echo '<div style = "' .$estilos. '" <p> No puedes borrar un dato que esta vacio, tiene que tener un valor </p> </div><br>';
                            }
                        } 
                        else
                        {
                            echo "Error al ejecutar la consulta: " . mysqli_error($conn);
                        }                        
                    }


                    if (isset($_POST['eliminar2'])) 
                    {
                        $sql_campovacio2 = "SELECT HMC_apellido_paterno FROM HMC_$id WHERE HMC_id_registro = '$id'";
                        $result_campovacio2 = mysqli_query($conn, $sql_campovacio2);                        

                        if ($result_campovacio2) 
                        {
                            $row_campovacio2 = mysqli_fetch_assoc($result_campovacio2);
                            $apellido_paterno2 = $row_campovacio2['HMC_apellido_paterno'];                           
                            if(!empty($apellido_paterno2))
                            {
                                $sql_actualizar2 = "UPDATE HMC_$id SET HMC_apellido_paterno = '' WHERE HMC_id_registro = '$id'";
                                $result_actualizar2 = mysqli_query($conn, $sql_actualizar2);
                                    if($conn->query($sql_actualizar2))
                                      {
                                         echo '<div style = "' .$estilos. '">
                                          <p> El apellido paterno "'.$apellido_paterno.'" se ha eliminado correctamente </p> 
                                          <a href="eliminar.html"><p> Volver </p></a>
                                          </div><br>';
                                         echo '<a href="eliminar2.php"><p> Volver </p></a>';                                     }
                            }
                            else
                            {
                                echo '<div style = "' .$estilos. '" <p> No puedes borrar un dato que esta vacio, tiene que tener un valor </p> </div><br>';
                            }
                        } 
                        else
                        {
                            echo "Error al ejecutar la consulta: " . mysqli_error($conn);
                        }                        
                    }



                    if (isset($_POST['eliminar3'])) 
                    {
                        $sql_campovacio3 = "SELECT HMC_apellido_materno FROM HMC_$id WHERE HMC_id_registro = '$id'";
                        $result_campovacio3 = mysqli_query($conn, $sql_campovacio3);                        

                        if ($result_campovacio3) 
                        {
                            $row_campovacio3 = mysqli_fetch_assoc($result_campovacio3);
                            $apellido_materno2 = $row_campovacio3['HMC_apellido_materno'];                           
                            if(!empty($apellido_materno2))
                            {
                                $sql_actualizar3 = "UPDATE HMC_$id SET HMC_apellido_materno = '' WHERE HMC_id_registro = '$id'";
                                $result_actualizar3 = mysqli_query($conn, $sql_actualizar3);
                                    if($conn->query($sql_actualizar3))
                                      {
                                         echo '<div style = "' .$estilos. '"> 
                                         <p> El apellido materno "'.$apellido_materno.'" se ha eliminado correctamente </p>
                                         <a href="eliminar.html"><p> Volver </p></a> 
                                         </div><br>';
                                      }
                            }
                            else
                            {
                                echo '<div style = "' .$estilos. '" <p> No puedes borrar un dato que esta vacio, tiene que tener un valor </p> </div><br>';
                            }
                        } 
                        else
                        {
                            echo "Error al ejecutar la consulta: " . mysqli_error($conn);
                        }                        
                    }



                    if (isset($_POST['eliminar4'])) 
                    {
                        $sql_campovacio4 = "SELECT HMC_genero FROM HMC_$id WHERE HMC_id_registro = '$id'";
                        $result_campovacio4 = mysqli_query($conn, $sql_campovacio4);                        

                        if ($result_campovacio4) 
                        {
                            $row_campovacio4 = mysqli_fetch_assoc($result_campovacio4);
                            $genero2 = $row_campovacio4['HMC_genero'];                           
                            if(!empty($genero2))
                            {
                                $sql_actualizar4 = "UPDATE HMC_$id SET HMC_genero = '' WHERE HMC_id_registro = '$id'";
                                $result_actualizar4 = mysqli_query($conn, $sql_actualizar4);
                                    if($conn->query($sql_actualizar4))
                                      {
                                         echo '<div style = "' .$estilos. '">
                                          <p> El genero "'.$genero.'" se ha eliminado correctamente </p> 
                                          <a href="eliminar.html"><p> Volver </p></a>
                                          </div><br>';
                                      }
                            }
                            else
                            {
                                echo '<div style = "' .$estilos. '" <p> No puedes borrar un dato que esta vacio, tiene que tener un valor </p> </div><br>';
                            }
                        } 
                        else
                        {
                            echo "Error al ejecutar la consulta: " . mysqli_error($conn);
                        }                        
                    }

                    if (isset($_POST['eliminar5'])) 
                    {
                        $sql_campovacio5 = "SELECT HMC_fecha_nacimiento FROM HMC_$id WHERE HMC_id_registro = '$id'";
                        $result_campovacio5 = mysqli_query($conn, $sql_campovacio5);                        

                        if ($result_campovacio5) 
                        {
                            $row_campovacio5 = mysqli_fetch_assoc($result_campovacio5);
                            $fecha_nacimiento2 = $row_campovacio5['HMC_fecha_nacimiento'];                           
                            if(!empty($fecha_nacimiento2))
                            {
                                $sql_actualizar5 = "UPDATE HMC_$id SET HMC_fecha_nacimiento = '' WHERE HMC_id_registro = '$id'";
                                $result_actualizar5 = mysqli_query($conn, $sql_actualizar5);
                                    if($conn->query($sql_actualizar5))
                                      {
                                         echo '<div style = "' .$estilos. '">
                                        <p> La fecha de nacimiento "'.$fecha_nacimiento.'" se ha eliminado correctamente </p> 
                                        <a href="eliminar.html"><p> Volver </p></a>
                                        </div><br>';
                                      }
                            }
                            else
                            {
                                echo '<div style = "' .$estilos. '" <p> No puedes borrar un dato que esta vacio, tiene que tener un valor </p> </div><br>';
                            }
                        } 
                        else
                        {
                            echo "Error al ejecutar la consulta: " . mysqli_error($conn);
                        }                        
                    }



                    if (isset($_POST['eliminar6'])) 
                    {
                        $sql_campovacio6 = "SELECT HMC_calle FROM HMC_$id WHERE HMC_id_registro = '$id'";
                        $result_campovacio6 = mysqli_query($conn, $sql_campovacio6);                        

                        if ($result_campovacio6) 
                        {
                            $row_campovacio6 = mysqli_fetch_assoc($result_campovacio6);
                            $calle2 = $row_campovacio6['HMC_calle'];                           
                            if(!empty($calle2))
                            {
                                $sql_actualizar6 = "UPDATE HMC_$id SET HMC_calle = '' WHERE HMC_id_registro = '$id'";
                                $result_actualizar6 = mysqli_query($conn, $sql_actualizar6);
                                    if($conn->query($sql_actualizar6))
                                      {
                                         echo '<div style = "' .$estilos. '"> 
                                         <p> La calle "'.$calle.'" se ha eliminado correctamente </p>
                                         <a href="eliminar.html"><p> Volver </p></a>
                                        </div><br>';
                                      }
                            }
                            else
                            {
                                echo '<div style = "' .$estilos. '" <p> No puedes borrar un dato que esta vacio, tiene que tener un valor </p> </div><br>';
                            }
                        } 
                        else
                        {
                            echo "Error al ejecutar la consulta: " . mysqli_error($conn);
                        }                        
                    }


                    if (isset($_POST['eliminar7'])) 
                    {
                        $sql_campovacio7 = "SELECT HMC_numero_interior FROM HMC_$id WHERE HMC_id_registro = '$id'";
                        $result_campovacio7 = mysqli_query($conn, $sql_campovacio7);                        

                        if ($result_campovacio7) 
                        {
                            $row_campovacio7 = mysqli_fetch_assoc($result_campovacio7);
                            $numero_interior2 = $row_campovacio7['HMC_numero_interior'];                           
                            if(!empty($numero_interior2))
                            {
                                $sql_actualizar7 = "UPDATE HMC_$id SET HMC_numero_interior = '' WHERE HMC_id_registro = '$id'";
                                $result_actualizar7 = mysqli_query($conn, $sql_actualizar7);
                                    if($conn->query($sql_actualizar7))
                                      {
                                         echo '<div style = "' .$estilos. '">
                                          <p> El numero interior "'.$numero_interior.'" se ha eliminado correctamente </p> 
                                          <a href="eliminar.html"><p> Volver </p></a>
                                          </div><br>';
                                      }
                            }
                            else
                            {
                                echo '<div style = "' .$estilos. '" <p> No puedes borrar un dato que esta vacio, tiene que tener un valor </p> </div><br>';
                            }
                        } 
                        else
                        {
                            echo "Error al ejecutar la consulta: " . mysqli_error($conn);
                        }                        
                    }


                    if (isset($_POST['eliminar8'])) 
                    {
                        $sql_campovacio8 = "SELECT HMC_numero_exterior FROM HMC_$id WHERE HMC_id_registro = '$id'";
                        $result_campovacio8 = mysqli_query($conn, $sql_campovacio8);                        

                        if ($result_campovacio8) 
                        {
                            $row_campovacio8 = mysqli_fetch_assoc($result_campovacio8);
                            $numero_exterior2 = $row_campovacio8['HMC_numero_exterior'];                           
                            if(!empty($numero_exterior2))
                            {
                                $sql_actualizar8 = "UPDATE HMC_$id SET HMC_numero_exterior = '' WHERE HMC_id_registro = '$id'";
                                $result_actualizar8 = mysqli_query($conn, $sql_actualizar8);
                                    if($conn->query($sql_actualizar8))
                                      {
                                         echo '<div style = "' .$estilos. '">
                                        <p> El numero exterior "'.$numero_exterior.'" se ha eliminado correctamente </p> 
                                        <a href="eliminar.html"><p> Volver </p></a>
                                        </div><br>';
                                      }
                            }
                            else
                            {
                                echo '<div style = "' .$estilos. '" <p> No puedes borrar un dato que esta vacio, tiene que tener un valor </p> </div><br>';
                            }
                        } 
                        else
                        {
                            echo "Error al ejecutar la consulta: " . mysqli_error($conn);
                        }                        
                    }




                    if (isset($_POST['eliminar9'])) 
                    {
                        $sql_campovacio9 = "SELECT HMC_municipio FROM HMC_$id WHERE HMC_id_registro = '$id'";
                        $result_campovacio9 = mysqli_query($conn, $sql_campovacio9);                        

                        if ($result_campovacio9) 
                        {
                            $row_campovacio9 = mysqli_fetch_assoc($result_campovacio9);
                            $municipio2 = $row_campovacio9['HMC_municipio'];                           
                            if(!empty($municipio2))
                            {
                                $sql_actualizar9 = "UPDATE HMC_$id SET HMC_municipio = '' WHERE HMC_id_registro = '$id'";
                                $result_actualizar9 = mysqli_query($conn, $sql_actualizar9);
                                    if($conn->query($sql_actualizar9))
                                      {
                                         echo '<div style = "' .$estilos. '"> 
                                         <p> El municipio "'.$municipio.'" se ha eliminado correctamente </p> 
                                         <a href="eliminar.html"><p> Volver </p></a>
                                         </div><br>';
                                      }
                            }
                            else
                            {
                                echo '<div style = "' .$estilos. '" <p> No puedes borrar un dato que esta vacio, tiene que tener un valor </p> </div><br>';
                            }
                        } 
                        else
                        {
                            echo "Error al ejecutar la consulta: " . mysqli_error($conn);
                        }                        
                    }



                    if (isset($_POST['eliminar10'])) 
                    {
                        $sql_campovacio10 = "SELECT HMC_telefono_personal FROM HMC_$id WHERE HMC_id_registro = '$id'";
                        $result_campovacio10 = mysqli_query($conn, $sql_campovacio10);                        

                        if ($result_campovacio10) 
                        {
                            $row_campovacio10 = mysqli_fetch_assoc($result_campovacio10);
                            $telefono_personal2 = $row_campovacio10['HMC_telefono_personal'];                           
                            if(!empty($telefono_personal2))
                            {
                                $sql_actualizar10 = "UPDATE HMC_$id SET HMC_telefono_personal = '' WHERE HMC_id_registro = '$id'";
                                $result_actualizar10 = mysqli_query($conn, $sql_actualizar10);
                                    if($conn->query($sql_actualizar10))
                                      {
                                         echo '<div style = "' .$estilos. '"> 
                                         <p> El telefono personal "'.$telefono_personal.'" se ha eliminado correctamente </p> 
                                         <a href="eliminar.html"><p> Volver </p></a>
                                         </div><br>';
                                      }
                            }
                            else
                            {
                                echo '<div style = "' .$estilos. '" <p> No puedes borrar un dato que esta vacio, tiene que tener un valor </p> </div><br>';
                            }
                        } 
                        else
                        {
                            echo "Error al ejecutar la consulta: " . mysqli_error($conn);
                        }                        
                    }


                    if (isset($_POST['eliminar11'])) 
                    {
                        $sql_campovacio11 = "SELECT HMC_telefono_casa FROM HMC_$id WHERE HMC_id_registro = '$id'";
                        $result_campovacio11 = mysqli_query($conn, $sql_campovacio11);                        

                        if ($result_campovacio11) 
                        {
                            $row_campovacio11 = mysqli_fetch_assoc($result_campovacio11);
                            $telefono_casa2 = $row_campovacio11['HMC_telefono_casa'];                           
                            if(!empty($telefono_casa2))
                            {
                                $sql_actualizar11 = "UPDATE HMC_$id SET HMC_telefono_casa = '' WHERE HMC_id_registro = '$id'";
                                $result_actualizar11 = mysqli_query($conn, $sql_actualizar11);
                                    if($conn->query($sql_actualizar11))
                                      {
                                         echo '<div style = "' .$estilos. '"> 
                                         <p> El telefono de casa "'.$telefono_casa.'" se ha eliminado correctamente </p> 
                                         <a href="eliminar.html"><p> Volver </p></a>
                                         </div><br>';
                                      }
                            }
                            else
                            {
                                echo '<div style = "' .$estilos. '" <p> No puedes borrar un dato que esta vacio, tiene que tener un valor </p> </div><br>';
                            }
                        } 
                        else
                        {
                            echo "Error al ejecutar la consulta: " . mysqli_error($conn);
                        }                        
                    }



                    if (isset($_POST['eliminar12'])) 
                    {
                        $sql_campovacio12 = "SELECT HMC_estado FROM HMC_$id WHERE HMC_id_registro = '$id'";
                        $result_campovacio12 = mysqli_query($conn, $sql_campovacio12);                        

                        if ($result_campovacio12) 
                        {
                            $row_campovacio12 = mysqli_fetch_assoc($result_campovacio12);
                            $estado2 = $row_campovacio12['HMC_estado'];                           
                            if(!empty($estado2))
                            {
                                $sql_actualizar12 = "UPDATE HMC_$id SET HMC_estado = '' WHERE HMC_id_registro = '$id'";
                                $result_actualizar12 = mysqli_query($conn, $sql_actualizar12);
                                    if($conn->query($sql_actualizar12))
                                      {
                                         echo '<div style = "' .$estilos. '"> 
                                         <p> El estado "'.$estado.'" se ha eliminado correctamente </p> 
                                         <a href="eliminar.html"><p> Volver </p></a>
                                         </div><br>';
                                      }
                            }
                            else
                            {
                                echo '<div style = "' .$estilos. '" <p> No puedes borrar un dato que esta vacio, tiene que tener un valor </p> </div><br>';
                            }
                        } 
                        else
                        {
                            echo "Error al ejecutar la consulta: " . mysqli_error($conn);
                        }                        
                    }

                    


                    if (isset($_POST['eliminar13'])) 
                    {
                        $sql_campovacio13 = "SELECT HMC_cuatrimestre FROM HMC_$id WHERE HMC_id_registro = '$id'";
                        $result_campovacio13 = mysqli_query($conn, $sql_campovacio13);                        

                        if ($result_campovacio13) 
                        {
                            $row_campovacio13 = mysqli_fetch_assoc($result_campovacio13);
                            $cuatrimestre2 = $row_campovacio13['HMC_cuatrimestre'];                           
                            if(!empty($cuatrimestre2))
                            {
                                $sql_actualizar13 = "UPDATE HMC_$id SET HMC_cuatrimestre = '' WHERE HMC_id_registro = '$id'";
                                $result_actualizar13 = mysqli_query($conn, $sql_actualizar13);
                                    if($conn->query($sql_actualizar13))
                                      {
                                         echo '<div style = "' .$estilos. '"> 
                                         <p> El cuatrimestre "'.$cuatrimestre.'" se ha eliminado correctamente </p> 
                                         <a href="eliminar.html"><p> Volver </p></a>
                                         </div><br>';
                                      }
                            }
                            else
                            {
                                echo '<div style = "' .$estilos. '" <p> No puedes borrar un dato que esta vacio, tiene que tener un valor </p> </div><br>';
                            }
                        } 
                        else
                        {
                            echo "Error al ejecutar la consulta: " . mysqli_error($conn);
                        }                        
                    }

                    if (isset($_POST['eliminar14'])) 
                    {
                        $sql_campovacio14 = "SELECT HMC_carrera FROM HMC_$id WHERE HMC_id_registro = '$id'";
                        $result_campovacio14 = mysqli_query($conn, $sql_campovacio14);                        

                        if ($result_campovacio14) 
                        {
                            $row_campovacio14 = mysqli_fetch_assoc($result_campovacio14);
                            $carrera2 = $row_campovacio14['HMC_carrera'];                           
                            if(!empty($carrera2))
                            {
                                $sql_actualizar14 = "UPDATE HMC_$id SET HMC_carrera = '' WHERE HMC_id_registro = '$id'";
                                $result_actualizar14 = mysqli_query($conn, $sql_actualizar14);
                                    if($conn->query($sql_actualizar14))
                                      {
                                         echo '<div style = "' .$estilos. '"> 
                                         <p> La carrera "'.$carrera.'" se ha eliminado correctamente </p> 
                                         <a href="eliminar.html"><p> Volver </p></a>
                                         </div><br>';
                                      }
                            }
                            else
                            {
                                echo '<div style = "' .$estilos. '" <p> No puedes borrar un dato que esta vacio, tiene que tener un valor </p> </div><br>';
                            }
                        } 
                        else
                        {
                            echo "Error al ejecutar la consulta: " . mysqli_error($conn);
                        }                        
                    }

            } 
                        
            $conn->close();
    
?>