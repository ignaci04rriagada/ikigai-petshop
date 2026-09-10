-- =====================================================
-- esquema.sql — Ikigai Petshop
-- Crear la base de datos antes de importar:
--   CREATE DATABASE ikigai_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
--   USE ikigai_db;
-- =====================================================

CREATE TABLE IF NOT EXISTS categorias (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(50) NOT NULL,
  slug VARCHAR(50) NOT NULL UNIQUE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS productos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(150) NOT NULL,
  marca VARCHAR(80) NOT NULL,
  categoria_id INT NOT NULL,
  subcategoria VARCHAR(50) NOT NULL,
  precio INT NOT NULL,
  stock INT NOT NULL DEFAULT 0,
  oferta TINYINT(1) NOT NULL DEFAULT 0,
  icono VARCHAR(30) NOT NULL DEFAULT 'kibble',
  descripcion TEXT,
  CONSTRAINT fk_productos_categoria
    FOREIGN KEY (categoria_id) REFERENCES categorias(id)
    ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tabla simple de ventas para el checkout de demostración.
-- items_json guarda una copia del carrito al momento de la compra
-- (no reemplaza una tabla de detalle normalizada; es suficiente
-- para el alcance académico de esta entrega).
CREATE TABLE IF NOT EXISTS ventas (
  id INT AUTO_INCREMENT PRIMARY KEY,
  fecha DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  total INT NOT NULL,
  items_json TEXT NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- =====================================================
-- Datos semilla
-- =====================================================

INSERT INTO categorias (id, nombre, slug) VALUES
  (1, 'Perros', 'perros'),
  (2, 'Gatos', 'gatos');

INSERT INTO productos (nombre, marca, categoria_id, subcategoria, precio, stock, oferta, icono, descripcion) VALUES
  ('Alimento Adulto Salmón 15kg', 'PremiumPaw', 1, 'alimento', 42990, 12, 0, 'kibble', 'Croquetas de salmón para perros adultos de todas las razas. Fórmula con omega 3 y 6 para un pelaje sano y brillante.'),
  ('Snacks de Salmón 200g', 'PremiumPaw', 1, 'snacks', 6990, 2, 1, 'bone', 'Premios de entrenamiento horneados con salmón real, sin colorantes artificiales. Ideales para reforzar buenos hábitos.'),
  ('Correa Reflectante 1.5m', 'WalkEasy', 1, 'accesorios', 8990, 8, 0, 'leash', 'Correa con cinta reflectante para paseos nocturnos seguros. Mango acolchado y broche de seguridad reforzado.'),
  ('Cama Ortopédica M', 'CozyDen', 1, 'camas', 34990, 5, 0, 'bed', 'Espuma viscoelástica que se adapta al cuerpo de tu perro, aliviando presión en articulaciones. Funda desmontable y lavable.'),
  ('Pelota Interactiva', 'PlayFetch', 1, 'juguetes', 5990, 20, 0, 'ball', 'Pelota de goma resistente a mordidas, con textura irregular para rebotes impredecibles que estimulan el juego.'),
  ('Arnés Ajustable Talla M', 'WalkEasy', 1, 'accesorios', 12990, 3, 0, 'harness', 'Arnés de malla transpirable con 4 puntos de ajuste, sin presión en el cuello. Panel reflectante en el pecho.'),
  ('Shampoo Antipulgas 500ml', 'CleanPaw', 1, 'higiene', 7990, 15, 0, 'bottle', 'Fórmula suave a base de citronela y neem que repele pulgas y garrapatas sin resecar la piel.'),
  ('Arena Aglomerante 10kg', 'PurrClean', 2, 'higiene', 15990, 2, 1, 'litter', 'Arena de bajo polvo con control de olores por 7 días. Aglomera rápido y facilita la limpieza diaria.'),
  ('Alimento Gato Adulto 7kg', 'PremiumPaw', 2, 'alimento', 28990, 10, 0, 'kibble', 'Croquetas para gatos adultos con taurina y control de bolas de pelo natural a base de fibra.'),
  ('Rascador Torre 80cm', 'ScratchCo', 2, 'juguetes', 39990, 4, 0, 'scratcher', 'Torre rascadora forrada en sisal natural con plataforma de observación y juguete colgante.'),
  ('Snacks Cremosos x4', 'PremiumPaw', 2, 'snacks', 4990, 25, 0, 'bone', 'Sobres cremosos de pollo, perfectos como premio o complemento húmedo de la dieta diaria.'),
  ('Juguete Varita con Plumas', 'PlayFetch', 2, 'juguetes', 3990, 18, 0, 'wand', 'Varita con plumas naturales que imita el vuelo de un ave, estimulando el instinto de caza.'),
  ('Transportadora Mediana', 'SafeTrip', 2, 'transporte', 24990, 6, 0, 'carrier', 'Transportadora ventilada con puerta frontal y superior, base impermeable y asa acolchada.'),
  ('Collar con Cascabel', 'WalkEasy', 2, 'accesorios', 4990, 9, 0, 'collar', 'Collar con hebilla de seguridad que se suelta ante tirones fuertes, protegiendo a tu gato.');