<?php
session_start();

$categorias = [
    "Entrada" => ["Teclado", "Cámara", "Sensor"],
    "Salida" => ["Monitor", "Impresora", "Altavoces"],
    "Almacenamiento" => ["Disco duro", "SSD", "Unidad USB"],
  ];

$items = [];
foreach ($categorias as $cat => $lista) {
    foreach ($lista as $item) {
        $items[] = $item;
    }
}

// Mezclar los items para que no estén en orden
shuffle($items);

$mensaje = "";
$puntaje = 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $respuestas = $_POST['categoria'] ?? [];
    $puntaje = 0;
    foreach ($respuestas as $item => $cat) {
        $nombreItem = str_replace('item_', '', $item);
        $nombreItem = str_replace('_', ' ', $nombreItem);
        if (in_array($nombreItem, $categorias[$cat] ?? [])) {
            $puntaje++;
        }
    }
    $mensaje = "Has colocado correctamente $puntaje de " . count($items);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Juega!!</title>
<style>
  /* Copiado y adaptado de index.php y cursos.php */

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
      <li><a href="/pagina_sistemas/index.php">Inicio</a></li>
      <li><a href="/pagina_sistemas/cursos.php">Menú</a></li>
       <li><a href="/pagina_sistemas/index.php">Contacto</a></li>
      <li><a href="/pagina_sistemas/referencias.php">Referencias</a></li>
    </ul>
  </nav>
</header>

<main>
  <h1>Juega y aprende: Categoriza los Dispositivos de E/S</h1>
  <h2>Arrastra cada dispositivo y suéltalo en la categoría correcta.</h2>

  <form method="post" id="formJuego">

    <div id="items">
      <?php foreach ($items as $item):
        $idItem = "item_" . str_replace(' ', '_', $item);
      ?>
        <div class="item" draggable="true" id="<?= $idItem ?>"><?= htmlspecialchars($item) ?></div>
        <input type="hidden" name="categoria[<?= $idItem ?>]" id="input_<?= $idItem ?>" value="" />
      <?php endforeach; ?>
    </div>

    <?php foreach ($categorias as $cat => $lista): ?>
      <div class="dropzone" data-categoria="<?= $cat ?>">
        <h3><?= $cat ?></h3>
      </div>
    <?php endforeach; ?>

    <button type="submit">Enviar respuestas</button>
  </form>

  <?php if ($mensaje): ?>
    <p class="mensaje"><?= htmlspecialchars($mensaje) ?></p>
  <?php endif; ?>
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
  const items = document.querySelectorAll('.item');
  const dropzones = document.querySelectorAll('.dropzone');

  items.forEach(item => {
    item.addEventListener('dragstart', dragStart);
  });

  dropzones.forEach(zone => {
    zone.addEventListener('dragover', dragOver);
    zone.addEventListener('drop', drop);
  });

  function dragStart(e) {
    e.dataTransfer.setData('text/plain', e.target.id);
  }

  function dragOver(e) {
    e.preventDefault();
  }

  function drop(e) {
    e.preventDefault();
    const id = e.dataTransfer.getData('text');
    const draggable = document.getElementById(id);
    if (!draggable) return;

    e.currentTarget.appendChild(draggable);

    const categoria = e.currentTarget.getAttribute('data-categoria');
    const input = document.getElementById('input_' + id);
    if (input) {
      input.value = categoria;
    }
  }
/*
respuestas
| Categoría      | Dispositivos correctos        |
| -------------- | ----------------------------- |
| Entrada        | Teclado, Cámara, Sensor       |
| Salida         | Monitor, Impresora, Altavoces |
| Almacenamiento | Disco duro, SSD, Unidad USB   |
 |
*/
</script>

</body>
</html>
