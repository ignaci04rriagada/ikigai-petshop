<?php
/**
 * PROYECTO: Ikigai Tienda de Mascotas
 * ARCHIVO: index.php
 */
include 'includes/head.php'; 
include 'includes/header.php'; // Incluimos el nav/header
?>

<main class="container my-4">
    <h1 class="text-center">Catálogo de Productos</h1>
    <section id="grid-productos" class="row g-4 my-3">
        <!-- Aquí jQuery e Injectará las tarjetas con AJAX -->
    </section>
</main>

<?php
include 'includes/sidebar-cart.php'; 
include 'includes/footer.php';
?>