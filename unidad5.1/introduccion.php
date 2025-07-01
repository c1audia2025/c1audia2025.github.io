<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Introducción</title>
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

    /* Estilos para hacer el video más atractivo */
    .video-container {
      background: #f5f8fa;
      border: 1px solid #ccc;
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
      padding: 15px;
      margin-bottom: 20px;
      display: flex;
      flex-direction: column;
      align-items: center;
      max-width: 800px;
      margin: 20px auto;
    }

    .video-container iframe {
      width: 100%;
      max-width: 700px;
      height: 400px;
      border-radius: 8px;
    }

    .video-container a {
      color: #0d6efd;
      text-decoration: none;
      font-weight: 600;
    }

    .video-container a:hover {
      text-decoration: underline;
    }

    .video-container p {
      margin-top: 10px;
      font-size: 0.9rem;
      text-align: center;
    }

    /* Estilo mejorado para el bloque de código */
    pre {
      background-color:rgb(240, 240, 240);
      padding: 20px;
      border-radius: 8px;
      border: 1px solid #444;
      color:rgb(51, 51, 48);
      font-size: 1rem;
      overflow-x: auto;
      margin-top: 20px;
    }
    code {
      font-family: 'Courier New', Courier, monospace;
      white-space: pre-wrap;
      word-wrap: break-word;
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
      <li><a href="/pagina_sistemas/videos.php">Videos</a></li>
    </ul>
  </nav>
</header>

<main>
  <h1>Introducción</h1>

  <p>De acuerdo con lo que manifiesta Tanenbaum & Bos (2022), “El hardware de Entrada/Salida (E/S) es el conjunto de componentes físicos que permiten la comunicación entre la CPU y los dispositivos externos”, Su diseño es crucial para el rendimiento del sistema, ya que debe resolver problemas de sincronización, diferencias de velocidad y estandarización de protocolos.</p>

  <h2>Componentes clave</h2>
  <ul>
    <li><strong>Dispositivos de E/S:</strong> Periféricos como discos duros, teclados y tarjetas de red.</li>
    <li><strong>Controladores:</strong> Circuitos especializados que adaptan señales entre dispositivos y el bus del sistema.</li>
    <li><strong>Interrupciones:</strong> Mecanismo para notificar a la CPU eventos urgentes.</li>
    <li><strong>DMA:</strong> Permite transferencias directas a memoria, liberando a la CPU (Stallings, 2021).</li>
  </ul>

  <h2>Importancia</h2>
  <p>El hardware de E/S moderno utiliza tecnologías como PCIe y USB 3.0 para alta velocidad, mientras que el DMA reduce la carga del procesador en operaciones masivas (Silberschatz et al., 2018).</p>

  <h2>Ejemplo código</h2>
  <pre>
    <code>
import time
import threading
import random

# Simulamos un teclado que genera interrupciones cuando se presiona una tecla
class Teclado:
    def __init__(self):
        self.tecla_presionada = threading.Event()  # Evento para simular la interrupción de tecla presionada
        self.buffer = []  # Buffer para almacenar las teclas presionadas

    def presionar_tecla(self):
        tecla = random.choice(['A', 'B', 'C', 'D', 'E'])  # Simulamos la tecla presionada
        print(f"Teclado: Tecla {tecla} presionada, generando interrupción...")
        self.buffer.append(tecla)  # Almacena la tecla en el buffer
        self.tecla_presionada.set()  # Activa la interrupción

    def liberar(self):
        self.tecla_presionada.clear()  # Limpia la interrupción

    def esperar_interrupcion(self):
        self.tecla_presionada.wait()  # Espera hasta que se presione una tecla (interrupción)

# Simula el procesador que maneja las interrupciones
def manejador_interrupcion(teclado):
    while True:
        teclado.esperar_interrupcion()  # Espera hasta que se presione una tecla (interrupción)
        print(f"Procesador: Interrupción detectada. Procesando datos desde el buffer...")
        tecla = teclado.buffer.pop(0)  # Extrae la primera tecla del buffer
        print(f"Procesador: Procesando tecla '{tecla}'...")
        time.sleep(1)  # Simula el tiempo de procesamiento de la tecla
        teclado.liberar()  # Limpia la interrupción después de procesarla

# Simula el sistema que interactúa con el teclado
def sistema():
    teclado = Teclado()

    # Iniciar un hilo que ejecuta el manejador de interrupciones
    hilo_ISR = threading.Thread(target=manejador_interrupcion, args=(teclado,))
    hilo_ISR.daemon = True  # Este hilo se detendrá cuando termine el programa principal
    hilo_ISR.start()

    # Simula que se presionan teclas en intervalos aleatorios
    for _ in range(5):
        time.sleep(random.uniform(1, 3))  # Simula el tiempo entre las teclas presionadas
        teclado.presionar_tecla()  # Simula que una tecla es presionada

# Ejecutamos la simulación
if __name__ == "__main__":
    sistema()

    </code>
  </pre>

  <h2>Video</h2> 
  <div class="video-container">
    <iframe 
      src="https://www.youtube.com/embed/5OA1L_Pp3yM" 
      title="Principios de hardware de E/S" 
      frameborder="0" 
      allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
      allowfullscreen>
    </iframe>
    <p>Paulina, R. (2016, 24 de febrero). <em>Principios de hardware de E/S</em>. YouTube. <a href="https://www.youtube.com/watch?v=5OA1L_Pp3yM" target="_blank">Ver video</a></p>
  </div>

  <p class="conclusion">Conclusión: Este hardware es la base para la interoperabilidad entre software y dispositivos físicos, con avances continuos en eficiencia energética y velocidad.</p>

  <p><a href="/pagina_sistemas/cursos.php">← Volver a Subtemas</a></p>
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



