<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>5.3 Capas de Software de E/S</title>
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
    figure {
      margin: 20px 0;
      text-align: center;
    }
    figure img {
      max-width: 100%;
      height: auto;
      border: 1px solid #ccc;
      border-radius: 8px;
    }
    figcaption {
      font-size: 0.9rem;
      color: #555;
      margin-top: 8px;
      font-style: italic;
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
      <li><a href="/pagina_sistemas/index.php">Inicio</a></li>
      <li><a href="/pagina_sistemas/cursos.php" class="active">Menú</a></li>
      <li><a href="/pagina_sistemas/videos.php">Videos</a></li> <!-- Enlace a Videos -->
    </ul>
  </nav>
</header>

<main>
  <h1>5.3 Capas de Software de E/S</h1>

  <h2>Introducción</h2>
  <p>El software de E/S se organiza en capas jerárquicas que abstraen la complejidad del hardware, facilitando el desarrollo de aplicaciones y garantizando eficiencia (Silberschatz et al., 2018). Estas capas incluyen componentes en modo kernel y modo usuario.</p>

  <figure>
    <img src="/pagina_sistemas/unidad5.3/figura3.png" alt="Capas del sistema de software de E/S" />
    <figcaption>Figura 3. Capas del sistema de software de E/S.</figcaption>
  </figure>

  <p><figcaption>Tanenbaum en su obra señala que la arquitectura del software de E/S se organiza en capas jerárquicas, desde el hardware hasta las aplicaciones de usuario:</figcaption></p>
  <ul>
    <li>Manejador de interrupciones (nivel más bajo).</li>
    <li>Controladores de dispositivos (drivers).</li>
    <li>Software de sistema operativo independiente del dispositivo.</li>
    <li>Software en modo usuario (APIs y bibliotecas).</li>
  </ul>

  <p>Según Silberschatz, Galvin y Gagne (2018) en "Operating System Concepts" (10ª ed., Cap. 13), el subsistema de E/S en sistemas operativos se organiza en capas jerárquicas para abstraer la complejidad del hardware. La capa 5.3 incluye: (1) gestión de dispositivos (drivers), que comunica directamente con el hardware; (2) sistema de archivos, que traduce solicitudes de aplicaciones a operaciones de bloques; y (3) capa de E/S en espacio de usuario (bibliotecas como libaio), que optimiza el acceso para aplicaciones. Estas capas garantizan portabilidad, seguridad y rendimiento, especialmente en entornos de almacenamiento escalable como IBM Spectrum Scale (Silberschatz et al., 2018, p. 567).</p>

  <h2>Ventajas</h2>
  <ul>
    <li>Portabilidad: Las aplicaciones no dependen de hardware específico.</li>
    <li>Seguridad: El kernel controla accesos directos a dispositivos (Tanenbaum & Bos, 2022, p. 240).</li>
  </ul>

  <h2>Ejemplo código</h2>
  <pre>
    <code>
import os
# Capa de Aplicaciones: La aplicación solicita la lectura de un archivo.
class Aplicacion:
    def __init__(self, archivo):
        self.archivo = archivo

    def leer_archivo(self):
        print(f"Aplicación: Solicita la lectura del archivo {self.archivo}.")
        datos = SistemaOperativo().leer_archivo(self.archivo)
        print(f"Aplicación: Datos leídos - {datos}")

# Capa de Servicios del Sistema: El sistema operativo recibe la solicitud de la aplicación y gestiona la operación.
class SistemaOperativo:
    def leer_archivo(self, archivo):
        print(f"Sistema Operativo: Recibe la solicitud para leer el archivo {archivo}.")
        datos = ControladorDispositivo().leer_disco(archivo)
        return datos

# Capa de Controladores de Dispositivo: El controlador del dispositivo maneja la interacción con el disco para leer el archivo.
class ControladorDispositivo:
    def leer_disco(self, archivo):
        print(f"Controlador de Dispositivo: Solicita al disco la lectura del archivo {archivo}.")
        datos = Disco().leer(archivo)
        return datos

# Capa de Gestión de Hardware: El hardware del disco realiza la lectura física del archivo.
class Disco:
    def leer(self, archivo):
        # Simulamos la lectura de un archivo en el disco
        print(f"Disco: Leyendo el archivo {archivo} desde el disco.")
        # Suponemos que el archivo contiene estos datos
        datos = "Datos de prueba: Esto es una simulación de lectura de un archivo."
        return datos

# Simulamos la ejecución del programa
if __name__ == "__main__":
    archivo = "datos.txt"
    aplicacion = Aplicacion(archivo)
    aplicacion.leer_archivo()
    </code>
  </pre>

  <h2>Video</h2>
  <div class="video-container">
    <iframe 
      src="https://www.youtube.com/embed/SFKCisRZOwo" 
      title="Capas del Software de E/S" 
      frameborder="0" 
      allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
      allowfullscreen>
    </iframe>
    <p>Jesús, M. (2016, 22 de febrero). CAPAS DEL SOFTWARE DE E/S. YouTube. <a href="https://www.youtube.com/watch?v=SFKCisRZOwo" target="_blank">Ver video</a></p>
  </div>

  <h2>Conclusión</h2>
  <p class="conclusion">Esta arquitectura por capas es fundamental en sistemas operativos modernos.</p>

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


