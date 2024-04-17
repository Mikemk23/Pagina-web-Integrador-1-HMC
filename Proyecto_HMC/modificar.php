<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulario de Registro</title>
  <style>

    body {
      font-family: Arial, sans-serif;
      margin: 20px;
    }
    h1 {
      text-align: center;
    }
    form {
      max-width: 500px;
      margin: 0 auto;
      padding: 20px;
      border: 1px solid black;
      border-radius: 5px;
    }
    input[type="text"] {
      display: block;
      margin-bottom: 10px;
      width: 95%;
      padding: 8px;
      font-size: 16px;
      border: 1px solid black;
      border-radius: 5px;
    }
    input[type="submit"] {
      background-color: #4CAF50;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      width: auto;
    }
    input[type="submit"]:hover {
      background-color: #45a049;
    }


    a {
      display: block;
      text-align: center;
      margin-top: 20px;
      color: #007bff; 
      text-decoration: none; 
      border: 1px solid #007bff; 
      padding: 10px 20px;
      border-radius: 5px;
      background-color: #f0f0f0; 
      font-size: 16px;
    }


    a:hover {
      background-color: #007bff; 
      color: white; 
    }
  </style>
</head>
<body>
  <h1>Identifícate</h1>
  <form action="modificar1.php" method="POST">
    <label for="HMC_id_registro">ID:</label>
    <input type="text" id="HMC_id_registro" name="HMC_id_registro" maxlength="50">

    <input type="submit" value="Registrar">
  </form>
  
  <a href="usuario.html">Volver</a>
</body>
</html>


