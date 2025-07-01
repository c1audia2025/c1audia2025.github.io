<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>5.3.1 Manejador de Interrupciones</title>
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
    ul {
      margin-left: 20px;
      margin-bottom: 15px;
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

    /* Estilo para el video */
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
      <li><a href="/pagina_sistemas/videos.html">Videos</a></li> <!-- Enlace a Videos -->
    </ul>
  </nav>
</header>

<main>
  <h1>5.3.1 Manejador de Interrupciones</h1>

  <h2>Introducción</h2>
  <p>El manejador de interrupciones (ISR, Interrupt Service Routine) es código en el kernel que responde a señales de hardware/programa, preservando el estado del sistema (Stallings, 2021).</p>
  <p>Según IBM (2020), el Manejador de Interrupciones de IBM Spectrum Scale: Concepts, Planning, and Implementation Guide, este componente es responsable de gestionar las interrupciones del sistema para garantizar un procesamiento eficiente de las operaciones de E/S, optimizando así el rendimiento en entornos de almacenamiento distribuido.</p>

  <h2>Funciones Clave</h2>
  <ul>
    <li>Salvar contexto: Registros CPU y estado del proceso actual.</li>
    <li>Ejecutar rutina: Atender la interrupción (ej.: leer buffer del teclado).</li>
    <li>Restaurar contexto: Reanudar la tarea interrumpida.</li>
  </ul>

  <h2>Ejemplo</h2>
  <p>En Linux, el ISR de un disco duro marca los buffers de datos como "listos" para evitar pérdidas (Tanenbaum & Bos, 2022, p. 245).</p>

  <h2>Optimizaciones</h2>
  <ul>
    <li>Interrupciones anidadas: Priorizar eventos urgentes.</li>
    <li>Deferir trabajo: Delegar tareas no críticas a threads del kernel.</li>
  </ul>

  <h2>Ejemplo Código:</h2>
  <pre>
    <code>
import time
import threading

# Simulamos un "botón" que puede generar una interrupción
class Boton:
    def __init__(self):
        self.interrumpir = threading.Event()  # Evento que simula la interrupción (el botón presionado)

    def presionar(self):
        print("Botón presionado, generando interrupción...")
        self.interrumpir.set()  # Generar la interrupción

    def liberar(self):
        self.interrumpir.clear()  # Limpiar la interrupción

    def esperar_interrupcion(self):
        self.interrumpir.wait()  # Espera hasta que el evento (interrupción) sea activado

# Simulamos el Manejador de Interrupciones (ISR)
def manejador_interrupcion(boton):
    while True:
        boton.esperar_interrupcion()  # Espera hasta que se presione el botón (interrupción)
        print("¡Interrupción detectada! Ejecutando el manejador de interrupción...")
        time.sleep(1)  # Simula el tiempo de procesamiento de la interrupción

# Simula un sistema que utiliza un manejador de interrupciones
if __name__ == "__main__":
    boton = Boton()

    # Iniciar un hilo que ejecuta el manejador de interrupciones
    hilo_ISR = threading.Thread(target=manejador_interrupcion, args=(boton,))
    hilo_ISR.daemon = True  # Este hilo se detendrá cuando termine el programa principal
    hilo_ISR.start()

    # Simulamos que el botón es presionado en momentos aleatorios
    for i in range(5):
        print(f"Esperando la siguiente interrupción... ({i+1}/5)")
        time.sleep(2)  # Simula el paso del tiempo
        boton.presionar()  # Simula que el botón es presionado
        time.sleep(1)  # Mantiene el botón presionado por 1 segundo
        boton.liberar()  # El botón se libera (simula que se suelta el botón)

    print("Fin del programa principal.")
    </code>
  </pre>

  <h2>Video</h2>
  <div class="video-container">
    <iframe 
      src="https://www.youtube.com/embed/yodCCipfS5g" 
      title="Manejador de Interrupciones y Software" 
      frameborder="0" 
      allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
      allowfullscreen>
    </iframe>
    <p>Diego, L. (2020, 16 de noviembre). Manejador de Interrupciones y Software. YouTube. <a href="https://www.youtube.com/watch?v=yodCCipfS5g" target="_blank">Ver video</a></p>
  </div>

  <h2>Conclusión</h2>
  <p class="conclusion">Garantiza respuestas rápidas y confiables a eventos asíncronos.</p>

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
