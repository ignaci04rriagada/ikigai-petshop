import { Estado } from "../nucleo/Estado.js";
import { Carrito, FREE_SHIPPING_THRESHOLD } from "../nucleo/Carrito.js";
import { getIcon } from "../gamificacion/animaciones.js";

const CLP = new Intl.NumberFormat("es-CL", { style: "currency", currency: "CLP", maximumFractionDigits: 0 });

export function renderInventory(justAddedId = null) {
  const invSlots = document.getElementById("inv-slots");
  const invEmpty = document.getElementById("inv-empty");
  const invCount = document.getElementById("inv-count");
  const invDiscountLabel = document.getElementById("inv-discount-label");
  const invSubtotal = document.getElementById("inv-subtotal");
  const invTotal = document.getElementById("inv-total");
  const shipLabel = document.getElementById("ship-label");
  const shipBarFill = document.getElementById("ship-bar-fill");
  const checkoutBtn = document.getElementById("checkout-btn");
  const cartPeekCount = document.getElementById("cart-peek-count");

  if (!invSlots) return;

  const ids = Object.keys(Estado.cart);
  invSlots.innerHTML = "";
  if (invEmpty) invEmpty.hidden = ids.length !== 0;

  ids.forEach(id => {
    const p = Estado.productos.find(x => String(x.id) === String(id));
    if (!p) return;
    const slot = document.createElement("div");
    slot.className = "inv-slot" + (String(id) === String(justAddedId) ? " slot-pop" : "");
    slot.setAttribute("role", "listitem");
    slot.innerHTML = `
      <div class="item-icon item-icon--slot" title="${p.name}">${getIcon(p.icon)}</div>
      <span class="inv-slot-qty">×${Estado.cart[id]}</span>
      <button class="inv-slot-remove" aria-label="Quitar ${p.name} del carrito" data-remove="${id}">✕</button>
    `;
    invSlots.appendChild(slot);
  });

  const count = Carrito.obtenerConteo();
  const subtotal = Carrito.obtenerSubtotal();
  const tier = Carrito.obtenerTierActual();
  const total = Carrito.obtenerTotal();

  if (cartPeekCount) cartPeekCount.textContent = count;
  if (invCount) invCount.textContent = count + (count === 1 ? " ítem" : " ítems");

  if (tier.rate > 0) {
    if (invDiscountLabel) { invDiscountLabel.hidden = false; invDiscountLabel.textContent = `−${Math.round(tier.rate * 100)}% aplicado`; }
    if (invSubtotal) { invSubtotal.hidden = false; invSubtotal.textContent = CLP.format(subtotal); }
  } else {
    if (invDiscountLabel) invDiscountLabel.hidden = true;
    if (invSubtotal) invSubtotal.hidden = true;
  }

  if (invTotal) invTotal.textContent = CLP.format(total);
  if (checkoutBtn) checkoutBtn.disabled = count === 0;

  document.querySelectorAll(".discount-row").forEach(row => {
    const t = row.dataset.tier;
    row.classList.toggle("active", count > 0 && ((t === "4" && count >= 4) || Number(t) === count || (count > 3 && t === "4")));
  });

  const shipRemaining = FREE_SHIPPING_THRESHOLD - subtotal;
  const pct = Math.min(100, Math.round((subtotal / FREE_SHIPPING_THRESHOLD) * 100));
  if (shipBarFill) shipBarFill.style.width = pct + "%";
  if (shipLabel) {
    shipLabel.textContent = shipRemaining > 0
      ? `Te faltan ${CLP.format(shipRemaining)} para envío gratis`
      : "¡Envío gratis desbloqueado!";
  }
}