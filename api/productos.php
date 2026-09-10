<?php
/**
 * api/productos.php
 * Endpoint JSON de productos.
 *
 * GET /api/productos.php?id=5              → un producto (vista Detail)
 * GET /api/productos.php?categoria=perros  → listado filtrado (vista Master)
 * GET /api/productos.php?subcategoria=alimento
 * GET /api/productos.php?oferta=1
 * GET /api/productos.php?busqueda=salmon
 * Los parámetros de filtro pueden combinarse entre sí.
 */

header("Content-Type: application/json; charset=utf-8");

require_once __DIR__ . "/configuracion/conexion.php";
require_once __DIR__ . "/modelos/Producto.php";

$pdo = obtenerConexion();

// Vista Detail: un producto puntual por id
if (isset($_GET["id"])) {
    $id = filter_var($_GET["id"], FILTER_VALIDATE_INT);
    if ($id === false) {
        http_response_code(400);
        echo json_encode(["error" => "El parámetro id debe ser numérico."]);
        exit;
    }

    $producto = Producto::obtenerPorId($pdo, $id);
    if (!$producto) {
        http_response_code(404);
        echo json_encode(["error" => "Producto no encontrado."]);
        exit;
    }

    echo json_encode($producto);
    exit;
}

// Vista Master: listado con filtros opcionales
$filtros = [
    "categoria"    => $_GET["categoria"] ?? null,
    "subcategoria" => $_GET["subcategoria"] ?? null,
    "oferta"       => $_GET["oferta"] ?? null,
    "busqueda"     => $_GET["busqueda"] ?? null,
];

echo json_encode(Producto::obtenerTodos($pdo, $filtros));