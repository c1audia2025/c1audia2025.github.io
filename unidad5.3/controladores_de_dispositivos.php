<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>5.3.2 Controladores de Dispositivos</title>
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
  <h1>5.3.2 Controladores de Dispositivos</h1>

  <h2>Introducción</h2>
  <p>Los controladores (drivers) son módulos de software que traducen solicitudes genéricas del sistema operativo a comandos específicos para cada dispositivo (Patterson & Hennessy, 2021).</p>
  <p>Según Tanenbaum & Bos (2015) en "Modern Operating Systems" , los controladores de dispositivos (device drivers) actúan como traductores entre el sistema operativo y el hardware físico, encapsulando las particularidades técnicas de cada dispositivo (discos, NICs, GPUs) en interfaces estandarizadas. Estos módulos kernel-residentes manejan colas de solicitudes de E/S, gestionan interrupciones, y ejecutan protocolos específicos (ej. NVMe para SSDs o SCSI para almacenamiento). En entornos distribuidos como IBM Spectrum Scale, los controladores optimizan el acceso paralelo a dispositivos compartidos, asegurando coherencia y baja latencia.</p>

  <h2>Estructura Típica</h2>
  <ul>
    <li>Inicialización: Configurar registros del hardware.</li>
    <li>Gestión de colas: Bufferizar solicitudes de E/S.</li>
    <li>Manejo de errores: Reintentar operaciones fallidas.</li>
  </ul>

  <h2>Ejemplo</h2>
  <p>Un driver NVIDIA para GPUs optimiza el rendimiento en juegos mediante acceso directo a memoria (DMA) (Silberschatz et al., 2018, p. 518).</p>

  <h2>Desafíos</h2>
  <ul>
    <li>Fragmentación: Diferentes versiones de hardware requieren drivers distintos.</li>
    <li>Seguridad: Vulnerabilidades en drivers pueden comprometer el sistema.</li>
  </ul>

  <h2>Ejemplo de Código:</h2>
  <pre>
    <code>
import time
# Simulamos un dispositivo de almacenamiento (como un disco duro)
class Disco:
    def __init__(self):
        # Simula un disco con 5 bloques de datos
        self.datos = {
            0: "Bloque 0: Datos del sistema",
            1: "Bloque 1: Archivos de usuario",
            2: "Bloque 2: Configuración del sistema",
            3: "Bloque 3: Documentos de trabajo",
            4: "Bloque 4: Datos de respaldo"
        }

    def leer(self, direccion):
        # Simula la lectura de datos desde el disco
        if direccion in self.datos:
            return self.datos[direccion]
        else:
            return "Error: Dirección no válida en el disco."

# Controlador de dispositivo: Traducir solicitudes y manejar el acceso al disco
class ControladorDispositivo:
    def __init__(self):
        self.disco = Disco()  # El controlador interactúa con el disco

    def leer_disco(self, direccion):
        # El controlador recibe la solicitud y la pasa al dispositivo
        print(f"Controlador: Recibiendo solicitud de lectura desde la dirección {direccion}.")
        time.sleep(1)  # Simulamos el tiempo de acceso al disco
        datos = self.disco.leer(direccion)  # Llama al disco para leer los datos
        return datos

# Simulamos el sistema que solicita la lectura de datos del disco
def sistema_de_lectura(controlador, direccion):
    print(f"Sistema: Solicita lectura desde la dirección {direccion} del disco.")
    datos = controlador.leer_disco(direccion)
    print(f"Sistema: Datos leídos: {datos}")

# Crear un controlador de dispositivo
controlador = ControladorDispositivo()

# Simulamos varias solicitudes de lectura de diferentes direcciones en el disco
direcciones = [0, 2, 4, 1, 3, 5]  # Incluimos una dirección inválida (5)

for direccion in direcciones:
    sistema_de_lectura(controlador, direccion)
    time.sleep(2)  # Simula el paso del tiempo entre las solicitudes
    </code>
  </pre>

  <h2>Video</h2>
  <div class="video-container">
    <iframe 
      src="https://www.youtube.com/embed/6UdMlaVE4og" 
      title="Clases de Controladores de Dispositivos" 
      frameborder="0" 
      allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
      allowfullscreen>
    </iframe>
    <p>Andrés, W. (2021, 06 de enero). Clases de Controladores de Dispositivos. YouTube. <a href="https://www.youtube.com/watch?v=6UdMlaVE4og" target="_blank">Ver video</a></p>
  </div>

  <h2>Conclusión</h2>
  <p class="conclusion">Actúan como puente crítico entre el sistema operativo y el hardware.</p>

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
