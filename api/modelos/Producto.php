<?php
/**
 * api/modelos/Producto.php
 * Consultas SQL de productos y stock. Los filtros llegan como un
 * array asociativo desde el endpoint (api/productos.php), ya
 * saneados; este modelo arma la consulta preparada.
 */

class Producto
{
    /**
     * @param array $filtros claves posibles: categoria (slug), subcategoria,
     *                        oferta (bool), busqueda (texto libre)
     */
    public static function obtenerTodos(PDO $pdo, array $filtros = []): array
    {
        $sql = "SELECT p.id, p.nombre, p.marca, p.precio, p.stock, p.oferta,
                       p.icono, p.descripcion, p.subcategoria,
                       c.slug AS categoria, c.nombre AS categoria_nombre
                FROM productos p
                INNER JOIN categorias c ON c.id = p.categoria_id
                WHERE 1 = 1";
        $params = [];

        if (!empty($filtros["categoria"])) {
            $sql .= " AND c.slug = :categoria";
            $params["categoria"] = $filtros["categoria"];
        }
        if (!empty($filtros["subcategoria"])) {
            $sql .= " AND p.subcategoria = :subcategoria";
            $params["subcategoria"] = $filtros["subcategoria"];
        }
        if (!empty($filtros["oferta"])) {
            $sql .= " AND p.oferta = 1";
        }
        if (!empty($filtros["busqueda"])) {
            $sql .= " AND (p.nombre LIKE :busqueda OR p.marca LIKE :busqueda)";
            $params["busqueda"] = "%" . $filtros["busqueda"] . "%";
        }

        $sql .= " ORDER BY p.nombre";

        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll();
    }

    public static function obtenerPorId(PDO $pdo, int $id): ?array
    {
        $stmt = $pdo->prepare(
            "SELECT p.id, p.nombre, p.marca, p.precio, p.stock, p.oferta,
                    p.icono, p.descripcion, p.subcategoria,
                    c.slug AS categoria, c.nombre AS categoria_nombre
             FROM productos p
             INNER JOIN categorias c ON c.id = p.categoria_id
             WHERE p.id = :id
             LIMIT 1"
        );
        $stmt->execute(["id" => $id]);
        $fila = $stmt->fetch();
        return $fila ?: null;
    }
}