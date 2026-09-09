<?php
/**
 * ==============================================================================
 * PROYECTO: Ikigai Tienda de Mascotas
 * ARCHIVO: includes/header.php
 * ROL: Navegación Superior y Header Principal
 * ------------------------------------------------------------------------------
 * DESCRIPCIÓN:
 * - Contiene el logotipo de la marca con enlace al inicio.
 * - Renderiza el menú de navegación por categorías (Perros, Gatos, Ofertas).
 * - Incluye el contenedor del buscador en tiempo real.
 * - Contiene el botón del Carrito con su contador numérico de productos.
 * 
 * GAMIFICACIÓN ASOCIADA:
 * - El ícono del carrito es el punto de llegada de la animación "Vuelo del producto".
 * - Recibe la clase CSS `.is-wiggling` para ejecutar el efecto "Mueve la colita".
 * ==============================================================================
 */
?>
<header class="site-header">
  <div class="header-row">
    <a class="logo" href="index.php" data-action="reset">
      <span class="logo-mark" aria-hidden="true">
        <svg viewBox="0 0 48 48" width="34" height="34">
          <circle cx="24" cy="24" r="22" fill="currentColor"/>
          <path d="M16 20c1.7 0 3-1.8 3-4s-1.3-4-3-4-3 1.8-3 4 1.3 4 3 4Zm16 0c1.7 0 3-1.8 3-4s-1.3-4-3-4-3 1.8-3 4 1.3 4 3 4ZM10 27c1.4 0 2.5-1.6 2.5-3.5S11.4 20 10 20s-2.5 1.6-2.5 3.5S8.6 27 10 27Zm28 0c1.4 0 2.5-1.6 2.5-3.5S39.4 20 38 20s-2.5 1.6-2.5 3.5S36.6 27 38 27ZM24 24c-5.2 0-10 3.4-10 8.4 0 3 2.1 4.8 5 4.8 1.8 0 2.7-.8 5-.8s3.2.8 5 .8c2.9 0 5-1.8 5-4.8 0-5-4.8-8.4-10-8.4Z" fill="var(--cream)"/>
        </svg>
      </span>
      <span class="logo-text">Ikigai</span>
    </a>

    <nav class="main-nav" aria-label="Categorías">
      <ul>
        <li class="has-mega">
          <button class="nav-trigger" data-cat="perros" aria-expanded="false">
            <span class="nav-icon" aria-hidden="true">🐾</span> Perros
            <svg class="chev" width="10" height="6" viewBox="0 0 10 6"><path d="M1 1l4 4 4-4" stroke="currentColor" stroke-width="1.6" fill="none" stroke-linecap="round"/></svg>
          </button>
          <div class="mega-menu" data-mega="perros">
            <div class="mega-cols">
              <ul>
                <li><button data-filter-sub="alimento" data-filter-cat="perros">Alimento</button></li>
                <li><button data-filter-sub="camas" data-filter-cat="perros">Camas</button></li>
                <li><button data-filter-sub="accesorios" data-filter-cat="perros">Correas y arneses</button></li>
              </ul>
              <ul>
                <li><button data-filter-sub="higiene" data-filter-cat="perros">Higiene y bienestar</button></li>
                <li><button data-filter-sub="juguetes" data-filter-cat="perros">Juguetes</button></li>
                <li><button data-filter-sub="snacks" data-filter-cat="perros">Snacks y premios</button></li>
              </ul>
            </div>
            <div class="mega-feature">
              <div class="mega-feature-badge">🐾</div>
              <h3>Perros</h3>
              <p>Alimento, snacks y cuidados esenciales para la salud y felicidad de tu perro.</p>
              <button class="pill-btn" data-filter-cat="perros" data-filter-sub="">Ver todo</button>
            </div>
          </div>
        </li>
        <li class="has-mega">
          <button class="nav-trigger" data-cat="gatos" aria-expanded="false">
            <span class="nav-icon" aria-hidden="true">🐈</span> Gatos
            <svg class="chev" width="10" height="6" viewBox="0 0 10 6"><path d="M1 1l4 4 4-4" stroke="currentColor" stroke-width="1.6" fill="none" stroke-linecap="round"/></svg>
          </button>
          <div class="mega-menu" data-mega="gatos">
            <div class="mega-cols">
              <ul>
                <li><button data-filter-sub="alimento" data-filter-cat="gatos">Alimento</button></li>
                <li><button data-filter-sub="higiene" data-filter-cat="gatos">Arena e higiene</button></li>
                <li><button data-filter-sub="transporte" data-filter-cat="gatos">Transporte</button></li>
              </ul>
              <ul>
                <li><button data-filter-sub="juguetes" data-filter-cat="gatos">Juguetes y rascadores</button></li>
                <li><button data-filter-sub="snacks" data-filter-cat="gatos">Snacks</button></li>
                <li><button data-filter-sub="accesorios" data-filter-cat="gatos">Collares</button></li>
              </ul>
            </div>
            <div class="mega-feature">
              <div class="mega-feature-badge">🐈</div>
              <h3>Gatos</h3>
              <p>Todo lo que necesita tu gato para explorar, jugar y descansar tranquilo.</p>
              <button class="pill-btn" data-filter-cat="gatos" data-filter-sub="">Ver todo</button>
            </div>
          </div>
        </li>
        <li>
          <button class="nav-trigger nav-trigger--flat" data-filter-cat="ofertas" data-filter-sub="">
            <span class="nav-icon" aria-hidden="true">🏷️</span> Ofertas
          </button>
        </li>
      </ul>
    </nav>

    <div class="header-actions">
      <div class="search-box">
        <svg width="16" height="16" viewBox="0 0 16 16" aria-hidden="true"><circle cx="7" cy="7" r="5.2" stroke="currentColor" stroke-width="1.6" fill="none"/><path d="M11 11l3.5 3.5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/></svg>
        <input id="search-input" type="search" placeholder="Buscar productos, marcas..." aria-label="Buscar productos">
      </div>
      <button class="cart-peek" id="cart-peek" aria-label="Ver carrito">
        <svg width="20" height="20" viewBox="0 0 24 24" aria-hidden="true"><path d="M3 5h2l2.4 12.2a2 2 0 0 0 2 1.6h7.4a2 2 0 0 0 2-1.6L21 8H6" stroke="currentColor" stroke-width="1.8" fill="none" stroke-linecap="round" stroke-linejoin="round"/><circle cx="9.5" cy="20.5" r="1.4" fill="currentColor"/><circle cx="17.5" cy="20.5" r="1.4" fill="currentColor"/></svg>
        <span class="cart-peek-count" id="cart-peek-count">0</span>
      </button>
    </div>
  </div>
</header>