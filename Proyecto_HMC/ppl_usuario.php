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
    <link rel="stylesheet" href="app.css">
    <script defer src="app.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
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



<!-- slider section -->
<div class="carrousel">
  <div class="grande">
      <img src="Imagenes/E.jpeg" alt="Imagen 1" class="img">
      <img src="Imagenes/R.jpeg" alt="Imagen 2" class="img">
      <img src="Imagenes/slider-img.jpg" alt="Imagen 3" class="img">

  </div>

  <ul class="puntos">
      <li class="punto activo"></li>
      <li class="punto"></li>
  </ul>
</div>

  <!-- end slider section -->

  <!-- contact section -->
  <section class="about_section layout_padding">
    <div class="container">
      <div class="custom_heading-container">
        <h3 class=" ">
          ACERCA DE NUESTRA COMPAÑIA
        </h3>
      </div>
      <p class="layout_padding2-top">
        HMC es una empresa especializada en ofrecer servicios y soluciones de ciberseguridad para proteger a individuos y organizaciones contra amenazas digitales. Nuestro equipo de expertos en seguridad informática trabaja arduamente para identificar vulnerabilidades, implementar medidas de prevención y responder eficientemente a incidentes de seguridad.
      </p>
      <div class="img-box layout_padding2">
        <img src="Imagenes/Logo.png" alt="">
      </div>
      <p class="layout_padding2-bottom">
        Nuestra misión es salvaguardar la integridad, confidencialidad y disponibilidad de la información de nuestros clientes, asegurando que puedan operar en un entorno digital seguro y confiable. Buscamos ser líderes en la industria de la ciberseguridad y ser reconocidos por nuestra excelencia en la protección de datos y sistemas frente a los desafíos del ciberespacio.


        Estamos ubicados en Guadalupe, "52107 San Mateo Atenco, Méx."
    </p>
    <img id="Mapa" src="Imagenes/Ubicacion.png" alt="">
    </div>
    <div class="container">
      <div class="btn-box">
        <a href="Nosotros.html">
          Read More
        </a>
        <hr>
      </div>
    </div>
  </section>
  <!-- end contact section -->

  <section class="client_section layout_padding-bottom">
    <div class="container">
      <div class="custom_heading-container">
        <h3 class=" ">
          Miembros de la Familia HMC
        </h3>
      </div>
      <div class="layout_padding2-top">
        <div class="client_container">
          <div class="detail-box">
            <p>
              Experto en ciberseguridad informatica con una gran capacidad de entender y solucionar problemas, es una persona que le gusta lo que hace y 
              siempre busca mejorar para brindar una mejor experiencia y para obtener una mayor calidad dentro de su trabajo, 
              
              "La seguridad es pensar, "Como yo me atacaria" y crear una estrategia en base a eso" -Jorge Alberto Sanchez Cobos 2023
            </p>
          </div>
          <div class="client_id">
            <div class="img-box">
              <img src="Imagenes/3939_838a30ecc2afeabb65e6acdc063.jpg" alt="">
            </div>
            <div class="name">
              <h5>
                Jorge Alberto Sanchez Cobos
              </h5>
              <h6>
                Programador
              </h6>
            </div>
          </div>
        </div>
      </div>

      <div class="layout_padding2-top">
        <div class="client_container">
          <div class="detail-box">
            <p>
              Experto en instalaciones electricas y de comunicacion, siempre buscara la mejor manera posible para 
              lograr crear una instalacion lo mas segura y perfecta humanamente posible tanto para el usuario, como para 
              el sistema en general, es una persona muy apasionada que su principal objetivo es ayudar.
              
              "Un avance que no brinde un bien comun no es nada" -Hector Adrian Mendoza Machorro 2020
            </p>
          </div>
          <div class="client_id">
            <div class="img-box">
              <img src="Imagenes/WhatsApp Image 2023-05-31 at 9.3.jpg" alt="">
            </div>
            <div class="name">
              <h5>
                Hector Adrian Mendoza Machorro
              </h5>
              <h6>
                Tecnico
              </h6>
            </div>
          </div>
        </div>
      </div>

      <div class="layout_padding2-top">
        <div class="client_container">
          <div class="detail-box">
            <p>
              El CEO de HCM, es un emprendedor experto en informatica, negocios y ciberseguridad informatica que se especializo en seguridad 
              estructurada e instalaciones de seguridad, siempre busca un avance dentro de su empresa y mejorar tanto en personal como en su 
              calidad de sus productos y servicios.
              
              "El destino guia a los dispuestos, a los que no lo estan, los hace sucumbir"
            </p>
          </div>
          <div class="client_id">
            <div class="img-box">
              <img src="Imagenes/foto.jpg" alt="">
            </div>
            <div class="name">
              <h5>
                Miguel Angel Diaz Valencia
              </h5>
              <h6>
                CEO
              </h6>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Seccion de Informacion -->
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
