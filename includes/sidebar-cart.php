<?php
/**
 * ==============================================================================
 * PROYECTO: Ikigai Tienda de Mascotas
 * ARCHIVO: includes/sidebar-cart.php
 * ROL: Carrito Lateral Desplegable (Sidebar / Drawer)
 * ------------------------------------------------------------------------------
 * DESCRIPCIÓN:
 * - Panel lateral donde jQuery renderiza los ítems agregados por el usuario.
 * - Muestra el desglose de precios, subtotal, descuentos aplicados y total final.
 * 
 * GAMIFICACIÓN Y REGLAS DE NEGOCIO INTEGRADAS:
 * 1. Barra de progreso "Plato de comida": Muestra el monto faltante para Envío Gratis.
 * 2. Tabla de Descuentos Progresivos: Matriz visible de beneficios por volumen
 *    (1 prod = 0% | 2 prods = 25% | 3 prods = 35% | 4+ prods = 50%).
 * 3. Botón de acción principal: "Ir a pagar" (Checkout).
 * ==============================================================================
 */
?>