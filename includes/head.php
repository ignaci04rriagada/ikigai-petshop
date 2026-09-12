<?php
/**
 * includes/head.php
 * Se incluye al inicio de cada página. Espera opcionalmente una
 * variable $pageTitle definida antes del include.
 */
$pageTitle = $pageTitle ?? "Ikigai - Todo para tu mejor amigo";
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= htmlspecialchars($pageTitle) ?></title>

  <!-- Fuentes de Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@500;600;700;800&family=Manrope:wght@400;500;600;700;800&family=Press+Start+2P&display=swap" rel="stylesheet">

  <!-- Framework CSS (Bootstrap 5.3) -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Estilos propios -->
  <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>
  <!-- Enlace accesible de salto rápido -->
  <a class="visually-hidden-focusable position-absolute top-0 start-0 bg-dark text-white p-2" href="#main">
    Saltar al contenido
  </a>