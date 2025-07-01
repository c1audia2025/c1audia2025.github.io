<?php
// index.php
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Unidad V</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      line-height: 1.6;
      background-color: #f5f8fa;
      color: #333;
    }
    header {
      background: #0d6efd;
      color: white;
      padding: 10px 40px;
      position: fixed;
      width: 100%;
      top: 0;
      left: 0;
      z-index: 1000;
      box-shadow: 0 2px 5px rgba(0,0,0,0.1);
      display: flex;
      align-items: center;
      justify-content: space-between;
    }
    /* Contenedor para logo izquierdo y texto */
    header .left-group {
      display: flex;
      align-items: center;
      gap: 10px;
      flex-grow: 1;
    }
    header img.left-logo {
      height: 50px;
      object-fit: contain;
    }
    header img.right-logo {
      height: 50px;
      object-fit: contain;
      margin-left: 20px;
    }
    header .logo {
      font-weight: bold;
      font-size: 1.5rem;
      letter-spacing: 1.5px;
      cursor: default;
      text-align: center;
      white-space: nowrap;
    }
    nav ul {
      list-style: none;
      display: flex;
      gap: 25px;
      margin-left: 15px;
    }
    nav ul li a {
      color: white;
      text-decoration: none;
      font-weight: 600;
      transition: color 0.3s ease;
    }
    nav ul li a:hover {
      color: #ffc107;
    }
    .banner {
      margin-top: 80px;
      margin-bottom: 40px;
      background: url('https://images.unsplash.com/photo-1503676260728-1c00da094a0b?auto=format&fit=crop&w=1350&q=80') no-repeat center center/cover;
      height: 400px;
      color: white;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      text-align: center;
      padding: 0 20px;
      text-shadow: 1px 1px 4px rgba(0,0,0,0.7);
      position: relative;
    }
    .banner .bienvenido {
      font-size: 3.5rem;
      font-weight: 900;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      color: #ffc107;
      margin-bottom: 15px;
      text-shadow: 2px 2px 6px rgba(0,0,0,0.8);
    }
    .banner h1 {
      font-size: 2.8rem;
      margin-bottom: 15px;
      font-weight: 900;
      text-transform: uppercase;
    }
    .banner p {
      font-size: 1.2rem;
      margin-bottom: 25px;
    }
    .btn-primary {
      background: #ffc107;
      color: #333;
      padding: 12px 30px;
      border: none;
      border-radius: 25px;
      font-weight: 700;
      font-size: 1rem;
      cursor: pointer;
      text-decoration: none;
      box-shadow: 0 4px 6px rgba(0,0,0,0.2);
      transition: background 0.3s ease;
      display: inline-block;
    }
    .btn-primary:hover {
      background: #e0a800;
    }
    footer {
      background: #212529;
      color: white;
      text-align: center;
      padding: 25px 15px;
      margin-top: 0px;
      font-size: 0.9rem;
    }
    footer a {
      color: #ffc107;
      text-decoration: none;
    }
    footer a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>

<header>
  <div class="left-group">
    <img src="escom.png" alt="Logo Izquierdo" class="left-logo" />
    <div class="logo">Sistemas Operativos</div>
  </div>

  <nav>
    <ul>
      <li><a href="/pagina_sistemas/index.php">Inicio</a></li>
      <li><a href="/pagina_sistemas/videos.php">videos</a></li>
      <li><a href="/pagina_sistemas/referencias.php">Referencias</a></li>
      <li><a href="/pagina_sistemas/dudas.php">Comentarios</a></li>
    </ul>
  </nav>

  <img src="ipn.png" alt="Logo Derecho" class="right-logo" />
</header>

<section id="inicio" class="banner">
  <div class="bienvenido">Bienvenido</div>
  <h1>DISPOSITIVOS DE ENTRADA Y SALIDA</h1>
  <p>Unidad V</p>
  <a href="cursos.php" target="_blank" class="btn-primary">Conoce más...</a>
</section>

<footer>
  <p>Contacto: duodinamico@unidadV.com | Teléfono: +52 55 61 25 63 13</p>
  <p>Síguenos en 
    <a href="#" target="_blank">Facebook</a>, 
    <a href="#" target="_blank">Twitter</a> y 
    <a href="#" target="_blank">Instagram</a>
  </p>
  <p>© 2025 Unidad V - Todos los derechos reservados</p>
</footer>

</body>
</html>


