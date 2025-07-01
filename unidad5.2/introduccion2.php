<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>5.2 Principios del Software de E/S</title>
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
      <li><a href="/pagina_sistemas/videos.html">Videos</a></li>
    </ul>
  </nav>
</header>

<main>
  <h1>5.2 Principios del Software de E/S</h1>

  <h2>Introducción</h2>
  <p>El software de Entrada/Salida (E/S) es la capa lógica que gestiona la comunicación entre el sistema operativo y los dispositivos físicos. Su diseño busca optimizar el rendimiento, garantizar la portabilidad y manejar errores eficientemente (Silberschatz et al., 2018).</p>

  <h2>Objetivos Clave</h2>
  <ul>
    <li><strong>Independencia del dispositivo:</strong> Aplicaciones acceden a dispositivos mediante interfaces uniformes.</li>
    <li><strong>Manejo de errores:</strong> Detección y recuperación ante fallos (ej: disco lleno).</li>
    <li><strong>Rendimiento:</strong> Minimizar latencias mediante técnicas como buffering (Tanenbaum & Bos, 2022, p.225).</li>
  </ul>

  <h2>Tipos de E/S</h2>
  <h3>1. E/S Programada (Polling)</h3>
  <ul>
    <li><strong>Características:</strong> La CPU verifica constantemente el estado del dispositivo.</li>
    <li><strong>Ejemplo:</strong> Consulta de un puerto GPIO en microcontroladores sin soporte de interrupciones.</li>
  </ul>
  
  <h3>2. E/S por Interrupciones</h3>
  <ul>
    <li><strong>Características:</strong> El dispositivo notifica a la CPU cuando está listo.</li>
    <li><strong>Ejemplo:</strong> Teclado: Genera una interrupción por cada pulsación.</li>
  </ul>

  <h3>3. E/S con DMA</h3>
  <ul>
    <li><strong>Características:</strong> Acceso Directo a Memoria (DMA): Transfiere datos sin CPU.</li>
    <li><strong>Ejemplo:</strong> Copia de un archivo de 10 GB desde un SSD a RAM.</li>
  </ul>

  <h3>4. E/S Mapeada en Memoria</h3>
  <ul>
    <li><strong>Características:</strong> Los dispositivos se direccionan como posiciones de memoria.</li>
    <li><strong>Ejemplo:</strong> VRAM en tarjetas gráficas accedida como memoria convencional.</li>
  </ul>

  <h2>Componentes</h2>
  <ul>
    <li><strong>Controladores de dispositivo (kernel).</strong></li>
    <li><strong>APIs para aplicaciones (ej: open(), read() en Unix).</strong></li>
  </ul>

  <h2>Ejemplo Código</h2>
  <pre>
    <code>
import os
import time

# Simulamos un "dispositivo" de almacenamiento (archivo)
class DispositivoAlmacenamiento:
    def __init__(self, nombre_archivo):
        self.nombre_archivo = nombre_archivo
        self.buffer = []

    def escribir(self, datos):
        """Simula la escritura de datos en el archivo."""
        print("Escribiendo en el buffer...")
        self.buffer.append(datos)
        time.sleep(1)  # Simula el tiempo de escritura en el buffer

    def vaciar_buffer(self):
        """Simula vaciar el buffer y escribir los datos en el archivo."""
        try:
            with open(self.nombre_archivo, 'a') as archivo:
                for dato in self.buffer:
                    archivo.write(dato + "\n")
            print(f"Buffer vaciado. Datos escritos en {self.nombre_archivo}.")
            self.buffer.clear()
        except Exception as e:
            print(f"Error al escribir en el archivo: {e}")

    def leer(self):
        """Simula la lectura del archivo."""
        try:
            with open(self.nombre_archivo, 'r') as archivo:
                contenido = archivo.read()
            return contenido
        except FileNotFoundError:
            print("Error: El archivo no existe.")
            return None

# Simulamos el software de E/S que utiliza el dispositivo
def software_de_es():
    dispositivo = DispositivoAlmacenamiento("datos.txt")

    # Escribir datos en el dispositivo
    dispositivo.escribir("Primer conjunto de datos")
    dispositivo.escribir("Segundo conjunto de datos")
    dispositivo.vaciar_buffer()

    # Leer datos del dispositivo
    print("Leyendo datos desde el archivo...")
    contenido = dispositivo.leer()
    if contenido:
        print("Contenido leído del archivo:")
        print(contenido)
    else:
        print("No se pudo leer el archivo.")

# Ejecutar el software de E/S
if __name__ == "__main__":
    software_de_es()
    </code>
  </pre>

  <h2>Conclusión</h2>
  <p>El software de E/S abstrae la complejidad del hardware, permitiendo desarrollo ágil de aplicaciones.</p>

  <h2>Video</h2>
  <div class="video-container">
    <iframe 
      src="https://www.youtube.com/embed/1w3J3gTtU4Q" 
      title="¿Qué es un SOFTWARE? Tipos de software - SOFTWARE #1" 
      frameborder="0" 
      allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
      allowfullscreen>
    </iframe>
    <p>TECNOLOGIAS. (2018, 17 de mayo). ¿Qué es un SOFTWARE? Tipos de software - SOFTWARE #1. YouTube. <a href="https://www.youtube.com/watch?v=1w3J3gTtU4Q" target="_blank">Ver video</a></p>
  </div>

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
