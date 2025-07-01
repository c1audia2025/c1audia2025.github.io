<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <title>Resultado del Quiz</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      max-width: 600px;
      margin: 50px auto;
      background: #f5f8fa;
      padding: 30px;
      border-radius: 12px;
      text-align: center;
      box-shadow: 0 8px 20px rgba(0,0,0,0.1);
    }
    h1 {
      color: #0d6efd;
      margin-bottom: 30px;
      font-size: 2.5rem;
    }
    p.mensaje {
      font-size: 1.4rem;
      font-weight: 700;
      margin-bottom: 25px;
      color: #155724; /* Default green */
    }
    .barra-progreso {
      position: relative;
      width: 100%;
      height: 35px;
      background-color: #ddd;
      border-radius: 20px;
      overflow: hidden;
      margin-bottom: 40px;
      box-shadow: inset 0 1px 3px rgba(255,255,255,0.7);
    }
    .barra-llenada {
      background: #28a745; /* Default green */
      height: 100%;
      width: 0;
      border-radius: 20px 0 0 20px;
      transition: width 1.5s ease-in-out;
    }
    .porcentaje-texto {
      position: absolute;
      top: 0;
      left: 50%;
      transform: translateX(-50%);
      height: 100%;
      line-height: 35px;
      font-weight: 700;
      color: white;
      text-shadow: 1px 1px 2px rgba(0,0,0,0.5);
      user-select: none;
      font-size: 1.2rem;
    }
    a {
      display: inline-block;
      padding: 15px 35px;
      background: #0d6efd;
      color: white;
      text-decoration: none;
      border-radius: 30px;
      font-weight: 700;
      font-size: 1.2rem;
      box-shadow: 0 6px 14px rgba(13,110,253,0.6);
      transition: background 0.3s ease;
    }
    a:hover {
      background: #0b5ed7;
      box-shadow: 0 8px 18px rgba(11,94,215,0.8);
    }
  </style>
</head>
<body>

  <h1>¡Juego Terminado!</h1>
  <p class="mensaje" id="mensaje"></p>
  
  <div class="barra-progreso">
    <div class="barra-llenada" id="barraLlenada"></div>
    <div class="porcentaje-texto" id="porcentajeTexto">0%</div>
  </div>

  <a href="javascript:void(0);" onclick="resetGame()">Jugar de nuevo</a>

  <script>
    // Simular puntaje
    const puntaje = 3; // Esto se puede cambiar a un valor calculado dinámicamente
    const total = 4; // Total preguntas

    // Calcular porcentaje
    const porcentaje = (puntaje / total) * 100;

    // Mensaje y colores según puntaje
    let mensaje = '';
    let colorBarra = '';
    let colorTexto = '';

    if (porcentaje == 100) {
      mensaje = "¡Excelente! Has respondido todo correctamente 🎉";
      colorBarra = "#28a745"; // verde
      colorTexto = "#155724";
    } else if (porcentaje >= 75) {
      mensaje = "Muy bien, casi perfecto 👍";
      colorBarra = "#ffc107"; // amarillo
      colorTexto = "#856404";
    } else if (porcentaje >= 50) {
      mensaje = "Buen intento, sigue practicando 😉";
      colorBarra = "#fd7e14"; // naranja
      colorTexto = "#7f4e00";
    } else {
      mensaje = "No te rindas, ¡puedes mejorar! 💪";
      colorBarra = "#dc3545"; // rojo
      colorTexto = "#721c24";
    }

    // Mostrar mensaje
    document.getElementById("mensaje").textContent
