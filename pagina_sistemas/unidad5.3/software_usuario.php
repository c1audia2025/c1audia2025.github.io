<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>5.3.3 Software en Modo Usuario para E/S</title>
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
  <h1>5.3.3 Software en Modo Usuario para E/S</h1>

  <h2>Introducción</h2>
  <p>Esta capa proporciona APIs de alto nivel (ej.: <code>fopen()</code> en C) para que las aplicaciones accedan a dispositivos sin interactuar directamente con el kernel (Tanenbaum & Bos, 2022).</p>

  <h2>Componentes</h2>
  <ul>
    <li>Bibliotecas estándar: Como <code>stdio.h</code> en C.</li>
    <li>Servicios del sistema: Llamadas como <code>read()</code> / <code>write()</code> en Unix.</li>
    <li>Virtualización: <code>/dev</code> en Linux unifica dispositivos como archivos.</li>
  </ul>

  <h2>Ventajas</h2>
  <ul>
    <li>Simplicidad: Ocultar complejidad del hardware.</li>
    <li>Portabilidad: Mismo código funciona en diferentes sistemas.</li>
  </ul>

  <h2>Ejemplo</h2>
  <p>La función <code>printf()</code> en C usa buffering para minimizar llamadas al kernel (Stallings, 2021, p. 330).</p>

  <h2>Ejemplo de Código:</h2>
  <pre>
    <code>
import os

# Simulamos un archivo de texto en el que realizaremos E/S
archivo_path = 'ejemplo_datos.txt'

# Función para escribir datos en el archivo (simulando E/S)
def escribir_datos():
    print(f"Modo Usuario: Escribiendo en el archivo '{archivo_path}'...")
    with open(archivo_path, 'w') as archivo:
        archivo.write("Este es un ejemplo de datos escritos por el software en modo usuario.\n")
        archivo.write("Se utiliza para demostrar operaciones de E/S de manera controlada por el sistema operativo.")
    print(f"Modo Usuario: Datos escritos en el archivo '{archivo_path}'.")

# Función para leer datos del archivo (simulando E/S)
def leer_datos():
    print(f"Modo Usuario: Leyendo datos desde el archivo '{archivo_path}'...")
    with open(archivo_path, 'r') as archivo:
        contenido = archivo.read()
    print(f"Modo Usuario: Contenido leído:\n{contenido}")

# Función principal que simula las operaciones de E/S en modo usuario
def main():
    # Verificamos si el archivo ya existe y lo eliminamos si es necesario
    if os.path.exists(archivo_path):
        os.remove(archivo_path)
    
    # Escribimos datos en el archivo
    escribir_datos()
    
    # Leemos los datos desde el archivo
    leer_datos()

# Ejecutamos la función principal
if __name__ == "__main__":
    main()
    </code>
  </pre>

  <h2>Video</h2>
  <div class="video-container">
    <iframe 
      src="https://www.youtube.com/embed/6EI3Ig7efWY" 
      title="¿Qué es Kernel?" 
      frameborder="0" 
      allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
      allowfullscreen>
    </iframe>
    <p>Computer. (2018, 07 de enero). ¿Qué es Kernel?. YouTube. <a href="https://www.youtube.com/watch?v=6EI3Ig7efWY" target="_blank">Ver video</a></p>
  </div>

  <h2>Conclusión</h2>
  <p class="conclusion">Permite desarrollar aplicaciones multiplataforma con interfaces consistentes.</p>

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
