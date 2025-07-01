<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>5.2.4 E/S Usado DMA</title>
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

    /* Estilos para el bloque de código */
    pre {
      background-color:  #f8f9fa;  /* Fondo gris claro */
      
      padding: 20px;
      border-radius: 8px;
      overflow-x: auto;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }
    code {
      display: block;
      font-size: 1rem;
      line-height: 1.6;
      white-space: pre-wrap;
      word-wrap: break-word;
    }

    /* Estilos para el video */
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
  <h1>5.2.4 E/S Usado DMA</h1>

  <h2>Introducción</h2>
  <p>El DMA permite transferencias directas entre dispositivos y memoria, con intervención mínima de la CPU (Stallings, 2021).</p>

  <h2>Proceso</h2>
  <ul>
    <li>La CPU configura parámetros (dirección de memoria, tamaño).</li>
    <li>El controlador DMA gestiona la transferencia.</li>
    <li>Interrupción al finalizar.</li>
  </ul>

  <h2>Ventajas</h2>
  <ul>
    <li>Alto ancho de banda: Ideal para discos SSD y tarjetas de red.</li>
    <li>Libera CPU: Para tareas computacionales intensivas.</li>
  </ul>

  <h2>Ejemplo</h2>
  <p>Un NVMe transfiere datos a 7 GB/s vía DMA (Patterson & Hennessy, 2021, p. 420).</p>

  <h2>Ejemplo código:</h2>
  <pre>
    <code>
import time
import random

# Simulando un "dispositivo de E/S" que produce datos
class ESDummyDevice:
    def __init__(self, data_size):
        self.data = [random.randint(0, 255) for _ in range(data_size)]  # Generamos datos aleatorios

    def read_data(self):
        # Simula leer datos del dispositivo
        return self.data

# Simulando la memoria donde los datos serán almacenados
class Memory:
    def __init__(self, size):
        self.memory = [0] * size  # Inicializa la memoria con ceros

    def write_data(self, data, start_address):
        # Simula escribir datos en la memoria
        self.memory[start_address:start_address+len(data)] = data

# Función que simula el acceso DMA: copia de datos de un dispositivo a la memoria
def dma_transfer(device, memory, data_size, start_address):
    print("Iniciando transferencia DMA...")
    data = device.read_data()  # Leer datos del dispositivo
    time.sleep(1)  # Simula el tiempo que toma la transferencia
    memory.write_data(data, start_address)  # Transferir los datos a la memoria
    print("Transferencia DMA completada.")

# Simulación del proceso DMA
device = ESDummyDevice(data_size=10)  # Creamos un dispositivo de E/S con 10 datos
memory = Memory(size=20)  # Creamos una memoria con capacidad de 20 celdas

# Iniciamos la transferencia DMA
dma_transfer(device, memory, data_size=10, start_address=5)

# Mostramos el contenido de la memoria después de la transferencia
print(f"Memoria después de la transferencia DMA: {memory.memory}")
    </code>
  </pre>

  <h2>Video</h2>
  <div class="video-container">
    <iframe 
      src="https://www.youtube.com/embed/-58fmXP5xQs" 
      title="Acceso Directo a Memoria (DMA)" 
      frameborder="0" 
      allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
      allowfullscreen>
    </iframe>
    <p>Arquitectura de Computadoras. (2020, 21 de octubre). Acceso Directo a Memoria (DMA). YouTube. <a href="https://www.youtube.com/watch?v=-58fmXP5xQs" target="_blank">Ver video</a></p>
  </div>

  <h2>Conclusión</h2>
  <p class="conclusion">Esencial para sistemas de alto rendimiento y baja latencia.</p>

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


