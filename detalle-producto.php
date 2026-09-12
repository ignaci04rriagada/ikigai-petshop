<?php
$pageTitle = "Producto — Ikigai";
require_once __DIR__ . "/includes/head.php";
require_once __DIR__ . "/includes/header.php";
?>

<main id="main">
  <section class="container-xl py-5" aria-label="Detalle de producto">

    <a href="index.php" class="btn btn-link text-decoration-none mb-3 ps-0">← Volver al catálogo</a>

    <div id="detail-loading" class="text-body-secondary">Cargando producto...</div>
    <p id="detail-error" class="text-danger" hidden>No pudimos encontrar este producto. Vuelve al catálogo e inténtalo de nuevo.</p>

    <div class="card border-0 text-white p-4 p-md-5 position-relative overflow-hidden" id="detail-card" style="background: var(--bs-dark); border-radius: var(--bs-border-radius-xl);" hidden>
      <div class="row align-items-center g-4">
        <div class="col-md-4 text-center">
          <div class="item-icon item-icon--lg mx-auto" id="detail-icon" style="background: rgba(255,255,255,0.1);"></div>
        </div>
        <div class="col-md-8">
          <p class="fw-bold small mb-1" style="color: var(--ikigai-magenta-soft);" id="detail-brand"></p>
          <h1 class="h3" id="detail-name"></h1>
          <p class="text-white-50" id="detail-desc" style="max-width: 460px;"></p>
          <div class="d-flex align-items-center gap-3 mt-3">
            <span class="fs-3 fw-bold" id="detail-price" style="font-family: var(--ikigai-font-display);"></span>
            <span class="badge text-bg-warning" id="detail-stock"></span>
          </div>
          <button class="btn btn-primary btn-lg rounded-pill mt-4" id="detail-add">Agregar al carrito</button>
        </div>
      </div>
    </div>

  </section>
</main>

<?php
require_once __DIR__ . "/includes/inventario.php";
require_once __DIR__ . "/includes/footer.php";
?>