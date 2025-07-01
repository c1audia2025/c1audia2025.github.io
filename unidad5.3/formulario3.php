<?php
$respuestas_correctas = [
    'pregunta1' => [
        'correcta' => 'abstraer_complejidad',
        'explicacion' => [
            'abstraer_complejidad' => 'Correcto: El propósito principal del software de E/S organizado en capas es abstraer la complejidad del hardware y facilitar el desarrollo de aplicaciones eficientes.',
            'optimizar_rendimiento' => 'Incorrecto: Aunque es una ventaja, no es el propósito principal.',
            'gestionar_hardware' => 'Incorrecto: No es solo la gestión del hardware, sino la abstracción del hardware.',
            'facilitar_conexion' => 'Incorrecto: La conexión no es el propósito principal del software de E/S en capas.'
        ]
    ],
    'pregunta2' => [
        'correcta' => 'manejador_interrupciones',
        'explicacion' => [
            'manejador_interrupciones' => 'Correcto: El manejador de interrupciones (ISR) maneja las señales del hardware en el sistema operativo, preservando el estado del sistema.',
            'driver_dispositivo' => 'Incorrecto: El driver del dispositivo no maneja las señales del hardware directamente, sino que traduce las solicitudes del sistema operativo.',
            'aplicacion_usuario' => 'Incorrecto: Las aplicaciones de usuario no manejan señales del hardware directamente.',
            'kernel' => 'Incorrecto: El kernel gestiona el sistema, pero las señales son atendidas por el manejador de interrupciones.'
        ]
    ],
    'pregunta3' => [
        'correcta' => 'salvar_contexto',
        'explicacion' => [
            'salvar_contexto' => 'Correcto: El manejador de interrupciones salva el contexto del CPU, ejecuta la rutina de atención y luego restaura el contexto del proceso interrumpido.',
            'ejecutar_rutina' => 'Incorrecto: Ejecutar la rutina es una de las funciones, pero no es la única.',
            'restaurar_contexto' => 'Incorrecto: Restaurar el contexto también es necesario, pero es solo una parte del proceso.',
            'atender_evento' => 'Incorrecto: Atender eventos es una parte del proceso, pero no describe completamente la función.'
        ]
    ],
    'pregunta4' => [
        'correcta' => 'optimizacion_isr',
        'explicacion' => [
            'optimizacion_isr' => 'Correcto: Las interrupciones anidadas y el deferimiento de trabajo a hilos del kernel son técnicas de optimización en los ISRs.',
            'bloqueo_cpu' => 'Incorrecto: El bloqueo de la CPU no es una optimización, es una consecuencia del polling.',
            'alta_latencia' => 'Incorrecto: Alta latencia no es una optimización.',
            'simultaneidad' => 'Incorrecto: Simultaneidad no describe una optimización en ISRs.'
        ]
    ],
    'pregunta5' => [
        'correcta' => 'controladores',
        'explicacion' => [
            'controladores' => 'Correcto: Los controladores de dispositivos son módulos que traducen las solicitudes del sistema operativo en comandos específicos para el hardware.',
            'kernel' => 'Incorrecto: El kernel es el componente que gestiona los controladores, no actúa como controlador.',
            'dispositivos' => 'Incorrecto: Los dispositivos no traducen las solicitudes, los controladores lo hacen.',
            'drivers' => 'Incorrecto: Aunque los drivers son controladores, este término es más específico y no generaliza toda la función.'
        ]
    ],
    'pregunta6' => [
        'correcta' => 'nvidia_driver',
        'explicacion' => [
            'nvidia_driver' => 'Correcto: Un driver de NVIDIA para GPUs usa acceso directo a memoria (DMA) para mejorar el rendimiento en juegos.',
            'wifi_driver' => 'Incorrecto: El ejemplo no es de un driver específico, y la pregunta se centra en NVIDIA.',
            'disk_driver' => 'Incorrecto: El driver del disco no es el mejor ejemplo de optimización en juegos.',
            'gpu_polling' => 'Incorrecto: El polling no es el mecanismo utilizado aquí, sino DMA.'
        ]
    ],
    'pregunta7' => [
        'correcta' => 'fragmentacion_y_seguridad',
        'explicacion' => [
            'fragmentacion_y_seguridad' => 'Correcto: Los desafíos en el desarrollo de drivers incluyen la fragmentación y las vulnerabilidades de seguridad.',
            'velocidad' => 'Incorrecto: Aunque la velocidad es importante, no es uno de los desafíos mencionados.',
            'compatibilidad' => 'Incorrecto: La compatibilidad es importante pero no es un desafío específico.',
            'manejo_errors' => 'Incorrecto: El manejo de errores es parte de los drivers, pero no se menciona como un desafío específico.'
        ]
    ],
    'pregunta8' => [
        'correcta' => 'aplicaciones_usuario',
        'explicacion' => [
            'aplicaciones_usuario' => 'Correcto: El software en modo usuario proporciona APIs y bibliotecas para que las aplicaciones accedan a dispositivos sin interactuar directamente con el kernel.',
            'kernel' => 'Incorrecto: El kernel gestiona la interacción con el hardware, pero no proporciona APIs directamente.',
            'dispositivos' => 'Incorrecto: El acceso a dispositivos se realiza mediante software en modo usuario, no directamente.',
            'acceso_directo' => 'Incorrecto: No hay acceso directo en modo usuario, sino que se usa un intermediario como las APIs.'
        ]
    ],
    'pregunta9' => [
        'correcta' => 'stdio_h',
        'explicacion' => [
            'stdio_h' => 'Correcto: Bibliotecas como stdio.h en C ayudan a ocultar la complejidad del hardware y hacer el código más portátil.',
            'libc' => 'Incorrecto: Aunque libc es importante, la pregunta se refiere específicamente a stdio.h.',
            'open_system' => 'Incorrecto: open() es un servicio del sistema, pero stdio.h es una biblioteca que simplifica la interacción.',
            'read_write' => 'Incorrecto: read() y write() son llamadas del sistema, pero no son bibliotecas.'
        ]
    ],
    'pregunta10' => [
        'correcta' => 'virtualizacion',
        'explicacion' => [
            'virtualizacion' => 'Correcto: /dev en Linux virtualiza dispositivos como archivos, unificando el acceso.',
            'file_system' => 'Incorrecto: El sistema de archivos no es un mecanismo específico de virtualización.',
            'kernel' => 'Incorrecto: El kernel gestiona el acceso, pero /dev es la interfaz que representa los dispositivos.',
            'hardware' => 'Incorrecto: Los dispositivos no son tratados como hardware sino como archivos en /dev.'
        ]
    ]
];

$resultado = null;
$errores = [];
$feedback = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $puntaje = 0;
    foreach ($respuestas_correctas as $key => $datos) {
        if (!isset($_POST[$key])) {
            $errores[] = "Falta responder la pregunta: " . ucfirst($key);
        } else {
            $respuesta = strtolower(trim($_POST[$key]));
            if ($respuesta === $datos['correcta']) {
                $puntaje++;
            } else {
                $feedback[$key] = $datos['explicacion'][$respuesta] ?? 'Respuesta incorrecta.';
            }
        }
    }
    if (empty($errores)) {
        $resultado = "Tu puntaje es $puntaje de " . count($respuestas_correctas) . ".";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Evaluación Unidad V</title>
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
  nav ul li a:hover, nav ul li a.active {
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
  form > div {
    margin-bottom: 20px;
  }
  label {
    font-weight: 600;
    color: #0d6efd;
    display: block;
    margin-bottom: 8px;
  }
  input[type="radio"] {
    margin-right: 10px;
  }
  button {
    background: #0d6efd;
    color: white;
    border: none;
    padding: 12px 25px;
    border-radius: 25px;
    font-weight: 700;
    cursor: pointer;
    font-size: 1.1rem;
    transition: background 0.3s ease;
    display: block;
    margin: 0 auto;
    width: 100%;
    max-width: 200px;
  }
  button:hover {
    background: #0b5ed7;
  }
  .resultado {
    font-weight: 700;
    font-size: 1.2rem;
    color: green;
    text-align: center;
    margin-top: 20px;
  }
  .error {
    background: #f8d7da;
    color: #842029;
    border-radius: 8px;
    padding: 10px 15px;
    margin-bottom: 20px;
  }
  .feedback {
    background: #fff3cd;
    color: #664d03;
    border-radius: 8px;
    padding: 10px 15px;
    margin-bottom: 15px;
  }
  .feedback strong {
    display: block;
    margin-bottom: 5px;
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
</style>
</head>
<body>

<header>
  <div class="logo">Sistemas Operativos</div>
  <nav>
    <ul>
      <li><a href="/pagina_sistemas/index.php">Inicio</a></li>
      <li><a href="/pagina_sistemas/cursos.php" class="active">Menú</a></li>
      <li><a href="/pagina_sistemas/index.php">Contacto</a></li>
      <li><a href="/pagina_sistemas/referencias.php">Referencias</a></li>
    </ul>
  </nav>
</header>

<main>
  <h1>Evaluación Unidad V</h1>

  <?php if (!empty($errores)): ?>
    <div class="error">
      <ul>
        <?php foreach ($errores as $error): ?>
          <li><?= htmlspecialchars($error) ?></li>
        <?php endforeach; ?>
      </ul>
    </div>
  <?php endif; ?>

  <?php if ($resultado): ?>
    <p class="resultado"><?= $resultado ?></p>

    <?php if (!empty($feedback)): ?>
      <div>
        <h3>Explicaciones para respuestas incorrectas:</h3>
        <?php foreach ($feedback as $key => $explicacion): ?>
          <div class="feedback">
            <strong>Pregunta <?= substr($key, -1) ?>:</strong>
            <?= htmlspecialchars($explicacion) ?>
          </div>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>

  <?php endif; ?>

  <form method="post" action="">
    <div>
      <label>1. ¿Cuál es el propósito principal del software de E/S organizado en capas?</label>
      <input type="radio" id="p1a1" name="pregunta1" value="abstraer_complejidad" required />
      <label for="p1a1" style="display:inline;">Abstraer la complejidad del hardware y facilitar el desarrollo de aplicaciones eficientes.</label><br />
      <input type="radio" id="p1a2" name="pregunta1" value="optimizar_rendimiento" />
      <label for="p1a2" style="display:inline;">Optimizar el rendimiento del sistema.</label><br />
      <input type="radio" id="p1a3" name="pregunta1" value="gestionar_hardware" />
      <label for="p1a3" style="display:inline;">Gestionar los dispositivos de hardware directamente.</label><br />
      <input type="radio" id="p1a4" name="pregunta1" value="facilitar_conexion" />
      <label for="p1a4" style="display:inline;">Facilitar la conexión entre dispositivos.</label>
    </div>

    <div>
      <label>2. ¿Qué componente maneja las señales del hardware en el sistema operativo?</label>
      <input type="radio" id="p2a1" name="pregunta2" value="manejador_interrupciones" required />
      <label for="p2a1" style="display:inline;">El manejador de interrupciones (ISR).</label><br />
      <input type="radio" id="p2a2" name="pregunta2" value="driver_dispositivo" />
      <label for="p2a2" style="display:inline;">El driver de dispositivo.</label><br />
      <input type="radio" id="p2a3" name="pregunta2" value="aplicacion_usuario" />
      <label for="p2a3" style="display:inline;">La aplicación de usuario.</label><br />
      <input type="radio" id="p2a4" name="pregunta2" value="kernel" />
      <label for="p2a4" style="display:inline;">El kernel del sistema operativo.</label>
    </div>

    <div>
      <label>3. ¿Qué funciones realiza el manejador de interrupciones?</label>
      <input type="radio" id="p3a1" name="pregunta3" value="salvar_contexto" required />
      <label for="p3a1" style="display:inline;">Salvar el contexto del CPU, ejecutar la rutina de atención y restaurar el contexto.</label><br />
      <input type="radio" id="p3a2" name="pregunta3" value="ejecutar_rutina" />
      <label for="p3a2" style="display:inline;">Ejecutar la rutina y restaurar el contexto.</label><br />
      <input type="radio" id="p3a3" name="pregunta3" value="restaurar_contexto" />
      <label for="p3a3" style="display:inline;">Restaurar el contexto del proceso interrumpido.</label><br />
      <input type="radio" id="p3a4" name="pregunta3" value="atender_evento" />
      <label for="p3a4" style="display:inline;">Atender los eventos sin restaurar el contexto.</label>
    </div>

    <div>
      <label>4. ¿Qué técnica de optimización se usa en los ISRs?</label>
      <input type="radio" id="p4a1" name="pregunta4" value="optimizacion_isr" required />
      <label for="p4a1" style="display:inline;">Interrupciones anidadas y deferir trabajo a hilos del kernel.</label><br />
      <input type="radio" id="p4a2" name="pregunta4" value="bloqueo_cpu" />
      <label for="p4a2" style="display:inline;">Bloquear la CPU durante el proceso.</label><br />
      <input type="radio" id="p4a3" name="pregunta4" value="alta_latencia" />
      <label for="p4a3" style="display:inline;">Alta latencia de respuesta.</label><br />
      <input type="radio" id="p4a4" name="pregunta4" value="simultaneidad" />
      <label for="p4a4" style="display:inline;">Simultaneidad de tareas en el sistema.</label>
    </div>

    <div>
      <label>5. ¿Qué son los controladores de dispositivos?</label>
      <input type="radio" id="p5a1" name="pregunta5" value="controladores" required />
      <label for="p5a1" style="display:inline;">Son módulos que traducen las solicitudes del sistema operativo en comandos específicos para el hardware.</label><br />
      <input type="radio" id="p5a2" name="pregunta5" value="kernel" />
      <label for="p5a2" style="display:inline;">Son módulos del kernel que gestionan el acceso directo a hardware.</label><br />
      <input type="radio" id="p5a3" name="pregunta5" value="dispositivos" />
      <label for="p5a3" style="display:inline;">Son los dispositivos físicos que realizan las operaciones.</label><br />
      <input type="radio" id="p5a4" name="pregunta5" value="drivers" />
      <label for="p5a4" style="display:inline;">Son controladores que gestionan exclusivamente los dispositivos periféricos.</label>
    </div>

    <div>
      <label>6. ¿Cuál es un ejemplo de controlador de dispositivo?</label>
      <input type="radio" id="p6a1" name="pregunta6" value="nvidia_driver" required />
      <label for="p6a1" style="display:inline;">Un driver de NVIDIA para GPU que usa DMA para mejorar el rendimiento en juegos.</label><br />
      <input type="radio" id="p6a2" name="pregunta6" value="wifi_driver" />
      <label for="p6a2" style="display:inline;">Un driver para gestionar conexiones WiFi.</label><br />
      <input type="radio" id="p6a3" name="pregunta6" value="disk_driver" />
      <label for="p6a3" style="display:inline;">Un driver que gestiona el acceso a discos duros.</label><br />
      <input type="radio" id="p6a4" name="pregunta6" value="usb_driver" />
      <label for="p6a4" style="display:inline;">Un driver para controlar la velocidad de puertos USB.</label>
    </div>

    <div>
      <label>7. ¿Cuáles son los desafíos en el desarrollo de drivers?</label>
      <input type="radio" id="p7a1" name="pregunta7" value="fragmentacion_y_seguridad" required />
      <label for="p7a1" style="display:inline;">La fragmentación del hardware y las vulnerabilidades de seguridad.</label><br />
      <input type="radio" id="p7a2" name="pregunta7" value="velocidad" />
      <label for="p7a2" style="display:inline;">Optimizar la velocidad de los dispositivos.</label><br />
      <input type="radio" id="p7a3" name="pregunta7" value="compatibilidad" />
      <label for="p7a3" style="display:inline;">Garantizar la compatibilidad entre sistemas.</label><br />
      <input type="radio" id="p7a4" name="pregunta7" value="costo" />
      <label for="p7a4" style="display:inline;">Reducir el costo de producción de los dispositivos.</label>
    </div>

    <div>
      <label>8. ¿Qué hace el software en modo usuario en la E/S?</label>
      <input type="radio" id="p8a1" name="pregunta8" value="aplicaciones_usuario" required />
      <label for="p8a1" style="display:inline;">Proporciona APIs y bibliotecas para que las aplicaciones accedan a dispositivos sin interactuar directamente con el kernel.</label><br />
      <input type="radio" id="p8a2" name="pregunta8" value="kernel" />
      <label for="p8a2" style="display:inline;">Gestiona el acceso directo a los dispositivos de hardware.</label><br />
      <input type="radio" id="p8a3" name="pregunta8" value="dispositivos" />
      <label for="p8a3" style="display:inline;">Controla y gestiona los dispositivos físicos directamente.</label><br />
      <input type="radio" id="p8a4" name="pregunta8" value="acceso_directo" />
      <label for="p8a4" style="display:inline;">Ofrece acceso directo a la memoria sin usar el kernel.</label>
    </div>

    <div>
      <label>9. ¿Qué ventaja tiene usar bibliotecas como stdio.h?</label>
      <input type="radio" id="p9a1" name="pregunta9" value="stdio_h" required />
      <label for="p9a1" style="display:inline;">Ocultar la complejidad del hardware y hacer el código más portátil.</label><br />
      <input type="radio" id="p9a2" name="pregunta9" value="libc" />
      <label for="p9a2" style="display:inline;">Usar funciones estándar de la biblioteca C.</label><br />
      <input type="radio" id="p9a3" name="pregunta9" value="open_system" />
      <label for="p9a3" style="display:inline;">Permite abrir y leer archivos del sistema.</label><br />
      <input type="radio" id="p9a4" name="pregunta9" value="read_write" />
      <label for="p9a4" style="display:inline;">Gestionar entradas y salidas de dispositivos de forma directa.</label>
    </div>

    <div>
      <label>10. ¿Qué estructura ofrece Linux para representar dispositivos como archivos?</label>
      <input type="radio" id="p10a1" name="pregunta10" value="virtualizacion" required />
      <label for="p10a1" style="display:inline;">/dev, que virtualiza dispositivos como archivos en el sistema.</label><br />
      <input type="radio" id="p10a2" name="pregunta10" value="file_system" />
      <label for="p10a2" style="display:inline;">El sistema de archivos ext4.</label><br />
      <input type="radio" id="p10a3" name="pregunta10" value="kernel" />
      <label for="p10a3" style="display:inline;">El kernel que gestiona todos los dispositivos.</label><br />
      <input type="radio" id="p10a4" name="pregunta10" value="hardware" />
      <label for="p10a4" style="display:inline;">Los dispositivos físicos representados directamente en el sistema.</label>
    </div>

    <button type="submit">Enviar evaluación</button>
  </form>
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
