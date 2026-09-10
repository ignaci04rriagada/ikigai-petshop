<!--
  includes/inventario.php
  Se incluye en index.php y product.php, justo antes de cerrar
  <body> (vía footer.php). Dos piezas:

  1) .inv-bar — franja delgada SIEMPRE visible (fixed-bottom) con
     el conteo, el total y el botón de pagar. Esto es lo
     "minimizado" del carrito.

  2) #inventoryOffcanvas — offcanvas de Bootstrap (placement=bottom)
     que se abre con el botón "Ver detalle" o el ícono del header.
     Esto es lo "expandido": slots de productos, barra de envío
     gratis y tabla de descuento.

  Todo el contenido interno lo llena assets/js/modulos/Inventario.js
  a partir del estado en localStorage / Estado.js.
-->
<div class="inv-bar fixed-bottom d-flex align-items-center gap-3" id="inv-bar">
  <button class="btn btn-outline-light btn-sm btn-expand" type="button"
          data-bs-toggle="offcanvas" data-bs-target="#inventoryOffcanvas" aria-controls="inventoryOffcanvas">
    Tu inventario <span id="inv-bar-chev">▴</span>
  </button>

  <span class="small text-white-50" id="inv-count">0 ítems</span>
  <span class="small fw-bold text-warning" id="inv-discount-label" hidden></span>

  <div class="ms-auto text-end">
    <div class="small text-white-50 text-decoration-line-through" id="inv-subtotal" hidden></div>
    <div class="fw-bold fs-5" id="inv-total">$0</div>
  </div>

  <button class="btn btn-primary rounded-pill fw-bold" id="checkout-btn" disabled>Ir a pagar →</button>
</div>

<div class="offcanvas offcanvas-bottom" tabindex="-1" id="inventoryOffcanvas" aria-labelledby="inventoryOffcanvasLabel">
  <div class="offcanvas-header">
    <h2 class="offcanvas-title h6 mb-0" id="inventoryOffcanvasLabel">Tu inventario</h2>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Cerrar"></button>
  </div>
  <div class="offcanvas-body">
    <div class="row g-4">
      <div class="col-lg-8">
        <div class="inv-slots" id="inv-slots" role="list" aria-label="Ítems en el carrito"></div>
        <p class="inv-empty mt-2 mb-0" id="inv-empty">Tu inventario está vacío. Agrega productos para empezar a ahorrar.</p>
      </div>
      <div class="col-lg-4">
        <div class="ship-progress mb-3">
          <div class="d-flex justify-content-between small mb-1">
            <span id="ship-label">Agrega productos para envío gratis</span>
            <span aria-hidden="true">🍖</span>
          </div>
          <div class="progress" role="progressbar" aria-label="Progreso a envío gratis" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="height: 10px;">
            <div class="progress-bar" id="ship-bar-fill" style="width: 0%"></div>
          </div>
        </div>

        <div class="discount-table">
          <table class="table table-sm mb-0" aria-label="Descuento por cantidad">
            <tbody>
              <tr data-tier="1"><td>1 producto</td><td class="text-end">0%</td></tr>
              <tr data-tier="2"><td>2 productos</td><td class="text-end">25%</td></tr>
              <tr data-tier="3"><td>3 productos</td><td class="text-end">35%</td></tr>
              <tr data-tier="4"><td>4+ productos</td><td class="text-end">50%</td></tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Toast de Bootstrap para feedback (agregado al carrito, checkout demo) -->
<div class="toast-container position-fixed bottom-0 start-50 translate-middle-x mb-5 pb-3">
  <div id="toast" class="toast align-items-center text-white bg-dark border-0" role="status" aria-live="polite" aria-atomic="true">
    <div class="d-flex">
      <div class="toast-body" id="toast-body"></div>
    </div>
  </div>
</div>