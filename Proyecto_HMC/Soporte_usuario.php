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


  <!-- Seccion de Contacto -->

  <section class="contact_section layout_padding">
    <div class="custom_heading-container">
      <h5 class=" ">
        Soporte
      </h5>
    </div>
    <div class="container layout_padding2-top">
      <div class="row">
        <div class="col-md-6 mx-auto">
          <form action="">
            <div>
              <input type="text" placeholder="NOMBRE">
            </div>
            <div>
              <input type="email" placeholder="E-MAIL">
            </div>
            <div>
              <input type="text" placeholder="TELEFONO">
            </div>
            <div>
              <select name="" id="">
                <option value="" disabled selected>TIPO DE SERVICIO</option>
                <option value="">Servicio</option>
                <option value="">Servicio</option>
                <option value="">Servicio</option>
              </select>
            </div>
            <div>
              <input type="text" class="message-box" placeholder="MENSAJE">
            </div>
            <div class="d-flex justify-content-center ">
              <button>
                ENVIAR
              </button>
              <br>
              <br>
              <br>
            </div>
          </form>
        </div>
      </div>

    </div>
  </section>

  <!-- end contact section -->

  <!-- SEccion de informacion -->
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