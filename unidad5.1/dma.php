<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>5.1.4 Acceso de Memoria Directo (DMA)</title>
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
      <li><a href="/pagina_sistemas/index.php">Inicio</a></li>
      <li><a href="/pagina_sistemas/cursos.php" class="active">Menú</a></li>
      <li><a href="/pagina_sistemas/videos.php">Videos</a></li> <!-- Agregado el enlace a videos -->
    </ul>
  </nav>
</header>

<main>
  <h1>5.1.4 Acceso de Memoria Directo (DMA)</h1>

  <h2>Introducción</h2>
  <p>El DMA es un mecanismo que permite a dispositivos transferir datos directamente a la RAM sin intervención constante de la CPU, ideal para operaciones masivas (ej: carga de un vídeo) (Silberschatz et al., 2018).</p>

  <h2>Ventajas</h2>
  <ul>
    <li><strong>Libera a la CPU:</strong> Evita ciclos de espera en transferencias largas.</li>
    <li><strong>Mayor velocidad:</strong> Usa canales dedicados (ej: bus PCIe).</li>
  </ul>

  <h2>Proceso</h2>
  <ol>
    <li>La CPU configura el controlador DMA (dirección de memoria, tamaño de datos).</li>
    <li>El dispositivo (ej: tarjeta de red) copia datos vía DMA.</li>
    <li>El DMA notifica a la CPU al finalizar (Tanenbaum & Bos, 2022).</li>
  </ol>

  <figure>
    <img src="/pagina_sistemas/unidad5.1/figura2.png" alt="Operación de una transferencia de DMA" />
    <figcaption>Figura 2. Operación de una transferencia de DMA (Tanenbaum, 2022)</figcaption>
  </figure>

  <h2>Aplicaciones</h2>
  <ul>
    <li>Tarjetas gráficas (GPU).</li>
    <li>Discos NVMe (Stallings, 2021).</li>
  </ul>

  <h2>Descripción Técnica y Ejemplo Práctico</h2>
  <table>
    <tbody>
      <tr>
        <th>Desacoplamiento CPU</th>
        <td>La CPU solo configura parámetros iniciales (dirección, tamaño), no participa en la transferencia.<br>Ejemplo: transferencia de vídeo 4K a 60 fps sin carga de CPU.</td>
      </tr>
      <tr>
        <th>Canales DMA dedicados</th>
        <td>Buses exclusivos (ej.: PCIe lanes) evitan congestión en el bus principal.<br>NVMe SSDs usan x4 PCIe lanes para 8 GB/s.</td>
      </tr>
      <tr>
        <th>Modos de operación</th>
        <td>
          <ul>
            <li>Burst mode (bloques grandes)</li>
            <li>Cycle stealing (transferencias pequeñas intercaladas).<br>Ejemplo: captura de audio en tiempo real.</li>
          </ul>
        </td>
      </tr>
      <tr>
        <th>Registros de control</th>
        <td>Registros mapeados en memoria para dirección fuente/destino, contador de bytes, registro de estado.</td>
      </tr>
      <tr>
        <th>Programación</th>
        <td>Programación del DMA en microcontroladores ARM Cortex.</td>
      </tr>
    </tbody>
  </table>

  <h2>Ejemplo</h2>
  <pre>
    <code>
#include "stm32f4xx_hal.h"

UART_HandleTypeDef huart2;
DMA_HandleTypeDef hdma_usart2_tx;

// Buffer de datos
const char mensaje[] = "DMA en acción!\r\n";
uint8_t dma_completo = 0;

void SystemClock_Config(void);
static void MX_GPIO_Init(void);
static void MX_DMA_Init(void);
static void MX_USART2_UART_Init(void);

// Callback de finalización de DMA
void HAL_UART_TxCpltCallback(UART_HandleTypeDef *huart) {
    dma_completo = 1;  // Bandera de transferencia completa
}

int main(void) {
    HAL_Init();
    SystemClock_Config();
    MX_GPIO_Init();
    MX_DMA_Init();
    MX_USART2_UART_Init();

    // 1. Configurar transferencia DMA
    HAL_UART_Transmit_DMA(&huart2, (uint8_t*)mensaje, sizeof(mensaje));

    while (1) {
        // 2. El núcleo puede hacer otras tareas durante la transferencia
        if (dma_completo) {
            HAL_GPIO_TogglePin(GPIOD, GPIO_PIN_12); // LED indicador
            dma_completo = 0;
            HAL_Delay(500);
            
            // 3. Reiniciar transferencia
            HAL_UART_Transmit_DMA(&huart2, (uint8_t*)mensaje, sizeof(mensaje));
        }
    }
}

// Inicialización del DMA
void MX_DMA_Init(void) {
    __HAL_RCC_DMA1_CLK_ENABLE();
    
    hdma_usart2_tx.Instance = DMA1_Stream6;
    hdma_usart2_tx.Init.Channel = DMA_CHANNEL_4;
    hdma_usart2_tx.Init.Direction = DMA_MEMORY_TO_PERIPH;
    hdma_usart2_tx.Init.PeriphInc = DMA_PINC_DISABLE;
    hdma_usart2_tx.Init.MemInc = DMA_MINC_ENABLE;
    hdma_usart2_tx.Init.PeriphDataAlignment = DMA_PDATAALIGN_BYTE;
    hdma_usart2_tx.Init.MemDataAlignment = DMA_MDATAALIGN_BYTE;
    hdma_usart2_tx.Init.Mode = DMA_NORMAL;
    hdma_usart2_tx.Init.Priority = DMA_PRIORITY_HIGH;
    hdma_usart2_tx.Init.FIFOMode = DMA_FIFOMODE_DISABLE;
    
    HAL_DMA_Init(&hdma_usart2_tx);
    __HAL_LINKDMA(&huart2, hdmatx, hdma_usart2_tx);
}
    </code>
  </pre>

  <h2>Video</h2>
  <div class="video-container">
    <iframe 
      src="https://www.youtube.com/embed/YiDwDRFAqcw" 
      title="Acceso Directo a Memoria" 
      frameborder="0" 
      allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
      allowfullscreen>
    </iframe>
    <p>Tecnología. (2022, 05 de mayo). Acceso Directo a Memoria. YouTube. <a href="https://www.youtube.com/watch?v=YiDwDRFAqcw" target="_blank">Ver video</a></p>
  </div>

  <p class="conclusion">Conclusión: El DMA es clave para sistemas de alto rendimiento y baja latencia.</p>

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



