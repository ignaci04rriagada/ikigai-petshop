/**
 * ==============================================================================
 * PROYECTO: Ikigai Tienda de Mascotas
 * ARCHIVO: assets/js/modules/ui-render.js
 * ROL: Módulo de Renderizado y Manipulación del DOM
 * ------------------------------------------------------------------------------
 * DESCRIPCIÓN:
 * - Procesa la información en formato JSON obtenida desde api/products.php.
 * - Construye e inyecta dinámicamente el HTML de las tarjetas en la grilla.
 * - Actualiza los elementos de la interfaz en tiempo real (listado del carrito,
 *   subtotales, contadores e indicadores visuales).
 * 
 * GAMIFICACIÓN Y REGLAS INTEGRADAS:
 * - Evalúa la propiedad de stock de cada producto y añade el badge CSS
 *   .card__badge--stock-low ("Quedan 2") cuando stock <= 2.
 * - Sincroniza el llenado visual de la barra de progreso de Envío Gratis.
 * ==============================================================================
 */