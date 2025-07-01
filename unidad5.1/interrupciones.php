<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>5.1.3 Interrupciones</title>
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
    ol {
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

    /* Estilos para hacer el video más atractivo */
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
      background-color:rgb(212, 212, 212);
      padding: 20px;
      border-radius: 8px;
      border: 1px solid #333;
      overflow-x: auto;
      margin-top: 20px;
      color:rgb(212, 212, 206);
      font-size: 1rem;
    }

    code {
      font-family: 'Courier New', Courier, monospace;
      white-space: pre-wrap;
      word-wrap: break-word;
      color:rgb(70, 70, 67);
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
  <h1>5.1.3 Interrupciones</h1>

  <h2>Introducción</h2>
  <p>De tal manera, se puede inferir que “Las interrupciones son señales enviadas por dispositivos para notificar a la CPU que requieren atención inmediata. Evitan el polling (consulta constante), optimizando el uso del procesador” (Patterson & Hennessy, 2021).</p>

  <h2>Tipos</h2>
  <ul>
    <li><strong>Hardware:</strong> Generadas por dispositivos físicos (ej: tecla presionada).</li>
    <li><strong>Software:</strong> Solicitudes del sistema operativo (ej: llamadas a kernel).</li>
  </ul>

  <h2>Procesos</h2>
  <ol>
    <li>El dispositivo envía una señal al controlador de interrupciones.</li>
    <li>La CPU guarda el estado actual y ejecuta una rutina de atención (ISR).</li>
    <li>Al terminar, recupera el estado previo (Tanenbaum & Bos, 2022).</li>
  </ol>

  <h2>Ejemplo</h2>
  <p>Un ratón genera más de 100 interrupciones por segundo para movimientos fluidos (Stallings, 2021).</p>

  <h2>Ejemplo de Código de Interrupción</h2>
  <pre>
    <code>
/*
 * DEMO INTEGRADO DE INTERRUPCIONES (5.1.3)
 * Combina: 
 * - Interrupciones hardware (GPIO)
 * - Interrupciones por timer
 * - Manejo de prioridades
 * - Comunicación seguro ISR-main
 */

#include <avr/io.h>
#include <avr/interrupt.h>

// 1. Configuración de Hardware
#define LED_PIN   13
#define BTN_PIN   2
#define DEBOUNCE_MS 50

// 2. Variables compartidas (volatile)
volatile bool btn_pressed = false;
volatile uint32_t timer_ticks = 0;
volatile uint8_t system_state = 0;

// 3. Manejador de Interrupción Externa (INT0)
ISR(INT0_vect) {
  static uint32_t last_time = 0;
  uint32_t now = millis();
  
  if (now - last_time > DEBOUNCE_MS) {
    btn_pressed = true;
    system_state = (system_state + 1) % 4;
    last_time = now;
  }
}

// 4. Manejador de Interrupción por Timer (CTC Mode)
ISR(TIMER1_COMPA_vect) {
  timer_ticks++;
  digitalWrite(LED_PIN, timer_ticks % 2); // Blink LED
}

// 5. Inicialización de Interrupciones
void setup_interrupts() {
  // Configurar INT0 (flanco descendente)
  EICRA |= (1 << ISC01);
  EIMSK |= (1 << INT0);
  
  // Configurar Timer1 (1Hz)
  TCCR1A = 0;
  TCCR1B = (1 << WGM12) | (1 << CS12) | (1 << CS10); // CTC, prescaler 1024
  OCR1A = 15624; // 16MHz/1024/1Hz - 1
  TIMSK1 = (1 << OCIE1A);
  
  // Prioridades (naturales en AVR: INT0 > TIMER1)
  PCICR = 0;
  PCMSK = 0;
}

// 6. Main Loop con Gestión de Estados
void handle_system_states() {
  switch(system_state) {
    case 0: // Estado inicial
      Serial.println("Modo: Espera activa");
      break;
      
    case 1: // Modo baja prioridad
      if (btn_pressed) {
        Serial.println("Evento BTN - Prioridad Media");
        btn_pressed = false;
      }
      break;
      
    case 2: // Modo alta prioridad
      Serial.println("Modo: Critico (Ignora inputs)");
      delay(1000); // Simula tarea crítica
      system_state = 0;
      break;
      
    case 3: // Modo debug
      Serial.print("Timer ticks: ");
      Serial.println(timer_ticks);
      delay(300);
      break;
  }
}

// 7. Configuración Inicial
void setup() {
  pinMode(LED_PIN, OUTPUT);
  pinMode(BTN_PIN, INPUT_PULLUP);
  Serial.begin(115200);
  
  setup_interrupts();
  sei(); // Habilitar interrupciones globales
  
  Serial.println("Sistema de Interrupciones Iniciado");
}

// 8. Loop Principal
void loop() {
  handle_system_states();
  
  // Ejemplo: Uso seguro de variables compartidas
  noInterrupts();
  uint32_t ticks = timer_ticks;
  interrupts();
  
  if (ticks % 10 == 0) {
    Serial.print(".");
    delay(100);
  }
}
    </code>
  </pre>

  <h2>Video</h2>
  <div class="video-container">
    <iframe 
      src="https://www.youtube.com/embed/0Q6wGDmIVGg" 
      title="Tipos de Interrupciones" 
      frameborder="0" 
      allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
      allowfullscreen>
    </iframe>
    <p>Claudio, G. (2021, 10 de marzo). Tipos de Interrupciones. YouTube. <a href="https://www.youtube.com/watch?v=0Q6wGDmIVGg" target="_blank">Ver video</a></p>
  </div>

  <p class="conclusion">Conclusión: Son fundamentales para sistemas multitarea y respuesta en tiempo real.</p>

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

