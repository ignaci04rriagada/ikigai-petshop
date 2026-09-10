import { Estado } from "../nucleo/Estado.js";
import { getIcon } from "../gamificacion/animaciones.js";

const CLP = new Intl.NumberFormat("es-CL", { style: "currency", currency: "CLP", maximumFractionDigits: 0 });

function subLabel(sub) {
  const map = { alimento: "Alimento", camas: "Camas", accesorios: "Accesorios", higiene: "Higiene",
    juguetes: "Juguetes", snacks: "Snacks", transporte: "Transporte" };
  return map[sub] || sub;
}

function titleFor() {
  const { cat, sub, query } = Estado.filters;
  if (query) return `Resultados para “${query}”`;
  if (cat === "ofertas") return "Ofertas";
  if (cat === "perros") return sub ? "Perros · " + subLabel(sub) : "Perros";
  if (cat === "gatos") return sub ? "Gatos · " + subLabel(sub) : "Gatos";
  return "Todos los productos";
}

export function renderGrid() {
  const grid = document.getElementById("product-grid");
  const emptyState = document.getElementById("empty-state");
  const catalogTitle = document.getElementById("catalog-title");
  const catalogCount = document.getElementById("catalog-count");

  if (!grid) return;

  const list = Estado.productos.filter(p => {
    if (Estado.filters.cat === "ofertas" && !p.oferta) return false;
    if (Estado.filters.cat !== "all" && Estado.filters.cat !== "ofertas" && p.category !== Estado.filters.cat) return false;
    if (Estado.filters.sub && p.subcategory !== Estado.filters.sub) return false;
    if (Estado.filters.query) {
      const q = Estado.filters.query.toLowerCase();
      if (!p.name.toLowerCase().includes(q) && !p.brand.toLowerCase().includes(q)) return false;
    }
    return true;
  });

  if (catalogTitle) catalogTitle.textContent = titleFor();
  if (catalogCount) catalogCount.textContent = list.length + (list.length === 1 ? " producto" : " productos");
  grid.innerHTML = "";
  if (emptyState) emptyState.hidden = list.length !== 0;

  list.forEach(p => {
    const card = document.createElement("article");
    card.className = "product-card";
    card.innerHTML = `
      <div class="card-top">
        ${p.stock <= 3 ? `<span class="stock-tag">Quedan ${p.stock}</span>` : ""}
        <div class="item-icon" aria-hidden="true">${getIcon(p.icon)}</div>
      </div>
      <p class="card-brand">${p.brand}</p>
      <button class="card-name" data-open="${p.id}">${p.name}</button>
      <div class="card-bottom">
        <span class="card-price">${CLP.format(p.price)}</span>
        <button class="add-btn" data-add="${p.id}" aria-label="Agregar ${p.name} al carrito">+ Agregar</button>
      </div>
    `;
    grid.appendChild(card);
  });
}