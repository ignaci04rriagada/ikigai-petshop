import { Estado } from "./Estado.js";

export const FREE_SHIPPING_THRESHOLD = 35000;
export const DISCOUNT_TIERS = [
  { min: 4, rate: 0.50 },
  { min: 3, rate: 0.35 },
  { min: 2, rate: 0.25 },
  { min: 1, rate: 0 }
];

export const Carrito = {
  agregar(id) {
    Estado.cart[id] = (Estado.cart[id] || 0) + 1;
  },

  quitar(id) {
    if (!Estado.cart[id]) return;
    delete Estado.cart[id];
  },

  obtenerConteo() {
    return Object.values(Estado.cart).reduce((a, b) => a + b, 0);
  },

  obtenerSubtotal() {
    return Object.entries(Estado.cart).reduce((sum, [id, qty]) => {
      const p = Estado.productos.find(x => String(x.id) === String(id));
      return sum + (p ? Number(p.price) * qty : 0);
    }, 0);
  },

  obtenerTierActual() {
    const n = this.obtenerConteo();
    return DISCOUNT_TIERS.find(t => n >= t.min) || DISCOUNT_TIERS[DISCOUNT_TIERS.length - 1];
  },

  obtenerTotal() {
    const subtotal = this.obtenerSubtotal();
    const tier = this.obtenerTierActual();
    return Math.round(subtotal * (1 - tier.rate));
  }
};