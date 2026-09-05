<?php
/**
 * ==============================================================================
 * PROYECTO: Ikigai Tienda de Mascotas
 * ARCHIVO: includes/head.php
 * ROL: Módulo de Encabezado HTML (<head>)
 * ==============================================================================
 */
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <!-- 1. Configuración de Caracteres y Viewport -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- 2. Meta Etiquetas de SEO -->
    <title>Ikigai Petshop | Alimentos y Accesorios para Mascotas</title>
    <meta name="description" content="Tu tienda online de confianza para alimentos, snacks y accesorios para perros y gatos con despacho rápido.">
    <meta name="keywords" content="petshop, mascotas, alimentos perros, alimentos gatos, accesorios mascotas, ikigai">
    <meta name="author" content="Equipo Ikigai Petshop">

    <!-- 3. Metas de Redes Sociales (Open Graph para Facebook, WhatsApp, etc.) -->
    <meta property="og:title" content="Ikigai Petshop | Todo para tu Mascota">
    <meta property="og:description" content="Encuentra el mejor alimento y accesorios para tus perros y gatos al mejor precio.">
    <meta property="og:type" content="website">
    <meta property="og:image" content="assets/img/og-banner.jpg">

    <!-- 4. Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico">

    <!-- 5. Estilos de Bootstrap 5.3.3 (CDN) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- 6. Hoja de Estilos Personalizada con Cache Busting -->
    <?php 
        $css_file = 'assets/css/main.css';
        $version = file_exists($css_file) ? filemtime($css_file) : '1.0';
    ?>
    <link rel="stylesheet" href="<?= $css_file ?>?v=<?= $version ?>">
</head>

<body>