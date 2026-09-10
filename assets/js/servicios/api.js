/**
 * servicios/api.js
 * Toda peticiÃģn a la API pasa por acÃĄ, usando $.ajax (jQuery),
 * como especifica el stack del proyecto. NingÃšn otro mÃģdulo debe
 * llamar a $.ajax directamente.
 */

const ENDPOINTS = {
  productos: "api/productos.php",
  categorias: "api/categorias.php"
};

export const Api = {
  /**
   * @param {{categoria?:string, subcategoria?:string, oferta?:boolean, busqueda?:string}} filtros
   * @returns {JQuery.Promise}
   */
  obtenerProductos(filtros = {}) {
    const params = {};
    if (filtros.categoria && filtros.categoria !== "all") params.categoria = filtros.categoria;
    if (filtros.subcategoria) params.subcategoria = filtros.subcategoria;
    if (filtros.oferta) params.oferta = 1;
    if (filtros.busqueda) params.busqueda = filtros.busqueda;

    return $.ajax({ url: ENDPOINTS.productos, method: "GET", dataType: "json", data: params });
  },

  obtenerProducto(id) {
    return $.ajax({ url: ENDPOINTS.productos, method: "GET", dataType: "json", data: { id } });
  },

  obtenerCategorias() {
    return $.ajax({ url: ENDPOINTS.categorias, method: "GET", dataType: "json" });
  }
};