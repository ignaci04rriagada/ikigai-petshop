# 🐾 Ikigai Petshop — Plataforma E-Commerce Decoupled & Gamificada

**Ikigai Petshop** es una aplicación web e-commerce de arquitectura moderna basada en el modelo **Master/Detail**, diseñada para la gestión y presentación interactiva de productos de minimarket para mascotas. 

El proyecto está construido bajo un enfoque **desacoplado (API-Driven)**, donde el backend en PHP realiza consultas a una base de datos MySQL y genera respuestas exclusivamente en formato JSON, las cuales son procesadas asíncronamente vía AJAX por el cliente (JavaScript / jQuery) para manipular el DOM sin recargas de página.

---

## Cumplimiento de Requerimientos Académicos

Alineado estrictamente con la rúbrica de evaluación y el encargo del proyecto, el sistema implementa:

1. **Separación Estructural Lógica (HTML5, CSS3, JS):** Estructura totalmente modularizada, desacoplando estilos, lógica de cliente y marcado.
2. **Arquitectura Master / Detail:**
   - **Vista Master (`index.php`):** Catálogo general dinámico con filtrado interactivo por categorías, renderizando tarjetas de producto con marca, precio, cantidad (stock) y botón de acción.
   - **Vista Detail (`product.php`):** Ficha técnica extendida de un producto individual alimentada mediante parámetros en la URL (`product.php?id=X`).
3. **Consumo de Datos JSON vía AJAX:** Consultas asíncronas desde el cliente hacia el endpoint de datos (`api/productos.php`) sin recarga de página.
4. **Innovación & Experiencia de Usuario (Gamificación):** Implementación de dinámicas interactivas para incentivar la conversión en el cliente y responder a los criterios actitudinales de cuestionar la forma tradicional de hacer las cosas.

---

## Stack Tecnológico

- **Frontend:** HTML5, CSS3 (Bootstrap 5), JavaScript ES6+ y jQuery 4.0 (Peticiones AJAX y manipulación dinámica del DOM).
- **Backend:** PHP 8.x
- **Base de Datos:** MySQL 8.x.
- **Control de Versiones & Metodología:** Git, GitHub Workflow (GitHub Desktop) y Scrum (Trello).

---

## Estructura del Proyecto

```text
ikigai-petshop/
├── index.php                 # Vista Master (Catalogo general y filtros)
├── product.php               # Vista Detail (Ficha extendida via ?id=X)
├── package.json              # Configuracion y scripts
├── .gitignore                # Archivos ignorados por Git
├── README.md                 # Documentacion tecnica del proyecto
│
├── api/                      # Backend desacoplado en PHP (Endpoints JSON)
│   ├── configuracion/
│   │   └── conexion.php      # Conexion a MySQL via PDO
│   ├── modelos/
│   │   ├── Producto.php      # Consultas SQL de productos y stock
│   │   └── Categoria.php     # Consultas SQL de categorias
│   ├── productos.php         # Endpoint principal (?categoria=X, ?id=X)
│   └── categorias.php        # Endpoint para listado de categorias
│
├── assets/                   # Recursos estaticos, estilos y scripts del cliente
│   ├── css/                  # Arquitectura CSS modular
│   │   ├── main.css          # Centralizador con los @imports
│   │   ├── base/
│   │   │   ├── _reset.css    # Reseteo de estilos
│   │   │   └── _variables.css# Variables globales BEM / CSS
│   │   └── componentes/      # Componentes BEM y animaciones
│   │       ├── _header.css          # Navbar y contenedor del carrito
│   │       ├── _product-card.css    # Tarjeta de producto y badge de stock
│   │       ├── _inventario.css      # Carrito lateral, descuentos y progreso
│   │       └── _fly-animation.css   # Animaciones keyframes y clases de vuelo
│   │
│   ├── js/                   # Codigo JavaScript del cliente (ES6+ / jQuery)
│   │   ├── main.js            # Punto de entrada e inicializacion de eventos
│   │   ├── servicios/
│   │   │   └── api.js        # Peticiones AJAX / Fetch hacia la API en PHP
│   │   ├── nucleo/
│   │   │   ├── Estado.js     # Manejo del estado global de la aplicacion
│   │   │   └── Carrito.js    # Logica del carrito y matriz de descuentos
│   │   ├── modulos/
│   │   │   ├── Catalogo.js   # Renderizado de tarjetas desde la API
│   │   │   ├── DetalleModal.js # Logica de la vista detallada del producto
│   │   │   └── Inventario.js # Manejo del panel inferior
│   │   └── gamificacion/
│   │       └── animaciones.js # Animacion de vuelo e interacciones visuales
│   │
│   └── imagenes/             # Galeria de productos e iconos
│
└── base_de_datos/            # Persistencia y scripts SQL
    └── esquema.sql           # Estructura de tablas (productos, categorias, ventas)
```
---

## Sinergia entre Archivos y Flujo de Datos

```text
[ Base de Datos MySQL ]
          │ (PDO SQL)
          ▼
[ Backend: api/modelos/ ] ──> [ Endpoints: api/*.php (JSON) ]
                                          │
                                          ▼ (Fetch / AJAX)
[ Cliente: assets/js/servicios/api.js ] ──> [ Estado.js / Carrito.js ]
                                                    │
                                                    ▼
[ Renderizado UI: Catalogo.js / Inventario.js ] ──> [ Estilos BEM: assets/css/ ]
```

1. Capa de Datos y Persistencia (Backend)
   
   - `api/configuracion/conexion.php`: Establece la conexión segura hacia la base de datos.
   - `api/modelos/` (`Producto.php`, `Categoria.php`): Contienen las clases encargadas de ejecutar las sentencias SQL. Desacoplan la base de datos de la capa web.
   - `api/*.php`(`productos.php`. `categorias.php`): Reciben solicitudes HTTP (por ejemplo `GET /api/productos.php?categoria=2`)solicitan los datos al modelo y responden únicamente con un payload.
  
2. Capa de Lógica y Servicios (Frontend - JS)
   - `assets/js/servicios/api.js`: Realiza las peticiones asíncronas (`$.ajax`) hacia los endpoints en PHP para recuperar la información sin recargar la página.
  
   - `assets/js/nucleo/`:
  
     - `Estado.js`: Centraliza los datos globales de la aplicación (catálogo activo, filtros seleccionados) para sincronizar la interfaz.
     - `Carrito.js`: Contiene las reglas de negocio (cálculo de totales, matriz de descuentos por volumen y estado persistente en `localStorage`).
   
   - `assets/js/main.js`: Es el orquestador principal. Inicializa los módulos de la aplicación y escucha los eventos globales al cargar el DOM.
  
3. Capa de Presentación e Interacción (Frontend - UI)
   - `assets/js/modulos/`:
     - `Catalogo.js`: Recibe los datos procesados y construye dinámicamente el grid de tarjetas de producto en `index.php`.
     - `DetalleModal.js`: Muestra la vista detallada extendida del producto sin abandonar la navegación.
     - `Inventario.js`: Controla la interfaz del panel de inventario tipo videojuego (minimizar, maximizar y ranuras de items).
     - 
   - `assets/js/gamificacion/animaciones.js`: Dispara los efectos visuales como el vuelo del ítem hacia el inventario y la respuesta interactiva del header.
  
4. Capa de Estilos Modulares (CSS)
   - `assets/css/main.css`: Centraliza la carga de todos los parciales CSS mediante `@imports`. 
   - `assets/css/componentes/`: Cada componente de la interfaz (`_header.css`, `_product-card.css`, `_inventario.css`, `_fly-animation.css`) posee su propia hoja de estilos aislada siguiendo la convención BEM. 

## Instalación y Despliegue Local
1. Clonar el repositorio.
2. Configurar la Base de Datos:
   1. Crear una base de datos MySQL en phpMyAdmin (ej. `ikigai_db`).
   2. Importar el archivo `base_de_datos/esquema.sql`.
   3. Ajustar las credenciales en `api/configuracion/conexion.php` si es necesario.
3. Ejecutar el proyecto