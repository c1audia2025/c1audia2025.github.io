<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Juega!!</title>
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
        main {
            max-width: 1100px;
            margin: auto;
            padding: 120px 20px 60px; /* espacio para header fijo */
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        h1 {
            color: #0d6efd;
            margin-bottom: 15px;
        }
        h2 {
            margin-bottom: 20px;
            color: #0d6efd;
        }

        /* Estilos drag and drop adaptados */
        #items, .dropzone {
            border: 2px dashed #ccc;
            border-radius: 8px;
            min-height: 50px;
            padding: 10px;
            margin-bottom: 20px;
            background: white;
        }
        #items {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }
        .item {
            padding: 8px 15px;
            background: #0d6efd;
            color: white;
            border-radius: 20px;
            cursor: grab;
            user-select: none;
            transition: background 0.3s ease;
        }
        .item:active {
            cursor: grabbing;
            background: #0b5ed7;
        }
        .dropzone {
            margin-bottom: 30px;
            min-height: 70px;
        }
        .dropzone h3 {
            margin-top: 0;
            color: #0d6efd;
        }
        .dropzone .item {
            margin: 5px 5px 0 0;
            cursor: default;
        }
        button {
            background: #0d6efd;
            color: white;
            padding: 12px 25px;
            border: none;
            border-radius: 20px;
            font-weight: 700;
            cursor: pointer;
            font-size: 1rem;
            transition: background 0.3s ease;
        }
        button:hover {
            background: #0b5ed7;
        }
        .mensaje {
            margin-top: 15px;
            font-weight: bold;
            color: green;
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
  <div class="logo">Sistemas Operativos</div>
  <nav>
    <ul>
      <li><a href="#">Inicio</a></li>
      <li><a href="#" class="active">Menú</a></li>
      <li><a href="#">Contacto</a></li>
    </ul>
  </nav>
</header>

<main>
  <h1>Juega y aprende: Categoriza los Dispositivos de E/S</h1>
  <h2>Arrastra cada dispositivo y suéltalo en la categoría correcta.</h2>

  <form method="post" id="formJuego">

    <div id="items">
      <!-- Dispositivos generados dinámicamente -->
    </div>

    <div class="dropzone" data-categoria="Entrada">
      <h3>Entrada</h3>
    </div>
    <div class="dropzone" data-categoria="Salida">
      <h3>Salida</h3>
    </div>
    <div class="dropzone" data-categoria="Almacenamiento">
      <h3>Almacenamiento</h3>
    </div>

    <button type="submit">Enviar respuestas</button>
  </form>

  <div id="resultado" class="mensaje"></div>
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
  const categorias = {
    "Entrada": ["Teclado", "Cámara", "Sensor"],
    "Salida": ["Monitor", "Impresora", "Altavoces"],
    "Almacenamiento": ["Disco duro", "SSD", "Unidad USB"]
  };

  // Mezclar los elementos para que no estén en orden
  const items = [];
  Object.values(categorias).forEach(lista => {
    lista.forEach(item => items.push(item));
  });
  shuffle(items);

  // Mostrar los dispositivos
  const itemsContainer = document.getElementById("items");
  items.forEach(item => {
    const div = document.createElement("div");
    div.classList.add("item");
    div.textContent = item;
    div.draggable = true;
    div.addEventListener('dragstart', dragStart);
    itemsContainer.appendChild(div);
  });

  // Funciones de arrastrar
  function dragStart(e) {
    e.dataTransfer.setData('text', e.target.textContent);
  }

  const dropzones = document.querySelectorAll('.dropzone');
  dropzones.forEach(zone => {
    zone.addEventListener('dragover', dragOver);
    zone.addEventListener('drop', drop);
  });

  function dragOver(e) {
    e.preventDefault();
  }

  function drop(e) {
    e.preventDefault();
    const draggedItem = e.dataTransfer.getData('text');
    const category = e.target.getAttribute('data-categoria');
    
    if (!categorias[category].includes(draggedItem)) {
      alert("¡Categoría incorrecta! Este elemento no pertenece a " + category);
    } else {
      const div = document.createElement("div");
      div.textContent = draggedItem;
      e.target.appendChild(div);
    }
  }

  // Función para barajar los elementos
  function shuffle(array) {
    for (let i = array.length - 1; i > 0; i--) {
      const j = Math.floor(Math.random() * (i + 1));
      [array[i], array[j]] = [array[j], array[i]];
    }
  }

  // Función para enviar las respuestas
  document.getElementById("formJuego").addEventListener('submit', function(event) {
    event.preventDefault();
    let puntaje = 0;
    
    // Comprobar si cada zona tiene los elementos correctos
    dropzones.forEach(zone => {
      const category = zone.getAttribute('data-categoria');
      const zoneItems = Array.from(zone.children).map(item => item.textContent);
      const correctItems = categorias[category];
      const correctCount = zoneItems.filter(item => correctItems.includes(item)).length;
      puntaje += correctCount;
    });

    document.getElementById("resultado").textContent = `Puntaje: ${puntaje} de ${items.length}`;
  });
</script>

</body>
</html>
