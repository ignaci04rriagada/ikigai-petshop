/**
 * Estado Global reactivo o centralizado del Cliente.
 */
export const Estado = {
  productos: [],
  cart: {}, // { id: cantidad }
  filters: { cat: "all", sub: "", query: "" },
  activeDetailId: null,

  setProductos(lista) {
    this.productos = lista;
  },

  setFiltroCategoria(cat, sub = "") {
    this.filters.cat = cat;
    this.filters.sub = sub;
    this.filters.query = "";
  },

  setFiltroBusqueda(query) {
    this.filters.query = query;
    if (query) {
      this.filters.cat = "all";
      this.filters.sub = "";
    }
  },

  resetFiltros() {
    this.filters = { cat: "all", sub: "", query: "" };
  }
};