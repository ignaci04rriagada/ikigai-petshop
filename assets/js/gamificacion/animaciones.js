const ICONS = {
  kibble: "🥘", bone: "🦴", leash: "⛓️", bed: "🛏️", ball: "🎾",
  harness: "🦺", bottle: "🧴", litter: "🪣", scratcher: "🗼",
  wand: "🪶", carrier: "🧳", collar: "🔔"
};

export function getIcon(name) {
  return ICONS[name] || "📦";
}

export function wiggleCart() {
  const cartPeek = document.getElementById("cart-peek");
  const invHandle = document.getElementById("inv-handle");
  if (cartPeek) {
    cartPeek.classList.remove("wiggle");
    void cartPeek.offsetWidth;
    cartPeek.classList.add("wiggle");
  }
  if (invHandle) {
    invHandle.classList.remove("wiggle");
    void invHandle.offsetWidth;
    invHandle.classList.add("wiggle");
  }
}

export function flyToInventory(sourceEl, productIcon) {
  if (!sourceEl) return;
  const invEl = document.getElementById("inv");
  if (!invEl) return;

  const startRect = sourceEl.getBoundingClientRect();
  const endRect = invEl.getBoundingClientRect();

  const clone = document.createElement("div");
  clone.className = "fly-item";
  clone.textContent = getIcon(productIcon);
  clone.style.left = (startRect.left + startRect.width / 2 - 18) + "px";
  clone.style.top = (startRect.top + startRect.height / 2 - 18) + "px";
  clone.style.width = "36px";
  clone.style.height = "36px";
  document.body.appendChild(clone);

  requestAnimationFrame(() => {
    clone.style.left = (endRect.left + 40) + "px";
    clone.style.top = (endRect.top + 10) + "px";
    clone.style.width = "18px";
    clone.style.height = "18px";
    clone.style.opacity = "0.15";
    clone.style.transform = "scale(0.6)";
  });
  setTimeout(() => clone.remove(), 620);
}

export function showToast(msg) {
  const toastEl = document.getElementById("toast");
  if (!toastEl) return;
  toastEl.textContent = msg;
  toastEl.classList.add("show");
  clearTimeout(showToast._t);
  showToast._t = setTimeout(() => toastEl.classList.remove("show"), 1600);
}