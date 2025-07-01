<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Menú</title>
  <style>
    /* Mismos estilos que index.php para consistencia */
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
      padding: 20px 40px;
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
    header .logo {
      font-weight: bold;
      font-size: 1.5rem;
      letter-spacing: 1.5px;
      cursor: default;
    }
    nav ul {
      list-style: none;
      display: flex;
      gap: 25px;
    }
    nav ul li a {
      color: white;
      text-decoration: none;
      font-weight: 600;
      transition: color 0.3s ease;
    }

    nav ul li a:hover, nav ul li a.active {
      color: #ffc107;
    }
    main {
      padding-top: 100px;
      max-width: 1100px;
      margin: auto;
      padding-left: 20px;
      padding-right: 20px;
    }
    h2.section-title {
      text-align: center;
      margin-bottom: 40px;
      font-size: 2rem;
      color: #0d6efd;
    }
    .cards-container {
      display: grid;
      grid-template-columns: repeat(auto-fit,minmax(280px,1fr));
      gap: 20px;
    }
    .card {
      background: white;
      padding: 20px;
      border-radius: 12px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      transition: transform 0.3s ease;
    }
    .card:hover {
      transform: translateY(-8px);
      box-shadow: 0 8px 16px rgba(0,0,0,0.15);
    }
    .card h3 {
      margin-bottom: 12px;
      color: #0d6efd;
    }
    .card p {
      flex-grow: 1;
      margin-bottom: 15px;
      color: #555;
    }
    .card .btn-secondary {
      align-self: flex-start;
      padding: 10px 22px;
      border-radius: 20px;
      background: #0d6efd;
      color: white;
      font-weight: 600;
      text-decoration: none;
      transition: background 0.3s ease;
    }
    .card .btn-secondary:hover {
      background: #0b5ed7;
    }
    footer {
      background: #212529;
      color: white;
      text-align: center;
      padding: 25px 15px;
      margin-top: 60px;
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
  <div class="logo">sistemas operativos</div>
  <nav>
    <ul>
      <li><a href="/pagina_sistemas/index.php">Inicio</a></li>
      <li><a href="index.php">Contacto</a></li>
      <li><a href="/pagina_sistemas/videos.php">videos</a></li>
      <li><a href="referencias.php">Referencias</a></li>
      <li><a href="/pagina_sistemas/dudas.php">Comentarios</a></li>
      <li><a href="index.php" class="active">  </a></li>
      
    </ul>
  </nav>
</header>

<main>
  <section id="cursos">
    <h2 class="section-title"> Menú </h2>
    <h2><p>Selecciona un tema para explorar el contenido y practicar.</p></h2>
    <div class="cards-container">
     <article class="card">
  <h3>5.1 Principios del hardware de E/S</h3>
  <p><a href="/pagina_sistemas/unidad5.1/introduccion.php" target="_blank">Introduccíon</a></p>
  <p><a href="/pagina_sistemas/unidad5.1/dispositivos.php" target="_blank">5.1.1 Dispositivos de E/S</a></p>
  <p><a href="/pagina_sistemas/unidad5.1/controladores.php" target="_blank">5.1.2 Controladores de Dispositivos</a></p>
  <p><a href="/pagina_sistemas/unidad5.1/interrupciones.php" target="_blank">5.1.3 Interrupciones</a></p>
  <p><a href="/pagina_sistemas/unidad5.1/dma.php" target="_blank">5.1.4 Acceso de memoria directo (DMA)</a></p>
  <div>
  <a href="/pagina_sistemas/unidad5.1/formulario.php" target="_blank" class="btn-secondary">Prueba lo aprendido</a>
  <a href="/pagina_sistemas/unidad5.1/juego/juega.php" target="_blank" class="btn-secondary">juega!</a>

  <div/>
</article>

<article class="card">

        <h3>5.2 Principios del software de E/S</h3>
    <p><a href="/pagina_sistemas/unidad5.2/introduccion2.php" target="_blank">Introduccíon</a></p>
    <p><a href="/pagina_sistemas/unidad5.2/objetivos.php" target="_blank">5.2.1 Objetivos del Software de E/S</a></p>
    <p><a href="/pagina_sistemas/unidad5.2/es_programadas.php" target="_blank">5.2.2 Es Programadas</a></p>
    <p><a href="/pagina_sistemas/unidad5.2/manejadas_por_interrupciones.php" target="_blank">5.2.3 E/S Manejadas por Interrupciones</a></p>
    <p><a href="/pagina_sistemas/unidad5.2/uso_dma.php" target="_blank">5.2.4 E/S Usado DMA</a></p>
    <div>
      <a href="/pagina_sistemas/unidad5.2/formulario2.php" target="_blank" class="btn-secondary">Prueba lo aprendido</a>
      <a href="/pagina_sistemas/unidad5.2/juega2.php" target="_blank" class="btn-secondary">Juega!</a>
    </div>
      </article>



      <article class="card">
       <h3>5.3 Capas de Software de E/S</h3>
  <p><a href="/pagina_sistemas/unidad5.3/introduccion3.php" target="_blank">Introduccíon</a></p>
  <p><a href="/pagina_sistemas/unidad5.3/manejador_de_interrupciones.php" target="_blank">5.3.1 Manejador de Interrupciones</a></p>
  <p><a href="/pagina_sistemas/unidad5.3/controladores_de_dispositivos.php" target="_blank">5.3.2 Controladores de Dispositivos</a></p>
  <p><a href="/pagina_sistemas/unidad5.3/software_usuario.php" target="_blank">5.3.3 Software en Modo Usuario para E/S</a></p>
  <div>
    <a href="/pagina_sistemas/unidad5.3/formulario3.php" target="_blank" class="btn-secondary">Prueba lo aprendido</a>
    <a href="/pagina_sistemas/unidad5.3/juega3.php" target="_blank" class="btn-secondary">Juega!</a>
  </div>
</article>
  </section>
</main>

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
