<?php
/**
 * ==============================================================================
 * PROYECTO: Ikigai Tienda de Mascotas
 * ARCHIVO: includes/inventario.php
 * ROL: Carrito Lateral Desplegable (Sidebar / Drawer)
 * ------------------------------------------------------------------------------
 * DESCRIPCIÓN:
 * - Panel lateral donde jQuery renderiza los ítems agregados por el usuario.
 * - Muestra el desglose de precios, subtotal, descuentos aplicados y total final.
 * 
 * GAMIFICACIÓN Y REGLAS DE NEGOCIO INTEGRADAS:
 * 1. Barra de progreso "Plato de comida": Muestra el monto faltante para Envío Gratis.
 * 2. Tabla de Descuentos Progresivos: Matriz visible de beneficios por volumen
 *    (1 prod = 0% | 2 prods = 25% | 3 prods = 35% | 4+ prods = 50%).
 * 3. Botón de acción principal: "Ir a pagar" (Checkout).
 * ==============================================================================
 */
?>
<!-- CARRITO-INVENTARIO -->
<div class="inv" id="inv" data-state="expanded">
  <button class="inv-handle" id="inv-handle" aria-expanded="true" aria-controls="inv-panel">
    <span class="inv-handle-label">
      <svg width="16" height="16" viewBox="0 0 24 24" aria-hidden="true"><path d="M3 5h2l2.4 12.2a2 2 0 0 0 2 1.6h7.4a2 2 0 0 0 2-1.6L21 8H6" stroke="currentColor" stroke-width="1.8" fill="none" stroke-linecap="round" stroke-linejoin="round"/></svg>
      Tu inventario
    </span>
    <span class="inv-handle-chev" id="inv-handle-chev">▾</span>
  </button>

  <div class="inv-panel" id="inv-panel">
    <div class="inv-panel-top">
      <div class="inv-slots" id="inv-slots" role="list" aria-label="Ítems en el carrito"></div>

      <div class="inv-side">
        <div class="ship-progress">
          <div class="ship-progress-head">
            <span id="ship-label">Agrega productos para envío gratis</span>
            <span class="ship-icon" aria-hidden="true">🍖</span>
          </div>
          <div class="ship-bar"><div class="ship-bar-fill" id="ship-bar-fill"></div></div>
        </div>

        <div class="discount-table" aria-label="Descuento por cantidad">
          <div class="discount-row" data-tier="1"><span>1</span><span>0%</span></div>
          <div class="discount-row" data-tier="2"><span>2</span><span>25%</span></div>
          <div class="discount-row" data-tier="3"><span>3</span><span>35%</span></div>
          <div class="discount-row" data-tier="4"><span>4+</span><span>50%</span></div>
        </div>
      </div>
    </div>

    <div class="inv-empty" id="inv-empty">Tu inventario está vacío. Agrega productos para empezar a ahorrar.</div>
  </div>

  <div class="inv-bottom">
    <div class="inv-totals">
      <span class="inv-count" id="inv-count">0 ítems</span>
      <span class="inv-discount" id="inv-discount-label" hidden></span>
    </div>
    <div class="inv-price-block">
      <span class="inv-subtotal" id="inv-subtotal" hidden></span>
      <span class="inv-total" id="inv-total">$0</span>
    </div>
    <button class="checkout-btn" id="checkout-btn" disabled>Ir a pagar →</button>
  </div>
</div>