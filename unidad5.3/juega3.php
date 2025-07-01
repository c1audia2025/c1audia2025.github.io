<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Juega! - Capas de Software de E/S</title>
  <style>
    /* Reset básico y estilos base */
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
      padding: 0 15px 40px; /* padding para footer */
    }
    /* Header igual a otros */
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
    nav ul li a:hover,
    nav ul li a.active {
      color: #ffc107;
    }
    /* Contenedor principal */
    .game-container {
      max-width: 900px;
      margin: 120px auto 40px; /* margen para header fijo */
      background: white;
      border-radius: 12px;
      padding: 20px 30px 30px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }
    h1 {
      color: #0d6efd;
      text-align: center;
      margin-bottom: 20px;
      font-weight: 700;
      font-size: 2rem;
    }
    .instructions {
      margin-bottom: 25px;
      font-size: 1.1rem;
      text-align: center;
      color: #555;
    }
    .principles, .descriptions {
      display: flex;
      gap: 15px;
      flex-wrap: wrap;
      justify-content: center;
      margin-bottom: 30px;
    }
    .principle, .description {
      border: 2px dashed #0d6efd;
      border-radius: 10px;
      width: 180px;
      min-height: 120px;
      background: #e9f0ff;
      padding: 10px;
      box-sizing: border-box;
      text-align: center;
      user-select: none;
    }
    .principle {
      background: #d6e4ff;
      font-weight: 700;
      cursor: default;
      position: relative;
    }
    .principle .icon {
      width: 50px;
      height: 50px;
      margin-bottom: 8px;
    }
    .description {
      background: #f0f4ff;
      cursor: grab;
    }
    .description.dragging {
      opacity: 0.6;
    }
    .dropzone {
      border: 2px dashed #aaa;
      background: #fafafa;
      min-height: 120px;
      margin-top: 10px;
      border-radius: 8px;
      margin-top: 10px;
    }
    .correct {
      border-color: #28a745 !important;
      background: #d4edda !important;
    }
    button {
      display: block;
      margin: 0 auto;
      padding: 12px 30px;
      background: #0d6efd;
      color: white;
      font-weight: 700;
      font-size: 1.1rem;
      border: none;
      border-radius: 25px;
      cursor: pointer;
      transition: background 0.3s ease;
    }
    button:hover {
      background: #084ecf;
    }
    #result {
      text-align: center;
      font-weight: 700;
      margin-top: 20px;
      font-size: 1.2rem;
    }
    /* Footer igual a otros */
    footer {
      background: #212529;
      color: white;
      text-align: center;
      padding: 25px 15px;
      position: fixed;
      bottom: 0;
      width: 100%;
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
  <div class="logo">Unidad V - Sistemas Operativos</div>
  <nav>
    <ul>
      <li><a href="/pagina_sistemas/index.html">Inicio</a></li>
      <li><a href="/pagina_sistemas/cursos.html">Menú</a></li>
      <li><a href="/pagina_sistemas/referencias.html">Referencias</a></li>
      <li><a href="/pagina_sistemas/index.html">Contacto</a></li>
    </ul>
  </nav>
</header>

<div class="game-container">
  
  <h1> Juega y Gana!! : Capas de Software de E/S</h1>
  <p class="instructions">Arrastra cada descripción y suéltala en el principio correcto.</p>
  
  <div class="principles" id="principles">
    <div class="principle" data-key="kernel">
      <img src="https://img.icons8.com/ios-filled/50/0d6efd/processor.png" alt="Kernel" class="icon"/>
      Kernel
      <div class="dropzone" data-accept="kernel"></div>
    </div>
    <div class="principle" data-key="controladores">
      <img src="https://img.icons8.com/ios-filled/50/0d6efd/driver.png" alt="Controladores de Dispositivos" class="icon"/>
      Controladores de Dispositivos
      <div class="dropzone" data-accept="controladores"></div>
    </div>
    <div class="principle" data-key="aplicaciones_usuario">
      <img src="https://img.icons8.com/ios-filled/50/0d6efd/user.png" alt="Aplicaciones en Modo Usuario" class="icon"/>
      Aplicaciones en Modo Usuario
      <div class="dropzone" data-accept="aplicaciones_usuario"></div>
    </div>
    <div class="principle" data-key="manejador_interrupciones">
      <img src="https://img.icons8.com/ios-filled/50/0d6efd/bell.png" alt="Manejador de Interrupciones" class="icon"/>
      Manejador de Interrupciones
      <div class="dropzone" data-accept="manejador_interrupciones"></div>
    </div>
  </div>

  <h3>Descripciones</h3>
  <div class="descriptions" id="descriptions">
    <div class="description" draggable="true" data-key="manejador_interrupciones">
      Código en el kernel que responde a señales de hardware y programa, preservando el estado del sistema.
    </div>
    <div class="description" draggable="true" data-key="controladores">
      Módulos de software que traducen solicitudes del sistema operativo en comandos específicos para el hardware.
    </div>
    <div class="description" draggable="true" data-key="aplicaciones_usuario">
      Proporciona APIs de alto nivel para que las aplicaciones accedan a dispositivos sin interactuar con el kernel.
    </div>
    <div class="description" draggable="true" data-key="kernel">
      Gestión del acceso directo a dispositivos, manejando la complejidad del hardware.
    </div>
  </div>

  <button id="checkBtn">Verificar respuestas</button>
  <div id="result"></div>
</div>

<footer>
  <p>Contacto: duodinamico@unidadV.com | Teléfono: +52 55 61 25 63 13</p>
  <p>Síguenos en 
    <a href="#" target="_blank">Facebook</a>, 
    <a href="#" target="_blank">Twitter</a> y 
    <a href="#" target="_blank">Instagram</a>
  </p>
  <p>© 2025 Unidad V - Todos los derechos reservados</p>
</footer>

<script>
  const descriptions = document.querySelectorAll('.description');
  const dropzones = document.querySelectorAll('.dropzone');
  let draggedItem = null;

  descriptions.forEach(desc => {
    desc.addEventListener('dragstart', e => {
      draggedItem = desc;
      setTimeout(() => desc.classList.add('dragging'), 0);
    });
    desc.addEventListener('dragend', e => {
      draggedItem = null;
      desc.classList.remove('dragging');
    });
  });

  dropzones.forEach(zone => {
    zone.addEventListener('dragover', e => {
      e.preventDefault();
      zone.style.background = '#cce5ff';
    });
    zone.addEventListener('dragleave', e => {
      zone.style.background = '';
    });
    zone.addEventListener('drop', e => {
      e.preventDefault();
      zone.style.background = '';
      if (zone.children.length === 0) {
        zone.appendChild(draggedItem);
      }
    });
  });

  document.getElementById('checkBtn').addEventListener('click', () => {
    let correctCount = 0;
    dropzones.forEach(zone => {
      if (zone.children.length > 0) {
        const droppedKey = zone.children[0].getAttribute('data-key');
        if (droppedKey === zone.getAttribute('data-accept')) {
          zone.classList.add('correct');
          correctCount++;
        } else {
          zone.classList.remove('correct');
        }
      } else {
        zone.classList.remove('correct');
      }
    });
    const total = dropzones.length;
    const resultDiv = document.getElementById('result');
    if (correctCount === total) {
      resultDiv.textContent = `¡Excelente! Todas las respuestas son correctas. (${correctCount} de ${total})`;
      resultDiv.style.color = '#28a745';
    } else {
      resultDiv.textContent = `Tienes ${correctCount} respuestas correctas de ${total}. Sigue intentando.`;
      resultDiv.style.color = '#dc3545';
    }
  });
</script>

</body>
</html>
