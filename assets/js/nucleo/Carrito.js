/**
 * nucleo/Carrito.js
 * LÃ³gica de negocio del carrito. No toca el DOM: opera sobre
 * Estado.state.carrito y expone funciones de cÃ¡lculo puras que
 * Inventario.js usa para renderizar.
 */
import { Estado, DISCOUNT_TIERS, FREE_SHIPPING_THRESHOLD } from "./Estado.js";

export const Carrito = {
  agregarItem(productoId) {
    const carrito = { ...Estado.state.carrito };
    carrito[productoId] = (carrito[productoId] || 0) + 1;
    Estado.setState({ carrito });
  },

  quitarItem(productoId) {
    const carrito = { ...Estado.state.carrito };
    delete carrito[productoId];
    Estado.setState({ carrito });
  },

  /** Cantidad total de Ã­tems en el carrito. */
  cantidad() {
    return Object.values(Estado.state.carrito).reduce((a, b) => a + b, 0);
  },

  /**
   * Suma de precios sin descuento. Resuelve cada producto desde el
   * Ã­ndice acumulado (Estado.state.indiceProductos), no desde el
   * listado filtrado actual: si el usuario agregÃ³ un producto y
   * luego cambiÃ³ de filtro, ese producto ya no estÃ¡ en "productos"
   * pero sigue en el Ã­ndice.
   */
  subtotal() {
    const { carrito, indiceProductos } = Estado.state;
    return Object.entries(carrito).reduce((suma, [id, cant]) => {
      const producto = indiceProductos[id];
      return suma + (producto ? producto.precio * cant : 0);
    }, 0);
  },

  tramoActual() {
    const n = this.cantidad();
    return DISCOUNT_TIERS.find(t => n >= t.min) || DISCOUNT_TIERS[DISCOUNT_TIERS.length - 1];
  },

  total() {
    const { rate } = this.tramoActual();
    return Math.round(this.subtotal() * (1 - rate));
  },

  montoParaEnvioGratis() {
    return FREE_SHIPPING_THRESHOLD - this.subtotal();
  },

  progresoEnvioGratisPct() {
    return Math.min(100, Math.round((this.subtotal() / FREE_SHIPPING_THRESHOLD) * 100));
  }
};