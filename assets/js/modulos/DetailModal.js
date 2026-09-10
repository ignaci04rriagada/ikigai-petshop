import { Estado } from "../nucleo/Estado.js";
import { getIcon } from "../gamificacion/animaciones.js";

const CLP = new Intl.NumberFormat("es-CL", { style: "currency", currency: "CLP", maximumFractionDigits: 0 });

export function openDetail(id, onAddCallback) {
  const p = Estado.productos.find(x => String(x.id) === String(id));
  if (!p) return;

  const detailSection = document.getElementById("detail-section");
  if (!detailSection) return;

  Estado.activeDetailId = id;

  document.getElementById("detail-icon").textContent = getIcon(p.icon);
  document.getElementById("detail-brand").textContent = p.brand;
  document.getElementById("detail-name").textContent = p.name;
  document.getElementById("detail-desc").textContent = p.description;
  document.getElementById("detail-price").textContent = CLP.format(p.price);
  document.getElementById("detail-stock").textContent = p.stock <= 3 ? `Quedan ${p.stock}` : "En stock";

  const detailAdd = document.getElementById("detail-add");
  detailAdd.onclick = () => onAddCallback(p.id, detailAdd);

  detailSection.hidden = false;
  detailSection.scrollIntoView({ behavior: "smooth", block: "center" });
}

export function closeDetail() {
  const detailSection = document.getElementById("detail-section");
  if (detailSection) detailSection.hidden = true;
  Estado.activeDetailId = null;
}