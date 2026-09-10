<?php
/**
 * api/modelos/Categoria.php
 * Consultas SQL relacionadas a categorÃ­as. No conoce HTTP ni JSON:
 * solo recibe una conexiÃ³n PDO y devuelve arrays asociativos.
 */

class Categoria
{
    public static function obtenerTodas(PDO $pdo): array
    {
        $stmt = $pdo->query("SELECT id, nombre, slug FROM categorias ORDER BY nombre");
        return $stmt->fetchAll();
    }

    public static function obtenerPorSlug(PDO $pdo, string $slug): ?array
    {
        $stmt = $pdo->prepare("SELECT id, nombre, slug FROM categorias WHERE slug = :slug LIMIT 1");
        $stmt->execute(["slug" => $slug]);
        $fila = $stmt->fetch();
        return $fila ?: null;
    }
}