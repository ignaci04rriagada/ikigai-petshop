/**
 * nucleo/Estado.js
 * Estado global de la aplicación. Patrón pub/sub simple: los
 * módulos se suscriben con Estado.subscribe(fn) y son notificados
 * en cada Estado.setState(patch).
 *
 * El carrito se persiste en localStorage porque, a diferencia de
 * la versión anterior (todo en una sola página), ahora navegamos
 * entre index.php y product.php con recarga completa — sin esto,
 * el carrito se perdería cada vez que el usuario ve el detalle de
 * un producto.
 */

export const CLP = new Intl.NumberFormat("es-CL", {
  style: "currency", currency: "CLP", maximumFractionDigits: 0
});

export const ICONS = {
  kibble: "🥘", bone: "🦴", leash: "⛓️", bed: "🛏️", ball: "🎾",
  harness: "🦺", bottle: "🧴", litter: "🪣", scratcher: "🗼",
  wand: "🪶", carrier: "🧳", collar: "🔔"
};

export const DISCOUNT_TIERS = [
  { min: 4, rate: 0.50 },
  { min: 3, rate: 0.35 },
  { min: 2, rate: 0.25 },
  { min: 1, rate: 0 }
];

export const FREE_SHIPPING_THRESHOLD = 35000;

const CART_STORAGE_KEY = "ikigai_carrito";

function cargarCarritoGuardado() {
  try {
    const raw = localStorage.getItem(CART_STORAGE_KEY);
    return raw ? JSON.parse(raw) : {};
  } catch (e) {
    console.warn("No se pudo leer el carrito guardado:", e);
    return {};
  }
}

const state = {
  productos: [],                     // listado ACTUALMENTE filtrado (lo que se renderiza en el grid)
  productoActivo: null,              // producto cargado en la vista Detail
  carrito: cargarCarritoGuardado(),  // { productoId: cantidad }
  filtros: { categoria: "all", subcategoria: "", busqueda: "" },
  // Índice acumulado de TODOS los productos vistos hasta ahora (por id).
  // Es distinto de "productos": ese es solo el resultado del filtro activo,
  // y el carrito necesita poder resolver el precio de un ítem aunque ya
  // no aparezca en el filtro actual.
  indiceProductos: {}
};

const listeners = [];

export const Estado = {
  get state() {
    return state;
  },

  subscribe(fn) {
    listeners.push(fn);
    return () => listeners.splice(listeners.indexOf(fn), 1);
  },

  setState(patch) {
    Object.assign(state, patch);
    if ("carrito" in patch) {
      try {
        localStorage.setItem(CART_STORAGE_KEY, JSON.stringify(state.carrito));
      } catch (e) {
        console.warn("No se pudo guardar el carrito:", e);
      }
    }
    listeners.forEach(fn => fn(state));
  },

  /** Usado por Catalogo.js tras cada respuesta de la API: guarda el
   *  listado filtrado para renderizar y además indexa cada producto
   *  por id para que el carrito pueda resolver su precio más tarde. */
  registrarListado(productos) {
    const indice = { ...state.indiceProductos };
    productos.forEach(p => { indice[p.id] = p; });
    this.setState({ productos, indiceProductos: indice });
  },

  /** Indexa productos SIN tocar el listado filtrado ("productos").
   *  La usa Inventario.js para precargar el catálogo completo al
   *  iniciar, así el carrito puede resolver el precio de cualquier
   *  ítem sin importar qué filtro esté activo en el grid. */
  registrarIndice(productos) {
    const indice = { ...state.indiceProductos };
    productos.forEach(p => { indice[p.id] = p; });
    this.setState({ indiceProductos: indice });
  },

  /** Usado por DetalleModal.js al cargar la vista Detail. */
  registrarProductoActivo(producto) {
    const indice = { ...state.indiceProductos, [producto.id]: producto };
    this.setState({ productoActivo: producto, indiceProductos: indice });
  }
};