/**
 * modulos/DetalleModal.js
 * Vista Detail (product.php). Lee el id desde la query string,
 * pide el producto a la API y llena la ficha. Delega el "agregar
 * al carrito" en Inventario.js para reusar la misma animación.
 */
import { Estado, ICONS, CLP } from "../nucleo/Estado.js";
import { Api } from "../servicios/api.js";
import { Inventario } from "./Inventario.js";

export const DetalleModal = {
  init() {
    const params = new URLSearchParams(window.location.search);
    const id = params.get("id");

    if (!id) {
      this.mostrarError();
      return;
    }

    Api.obtenerProducto(id)
      .done((producto) => {
        Estado.registrarProductoActivo(producto);
        this.render(producto);
      })
      .fail(() => this.mostrarError());
  },

  mostrarError() {
    $("#detail-loading").prop("hidden", true);
    $("#detail-error").prop("hidden", false);
  },

  render(p) {
    $("#detail-loading").prop("hidden", true);
    $("#detail-card").prop("hidden", false);

    $("#detail-icon").text(ICONS[p.icono] || "📦");
    $("#detail-brand").text(p.marca);
    $("#detail-name").text(p.nombre);
    $("#detail-desc").text(p.descripcion);
    $("#detail-price").text(CLP.format(p.precio));
    $("#detail-stock").text(p.stock <= 3 ? `Quedan ${p.stock}` : "En stock");
    document.title = p.nombre + " — Ikigai";

    $("#detail-add").off("click").on("click", (e) => {
      Inventario.agregarConAnimacion(String(p.id), p, e.currentTarget);
    });
  }
};