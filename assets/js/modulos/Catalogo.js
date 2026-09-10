/**
 * modulos/Catalogo.js
 * Vista Master. Pide el listado a la API según los filtros activos
 * y arma la grilla de tarjetas (.card de Bootstrap). El nombre del
 * producto enlaza a product.php?id=X (navegación real, recarga
 * de página) y el botón "Agregar" delega en Inventario.js.
 */
import { Estado, ICONS, CLP } from "../nucleo/Estado.js";
import { Api } from "../servicios/api.js";
import { Inventario } from "./Inventario.js";

const ETIQUETAS_SUB = {
  alimento: "Alimento", camas: "Camas", accesorios: "Accesorios", higiene: "Higiene",
  juguetes: "Juguetes", snacks: "Snacks", transporte: "Transporte"
};

export const Catalogo = {
  init() {
    this.aplicarFiltrosDesdeURL();

    $("#product-grid").on("click", "[data-add]", (e) => {
      const id = $(e.currentTarget).data("add");
      const producto = Estado.state.indiceProductos[id];
      if (producto) Inventario.agregarConAnimacion(id, producto, e.currentTarget);
    });

    // Delegado a nivel documento porque el nav (header.php) es
    // compartido y vive fuera del contenedor del catálogo.
    $(document).on("click", "[data-categoria]", (e) => {
      e.preventDefault();
      const $btn = $(e.currentTarget);
      Estado.setState({
        filtros: {
          categoria: $btn.data("categoria"),
          subcategoria: $btn.data("subcategoria") || "",
          busqueda: ""
        }
      });
      $("#search-input").val("");
      this.cargar();
      document.getElementById("catalog-title")?.scrollIntoView({ behavior: "smooth", block: "start" });
    });

    $("#brand-reset").on("click", (e) => {
      e.preventDefault();
      $("#search-input").val("");
      Estado.setState({ filtros: { categoria: "all", subcategoria: "", busqueda: "" } });
      this.cargar();
      window.scrollTo({ top: 0, behavior: "smooth" });
    });

    let temporizador;
    $("#search-input").on("input", () => {
      clearTimeout(temporizador);
      temporizador = setTimeout(() => {
        const busqueda = $("#search-input").val().trim();
        const { filtros } = Estado.state;
        Estado.setState({
          filtros: { categoria: busqueda ? "all" : filtros.categoria, subcategoria: busqueda ? "" : filtros.subcategoria, busqueda }
        });
        this.cargar();
      }, 200);
    });

    this.cargar();
  },

  /** Si venimos de un link de categoría clickeado en product.php
   *  (que redirige a index.php?categoria=X&subcategoria=Y), aplica
   *  ese filtro como estado inicial. */
  aplicarFiltrosDesdeURL() {
    const params = new URLSearchParams(window.location.search);
    if (params.has("categoria") || params.has("busqueda")) {
      Estado.setState({
        filtros: {
          categoria: params.get("categoria") || "all",
          subcategoria: params.get("subcategoria") || "",
          busqueda: params.get("busqueda") || ""
        }
      });
    }
  },

  cargar() {
    const { filtros } = Estado.state;
    $("#catalog-title").text(this.tituloPara(filtros));
    Api.obtenerProductos(filtros)
      .done((productos) => {
        Estado.registrarListado(productos);
        this.render(productos);
      })
      .fail(() => {
        $("#product-grid").empty();
        $("#empty-state").prop("hidden", false)
          .text("No se pudo cargar el catálogo. Revisa que el servidor PHP y la base de datos estén activos.");
      });
  },

  tituloPara(filtros) {
    if (filtros.busqueda) return `Resultados para "${filtros.busqueda}"`;
    if (filtros.categoria === "ofertas") return "Ofertas";
    if (filtros.categoria === "perros") return filtros.subcategoria ? "Perros · " + (ETIQUETAS_SUB[filtros.subcategoria] || filtros.subcategoria) : "Perros";
    if (filtros.categoria === "gatos") return filtros.subcategoria ? "Gatos · " + (ETIQUETAS_SUB[filtros.subcategoria] || filtros.subcategoria) : "Gatos";
    return "Todos los productos";
  },

  render(productos) {
    $("#catalog-count").text(productos.length + (productos.length === 1 ? " producto" : " productos"));
    const $grid = $("#product-grid").empty();
    $("#empty-state").prop("hidden", productos.length !== 0)
      .text("No encontramos productos con esos filtros. Prueba con otra categoría o término de búsqueda.");

    productos.forEach(p => {
      $grid.append(`
        <div class="col">
          <div class="card h-100 product-card">
            <div class="card-icon-wrap">
              ${p.stock <= 3 ? `<span class="badge text-bg-warning stock-tag">Quedan ${p.stock}</span>` : ""}
              <div class="item-icon" aria-hidden="true">${ICONS[p.icono] || "📦"}</div>
            </div>
            <div class="card-body d-flex flex-column">
              <p class="small fw-bold text-primary mb-1">${p.marca}</p>
              <a class="card-name-link mb-2" href="product.php?id=${p.id}">${p.nombre}</a>
              <div class="d-flex align-items-center justify-content-between mt-auto pt-2">
                <span class="fw-bold" style="font-family: var(--ikigai-font-display);">${CLP.format(p.precio)}</span>
                <button class="btn btn-dark btn-sm rounded-pill" data-add="${p.id}" aria-label="Agregar ${p.nombre} al carrito">+ Agregar</button>
              </div>
            </div>
          </div>
        </div>
      `);
    });
  }
};