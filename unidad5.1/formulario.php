<?php
$respuestas_correctas = [
    'pregunta1' => [
        'correcta' => 'interaccion',
        'explicacion' => [
            'interaccion' => 'Correcto: Los dispositivos de E/S permiten la interacción entre usuarios, sistemas y el entorno físico.',
            'almacenamiento' => 'Incorrecto: Aunque existen dispositivos de almacenamiento, la función principal de los dispositivos de E/S es la interacción.',
            'procesamiento' => 'Incorrecto: El procesamiento lo realiza la CPU, no los dispositivos de E/S.',
            'seguridad' => 'Incorrecto: La seguridad informática no es función principal de dispositivos de E/S.'
        ]
    ],
    'pregunta2' => [
        'correcta' => 'monitor',
        'explicacion' => [
            'monitor' => 'Correcto: El monitor es un dispositivo de salida que muestra información al usuario.',
            'teclado' => 'Incorrecto: El teclado es un dispositivo de entrada, no de salida.',
            'sensor' => 'Incorrecto: Un sensor es un dispositivo de entrada que detecta información del entorno.',
            'camara' => 'Incorrecto: La cámara es un dispositivo de entrada, no de salida.'
        ]
    ],
    'pregunta3' => [
        'correcta' => '10_bytes_seg',
        'explicacion' => [
            '10_bytes_seg' => 'Correcto: Según Tanenbaum, los teclados tienen una velocidad aproximada de 10 bytes por segundo.',
            '528_mb_seg' => 'Incorrecto: 528 MB/seg corresponde a un bus PCI, no a un teclado.',
            '35_gb_seg' => 'Incorrecto: 3.5 GB/seg es la velocidad típica de un SSD NVMe, no de un teclado.',
            '1_gb_seg' => 'Incorrecto: 1 GB/seg es mucho mayor a la velocidad de un teclado.'
        ]
    ],
    'pregunta4' => [
        'correcta' => 'http',
        'explicacion' => [
            'http' => 'Correcto: HTTP no es un protocolo común para dispositivos de E/S; es un protocolo de red para la web.',
            'usb' => 'Incorrecto: USB es un protocolo común para conectar dispositivos de E/S.',
            'sata' => 'Incorrecto: SATA es un protocolo para dispositivos de almacenamiento, muy común en E/S.',
            'bluetooth' => 'Incorrecto: Bluetooth es un protocolo inalámbrico común para dispositivos de E/S.'
        ]
    ],
    'pregunta5' => [
        'correcta' => 'senal_dispositivo',
        'explicacion' => [
            'senal_dispositivo' => 'Correcto: Una interrupción es una señal enviada por un dispositivo para notificar a la CPU que requiere atención inmediata.',
            'consulta_constante' => 'Incorrecto: La consulta constante es característica del polling, no de las interrupciones.',
            'transferencia_directa' => 'Incorrecto: Esto describe el DMA, no una interrupción.',
            'buffer_temporal' => 'Incorrecto: Esto se refiere a la bufferización, no a las interrupciones.'
        ]
    ],
    'pregunta6' => [
        'correcta' => 'guarda_estado_ejecuta_recupera',
        'explicacion' => [
            'guarda_estado_ejecuta_recupera' => 'Correcto: La CPU guarda el estado, ejecuta la rutina ISR y luego recupera el estado previo.',
            'espera_polling' => 'Incorrecto: La espera en bucle de polling no es parte del manejo de interrupciones.',
            'transfiere_directamente' => 'Incorrecto: Esto describe el proceso de DMA.',
            'realiza_buffer' => 'Incorrecto: La bufferización es otra función, no el proceso de interrupciones.'
        ]
    ],
    'pregunta7' => [
        'correcta' => 'optimiza_uso_cpu',
        'explicacion' => [
            'optimiza_uso_cpu' => 'Correcto: Las interrupciones evitan la consulta constante (polling), optimizando el uso de la CPU.',
            'requiere_cpu_constante' => 'Incorrecto: Requiere menos intervención constante, no más.',
            'reduce_velocidad' => 'Incorrecto: Las interrupciones mejoran la eficiencia, no reducen la velocidad.',
            'aumenta_uso_memoria' => 'Incorrecto: No aumentan necesariamente el uso de memoria.'
        ]
    ],
    'pregunta8' => [
        'correcta' => 'transferencia_directa_sin_cpu',
        'explicacion' => [
            'transferencia_directa_sin_cpu' => 'Correcto: DMA transfiere datos directamente sin constante intervención de la CPU.',
            'consulta_constante_cpu' => 'Incorrecto: DMA reduce la consulta constante.',
            'procesa_datos_cpu' => 'Incorrecto: DMA no procesa datos, solo transfiere.',
            'almacena_temporal' => 'Incorrecto: Esto es bufferización, no DMA.'
        ]
    ],
    'pregunta9' => [
        'correcta' => 'configuracion_solicitud_transferencia_movimiento_datos',
        'explicacion' => [
            'configuracion_solicitud_transferencia_movimiento_datos' => 'Correcto: El proceso DMA incluye configurar, solicitar la transferencia y mover los datos.',
            'solo_configura_cpu' => 'Incorrecto: No solo es configurar, también gestionar y mover datos.',
            'solo_solicita_transferencia' => 'Incorrecto: No solo se solicita la transferencia.',
            'solo_movimiento_datos' => 'Incorrecto: No solo es mover datos.'
        ]
    ],
    'pregunta10' => [
        'correcta' => 'burst_cycle',
        'explicacion' => [
            'burst_cycle' => 'Correcto: DMA opera en modos Burst (bloques grandes) y Cycle stealing (pequeñas transferencias intercaladas).',
            'solo_burst' => 'Incorrecto: No solo opera en modo Burst.',
            'solo_cycle' => 'Incorrecto: No solo opera en modo Cycle stealing.',
            'modo_polling' => 'Incorrecto: El modo polling es otro método distinto.'
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
      <label>1. ¿Qué función principal tienen los dispositivos de E/S?</label>
      <input type="radio" id="p1a1" name="pregunta1" value="interaccion" required />
      <label for="p1a1" style="display:inline;">Interacción entre usuarios, sistemas y entorno físico</label><br />
      <input type="radio" id="p1a2" name="pregunta1" value="almacenamiento" />
      <label for="p1a2" style="display:inline;">Almacenamiento de datos</label><br />
      <input type="radio" id="p1a3" name="pregunta1" value="procesamiento" />
      <label for="p1a3" style="display:inline;">Procesamiento de datos</label><br />
      <input type="radio" id="p1a4" name="pregunta1" value="seguridad" />
      <label for="p1a4" style="display:inline;">Seguridad informática</label>
    </div>

    <div>
      <label>2. ¿Cuál de los siguientes es un dispositivo de salida?</label>
      <input type="radio" id="p2a1" name="pregunta2" value="teclado" />
      <label for="p2a1" style="display:inline;">Teclado</label><br />
      <input type="radio" id="p2a2" name="pregunta2" value="monitor" required />
      <label for="p2a2" style="display:inline;">Monitor</label><br />
      <input type="radio" id="p2a3" name="pregunta2" value="sensor" />
      <label for="p2a3" style="display:inline;">Sensor</label><br />
      <input type="radio" id="p2a4" name="pregunta2" value="camara" />
      <label for="p2a4" style="display:inline;">Cámara</label>
    </div>

    <div>
      <label>3. ¿Cuál es la velocidad aproximada de transferencia de datos de un teclado según Tanenbaum?</label>
      <input type="radio" id="p3a1" name="pregunta3" value="528_mb_seg" />
      <label for="p3a1" style="display:inline;">528 MB/seg</label><br />
      <input type="radio" id="p3a2" name="pregunta3" value="10_bytes_seg" required />
      <label for="p3a2" style="display:inline;">10 bytes/seg</label><br />
      <input type="radio" id="p3a3" name="pregunta3" value="35_gb_seg" />
      <label for="p3a3" style="display:inline;">3.5 GB/seg</label><br />
      <input type="radio" id="p3a4" name="pregunta3" value="1_gb_seg" />
      <label for="p3a4" style="display:inline;">1 GB/seg</label>
    </div>

    <div>
      <label>4. ¿Qué protocolo NO es común en dispositivos de E/S según Stallings?</label>
      <input type="radio" id="p4a1" name="pregunta4" value="usb" />
      <label for="p4a1" style="display:inline;">USB</label><br />
      <input type="radio" id="p4a2" name="pregunta4" value="sata" />
      <label for="p4a2" style="display:inline;">SATA</label><br />
      <input type="radio" id="p4a3" name="pregunta4" value="bluetooth" />
      <label for="p4a3" style="display:inline;">Bluetooth</label><br />
      <input type="radio" id="p4a4" name="pregunta4" value="http" required />
      <label for="p4a4" style="display:inline;">HTTP</label>
    </div>

    <!-- Aquí van las preguntas nuevas -->

    <div>
      <label>5. ¿Qué es una interrupción en el contexto de E/S?</label>
      <input type="radio" id="p5a1" name="pregunta5" value="senal_dispositivo" required />
      <label for="p5a1" style="display:inline;">Es una señal enviada por un dispositivo para notificar a la CPU que requiere atención inmediata.</label><br />
      <input type="radio" id="p5a2" name="pregunta5" value="consulta_constante" />
      <label for="p5a2" style="display:inline;">Es una consulta constante de la CPU al dispositivo.</label><br />
      <input type="radio" id="p5a3" name="pregunta5" value="transferencia_directa" />
      <label for="p5a3" style="display:inline;">Transferencia directa de datos sin intervención de la CPU.</label><br />
      <input type="radio" id="p5a4" name="pregunta5" value="buffer_temporal" />
      <label for="p5a4" style="display:inline;">Almacenamiento temporal de datos para igualar velocidades.</label>
    </div>

    <div>
      <label>6. ¿Qué proceso sigue la CPU cuando recibe una interrupción?</label>
      <input type="radio" id="p6a1" name="pregunta6" value="guarda_estado_ejecuta_recupera" required />
      <label for="p6a1" style="display:inline;">Guarda el estado actual, ejecuta una rutina de atención y luego recupera el estado previo.</label><br />
      <input type="radio" id="p6a2" name="pregunta6" value="espera_polling" />
      <label for="p6a2" style="display:inline;">Espera en un bucle de consulta constante al dispositivo.</label><br />
      <input type="radio" id="p6a3" name="pregunta6" value="transfiere_directamente" />
      <label for="p6a3" style="display:inline;">Transfiere datos directamente entre memoria y dispositivo sin intervención.</label><br />
      <input type="radio" id="p6a4" name="pregunta6" value="realiza_buffer" />
      <label for="p6a4" style="display:inline;">Almacena datos temporalmente para manejar diferencias de velocidad.</label>
    </div>

    <div>
      <label>7. ¿Qué ventaja tiene el uso de interrupciones sobre el polling?</label>
      <input type="radio" id="p7a1" name="pregunta7" value="optimiza_uso_cpu" required />
      <label for="p7a1" style="display:inline;">Evita el polling constante, optimizando el uso de la CPU y mejorando la eficiencia.</label><br />
      <input type="radio" id="p7a2" name="pregunta7" value="requiere_cpu_constante" />
      <label for="p7a2" style="display:inline;">Requiere que la CPU esté constantemente ocupada.</label><br />
      <input type="radio" id="p7a3" name="pregunta7" value="reduce_velocidad" />
      <label for="p7a3" style="display:inline;">Reduce la velocidad de transferencia de datos.</label><br />
      <input type="radio" id="p7a4" name="pregunta7" value="aumenta_uso_memoria" />
      <label for="p7a4" style="display:inline;">Aumenta el uso de memoria temporal.</label>
    </div>

    <div>
      <label>8. ¿Qué es DMA y cómo mejora el rendimiento del sistema?</label>
      <input type="radio" id="p8a1" name="pregunta8" value="transferencia_directa_sin_cpu" required />
      <label for="p8a1" style="display:inline;">Permite transferir datos directamente entre dispositivos y memoria sin intervención constante de la CPU.</label><br />
      <input type="radio" id="p8a2" name="pregunta8" value="consulta_constante_cpu" />
      <label for="p8a2" style="display:inline;">Requiere que la CPU consulte constantemente el dispositivo.</label><br />
      <input type="radio" id="p8a3" name="pregunta8" value="procesa_datos_cpu" />
      <label for="p8a3" style="display:inline;">Procesa todos los datos manualmente en la CPU.</label><br />
      <input type="radio" id="p8a4" name="pregunta8" value="almacena_temporal" />
      <label for="p8a4" style="display:inline;">Almacena datos temporalmente para igualar velocidades.</label>
    </div>

    <div>
      <label>9. ¿Cuáles son los pasos del proceso de DMA?</label>
      <input type="radio" id="p9a1" name="pregunta9" value="configuracion_solicitud_transferencia_movimiento_datos" required />
      <label for="p9a1" style="display:inline;">Configuración por la CPU, solicitud de transferencia y movimiento directo de datos entre dispositivo y memoria.</label><br />
      <input type="radio" id="p9a2" name="pregunta9" value="solo_configura_cpu" />
      <label for="p9a2" style="display:inline;">Solo configuración por la CPU.</label><br />
      <input type="radio" id="p9a3" name="pregunta9" value="solo_solicita_transferencia" />
      <label for="p9a3" style="display:inline;">Solo solicitud de transferencia.</label><br />
      <input type="radio" id="p9a4" name="pregunta9" value="solo_movimiento_datos" />
      <label for="p9a4" style="display:inline;">Solo movimiento de datos.</label>
    </div>

    <div>
      <label>10. ¿Cuáles son los modos de operación del DMA?</label>
      <input type="radio" id="p10a1" name="pregunta10" value="burst_cycle" required />
      <label for="p10a1" style="display:inline;">Burst mode (transferencias grandes) y Cycle stealing (transferencias pequeñas intercaladas).</label><br />
      <input type="radio" id="p10a2" name="pregunta10" value="solo_burst" />
      <label for="p10a2" style="display:inline;">Solo Burst mode.</label><br />
      <input type="radio" id="p10a3" name="pregunta10" value="solo_cycle" />
      <label for="p10a3" style="display:inline;">Solo Cycle stealing.</label><br />
      <input type="radio" id="p10a4" name="pregunta10" value="modo_polling" />
      <label for="p10a4" style="display:inline;">Modo polling.</label>
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

