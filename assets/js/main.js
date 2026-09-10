/**
 * assets/js/main.js
 * Orquestador principal. includes/inventario.php vive en TODAS las
 * pÃ¡ginas, asÃ­ que Inventario.js siempre se inicializa. Catalogo.js
 * y DetalleModal.js son mutuamente excluyentes: se detectan por la
 * presencia de sus contenedores en el DOM (#product-grid en
 * index.php, #detail-card en product.php).
 */
import { Inventario } from "./modulos/Inventario.js";

$(function () {
  Inventario.init();

  const enIndex = document.getElementById("product-grid") !== null;
  const enProducto = document.getElementById("detail-card") !== null;

  if (enIndex) {
    import("./modulos/Catalogo.js").then(({ Catalogo }) => Catalogo.init());
  }

  if (enProducto) {
    import("./modulos/DetalleModal.js").then(({ DetalleModal }) => DetalleModal.init());

    // En product.php no hay grid que filtrar: un click en una
    // categorÃ­a del nav debe llevarte de vuelta a index.php ya
    // filtrado (Catalogo.js lo lee vÃ­a aplicarFiltrosDesdeURL()).
    $(document).on("click", "[data-categoria]", (e) => {
      e.preventDefault();
      const $btn = $(e.currentTarget);
      const params = new URLSearchParams();
      params.set("categoria", $btn.data("categoria"));
      if ($btn.data("subcategoria")) params.set("subcategoria", $btn.data("subcategoria"));
      window.location.href = "index.php?" + params.toString();
    });
  }
});