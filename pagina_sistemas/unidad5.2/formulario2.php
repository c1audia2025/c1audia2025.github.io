<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Evaluación Unidad V</title>
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
    nav ul li a:hover, nav ul li a.active {
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
    form > div {
      margin-bottom: 20px;
    }
    label {
      font-weight: 600;
      color: #0d6efd;
      display: block;
      margin-bottom: 8px;
    }
    input[type="radio"] {
      margin-right: 10px;
    }
    button {
      background: #0d6efd;
      color: white;
      border: none;
      padding: 12px 25px;
      border-radius: 25px;
      font-weight: 700;
      cursor: pointer;
      font-size: 1.1rem;
      transition: background 0.3s ease;
      display: block;
      margin: 0 auto;
      width: 100%;
      max-width: 200px;
    }
    button:hover {
      background: #0b5ed7;
    }
    .resultado {
      font-weight: 700;
      font-size: 1.2rem;
      color: green;
      text-align: center;
      margin-top: 20px;
    }
    .error {
      background: #f8d7da;
      color: #842029;
      border-radius: 8px;
      padding: 10px 15px;
      margin-bottom: 20px;
    }
    .feedback {
      background: #fff3cd;
      color: #664d03;
      border-radius: 8px;
      padding: 10px 15px;
      margin-bottom: 15px;
    }
    .feedback strong {
      display: block;
      margin-bottom: 5px;
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
  </style>
</head>
<body>

<header>
  <div class="logo">Sistemas Operativos</div>
  <nav>
    <ul>
      <li><a href="#">Inicio</a></li>
      <li><a href="#" class="active">Menú</a></li>
      <li><a href="#">Contacto</a></li>
    </ul>
  </nav>
</header>

<main>
  <h1>Evaluación Unidad V</h1>

  <div id="errores" class="error" style="display: none;"></div>

  <div id="resultados" class="resultado" style="display: none;"></div>

  <div id="feedback" style="display: none;"></div>

  <form id="quizForm">
    <div>
      <label>1. ¿Qué es el software de Entrada/Salida (E/S)?</label>
      <input type="radio" id="p1a1" name="pregunta1" value="capa_logica" required />
      <label for="p1a1" style="display:inline;">Es la capa lógica que gestiona la comunicación entre el sistema operativo y los dispositivos físicos.</label><br />
      <input type="radio" id="p1a2" name="pregunta1" value="hardware" />
      <label for="p1a2" style="display:inline;">Es el hardware que conecta dispositivos</label><br />
      <input type="radio" id="p1a3" name="pregunta1" value="usuario" />
      <label for="p1a3" style="display:inline;">Es la capa de usuario del sistema</label><br />
      <input type="radio" id="p1a4" name="pregunta1" value="controlador" />
      <label for="p1a4" style="display:inline;">Es un controlador de dispositivo</label>
    </div>

    <div>
      <label>2. ¿Cuáles son los objetivos clave del software de E/S?</label>
      <input type="radio" id="p2a1" name="pregunta2" value="independencia" required />
      <label for="p2a1" style="display:inline;">Independencia del dispositivo, manejo de errores y rendimiento mediante buffering.</label><br />
      <input type="radio" id="p2a2" name="pregunta2" value="velocidad" />
      <label for="p2a2" style="display:inline;">Velocidad y ancho de banda</label><br />
      <input type="radio" id="p2a3" name="pregunta2" value="seguridad" />
      <label for="p2a3" style="display:inline;">Seguridad informática</label><br />
      <input type="radio" id="p2a4" name="pregunta2" value="interfaz" />
      <label for="p2a4" style="display:inline;">Interfaz gráfica de usuario</label>
    </div>

    <div>
      <label>3. ¿Cuál es la característica principal de la E/S programada (Polling)?</label>
      <input type="radio" id="p3a1" name="pregunta3" value="cpu_verifica_estado" required />
      <label for="p3a1" style="display:inline;">La CPU verifica constantemente el estado del dispositivo.</label><br />
      <input type="radio" id="p3a2" name="pregunta3" value="cpu_libre" />
      <label for="p3a2" style="display:inline;">La CPU está libre para otras tareas.</label><br />
      <input type="radio" id="p3a3" name="pregunta3" value="espera_activa" />
      <label for="p3a3" style="display:inline;">La CPU espera pasivamente.</label><br />
      <input type="radio" id="p3a4" name="pregunta3" value="dma" />
      <label for="p3a4" style="display:inline;">Usa DMA para transferir datos.</label>
    </div>

    <div>
      <label>4. ¿Qué ventaja tiene la E/S manejada por interrupciones frente a la programada?</label>
      <input type="radio" id="p4a1" name="pregunta4" value="libera_cpu" required />
      <label for="p4a1" style="display:inline;">La CPU no espera activamente y se libera para otras tareas.</label><br />
      <input type="radio" id="p4a2" name="pregunta4" value="bloquea_cpu" />
      <label for="p4a2" style="display:inline;">La CPU queda bloqueada esperando.</label><br />
      <input type="radio" id="p4a3" name="pregunta4" value="alta_latencia" />
      <label for="p4a3" style="display:inline;">Aumenta la latencia de la respuesta.</label><br />
      <input type="radio" id="p4a4" name="pregunta4" value="cpu_ocupada" />
      <label for="p4a4" style="display:inline;">La CPU está ocupada en transferencias.</label>
    </div>

    <div>
      <label>5. ¿Qué es el DMA y cuál es su función principal?</label>
      <input type="radio" id="p5a1" name="pregunta5" value="transferencias_directas" required />
      <label for="p5a1" style="display:inline;">Mecanismo que permite transferencias directas entre dispositivos y memoria con mínima intervención de la CPU.</label><br />
      <input type="radio" id="p5a2" name="pregunta5" value="cpu_constante" />
      <label for="p5a2" style="display:inline;">Transferencias que requieren constante intervención de la CPU.</label><br />
      <input type="radio" id="p5a3" name="pregunta5" value="procesamiento" />
      <label for="p5a3" style="display:inline;">Procesamiento de datos por la CPU.</label><br />
      <input type="radio" id="p5a4" name="pregunta5" value="transferencias_lentas" />
      <label for="p5a4" style="display:inline;">Transferencias lentas y poco eficientes.</label>
    </div>

    <div>
      <label>6. ¿Cuál es un ejemplo típico de uso de E/S por interrupciones?</label>
      <input type="radio" id="p6a1" name="pregunta6" value="teclado_interrupcion" required />
      <label for="p6a1" style="display:inline;">Un teclado que genera una interrupción al presionar una tecla.</label><br />
      <input type="radio" id="p6a2" name="pregunta6" value="disco_polling" />
      <label for="p6a2" style="display:inline;">Un disco que usa polling constante.</label><br />
      <input type="radio" id="p6a3" name="pregunta6" value="gpu_dma" />
      <label for="p6a3" style="display:inline;">Una GPU que usa DMA para transferencias.</label><br />
      <input type="radio" id="p6a4" name="pregunta6" value="impresora_salida" />
      <label for="p6a4" style="display:inline;">Una impresora como dispositivo de salida.</label>
    </div>

    <div>
      <label>7. ¿Cuáles son las etapas del proceso de DMA?</label>
      <input type="radio" id="p7a1" name="pregunta7" value="configura_gestiona_notifica" required />
      <label for="p7a1" style="display:inline;">Configuración por la CPU, gestión por el controlador DMA y notificación al finalizar.</label><br />
      <input type="radio" id="p7a2" name="pregunta7" value="solo_configura" />
      <label for="p7a2" style="display:inline;">Solo configuración por la CPU.</label><br />
      <input type="radio" id="p7a3" name="pregunta7" value="solo_gestiona" />
      <label for="p7a3" style="display:inline;">Solo gestión por el controlador DMA.</label><br />
      <input type="radio" id="p7a4" name="pregunta7" value="solo_notifica" />
      <label for="p7a4" style="display:inline;">Solo notificación a la CPU.</label>
    </div>

    <div>
      <label>8. ¿Qué significa independencia del dispositivo en software de E/S?</label>
      <input type="radio" id="p8a1" name="pregunta8" value="interfaces_uniformes" required />
      <label for="p8a1" style="display:inline;">Las aplicaciones usan interfaces uniformes sin importar el hardware.</label><br />
      <input type="radio" id="p8a2" name="pregunta8" value="hardware_especifico" />
      <label for="p8a2" style="display:inline;">Las aplicaciones dependen del hardware específico.</label><br />
      <input type="radio" id="p8a3" name="pregunta8" value="software_parecido" />
      <label for="p8a3" style="display:inline;">Software similar para todos los dispositivos.</label><br />
      <input type="radio" id="p8a4" name="pregunta8" value="mismo_codigo" />
      <label for="p8a4" style="display:inline;">Usar el mismo código para todos los dispositivos.</label>
    </div>

    <div>
      <label>9. ¿Qué problema principal presenta la E/S programada?</label>
      <input type="radio" id="p9a1" name="pregunta9" value="cpu_bloqueada" required />
      <label for="p9a1" style="display:inline;">La CPU queda bloqueada en bucles de espera, desperdiciando ciclos de procesamiento.</label><br />
      <input type="radio" id="p9a2" name="pregunta9" value="cpu_libre" />
      <label for="p9a2" style="display:inline;">La CPU está libre para otras tareas.</label><br />
      <input type="radio" id="p9a3" name="pregunta9" value="latencia_baja" />
      <label for="p9a3" style="display:inline;">Garantiza baja latencia.</label><br />
      <input type="radio" id="p9a4" name="pregunta9" value="transferencia_directa" />
      <label for="p9a4" style="display:inline;">Transfiere datos directamente a memoria.</label>
    </div>

    <div>
      <label>10. ¿Por qué el software de E/S con DMA es esencial para sistemas de alto rendimiento?</label>
      <input type="radio" id="p10a1" name="pregunta10" value="reduce_carga" required />
      <label for="p10a1" style="display:inline;">Reduce la carga de la CPU y permite transferencias rápidas de datos.</label><br />
      <input type="radio" id="p10a2" name="pregunta10" value="incrementa_carga" />
      <label for="p10a2" style="display:inline;">Incrementa la carga de la CPU.</label><br />
      <input type="radio" id="p10a3" name="pregunta10" value="usa_cpu_directa" />
      <label for="p10a3" style="display:inline;">Usa la CPU directamente para cada transferencia.</label><br />
      <input type="radio" id="p10a4" name="pregunta10" value="solo_para_pequenos" />
      <label for="p10a4" style="display:inline;">Solo se usa en dispositivos pequeños.</label>
    </div>

    <button type="submit">Enviar evaluación</button>
  </form>
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

<script>
  const respuestasCorrectas = {
    pregunta1: { correcta: "capa_logica", explicacion: { capa_logica: "Correcto: El software de E/S es la capa lógica que gestiona la comunicación entre el sistema operativo y los dispositivos físicos.", hardware: "Incorrecto: El hardware son los dispositivos físicos, no el software.", usuario: "Incorrecto: La capa de usuario no gestiona directamente la comunicación con dispositivos físicos.", controlador: "Incorrecto: El controlador es parte del sistema operativo, no el software de E/S completo." } },
    pregunta2: { correcta: "independencia", explicacion: { independencia: "Correcto: El software busca independencia del dispositivo, manejo de errores y rendimiento.", velocidad: "Incorrecto: Aunque importante, la velocidad no es el único objetivo clave.", seguridad: "Incorrecto: La seguridad es importante pero no se menciona como objetivo clave aquí.", interfaz: "Incorrecto: La interfaz es un medio, no el objetivo principal." } },
    pregunta3: { correcta: "cpu_verifica_estado", explicacion: { cpu_verifica_estado: "Correcto: La E/S programada hace que la CPU verifique constantemente el estado del dispositivo.", cpu_libre: "Incorrecto: En polling, la CPU no está libre, está ocupada.", interruptor: "Incorrecto: Esto no describe la E/S programada.", dma: "Incorrecto: DMA es otro método distinto a la programada." } },
    pregunta4: { correcta: "libera_cpu", explicacion: { libera_cpu: "Correcto: La E/S por interrupciones libera la CPU para otras tareas.", bloquea_cpu: "Incorrecto: Bloquear la CPU es característico del polling, no de interrupciones.", espera_activa: "Incorrecto: La espera activa es propia del polling.", espera_pasiva: "Incorrecto: La espera pasiva no describe el comportamiento de interrupciones." } },
    pregunta5: { correcta: "transferencias_directas", explicacion: { transferencias_directas: "Correcto: DMA permite transferencias directas con mínima intervención de la CPU.", cpu_constante: "Incorrecto: DMA minimiza la intervención de la CPU.", dispositivos_lentos: "Incorrecto: DMA es ideal para operaciones masivas, no lentas.", procesamiento_datos: "Incorrecto: DMA es un mecanismo de transferencia, no procesamiento." } },
    pregunta6: { correcta: "teclado_interrupcion", explicacion: { teclado_interrupcion: "Correcto: El teclado genera interrupciones al presionar teclas.", disco_polling: "Incorrecto: Los discos suelen usar DMA o interrupciones, no polling constante.", gpu_dma: "Incorrecto: GPU usa DMA para transferencias, no interrupciones simples.", impresora_salida: "Incorrecto: No es un ejemplo de interrupciones para E/S." } },
    pregunta7: { correcta: "configura_gestiona_notifica", explicacion: { configura_gestiona_notifica: "Correcto: El proceso DMA incluye configurar, gestionar y notificar.", solo_configura: "Incorrecto: No es solo configurar.", solo_gestiona: "Incorrecto: El controlador DMA gestiona, pero la CPU también participa.", solo_notifica: "Incorrecto: La notificación es la última etapa." } },
    pregunta8: { correcta: "interfaces_uniformes", explicacion: { interfaces_uniformes: "Correcto: La independencia significa usar interfaces uniformes sin importar hardware.", hardware_especifico: "Incorrecto: Es lo contrario a la independencia.", software_parecido: "Incorrecto: No define independencia del dispositivo.", mismo_codigo: "Incorrecto: Es una ventaja, pero no define la independencia." } },
    pregunta9: { correcta: "cpu_bloqueada", explicacion: { cpu_bloqueada: "Correcto: El principal problema del polling es que la CPU queda bloqueada esperando.", cpu_libre: "Incorrecto: En polling la CPU no está libre.", latencia_baja: "Incorrecto: Polling no garantiza baja latencia.", transferencia_directa: "Incorrecto: Esto describe DMA." } },
    pregunta10: { correcta: "reduce_carga", explicacion: { reduce_carga: "Correcto: DMA reduce la carga de la CPU y permite transferencias rápidas.", incrementa_carga: "Incorrecto: DMA disminuye la carga, no la incrementa.", usa_cpu_directa: "Incorrecto: DMA evita uso directo constante de la CPU.", solo_para_pequenos: "Incorrecto: DMA se usa en dispositivos de alto rendimiento." } }
  };

  // Función para procesar las respuestas
  document.getElementById("quizForm").addEventListener("submit", function(event) {
    event.preventDefault();
    let puntaje = 0;
    let feedbackHTML = "";
    let errores = false;

    // Verificar respuestas
    for (let pregunta in respuestasCorrectas) {
      const selected = document.querySelector(`input[name="${pregunta}"]:checked`);
      if (!selected) {
        errores = true;
        document.getElementById("errores").textContent = "Falta responder algunas preguntas.";
        document.getElementById("errores").style.display = "block";
        break;
      }

      const respuesta = selected.value;
      const correcta = respuestasCorrectas[pregunta].correcta;

      if (respuesta === correcta) {
        puntaje++;
      } else {
        feedbackHTML += `<div class="feedback"><strong>Pregunta ${pregunta.charAt(8)}:</strong> ${respuestasCorrectas[pregunta].explicacion[respuesta]}</div>`;
      }
    }

    // Mostrar resultados
    document.getElementById("errores").style.display = "none";
    const porcentaje = (puntaje / Object.keys(respuestasCorrectas).length) * 100;
    let resultadoHTML = `Tu puntaje es ${puntaje} de ${Object.keys(respuestasCorrectas).length}.`;
    if (!errores) {
      document.getElementById("resultados").textContent = resultadoHTML;
      document.getElementById("feedback").innerHTML = feedbackHTML;
      document.getElementById("resultados").style.display = "block";
      document.getElementById("feedback").style.display = "block";
    }
  });
</script>

</body>
</html>
