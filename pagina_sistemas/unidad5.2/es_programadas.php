<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>5.2.2 E/S Programadas</title>
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
    h3 {
      margin-top: 15px;
      margin-bottom: 8px;
      color: #0d6efd;
      font-weight: 600;
    }
    p {
      margin-bottom: 15px;
    }
    ul {
      margin-left: 20px;
      margin-bottom: 15px;
    }
    li {
      margin-bottom: 8px;
    }
    p.conclusion {
      font-weight: 600;
      margin-top: 25px;
    }
    code {
      background-color: #e9ecef;
      padding: 2px 5px;
      border-radius: 3px;
      font-family: monospace;
    }
    a {
      color: #0d6efd;
      text-decoration: none;
    }
    a:hover {
      text-decoration: underline;
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

    /* Estilo para la imagen */
    img {
      max-width: 100%;
      height: auto;
      border-radius: 8px;
      margin-top: 20px;
    }
  </style>
</head>
<body>

<header>
  <div class="logo">Sistemas Operativos</div>
  <nav>
    <ul>
      <li><a href="/pagina_sistemas/index.html">Inicio</a></li>
      <li><a href="/pagina_sistemas/cursos.html" class="active">Menú</a></li>
      <li><a href="/pagina_sistemas/videos.html">Videos</a></li>
    </ul>
  </nav>
</header>

<main>
  <h1>5.2.2 E/S Programadas</h1>

  <h2>Introducción</h2>
  <p>La programada (o polling) requiere que la CPU verifique constantemente el estado del dispositivo, consumiendo ciclos de procesador (Patterson & Hennessy, 2021).</p>

  <h2>Tipos</h2>

  <h3>Polling Activo</h3>
  <ul>
    <li>La CPU consulta constantemente el estado del dispositivo en un bucle cerrado.</li>
    <li>Como señala Tanenbaum (2022), "este método es conceptualmente simple pero extremadamente ineficiente en términos de uso de la CPU" (p. 231). Un ejemplo típico sería la lectura de un puerto GPIO en sistemas embebidos sencillos.</li>
  </ul>

  <h3>Polling por Temporización</h3>
  <ul>
    <li>En este enfoque, la CPU verifica el dispositivo a intervalos regulares predefinidos.</li>
    <li>Patterson y Hennessy (2021) destacan que "el polling temporizado puede reducir el consumo de CPU comparado con el polling activo, a costa de aumentar la latencia" (p. 389). Se usa comúnmente en sistemas de monitorización de sensores.</li>
  </ul>

  <h3>Polling con Espera Ocupada</h3>
  <ul>
    <li>Como explica Stallings (2021), "en este modo, la CPU permanece completamente dedicada a la operación de E/S hasta su completación, lo que la hace adecuada para sistemas de tiempo real crítico donde la predictibilidad es esencial" (p. 182).</li>
  </ul>

  <h2>Características</h2>
  <ul>
    <li>Implementación simple: Bajo overhead de software.</li>
    <li>Ineficiente: La CPU queda bloqueada en bucles de espera.</li>
  </ul>

  <h2>Caso de uso</h2>
  <p>Dispositivos ultra-rápidos donde el polling es menos costoso que manejar interrupciones (ej: GPUs en ciertas operaciones).</p>

  <h2>Ejemplo:</h2>
  <img src="/pagina_sistemas/unidad5.2/ejemplop.png" alt="Ejemplo de E/S Programadas" />

  <h2>Video</h2>
  <p>ManageEngineLATAM. (2021, 13 de julio). ¿Qué es polling de dispositivos?. YouTube. <a href="https://www.youtube.com/watch?v=MU3RSLR9ZT4" target="_blank">Ver video</a></p>

  <h2>Conclusión</h2>
  <p>Solo recomendables para escenarios específicos por su alto costo computacional. Es útil en escenarios donde la simplicidad y el control directo son prioritarios, pero su ineficiencia la hace inviable para sistemas con múltiples dispositivos o cargas de trabajo intensivas.</p>

  <p><a href="/pagina_sistemas/cursos.html">← Volver a Subtemas</a></p>
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



