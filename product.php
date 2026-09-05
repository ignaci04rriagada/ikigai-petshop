<?php
/**
 * ==============================================================================
 * PROYECTO: Ikigai Tienda de Mascotas
 * ARCHIVO: product.php
 * ROL: Vista de Detalle de Producto (Detail View)
 * ------------------------------------------------------------------------------
 * DESCRIPCIÓN:
 * - Recibe el ID del producto a través de la URL (ejemplo: product.php?id=101).
 * - Solicita los datos específicos de ese ID a api/products.php mediante AJAX.
 * - Renderiza la ficha técnica completa del producto, galería y controles de cantidad.
 * 
 * FLUJO Y GAMIFICACIÓN:
 * 1. Muestra la etiqueta de alerta "Quedan X unidades" si el stock es crítico.
 * 2. El botón "Agregar al carrito" en esta vista también dispara la animación 
 *    "Vuelo del producto" directo hacia el ícono del header.
 * 3. Reutiliza los módulos globales: head.php, header.php, sidebar-cart.php y footer.php.
 * ==============================================================================
 */
?>