<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>5.2.1 Objetivos del Software de E/S</title>
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
    h3 {
      margin-top: 15px;
      margin-bottom: 8px;
      color: #0d6efd;
      font-weight: 600;
    }
    p {
      margin-bottom: 15px;
    }
    ul {
      margin-left: 20px;
      margin-bottom: 15px;
    }
    li {
      margin-bottom: 8px;
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

    /* Tabla para Descripción Técnica y Ejemplo Práctico */
    table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 15px;
    }
    table, th, td {
      border: 1px solid #ccc;
    }
    th, td {
      padding: 10px;
      vertical-align: top;
      text-align: left;
    }
    th {
      background-color: #0d6efd;
      color: white;
      width: 30%;
    }

    /* Estilos para el bloque de código */
    pre {
      background-color: #f8f9fa;
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
      <li><a href="/pagina_sistemas/videos.html">Videos</a></li>
    </ul>
  </nav>
</header>

<main>
  <h1>5.2.1 Objetivos del Software de E/S</h1>

  <h2>Introducción</h2>
  <p>Los objetivos del software de E/S guían su arquitectura para balancear eficiencia, compatibilidad y seguridad (Stallings, 2021).</p>

  <h2>Metas Principales</h2>
  <ul>
    <li><strong>Uniformidad:</strong> Misma interfaz para dispositivos similares (ej: write() funciona en discos y USB).</li>
    <li><strong>Eficiencia:</strong> Uso de DMA/interrupciones para evitar esperas activas.</li>
    <li><strong>Protección:</strong> Aislamiento entre procesos para evitar accesos no autorizados.</li>
  </ul>

  <h2>Características</h2>
  <ul>
    <li><strong>Detección de errores:</strong> Verificación de integridad de datos (ej.: checksums).</li>
    <li><strong>Recuperación:</strong> Reintento de operaciones fallidas o uso de redundancia (ej.: discos en RAID).</li>
    <li><strong>Notificación:</strong> Informar a las aplicaciones o usuarios sobre fallos.</li>
  </ul>

  <h2>Ejemplo</h2>
  <p>En Linux, el sistema de archivos virtual (<code>/dev</code>) unifica el acceso a dispositivos diversos (Tanenbaum & Bos, 2022, p. 230).</p>

  <h2>Ejemplo código:</h2>
  <pre>
    <code>
import os
import time
import threading

# Objetivo 1: Optimización del rendimiento mediante buffering y caché
class Buffering:
    def __init__(self, buffer_size=1024):
        self.buffer = bytearray(buffer_size)
        self.buffer_size = buffer_size
        self.current_position = 0

    def write(self, data):
        # Escribe datos en el buffer
        data_length = len(data)
        if data_length + self.current_position > self.buffer_size:
            print("Buffer lleno. Escribiendo a disco...")
            self.flush()
        self.buffer[self.current_position:self.current_position + data_length] = data
        self.current_position += data_length

    def flush(self):
        # Simula escribir el contenido del buffer a disco
        print(f"Escribiendo {self.buffer[:self.current_position]} a disco")
        self.current_position = 0

# Objetivo 2: Manejo adecuado de errores (try/except)
class FileManager:
    def __init__(self, file_name):
        self.file_name = file_name

    def read_file(self):
        try:
            with open(self.file_name, 'r') as file:
                return file.read()
        except FileNotFoundError:
            print(f"Error: El archivo {self.file_name} no se encuentra.")
            return None
        except IOError as e:
            print(f"Error de E/S: {e}")
            return None

# Objetivo 3: Sincronización eficiente (threading)
class DataProcessor(threading.Thread):
    def __init__(self, data, buffer):
        threading.Thread.__init__(self)
        self.data = data
        self.buffer = buffer

    def run(self):
        for chunk in self.data:
            self.buffer.write(chunk)
            time.sleep(0.5)

# Simula la escritura de datos
buffer = Buffering()

# Simulando la escritura de datos en múltiples hilos
data_chunks = [b'Hola, ', b'mundo! ', b'Esto ', b'es ', b'un ', b'ejemplo.']

threads = []
for data in data_chunks:
    thread = DataProcessor(data, buffer)
    threads.append(thread)
    thread.start()

# Esperar a que todos los hilos terminen
for thread in threads:
    thread.join()

# Asegurarse de que el buffer se vacíe
buffer.flush()

# Objetivo 4: Seguridad en la transferencia de datos
def encrypt_data(data):
    # Simula un proceso simple de cifrado
    encrypted_data = ''.join(chr(ord(c) + 3) for c in data)
    return encrypted_data

def decrypt_data(data):
    # Simula un proceso simple de descifrado
    decrypted_data = ''.join(chr(ord(c) - 3) for c in data)
    return decrypted_data

data_to_encrypt = "Mensaje Secreto"
encrypted = encrypt_data(data_to_encrypt)
decrypted = decrypt_data(encrypted)

print(f"Original: {data_to_encrypt}")
print(f"Encriptado: {encrypted}")
print(f"Desencriptado: {decrypted}")
    </code>
  </pre>

  <h2>Video</h2>
  <div class="video-container">
    <iframe 
      src="https://www.youtube.com/embed/fZqYD7D_agk" 
      title="¿Qué es un SOFTWARE?" 
      frameborder="0" 
      allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
      allowfullscreen>
    </iframe>
    <p>Mira como hacerlo. (2022, 28 de octubre). ¿Qué es un SOFTWARE?. YouTube. <a href="https://www.youtube.com/watch?v=fZqYD7D_agk" target="_blank">Ver video</a></p>
  </div>

  <p class="conclusion">Conclusión: Estos objetivos son críticos para sistemas estables y escalables.</p>

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




