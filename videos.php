<?php
// Array de los videos
$videos = [
    ["title" => "5.1 Principios del hardware de E/S ", "author" => "Paulina, R.", "date" => "2016, 24 de febrero", "url" => "https://www.youtube.com/watch?v=5OA1L_Pp3yM", "embed" => "5OA1L_Pp3yM"],
    ["title" => "5.1.1 Dispositivos de E/S ", "author" => "Luis, R.", "date" => "2021, 18 de junio", "url" => "https://www.youtube.com/watch?v=gK8ZSTiokws", "embed" => "gK8ZSTiokws"],
    ["title" => "5.1.2  Controladores de Dispositivos ", "author" => "Maestro de la Computación", "date" => "2019, 23 de septiembre", "url" => "https://www.youtube.com/watch?v=RULRzrg3auY", "embed" => "RULRzrg3auY"],
    ["title" => "5.1.3 Interrupciones", "author" => "Claudio, G.", "date" => "2021, 10 de marzo", "url" => "https://www.youtube.com/watch?v=0Q6wGDmIVGg", "embed" => "0Q6wGDmIVGg"],
    ["title" => "5.1.4 Acceso de memoria directo (DMA)", "author" => "Tecnología", "date" => "2022, 05 de mayo", "url" => "https://www.youtube.com/watch?v=YiDwDRFAqcw", "embed" => "YiDwDRFAqcw"],
    ["title" => "5.2 Principios del software de E/S", "author" => "TECNOLOGIAS", "date" => "2018,17 de mayo", "url" => "https://www.youtube.com/watch?v=1w3J3gTtU4Q", "embed" => "1w3J3gTtU4Q"],
    ["title" => "5.2.1 Objetivos del Software de E/S", "author" => "Mira como hacerlo", "date" => "2022,28 de octubre", "url" => "https://www.youtube.com/watch?v=fZqYD7D_agk", "embed" => "fZqYD7D_agk"],
    ["title" => "5.2.2 Es Programadas", "author" => "ManageEngineLATAM", "date" => "2021, 13 de julio", "url" => "https://www.youtube.com/watch?v=MU3RSLR9ZT4", "embed" => "MU3RSLR9ZT4"],
    ["title" => "5.2.3 E/S Manejadas por Interrupciones", "author" => "Entorno simple", "date" => "2021, 4 de septiembre", "url" => "https://www.youtube.com/watch?v=vusZZtiVBqs", "embed" => "vusZZtiVBqs"],
    ["title" => "5.2.4 E/S Usado DMA", "author" => "Arquitectura de Computadoras", "date" => "2020, 21 de octubre", "url" => "https://www.youtube.com/watch?v=-58fmXP5xQs", "embed" => "-58fmXP5xQs"],
    ["title" => "5.3 Capas de Software de E/S", "author" => "Jesús, M.", "date" => "2016, 22 de febrero", "url" => "https://www.youtube.com/watch?v=SFKCisRZOwo", "embed" => "SFKCisRZOwo"],
    ["title" => "5.3.1 Manejador de Interrupciones", "author" => "Diego, L.", "date" => "2020, 16 de noviembre", "url" => "https://www.youtube.com/watch?v=yodCCipfS5g", "embed" => "yodCCipfS5g"],
    ["title" => "5.3.2 Controladores de Dispositivos", "author" => "Andrés, W.", "date" => "2021, 06 de enero", "url" => "https://www.youtube.com/watch?v=6UdMlaVE4og", "embed" => "6UdMlaVE4og"],
    ["title" => "5.3.3 Software en Modo Usuario para E/S", "author" => "Computer", "date" => "2018, 07 de enero", "url" => "https://www.youtube.com/watch?v=6EI3Ig7efWY", "embed" => "6EI3Ig7efWY"]
];
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Videos Educativos - Sistemas Operativos</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #f5f8fa;
      color: #333;
      line-height: 1.6;
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
    nav ul li a:hover {
      color: #ffc107;
    }
    nav ul li a.active {
      color: #ffc107;
    }
    main {
      max-width: 900px;
      margin: 120px auto 60px;
      padding: 20px;
      background: white;
      border-radius: 12px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
    h1 {
      color: #0d6efd;
      margin-bottom: 20px;
    }
    h2 {
      margin-top: 20px;
      margin-bottom: 15px;
      color: #0d6efd;
    }
    p {
      margin-bottom: 15px;
    }
    ul {
      margin-left: 20px;
      margin-bottom: 15px;
    }
    p.conclusion {
      font-weight: 600;
      margin-top: 25px;
    }
    footer {
      background: #212529;
      color: white;
      text-align: center;
      padding: 25px 15px;
      font-size: 0.9rem;
    }
    footer a {
      color: #ffc107;
      text-decoration: none;
    }
    footer a:hover {
      text-decoration: underline;
    }

    /* Estilos de los videos */
    .video-container {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 20px;
      margin-top: 40px;
    }

    .video-card {
      background-color: #fff;
      border-radius: 8px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      overflow: hidden;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .video-card:hover {
      transform: translateY(-10px);
      box-shadow: 0 8px 14px rgba(0, 0, 0, 0.2);
    }

    .video-card iframe {
      width: 100%;
      height: 250px;
      border: none;
      border-radius: 8px;
    }

    .video-card .content {
      padding: 15px;
    }

    .video-card .content h3 {
      margin: 0;
      color: #333;
    }

    .video-card .content p {
      font-size: 14px;
      color: #777;
    }

    .video-card .content a {
      display: inline-block;
      background-color: #0d6efd;
      color: white;
      padding: 8px 15px;
      text-decoration: none;
      border-radius: 4px;
      margin-top: 15px;
      transition: background-color 0.3s ease;
    }

    .video-card .content a:hover {
      background-color: #357abd;
    }
  </style>
</head>
<body>

<header>
  <div class="logo">Sistemas Operativos</div>
  <nav>
    <ul>
      <li><a href="/pagina_sistemas/index.php">Inicio</a></li>
      <li><a href="/pagina_sistemas/cursos.php" class="active">Menú</a></li>
    </ul>
  </nav>
</header>

<main>
  <h1>Lista de Videos Educativos</h1>
  
  <div class="video-container">
    <?php foreach ($videos as $video): ?>
      <div class="video-card">
        <iframe src="https://www.youtube.com/embed/<?php echo $video['embed']; ?>" title="<?php echo $video['title']; ?>" allowfullscreen></iframe>
        <div class="content">
          <h3><?php echo $video['title']; ?></h3>
          <p><strong>Autor:</strong> <?php echo $video['author']; ?></p>
          <p><strong>Fecha:</strong> <?php echo $video['date']; ?></p>
          <a href="<?php echo $video['url']; ?>" target="_blank">Ver Video</a>
        </div>
      </div>
    <?php endforeach; ?>
  </div>

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
