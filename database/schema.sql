CREATE DATABASE IF NOT EXISTS ikigai_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE ikigai_db;

DROP TABLE IF EXISTS productos;

CREATE TABLE productos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(150) NOT NULL,
    marca VARCHAR(100) NOT NULL,
    precio DECIMAL(10, 2) NOT NULL,
    cantidad INT NOT NULL,
    categoria VARCHAR(50) NOT NULL,
    imagen_url VARCHAR(255) NOT NULL,
    descripcion TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO productos (nombre, marca, precio, cantidad, categoria, imagen_url, descripcion) VALUES
('Alimento Perro Adulto 3kg', 'Royal Canin', 18990, 5, 'perros', 'assets/img/products/prod-101.jpg', 'Alimento balanceado nutricional para perros adultos de raza mediana.'),
('Snack Dental Perro', 'Dentastix', 4500.00, 2, 'perros', 'assets/img/products/prod-102.jpg', 'Cuidado oral diario para perros. Alerta de stock bajo.'),
('Arena Sanitaria Aglomerante 5kg', 'Biokat', 8990.00, 10, 'gatos', 'assets/img/products/prod-103.jpg', 'Arena aglomerante de alta absorción y control de olores.'),
('Rascador para Gato Tipo Torre', 'CatLife', 24990, 1, 'gatos', 'assets/img/products/prod-104.jpg', 'Torre con rascador de yute y cueva integrada.');