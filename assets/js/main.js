import { fetchProductos } from "./servicios/api.js";
import { Estado } from "./nucleo/Estado.js";
import { Carrito } from "./nucleo/Carrito.js";
import { renderGrid } from "./modulos/Catalogo.js";
import { openDetail, closeDetail } from "./modulos/DetalleModal.js";
import { renderInventory } from "./modulos/Inventario.js";
import { flyToInventory, wiggleCart, showToast } from "./gamificacion/animaciones.js";

document.addEventListener("DOMContentLoaded", async () => {
  // 1. Cargar productos desde la API en PHP
  const productos = await fetchProductos();
  Estado.setProductos(productos);

  // 2. Renderizado Inicial
  renderGrid();
  renderInventory();

  // 3. Manejo de adición al carrito
  function handleAddToCart(id, targetEl) {
    const p = Estado.productos.find(x => String(x.id) === String(id));
    if (!p) return;
    Carrito.agregar(id);
    flyToInventory(targetEl, p.icon);
    wiggleCart();
    showToast(`${p.name} agregado`);
    renderInventory(id);
  }

  // Delegación de eventos en la grilla
  const grid = document.getElementById("product-grid");
  if (grid) {
    grid.addEventListener("click", e => {
      const openBtn = e.target.closest("[data-open]");
      if (openBtn) { openDetail(openBtn.dataset.open, handleAddToCart); return; }

      const addBtn = e.target.closest("[data-add]");
      if (addBtn) { handleAddToCart(addBtn.dataset.add, addBtn); }
    });
  }

  // Delegación de eventos en el panel de inventario
  const invSlots = document.getElementById("inv-slots");
  if (invSlots) {
    invSlots.addEventListener("click", e => {
      const btn = e.target.closest("[data-remove]");
      if (btn) {
        Carrito.quitar(btn.dataset.remove);
        renderInventory();
      }
    });
  }

  // Modal Detail Close
  const detailClose = document.getElementById("detail-close");
  if (detailClose) detailClose.addEventListener("click", closeDetail);

  // Navegación / Filtros
  document.querySelectorAll("[data-filter-cat]").forEach(btn => {
    btn.addEventListener("click", () => {
      Estado.setFiltroCategoria(btn.dataset.filterCat, btn.dataset.filterSub || "");
      const searchInput = document.getElementById("search-input");
      if (searchInput) searchInput.value = "";
      document.querySelectorAll(".has-mega.open").forEach(o => o.classList.remove("open"));
      renderGrid();
      document.getElementById("catalog-title")?.scrollIntoView({ behavior: "smooth", block: "start" });
    });
  });

  // Buscador con debounce
  const searchInput = document.getElementById("search-input");
  if (searchInput) {
    let searchTimer;
    searchInput.addEventListener("input", () => {
      clearTimeout(searchTimer);
      searchTimer = setTimeout(() => {
        Estado.setFiltroBusqueda(searchInput.value.trim());
        renderGrid();
      }, 150);
    });
  }

  // Expandir / Colapsar Inventario
  const invEl = document.getElementById("inv");
  const invHandle = document.getElementById("inv-handle");
  const cartPeek = document.getElementById("cart-peek");

  if (invHandle && invEl) {
    invHandle.addEventListener("click", () => {
      const isExpanded = invEl.dataset.state === "expanded";
      invEl.dataset.state = isExpanded ? "collapsed" : "expanded";
      invHandle.setAttribute("aria-expanded", String(!isExpanded));
    });
  }

  if (cartPeek && invEl) {
    cartPeek.addEventListener("click", () => {
      invEl.dataset.state = "expanded";
      invEl.scrollIntoView({ behavior: "smooth", block: "end" });
    });
  }
});