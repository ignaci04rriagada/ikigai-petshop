<?php
/**
 * api/categorias.php
 * Endpoint JSON para el listado de categorías (Perros, Gatos).
 * GET /api/categorias.php
 */

header("Content-Type: application/json; charset=utf-8");

require_once __DIR__ . "/configuracion/conexion.php";
require_once __DIR__ . "/modelos/Categoria.php";

$pdo = obtenerConexion();
echo json_encode(Categoria::obtenerTodas($pdo));