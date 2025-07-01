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
      <li><a href="#">Referencias</a></li>
    </ul>
  </nav>
</header>

<main>
  <h1>Evaluación Unidad V</h1>

  <form id="quizForm">
    <div>
      <label>1. ¿Cuál es el propósito principal del software de E/S organizado en capas?</label>
      <input type="radio" id="p1a1" name="pregunta1" value="abstraer_complejidad" required />
      <label for="p1a1">Abstraer la complejidad del hardware y facilitar el desarrollo de aplicaciones eficientes.</label><br />
      <input type="radio" id="p1a2" name="pregunta1" value="optimizar_rendimiento" />
      <label for="p1a2">Optimizar el rendimiento del sistema.</label><br />
      <input type="radio" id="p1a3" name="pregunta1" value="gestionar_hardware" />
      <label for="p1a3">Gestionar los dispositivos de hardware directamente.</label><br />
      <input type="radio" id="p1a4" name="pregunta1" value="facilitar_conexion" />
      <label for="p1a4">Facilitar la conexión entre dispositivos.</label>
    </div>

    <div>
      <label>2. ¿Qué componente maneja las señales del hardware en el sistema operativo?</label>
      <input type="radio" id="p2a1" name="pregunta2" value="manejador_interrupciones" required />
      <label for="p2a1">El manejador de interrupciones (ISR).</label><br />
      <input type="radio" id="p2a2" name="pregunta2" value="driver_dispositivo" />
      <label for="p2a2">El driver de dispositivo.</label><br />
      <input type="radio" id="p2a3" name="pregunta2" value="aplicacion_usuario" />
      <label for="p2a3">La aplicación de usuario.</label><br />
      <input type="radio" id="p2a4" name="pregunta2" value="kernel" />
      <label for="p2a4">El kernel del sistema operativo.</label>
    </div>

    <div>
      <label>3. ¿Qué funciones realiza el manejador de interrupciones?</label>
      <input type="radio" id="p3a1" name="pregunta3" value="salvar_contexto" required />
      <label for="p3a1">Salvar el contexto del CPU, ejecutar la rutina de atención y restaurar el contexto.</label><br />
      <input type="radio" id="p3a2" name="pregunta3" value="ejecutar_rutina" />
      <label for="p3a2">Ejecutar la rutina y restaurar el contexto.</label><br />
      <input type="radio" id="p3a3" name="pregunta3" value="restaurar_contexto" />
      <label for="p3a3">Restaurar el contexto del proceso interrumpido.</label><br />
      <input type="radio" id="p3a4" name="pregunta3" value="atender_evento" />
      <label for="p3a4">Atender los eventos sin restaurar el contexto.</label>
    </div>

    <div>
      <label>4. ¿Qué técnica de optimización se usa en los ISRs?</label>
      <input type="radio" id="p4a1" name="pregunta4" value="optimizacion_isr" required />
      <label for="p4a1">Interrupciones anidadas y deferir trabajo a hilos del kernel.</label><br />
      <input type="radio" id="p4a2" name="pregunta4" value="bloqueo_cpu" />
      <label for="p4a2">Bloquear la CPU durante el proceso.</label><br />
      <input type="radio" id="p4a3" name="pregunta4" value="alta_latencia" />
      <label for="p4a3">Alta latencia de respuesta.</label><br />
      <input type="radio" id="p4a4" name="pregunta4" value="simultaneidad" />
      <label for="p4a4">Simultaneidad de tareas en el sistema.</label>
    </div>

    <button type="button" onclick="evaluar()">Enviar evaluación</button>
  </form>

  <div id="resultado"></div>
</main>

<footer>
  <p>Contacto: duodinamico@unidadV.com | Teléfono: +52 55 61 25 63 13</p>
  <p>Síguenos en 
    <a href="#">Facebook</a>, 
    <a href="#">Twitter</a> y 
    <a href="#">Instagram</a>
  </p>
  <p>© 2025 Unidad V - Todos los derechos reservados</p>
</footer>

<script>
  const respuestas_correctas = {
    pregunta1: 'abstraer_complejidad',
    pregunta2: 'manejador_interrupciones',
    pregunta3: 'salvar_contexto',
    pregunta4: 'optimizacion_isr'
  };

  function evaluar() {
    let puntaje = 0;
    const respuestas = new FormData(document.getElementById("quizForm"));
    let feedback = '';

    for (const [pregunta, respuesta] of respuestas.entries()) {
      if (respuesta === respuestas_correctas[pregunta]) {
        puntaje++;
      } else {
        feedback += `La respuesta de ${pregunta} es incorrecta.<br>`;
      }
    }

    const resultado = document.getElementById('resultado');
    resultado.innerHTML = `Tu puntaje es ${puntaje} de 4. ${feedback ? feedback : '¡Felicitaciones! Todas las respuestas son correctas.'}`;
  }
</script>

</body>
</html>
