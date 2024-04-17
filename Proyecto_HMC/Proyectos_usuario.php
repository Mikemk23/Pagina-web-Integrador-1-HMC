<?php
session_start();
$ID = $_SESSION['HMC_id_registro'];

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


                $conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HMC</title>
    <link rel="stylesheet" href="ppl2.css">
</head>
<body>
    <header class="header">
        <div class="logo">
<!---->            <img src="Imagenes/Logo.png" alt="Logo de la marca">
        </div>
        <nav>
           <ul class="nav-links">
                <li><a href="ppl_usuario.php">Inicio</a></li>
                <li><a href="Proyectos_usuario.php">Proyectos</a></li>
                <li><a href="Nosotros_usuario.php">Nosotros</a></li>
                <li><a href="Soporte_usuario.php">Soporte</a></li>
           </ul>            
        </nav>
        <a class="btn" href="usuario.php"><button><?php echo $ID; ?></button></a>

<!---->        <a onclick="openNav()" class="menu" href="#"><button>Menu</button></a>

<!---->        <div id="mobile-menu" class="overlay">
<!---->            <a onclick="closeNav()" href="" class="close">&times;</a>
<!---->            <div class="overlay-content">
<!---->                <a href="ppl_usuario.php">Inicio</a>
<!---->                <a href="Proyectos_usuario.php">Proyectos</a>
<!---->                <a href="Nosotros_usuario.php">Nosotros</a>
                       <a href="Soporte_usuario.php">Soporte</a>
<!---->                <a href="usuario.php"><?php echo $ID; ?></a>
<!---->            </div>
<!---->        </div>
    </header>
<!---->    <script type="text/javascript" src="nav.js"></script>

<!--Seccion de Proyectos-->
<section class="service_section layout_padding">
    <div class="container">
      <div class="custom_heading-container">
        <h3 class=" ">
          NUESTROS SERVICOS
        </h3>
      </div>
      <p class="">
        Nuestros Servicos ofrecidos por HMC services en la pagina web
        Aqui sabras como se van desarrollando nuestros servios y los avances significativos
      </p>
      <div class="service_container ">
        <div class="row">
          <div class="col-md-3">
            <div class="box b-1">
              <div class="img-box">
              </div>
              <div class="detail-box">
                <h6>
                  Encriptacion de Contraseñas
                </h6>
                <p>
                  Para nuestra encriptacionde contraseñas, usamos una encriptacion asimetrica para lograr 
                  una mayor seguridad y aseguramos su informacion guardandola en servidores privados. 
                </p>
                <div class="btn-box">
                  <a href="">
                    Read More
                  </a>
                  <hr>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="box b-2">
              <div class="img-box">
              </div>
              <div class="detail-box">
                <h6>
                  Certificacion de Puertos
                </h6>
                <p>
                  Ofrecemos el servicio de certificacion de puertos, el cual sirve para dar una certeza de que en ningun momento
                  fallara la comunicación entre los varios dispositivos que seran usados para su sistema de seguridad y asegura que todos los cables son de la mayor calidad posible. 
                </p>
                <div class="btn-box">
                  <a href="">
                    Read More
                  </a>
                  <hr>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="box b-3">
              <div class="img-box">
              </div>
              <div class="detail-box">
                <h6>
                  Capacitacion en Sistemas de seguridad
                </h6>
                <p>
                 Constantemente hacemos capacitaciones profecionales y basicas para personas que quieren entrar en el mundo de la informatica
                tanto para personas que quieren mejorar su experiencia profesional, asi como tambien daremos capacitaciones especializadas
                a los tecnicos que busquen trabajar con nosotros y formar parte del equipo HMC.  
                </p>
                <div class="btn-box">
                  <a href="">
                    Read  More
                  </a>
                  <hr>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="box b-4">
              <div class="img-box">
              </div>
              <div class="detail-box">
                <h6>
                  Acceso de Usuarios
                </h6>
                <p>
                  Creamos un sistema de acceso seguro para nuestros usuarios por medio de un usuario y una contraseña
                  y son usados para que su informacion sea segura, privada y que ademas logre que el usuario tenga la certeza de que su informacion 
                  sera resguardada con seguridad de primer nivel.
                </p>
                <div class="btn-box">
                  <a href="">
                    Read More
                  </a>
                  <hr>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


<!--Seccion de Informacion-->


  <section class="info_section layout_padding">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <div class="info-logo">
            <h4>
              HMC
            </h4>
            <p>
              <h3>!Tu Seguridad en Nuestras Manos¡</h3>
          </div>
        </div>
        <div class="col-md-3">
          <div class="info-contact">
            <h4>
              INFORMACION DE CONTACTO
            </h4>
            <div class="location">
              <h6>
                Direccion:
              </h6>
              <a href="https://goo.gl/maps/xNyz8mbFQC32keHJA">
                <img src="Imagenes/location.png" alt="">
                <span>
                  AV. Juarez #1133, San Mateo Atenco, EDOMEX
                </span>
              </a>
            </div>
            <div class="call">
              <h6>
                Customer Service:
              </h6>
                <img src="Imagenes/telephone.png" alt="">
                <span>
                  ( 7227536699 )
                </span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="container-fluid footer_section">
    <p>
      Copyright &copy; 2019 All Rights Reserved By HMC
    </p>
  </section>

</body>
</html>