<?php 
// 1. Incluir el encabezado HTML y la navegación principal
include_once 'includes/head.php'; 
include_once 'includes/header.php'; 
?>

<main id="main">

  <!-- HERO -->
  <section class="hero">
    <div class="hero-inner">
      <div class="hero-copy">
        <p class="hero-eyebrow">Tienda de mascotas</p>
        <h1>Todo para tu mejor amigo, con la confianza que se merece</h1>
        <p class="hero-sub">Mientras más llevas, más ahorras: descuentos de hasta 50% por cantidad, sin sorpresas al pagar.</p>
        <div class="hero-tiers" aria-label="Tabla de descuento por cantidad">
          <div class="tier"><span class="tier-n">1</span><span class="tier-p">0%</span></div>
          <div class="tier"><span class="tier-n">2</span><span class="tier-p">25%</span></div>
          <div class="tier"><span class="tier-n">3</span><span class="tier-p">35%</span></div>
          <div class="tier tier-max"><span class="tier-n">4+</span><span class="tier-p">50%</span></div>
        </div>
      </div>
      <div class="hero-art" aria-hidden="true">
        <svg viewBox="0 0 320 320" width="260" height="260">
          <circle cx="160" cy="160" r="150" fill="var(--pink-bg)"/>
          <circle cx="118" cy="128" r="16" fill="var(--magenta)"/>
          <circle cx="202" cy="128" r="16" fill="var(--magenta)"/>
          <circle cx="86" cy="172" r="13" fill="var(--magenta)"/>
          <circle cx="234" cy="172" r="13" fill="var(--magenta)"/>
          <path d="M160 168c-34 0-64 22-64 54 0 19 14 31 32 31 12 0 17-5 32-5s20 5 32 5c18 0 32-12 32-31 0-32-30-54-64-54Z" fill="var(--magenta)"/>
        </svg>
      </div>
    </div>
  </section>

  <!-- LISTADO MASTER -->
  <section class="catalog" aria-label="Listado de productos">
    <div class="catalog-head">
      <h2 id="catalog-title">Todos los productos</h2>
      <p class="catalog-count" id="catalog-count"></p>
    </div>
    <!-- Contenedor dinámico: Catalogo.js renderiza aquí los productos desde la API -->
    <div class="product-grid" id="product-grid"></div>
    <p class="empty-state" id="empty-state" hidden>No encontramos productos con esos filtros. Prueba con otra categoría o término de búsqueda.</p>
  </section>

  <!-- DETALLE MODAL -->
  <section class="detail" id="detail-section" aria-label="Detalle de producto" hidden>
    <div class="detail-card">
      <button class="detail-close" id="detail-close" aria-label="Cerrar detalle">✕</button>
      <div class="detail-icon-wrap">
        <div class="item-icon item-icon--lg" id="detail-icon"></div>
      </div>
      <div class="detail-body">
        <p class="detail-brand" id="detail-brand"></p>
        <h3 id="detail-name"></h3>
        <p class="detail-desc" id="detail-desc"></p>
        <div class="detail-meta">
          <span class="detail-price" id="detail-price"></span>
          <span class="stock-tag" id="detail-stock"></span>
        </div>
        <button class="add-btn add-btn--lg" id="detail-add">
          <span>Agregar al carrito</span>
        </button>
      </div>
    </div>
  </section>

</main>

<?php 
include_once 'includes/footer.php'; 
?>