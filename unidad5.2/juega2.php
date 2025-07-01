<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Juega </title>
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
    padding-bottom: 60px; /* para no tapar footer */
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
  /* Main container */
  main {
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
    font-size: 0.9rem;
    position: fixed;
    bottom: 0;
    width: 100%;
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
  <div class="logo">Sistemas Operativos</div>
  <nav>
    <ul>
      <li><a href="/pagina_sistemas/index.php">Inicio</a></li>
      <li><a href="/pagina_sistemas/cursos.php">Menú</a></li>
      <li><a href="/pagina_sistemas/index.php">Contacto</a></li>
      <li><a href="/pagina_sistemas/referencias.php">Referencias</a></li>
    </ul>
  </nav>
</header>

<main>
  <h1>Juega y Gana!!!</h1>
  <p class="instructions">Arrastra cada descripción y suéltala en el principio correcto.</p>
  
  <div class="principles" id="principles">
    <div class="principle" data-key="independencia">
      <img src="https://img.icons8.com/ios-filled/50/0d6efd/network.png" alt="Independencia del dispositivo" class="icon"/>
      Independencia del dispositivo
      <div class="dropzone" data-accept="independencia"></div>
    </div>
    <div class="principle" data-key="manejo_errores">
      <img src="https://img.icons8.com/ios-filled/50/0d6efd/error.png" alt="Manejo de errores" class="icon"/>
      Manejo de errores
      <div class="dropzone" data-accept="manejo_errores"></div>
    </div>
    <div class="principle" data-key="rendimiento">
      <img src="https://img.icons8.com/ios-filled/50/0d6efd/speed.png" alt="Rendimiento" class="icon"/>
      Rendimiento
      <div class="dropzone" data-accept="rendimiento"></div>
    </div>
    <div class="principle" data-key="polling">
      <img src="https://img.icons8.com/ios-filled/50/0d6efd/refresh.png" alt="E/S Programada (Polling)" class="icon"/>
      E/S Programada (Polling)
      <div class="dropzone" data-accept="polling"></div>
    </div>
    <div class="principle" data-key="interrupciones">
      <img src="https://img.icons8.com/ios-filled/50/0d6efd/bell.png" alt="E/S por Interrupciones" class="icon"/>
      E/S por Interrupciones
      <div class="dropzone" data-accept="interrupciones"></div>
    </div>
    <div class="principle" data-key="dma">
      <img src="https://img.icons8.com/ios-filled/50/0d6efd/connection-status-off.png" alt="E/S con DMA" class="icon"/>
      E/S con DMA
      <div class="dropzone" data-accept="dma"></div>
    </div>
    <div class="principle" data-key="memoria_map">
      <img src="https://img.icons8.com/ios-filled/50/0d6efd/memory-slot.png" alt="E/S Mapeada en Memoria" class="icon"/>
      E/S Mapeada en Memoria
      <div class="dropzone" data-accept="memoria_map"></div>
    </div>
  </div>

  <h3>Descripciones</h3>
  <div class="descriptions" id="descriptions">
    <div class="description" draggable="true" data-key="manejo_errores">
      Detección y recuperación ante fallos como disco lleno.
    </div>
    <div class="description" draggable="true" data-key="polling">
      La CPU verifica constantemente el estado del dispositivo, es simple pero ineficiente.
    </div>
    <div class="description" draggable="true" data-key="dma">
      Transfiere datos sin intervención constante de la CPU, ideal para operaciones masivas.
    </div>
    <div class="description" draggable="true" data-key="interrupciones">
      El dispositivo notifica a la CPU cuando está listo, liberando la CPU para otras tareas.
    </div>
    <div class="description" draggable="true" data-key="independencia">
      Aplicaciones acceden a dispositivos mediante interfaces uniformes.
    </div>
    <div class="description" draggable="true" data-key="rendimiento">
      Minimiza latencias mediante técnicas como buffering.
    </div>
    <div class="description" draggable="true" data-key="memoria_map">
      Los dispositivos se direccionan como posiciones de memoria, evitando instrucciones especiales.
    </div>
  </div>

  <button id="checkBtn">Verificar respuestas</button>
  <div id="result"></div>
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

/*
1.Independencia del dispositivo

Descripción correcta: Aplicaciones acceden a dispositivos mediante interfaces uniformes.

2.Manejo de errores

Descripción correcta: Detección y recuperación ante fallos como disco lleno.

3.Rendimiento

Descripción correcta: Minimiza latencias mediante técnicas como buffering.

4.E/S Programada (Polling)

Descripción correcta: La CPU verifica constantemente el estado del dispositivo, es simple pero ineficiente.

5.E/S por Interrupciones

Descripción correcta: El dispositivo notifica a la CPU cuando está listo, liberando la CPU para otras tareas.

6.E/S con DMA

Descripción correcta: Transfiere datos sin intervención constante de la CPU, ideal para operaciones masivas.

7.E/S Mapeada en Memoria

Descripción correcta: Los dispositivos se direccionan como posiciones de memoria, evitando instrucciones especiales.
*/

</script>

</body>
</html>
