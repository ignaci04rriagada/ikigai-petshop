<?php
/**
 * api/configuracion/conexion.php
 * ConexiÃ³n Ãºnica a MySQL vÃ­a PDO. Ajusta las constantes segÃºn tu
 * ambiente local (XAMPP/Laragon/MAMP suelen usar usuario "root" sin
 * contraseÃ±a por defecto).
 */

const DB_HOST = "localhost";
const DB_NAME = "ikigai_db";
const DB_USER = "root";
const DB_PASS = "";
const DB_CHARSET = "utf8mb4";

function obtenerConexion(): PDO {
    $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET;
    $opciones = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];

    try {
        return new PDO($dsn, DB_USER, DB_PASS, $opciones);
    } catch (PDOException $e) {
        http_response_code(500);
        header("Content-Type: application/json; charset=utf-8");
        echo json_encode([
            "error" => "No se pudo conectar a la base de datos.",
            "detalle" => $e->getMessage()
        ]);
        exit;
    }
}