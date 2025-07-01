<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>5.1.2 Controladores de Dispositivos</title>
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

    /* Estilo para el código */
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
  <h1>5.1.2 Controladores de Dispositivos</h1>

  <h2>Introducción</h2>
  <p>Los controladores de dispositivos son circuitos o software que actúan como intermediarios entre el hardware físico y el sistema operativo, traduciendo comandos genéricos a instrucciones específicas para cada dispositivo (Silberschatz et al., 2018).</p>

  <h2>Funciones Principales</h2>
  <ul>
    <li><strong>Traducción de señales:</strong> Convierten voltajes eléctricos a bits entendibles por la CPU.</li>
    <li><strong>Bufferización:</strong> Almacenan datos temporales para compensar diferencias de velocidad.</li>
    <li><strong>Manejo de errores:</strong> Detectan fallos (ej: desconexión de un USB).</li>
  </ul>

  <h2>Ejemplos</h2>
  <ul>
    <li><strong>Controlador de disco:</strong> Convierte “lectura del sector X” en movimiento del cabezal del HDD.</li>
    <li><strong>Controlador USB:</strong> Gestiona la comunicación plug-and-play (Tanenbaum & Bos, 2022).</li>
  </ul>

  <h2>Importancia</h2>
  <p>Sin controladores, cada dispositivo requeriría su propio lenguaje de programación, haciendo imposible la estandarización (Stallings, 2021).</p>

  <h2>Ejemplo de Controlador de Dispositivo en Linux (Kernel Module)</h2>
  <pre>
    <code>
#include <linux/module.h>
#include <linux/fs.h>
#include <linux/uaccess.h>

#define DEVICE_NAME "mi_dispositivo"
#define BUFFER_SIZE 1024

static char device_buffer[BUFFER_SIZE];
static int major_number;

// Función llamada al abrir el dispositivo
static int dispositivo_open(struct inode *inodep, struct file *filep) {
    printk(KERN_INFO "MiControlador: Dispositivo abierto\n");
    return 0;
}

// Función llamada al leer desde el dispositivo
static ssize_t dispositivo_read(struct file *filep, char *buffer, size_t len, loff_t *offset) {
    copy_to_user(buffer, device_buffer, len);
    printk(KERN_INFO "MiControlador: Datos leídos\n");
    return len;
}

// Función llamada al escribir en el dispositivo
static ssize_t dispositivo_write(struct file *filep, const char *buffer, size_t len, loff_t *offset) {
    copy_from_user(device_buffer, buffer, len);
    printk(KERN_INFO "MiControlador: Datos escritos: %s\n", device_buffer);
    return len;
}

// Estructura de operaciones del controlador
static struct file_operations fops = {
    .open = dispositivo_open,
    .read = dispositivo_read,
    .write = dispositivo_write,
};

// Inicialización del módulo
static int __init mi_controlador_init(void) {
    major_number = register_chrdev(0, DEVICE_NAME, &fops);
    printk(KERN_INFO "MiControlador: Registrado con major number %d\n", major_number);
    return 0;
}

// Limpieza del módulo
static void __exit mi_controlador_exit(void) {
    unregister_chrdev(major_number, DEVICE_NAME);
    printk(KERN_INFO "MiControlador: Desregistrado\n");
}

module_init(mi_controlador_init);
module_exit(mi_controlador_exit);
MODULE_LICENSE("GPL");
    </code>
  </pre>

  <h2>Video</h2>
  <div class="video-container">
    <iframe 
      src="https://www.youtube.com/embed/RULRzrg3auY" 
      title="¿Qué son los Drivers o Controladores y para qué sirven?" 
      frameborder="0" 
      allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
      allowfullscreen>
    </iframe>
    <p>Maestro de la Computación. (2019, 23 de septiembre). ¿Qué son los Drivers o Controladores y para qué sirven? YouTube. <a href="https://www.youtube.com/watch?v=RULRzrg3auY" target="_blank">Ver video</a></p>
  </div>

  <h2>Conclusión</h2>
  <p>Son esenciales para abstraer la complejidad del hardware y simplificar el desarrollo de software.</p>

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
