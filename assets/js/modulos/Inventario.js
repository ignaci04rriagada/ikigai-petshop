/**
 * modulos/Inventario.js
 * Controla la interfaz del carrito: la barra inferior siempre
 * visible (inv-bar) y el offcanvas de Bootstrap con el detalle
 * (slots, envío gratis, tabla de descuentos). Se incluye en TODAS
 * las páginas (index.php y product.php) porque includes/inventario.php
 * vive en ambas.
 */
import { Estado, ICONS, CLP } from "../nucleo/Estado.js";
import { Carrito } from "../nucleo/Carrito.js";
import { Api } from "../servicios/api.js";

let ultimoIdAgregado = null;

export const Inventario = {
  init() {
    // Precarga el catálogo completo (sin filtros) solo para que el
    // carrito pueda resolver precios sin importar qué filtro esté
    // activo en el grid de index.php.
    Api.obtenerProductos({}).done((productos) => Estado.registrarIndice(productos));

    $("#inv-slots").on("click", "[data-quitar]", (e) => {
      Carrito.quitarItem($(e.currentTarget).data("quitar"));
    });

    $("#checkout-btn").on("click", function () {
      if ($(this).prop("disabled")) return;
      import("../gamificacion/animaciones.js").then(({ mostrarToast }) => {
        mostrarToast("¡Gracias por tu compra! (demo)");
      });
    });

    // Rota el ícono de la barra inferior según el offcanvas esté abierto o cerrado
    const $offcanvas = $("#inventoryOffcanvas");
    $offcanvas.on("show.bs.offcanvas", () => $("#inv-bar-chev").text("▾"));
    $offcanvas.on("hide.bs.offcanvas", () => $("#inv-bar-chev").text("▴"));

    Estado.subscribe((state) => this.render(state));
    this.render(Estado.state);
  },

  /** Punto de entrada único para "agregar al carrito" desde cualquier módulo. */
  agregarConAnimacion(productoId, producto, sourceEl) {
    Carrito.agregarItem(productoId);
    ultimoIdAgregado = productoId;
    import("../gamificacion/animaciones.js").then(({ volarAlInventario, sacudirCarrito, mostrarToast }) => {
      volarAlInventario(sourceEl, producto);
      sacudirCarrito();
      mostrarToast(`${producto.nombre} agregado`);
    });
  },

  render(state) {
    const { carrito, indiceProductos } = state;
    const ids = Object.keys(carrito);

    $("#cart-peek-count").text(Carrito.cantidad());

    const $slots = $("#inv-slots").empty();
    $("#inv-empty").prop("hidden", ids.length !== 0);

    ids.forEach(id => {
      const producto = indiceProductos[id];
      if (!producto) return;
      const esNuevo = id === ultimoIdAgregado;
      $slots.append(`
        <div class="inv-slot ${esNuevo ? "slot-pop" : ""}" role="listitem">
          <div class="item-icon item-icon--slot" title="${producto.nombre}">${ICONS[producto.icono] || "📦"}</div>
          <span class="inv-slot-qty">×${carrito[id]}</span>
          <button class="inv-slot-remove" aria-label="Quitar ${producto.nombre} del carrito" data-quitar="${id}">✕</button>
        </div>
      `);
    });
    ultimoIdAgregado = null;

    const cantidad = Carrito.cantidad();
    const subtotal = Carrito.subtotal();
    const tramo = Carrito.tramoActual();
    const total = Carrito.total();

    $("#inv-count").text(cantidad + (cantidad === 1 ? " ítem" : " ítems"));

    if (tramo.rate > 0) {
      $("#inv-discount-label").prop("hidden", false).text(`−${Math.round(tramo.rate * 100)}% aplicado`);
      $("#inv-subtotal").prop("hidden", false).text(CLP.format(subtotal));
    } else {
      $("#inv-discount-label").prop("hidden", true);
      $("#inv-subtotal").prop("hidden", true);
    }
    $("#inv-total").text(CLP.format(total));
    $("#checkout-btn").prop("disabled", cantidad === 0);

    $(".discount-table tr[data-tier]").each(function () {
      const t = Number($(this).data("tier"));
      const activo = cantidad > 0 && ((t === 4 && cantidad >= 4) || t === cantidad);
      $(this).toggleClass("active", activo);
    });

    const restante = Carrito.montoParaEnvioGratis();
    const pct = Carrito.progresoEnvioGratisPct();
    $("#ship-bar-fill").css("width", pct + "%");
    $("#ship-progress .progress, .progress[aria-label='Progreso a envío gratis']").attr("aria-valuenow", pct);
    $("#ship-label").text(restante > 0
      ? `Te faltan ${CLP.format(restante)} para envío gratis`
      : "¡Envío gratis desbloqueado!");
  }
};