<?php
// Procesar envío de formulario
$mensaje_exito = "";
$errores = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validar campos simples
    $nombre = trim($_POST['nombre'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $mensaje = trim($_POST['mensaje'] ?? '');

    if ($nombre === '') {
        $errores[] = "El nombre es obligatorio.";
    }
    if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errores[] = "Un correo válido es obligatorio.";
    }
    if ($mensaje === '') {
        $errores[] = "Por favor, escribe tu mensaje.";
    }

    if (!$errores) {
        $mensaje_exito = "Gracias por contactarnos, $nombre. Recibimos tu mensaje correctamente.";
        // Limpiar campos
        $nombre = $email = $mensaje = '';
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Formulario Unidad V - EducaOnline</title>
  <style>
    * {
      margin: 0; padding: 0; box-sizing: border-box;
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
      top: 0; left: 0;
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
    nav ul li a:hover,
    nav ul li a.active {
      color: #ffc107;
    }
    main {
      max-width: 900px;
      margin: 120px auto 60px; /* espacio para header fijo */
      padding: 20px;
      background: white;
      border-radius: 12px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
    h1 {
      color: #0d6efd;
      margin-bottom: 20px;
    }
    label {
      display: block;
      margin-bottom: 8px;
      font-weight: 600;
      color: #0d6efd;
    }
    input[type="text"],
    input[type="email"],
    textarea {
      width: 100%;
      padding: 10px;
      margin-bottom: 20px;
      border-radius: 8px;
      border: 1px solid #ccc;
      font-size: 1rem;
      resize: vertical;
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
      width: 100%;
    }
    button:hover {
      background: #0b5ed7;
    }
    .error {
      background: #f8d7da;
      color: #842029;
      border-radius: 8px;
      padding: 10px 15px;
      margin-bottom: 20px;
    }
    .success {
      background: #d1e7dd;
      color: #0f5132;
      border-radius: 8px;
      padding: 10px 15px;
      margin-bottom: 20px;
      text-align: center;
      font-weight: 700;
    }
    footer {
      background: #212529;
      color: white;
      text-align: center;
      padding: 25px 15px;
      font-size: 0.9rem;
      margin-top: 40px;
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
  <div class="logo">Unidad V - Sistemas Operativos</div>
  <nav>
    <ul>
      <li><a href="index.php">Inicio</a></li>
      <li><a href="cursos.php">Subtemas</a></li>
      <li><a href="referencias.php">Referencias</a></li>
      <li><a href="formulario.php" class="active">Contacto</a></li>
    </ul>
  </nav>
</header>

<main>
  <h1>Formulario Unidad V</h1>

  <?php if ($errores): ?>
    <div class="error">
      <ul>
        <?php foreach ($errores as $error): ?>
          <li><?= htmlspecialchars($error) ?></li>
        <?php endforeach; ?>
      </ul>
    </div>
  <?php endif; ?>

  <?php if ($mensaje_exito): ?>
    <div class="success"><?= htmlspecialchars($mensaje_exito) ?></div>
  <?php endif; ?>

  <form method="post" action="">
    <label for="nombre">Nombre completo</label>
    <input type="text" id="nombre" name="nombre" value="<?= htmlspecialchars($nombre ?? '') ?>" required />

    <label for="email">Correo electrónico</label>
    <input type="email" id="email" name="email" value="<?= htmlspecialchars($email ?? '') ?>" required />

    <label for="mensaje">Mensaje o comentario sobre Unidad V</label>
    <textarea id="mensaje" name="mensaje" rows="6" required><?= htmlspecialchars($mensaje ?? '') ?></textarea>

    <button type="submit">Enviar</button>
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

</body>
</html>

