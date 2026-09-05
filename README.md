# 🐾 Ikigai Petshop — Plataforma E-Commerce Decoupled & Gamificada

**Ikigai Petshop** es una aplicación web e-commerce de arquitectura moderna basada en el modelo **Master/Detail**, diseñada para la gestión y presentación interactiva de productos de minimarket para mascotas. 

El proyecto está construido bajo un enfoque **desacoplado (API-Driven)**, donde el backend en PHP realiza consultas a una base de datos MySQL y genera respuestas exclusivamente en formato JSON, las cuales son procesadas asíncronamente vía AJAX por el cliente (JavaScript / jQuery) para manipular el DOM sin recargas de página.

---

## 📋 Cumplimiento de Requerimientos Académicos

Alineado estrictamente con la rúbrica de evaluación y el encargo del proyecto, el sistema implementa:

1. **Separación Estructural Lógica (HTML5, CSS3, JS):** Estructura totalmente modularizada, desacoplando estilos, lógica de cliente y marcado.
2. **Arquitectura Master / Detail:**
   - **Vista Master (`index.php`):** Catálogo general dinámico con filtrado interactivo por categorías, renderizando tarjetas de producto con marca, precio, cantidad (stock) y botón de acción.
   - **Vista Detail (`product.php`):** Ficha técnica extendida de un producto individual alimentada mediante parámetros en la URL (`product.php?id=X`).
3. **Consumo de Datos JSON vía AJAX:** Consultas asíncronas desde el cliente hacia el endpoint de datos (`api/products.php`) sin recarga de página.
4. **Innovación & Experiencia de Usuario (Gamificación):** Implementación de dinámicas interactivas para incentivar la conversión en el cliente y responder a los criterios actitudinales de cuestionar la forma tradicional de hacer las cosas (IL 7.1).

---

## 🛠️ Stack Tecnológico

- **Frontend:** HTML5, CSS3 ( Bootstrap 5 ), JavaScript ES6+ y jQuery 4.0 (Peticiones AJAX y manipulación dinámica del DOM).
- **Backend:** PHP 8.x
- **Base de Datos:** MySQL 8.x.
- **Control de Versiones & Metodología:** Git, GitHub Workflow (GitHub Desktop) y Scrum (Trello).

---
