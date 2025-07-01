<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>5.1.1 Dispositivos de E/S</title>
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
    ul, ol {
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

    /* Estilos para el código */
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
      color: #333;
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
  <h1>5.1.1 Dispositivos de Entrada y Salida</h1>
  
  <h2>Introducción</h2> 
  <p>Los dispositivos de E/S son interfaces que permiten la interacción entre usuarios, sistemas y el entorno físico. Se clasifican por función (entrada, salida o almacenamiento) y por tipo de conexión (Patterson & Hennessy, 2021).</p>

  <figure>
    <img src="/pagina_sistemas/unidad5.1/figura1.png" alt="Velocidades de transferencia de datos comunes en dispositivos, redes y buses" />
    <figcaption>Figura 1. Velocidades de transferencia de datos comunes en algunos dispositivos, redes y buses. (Tanenbaum, 2022, p. 361)</figcaption>
  </figure>

  <p>Tanenbaum, en su obra Sistemas Operativos: las velocidades de transferencia de datos varían significativamente entre dispositivos, desde 10 bytes/seg (teclados) hasta 528 MB/seg (bus PCI).</p>

  <h2>Tipos</h2>
  <ul>
    <li><strong>Entrada:</strong> Teclados, cámaras, sensores.</li>
    <li><strong>Salida:</strong> Monitores, impresoras, altavoces.</li>
    <li><strong>Almacenamiento:</strong> Discos duros, SSDs, unidades USB.</li>
    <li><strong>Comunicación:</strong> Tarjetas de red, módems.</li>
  </ul>

  <h2>Características Técnicas</h2>
  <p><strong>Velocidad:</strong> Varía desde 1 KB/s (teclados) hasta GB/s (NVMe).</p>
  <p><strong>Protocolos:</strong> USB, SATA, Bluetooth (Stallings, 2021).</p>

  <h2>Ejemplo práctico</h2>
  <p>Un SSD NVMe usa el bus PCIe para alcanzar velocidades de 3.5 GB/s, superando a los discos tradicionales (Tanenbaum & Bos, 2022, p. 210).</p>

  <h2>Código de ejemplo: Simulación de dispositivos de E/S en Python</h2>
  <pre>
    <code>
# 1. Dispositivo de ENTRADA (Teclado)
def leer_teclado():
    dato = input("Ingrese un texto (dispositivo de entrada - teclado): ")
    return dato

# 2. Dispositivo de SALIDA (Pantalla)
def escribir_pantalla(mensaje):
    print(f"Salida en pantalla: {mensaje}")

# 3. Dispositivo de ENTRADA/SALIDA (Archivo)
def guardar_en_archivo(dato, nombre_archivo="datos.txt"):
    with open(nombre_archivo, 'w') as archivo:
        archivo.write(dato)
    print(f"Datos guardados en {nombre_archivo}")

def leer_archivo(nombre_archivo="datos.txt"):
    with open(nombre_archivo, 'r') as archivo:
        return archivo.read()

# --- Uso de los dispositivos ---
if __name__ == "__main__":
    # Entrada desde teclado
    texto = leer_teclado()

    # Salida a pantalla
    escribir_pantalla(f"Texto ingresado: {texto}")

    # Guardar en archivo (dispositivo E/S)
    guardar_en_archivo(texto)

    # Leer del archivo
    contenido = leer_archivo()
    escribir_pantalla(f"Contenido del archivo: {contenido}")
    </code>
  </pre>
  
  <h2>Conclusión</h2>
  <p>La diversidad de dispositivos exige estándares universales y controladores específicos para garantizar compatibilidad.</p>

  <h2>Video</h2>
  <div class="video-container">
    <iframe 
      src="https://www.youtube.com/embed/gK8ZSTiokws" 
      title="Dispositivos de entrada y salida de una computadora" 
      frameborder="0" 
      allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
      allowfullscreen>
    </iframe>
    <p>Luis, R. (2021, 18 de junio). Dispositivos de entrada y salida de una computadora. YouTube. <a href="https://www.youtube.com/watch?v=gK8ZSTiokws" target="_blank">Ver video</a></p>
  </div>

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


