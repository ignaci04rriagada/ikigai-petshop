<?php
$pageTitle = "Ikigai — Todo para tu mejor amigo";
require_once __DIR__ . "/includes/head.php";
require_once __DIR__ . "/includes/header.php";
?>

<main id="main">

  <!-- HERO -->
  <section class="py-5">
    <div class="container-xl d-flex flex-column flex-lg-row align-items-center justify-content-between gap-5">
      <div style="max-width: 560px;">
        <p class="fw-bold text-primary mb-2">Tienda de mascotas</p>
        <h1 class="display-title" style="font-size: clamp(1.9rem, 3.4vw, 2.7rem); line-height: 1.12;">
          Todo para tu mejor amigo, con la confianza que se merece
        </h1>
        <p class="text-body-secondary fs-5 mt-3" style="max-width: 460px;">
          Mientras más llevas, más ahorras: descuentos de hasta 50% por cantidad, sin sorpresas al pagar.
        </p>
        <div class="d-flex gap-2 mt-4" aria-label="Tabla de descuento por cantidad">
          <div class="border rounded-3 px-3 py-2 text-center bg-white"><div class="fw-bold">1</div><small class="text-body-secondary">0%</small></div>
          <div class="border rounded-3 px-3 py-2 text-center bg-white"><div class="fw-bold">2</div><small class="text-body-secondary">25%</small></div>
          <div class="border rounded-3 px-3 py-2 text-center bg-white"><div class="fw-bold">3</div><small class="text-body-secondary">35%</small></div>
          <div class="rounded-3 px-3 py-2 text-center bg-dark text-warning"><div class="fw-bold">4+</div><small>50%</small></div>
        </div>
      </div>
      <div aria-hidden="true">
        <svg viewBox="0 0 320 320" width="220" height="220">
          <circle cx="160" cy="160" r="150" fill="var(--ikigai-pink-bg)"/>
          <circle cx="118" cy="128" r="16" fill="var(--bs-primary)"/>
          <circle cx="202" cy="128" r="16" fill="var(--bs-primary)"/>
          <circle cx="86" cy="172" r="13" fill="var(--bs-primary)"/>
          <circle cx="234" cy="172" r="13" fill="var(--bs-primary)"/>
          <path d="M160 168c-34 0-64 22-64 54 0 19 14 31 32 31 12 0 17-5 32-5s20 5 32 5c18 0 32-12 32-31 0-32-30-54-64-54Z" fill="var(--bs-primary)"/>
        </svg>
      </div>
    </div>
  </section>

  <!-- LISTADO (VISTA MASTER) -->
  <section class="container-xl pb-5" aria-label="Listado de productos">
    <div class="d-flex justify-content-between align-items-baseline border-bottom pb-2 mb-3">
      <h2 class="h4 mb-0" id="catalog-title">Todos los productos</h2>
      <p class="small text-body-secondary mb-0" id="catalog-count"></p>
    </div>
    <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 g-3" id="product-grid"></div>
    <p class="text-center text-body-secondary py-5" id="empty-state" hidden>
      No encontramos productos con esos filtros. Prueba con otra categoría o término de búsqueda.
    </p>
  </section>

</main>

<?php
require_once __DIR__ . "/includes/inventario.php";
require_once __DIR__ . "/includes/footer.php";
?>