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

  <div id="errors" class="error" style="display: none;"></div>

  <div id="result" class="resultado" style="display: none;"></div>

  <div id="feedback" style="display: none;"></div>

  <form id="quizForm">
    <div>
      <label>1. ¿Qué función principal tienen los dispositivos de E/S?</label>
      <input type="radio" id="p1a1" name="pregunta1" value="interaccion" required />
      <label for="p1a1" style="display:inline;">Interacción entre usuarios, sistemas y entorno físico</label><br />
      <input type="radio" id="p1a2" name="pregunta1" value="almacenamiento" />
      <label for="p1a2" style="display:inline;">Almacenamiento de datos</label><br />
      <input type="radio" id="p1a3" name="pregunta1" value="procesamiento" />
      <label for="p1a3" style="display:inline;">Procesamiento de datos</label><br />
      <input type="radio" id="p1a4" name="pregunta1" value="seguridad" />
      <label for="p1a4" style="display:inline;">Seguridad informática</label>
    </div>

    <div>
      <label>2. ¿Cuál de los siguientes es un dispositivo de salida?</label>
      <input type="radio" id="p2a1" name="pregunta2" value="teclado" />
      <label for="p2a1" style="display:inline;">Teclado</label><br />
      <input type="radio" id="p2a2" name="pregunta2" value="monitor" required />
      <label for="p2a2" style="display:inline;">Monitor</label><br />
      <input type="radio" id="p2a3" name="pregunta2" value="sensor" />
      <label for="p2a3" style="display:inline;">Sensor</label><br />
      <input type="radio" id="p2a4" name="pregunta2" value="camara" />
      <label for="p2a4" style="display:inline;">Cámara</label>
    </div>

    <div>
      <label>3. ¿Cuál es la velocidad aproximada de transferencia de datos de un teclado según Tanenbaum?</label>
      <input type="radio" id="p3a1" name="pregunta3" value="528_mb_seg" />
      <label for="p3a1" style="display:inline;">528 MB/seg</label><br />
      <input type="radio" id="p3a2" name="pregunta3" value="10_bytes_seg" required />
      <label for="p3a2" style="display:inline;">10 bytes/seg</label><br />
      <input type="radio" id="p3a3" name="pregunta3" value="35_gb_seg" />
      <label for="p3a3" style="display:inline;">3.5 GB/seg</label><br />
      <input type="radio" id="p3a4" name="pregunta3" value="1_gb_seg" />
      <label for="p3a4" style="display:inline;">1 GB/seg</label>
    </div>

    <div>
      <label>4. ¿Qué protocolo NO es común en dispositivos de E/S según Stallings?</label>
      <input type="radio" id="p4a1" name="pregunta4" value="usb" />
      <label for="p4a1" style="display:inline;">USB</label><br />
      <input type="radio" id="p4a2" name="pregunta4" value="sata" />
      <label for="p4a2" style="display:inline;">SATA</label><br />
      <input type="radio" id="p4a3" name="pregunta4" value="bluetooth" />
      <label for="p4a3" style="display:inline;">Bluetooth</label><br />
      <input type="radio" id="p4a4" name="pregunta4" value="http" required />
      <label for="p4a4" style="display:inline;">HTTP</label>
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
    pregunta1: { correcta: "interaccion", explicacion: { interaccion: "Correcto", almacenamiento: "Incorrecto", procesamiento: "Incorrecto", seguridad: "Incorrecto" } },
    pregunta2: { correcta: "monitor", explicacion: { monitor: "Correcto", teclado: "Incorrecto", sensor: "Incorrecto", camara: "Incorrecto" } },
    pregunta3: { correcta: "10_bytes_seg", explicacion: { "10_bytes_seg": "Correcto", "528_mb_seg": "Incorrecto", "35_gb_seg": "Incorrecto", "1_gb_seg": "Incorrecto" } },
    pregunta4: { correcta: "http", explicacion: { http: "Correcto", usb: "Incorrecto", sata: "Incorrecto", bluetooth: "Incorrecto" } }
  };

  document.getElementById('quizForm').addEventListener('submit', function(event) {
    event.preventDefault();
    
    let puntaje = 0;
    let feedback = "";
    let errores = [];

    Object.keys(respuestasCorrectas).forEach(pregunta => {
      const respuesta = document.querySelector(`input[name="${pregunta}"]:checked`);
      
      if (!respuesta) {
        errores.push(`Falta responder la pregunta: ${pregunta}`);
        return;
      }

      const respuestaValor = respuesta.value;
      const respuestaCorrecta = respuestasCorrectas[pregunta].correcta;
      
      if (respuestaValor === respuestaCorrecta) {
        puntaje++;
      } else {
        feedback += `${pregunta}: ${respuestasCorrectas[pregunta].explicacion[respuestaValor]}<br>`;
      }
    });

    if (errores.length > 0) {
      document.getElementById('errors').style.display = 'block';
      document.getElementById('errors').innerHTML = errores.join('<br>');
    } else {
      document.getElementById('errors').style.display = 'none';
    }

    if (feedback) {
      document.getElementById('feedback').style.display = 'block';
      document.getElementById('feedback').innerHTML = `<strong>Explicaciones de respuestas incorrectas:</strong><br>${feedback}`;
    }

    document.getElementById('result').style.display = 'block';
    document.getElementById('result').innerHTML = `Tu puntaje es ${puntaje} de ${Object.keys(respuestasCorrectas).length}.`;
  });
</script>

</body>
</html>
