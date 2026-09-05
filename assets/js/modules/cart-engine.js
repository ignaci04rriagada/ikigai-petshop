/**
 * ==============================================================================
 * PROYECTO: Ikigai Tienda de Mascotas
 * ARCHIVO: assets/js/modules/cart-engine.js
 * ROL: Motor de Estado y Cálculos del Carrito
 * ------------------------------------------------------------------------------
 * DESCRIPCIÓN:
 * - Administra el arreglo de productos seleccionados por el usuario.
 * - Sincroniza el estado del carrito con localStorage para mantener la persistencia.
 * - Calcula automáticamente el total, subtotal y la barra de progreso (Envío Gratis).
 * 
 * REGLA DE NEGOCIO - DESCUENTOS PROGRESIVOS:
 * - 1 Producto: 0% de descuento.
 * - 2 Productos: 25% de descuento.
 * - 3 Productos: 35% de descuento.
 * - 4+ Productos: 50% de descuento.
 * ==============================================================================
 */