/**
 * gamificacion/animaciones.js
 * Efectos visuales puros (no tocan el Estado ni el Carrito):
 * el vuelo del ítem hacia el inventario, la sacudida del botón de
 * carrito, y los toasts de feedback (usando el componente Toast
 * de Bootstrap, inicializado desde JS vanilla — los componentes
 * de Bootstrap 5 no dependen de jQuery).
 */
import { ICONS } from "../nucleo/Estado.js";

export function volarAlInventario(sourceEl, producto) {
  if (!sourceEl) return;
  const destino = document.getElementById("inv-bar");
  if (!destino) return;

  const startRect = sourceEl.getBoundingClientRect();
  const endRect = destino.getBoundingClientRect();

  const $clon = $(`<div class="fly-item">${ICONS[producto.icono] || "📦"}</div>`)
    .css({
      left: startRect.left + startRect.width / 2 - 18,
      top: startRect.top + startRect.height / 2 - 18,
      width: 36, height: 36
    })
    .appendTo("body");

  requestAnimationFrame(() => {
    $clon.css({
      left: endRect.left + 30,
      top: endRect.top + 10,
      width: 18, height: 18,
      opacity: 0.15,
      transform: "scale(0.6)"
    });
  });
  setTimeout(() => $clon.remove(), 620);
}

export function sacudirCarrito() {
  ["#cart-peek", "#inv-bar .btn-expand"].forEach(selector => {
    const $el = $(selector);
    $el.removeClass("wiggle");
    void $el[0]?.offsetWidth;
    $el.addClass("wiggle");
  });
}

let toastTimer;
export function mostrarToast(mensaje) {
  const $toastEl = $("#toast");
  $("#toast-body").text(mensaje);
  clearTimeout(toastTimer);

  if (window.bootstrap && $toastEl.length) {
    const toast = bootstrap.Toast.getOrCreateInstance($toastEl[0], { delay: 1800 });
    toast.show();
  }
}