<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>5.2.3 E/S Manejadas por Interrupciones</title>
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

    /* Estilo para contenedor de video */
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

    .video-container p {
      margin-top: 10px;
      font-size: 0.9rem;
      text-align: center;
    }

    /* Estilo para el bloque de código */
    pre {
      background-color: #f8f9fa;
      padding: 15px;
      border-radius: 8px;
      border: 1px solid #ccc;
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
      <li><a href="/pagina_sistemas/index.html">Inicio</a></li>
      <li><a href="/pagina_sistemas/cursos.html" class="active">Menú</a></li>
      <li><a href="/pagina_sistemas/videos.html">Videos</a></li>
    </ul>
  </nav>
</header>

<main>
  <h1>5.2.3 E/S Manejadas por Interrupciones</h1>

  <h2>Introducción</h2>
  <p>En este modelo, el dispositivo notifica a la CPU cuando está listo para transferir datos, liberando al procesador para otras tareas (Silberschatz et al., 2018).</p>

  <h2>Ventajas</h2>
  <ul>
    <li><strong>Eficiencia:</strong> La CPU no espera activamente.</li>
    <li><strong>Baja latencia:</strong> Respuesta rápida a eventos.</li>
  </ul>

  <h2>Ejemplo</h2>
  <p>Un teclado genera interrupciones al presionar teclas, evitando que el sistema consulte su estado continuamente (Tanenbaum & Bos, 2022, p. 235).</p>

  <h2>Ejemplo código:</h2>
  <pre>
    <code>
import threading
import time

# Simulamos un dispositivo de E/S (en este caso, un botón)
class Button:
    def __init__(self):
        self._pressed = False
        self._event = threading.Event()  # Evento que simula la interrupción

    def press(self):
        self._pressed = True
        self._event.set()  # Activa el evento (simula la interrupción)

    def release(self):
        self._pressed = False
        self._event.clear()  # Desactiva el evento

    def wait_for_press(self):
        self._event.wait()  # Espera hasta que el evento sea activado (la interrupción)

# Rutina de servicio de interrupción (ISR)
def handle_button_press():
    while True:
        button.wait_for_press()  # Espera hasta que el botón sea presionado (interrupción)
        print("¡Botón presionado! Ejecutando la ISR...")
        time.sleep(1)  # Simula tiempo de respuesta

# Simulamos el sistema que espera la interrupción del botón
button = Button()

# Crea un hilo que ejecuta la ISR de forma continua
interrupt_thread = threading.Thread(target=handle_button_press)
interrupt_thread.daemon = True  # El hilo se cierra cuando el programa principal termina
interrupt_thread.start()

# Simulamos el botón siendo presionado en diferentes momentos
for _ in range(5):
    print("Esperando a que el botón sea presionado...")
    time.sleep(3)  # Simula el paso del tiempo
    button.press()  # Simula la interrupción (el botón es presionado)
    time.sleep(2)  # El botón está presionado por 2 segundos
    button.release()  # Simula que el botón ha sido soltado

# El programa principal termina aquí, pero la ISR sigue ejecutándose en segundo plano.
print("Fin del programa principal.")
    </code>
  </pre>

  <h2>Video</h2>
  <div class="video-container">
    <iframe 
      src="https://www.youtube.com/embed/vusZZtiVBqs" 
      title="Interrupciones de Sistema" 
      frameborder="0" 
      allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
      allowfullscreen>
    </iframe>
    <p>Entorno simple. (2021, 4 de septiembre). Interrupciones de Sistema. YouTube. <a href="https://www.youtube.com/watch?v=vusZZtiVBqs" target="_blank">Ver video</a></p>
  </div>

  <h2>Conclusión</h2>
  <p class="conclusion">El estándar actual para la mayoría de dispositivos de velocidad media.</p>

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


