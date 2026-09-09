<?php
/**
 * ==============================================================================
 * PROYECTO: Ikigai Tienda de Mascotas
 * ARCHIVO: api/products.php
 * ROL: Endpoint de API local (Backend Data Provider)
 * ------------------------------------------------------------------------------
 * DESCRIPCIÓN:
 * - Se conecta a la base de datos MySQL (Tabla: productos).
 * - Procesa parámetros recibidos por GET (categoría, búsqueda por nombre).
 * - Retorna la lista de productos en formato JSON estricto para consumo por AJAX.
 * 
 * PARÁMETROS ENTRADA (GET):
 * - ?category=perros|gatos (Opcional)
 * - ?search=nombre (Opcional)
 * 
 * RESPUESTA (JSON):
 * - { "status": "success", "count": N, "data": [...] }
 * ==============================================================================
 */