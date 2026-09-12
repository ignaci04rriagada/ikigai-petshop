<!--
  includes/header.php
  Navbar de Bootstrap (navbar, navbar-expand-lg, dropdown). El
  mega-menú de Perros/Gatos es un .dropdown-menu ensanchado vía
  CSS (ver assets/css/componentes/_header.css). Los elementos de
  categoría/subcategoría son <button type="button"> semánticos para
  ser escuchados por assets/js/modulos/Catalogo.js vía AJAX.
-->
<header class="site-navbar navbar navbar-expand-lg sticky-top border-bottom py-2 bg-white">
  <div class="container-xl">

    <!-- Marca / Logotipo con enlace navegable real -->
    <a class="navbar-brand d-flex align-items-center gap-2 text-primary fw-bold" href="index.php" id="brand-reset">
      <svg viewBox="0 0 48 48" width="32" height="32" aria-hidden="true">
        <circle cx="24" cy="24" r="22" fill="currentColor" />
        <path
          d="M16 20c1.7 0 3-1.8 3-4s-1.3-4-3-4-3 1.8-3 4 1.3 4 3 4Zm16 0c1.7 0 3-1.8 3-4s-1.3-4-3-4-3 1.8-3 4 1.3 4 3 4ZM10 27c1.4 0 2.5-1.6 2.5-3.5S11.4 20 10 20s-2.5 1.6-2.5 3.5S8.6 27 10 27Zm28 0c1.4 0 2.5-1.6 2.5-3.5S39.4 20 38 20s-2.5 1.6-2.5 3.5S36.6 27 38 27ZM24 24c-5.2 0-10 3.4-10 8.4 0 3 2.1 4.8 5 4.8 1.8 0 2.7-.8 5-.8s3.2.8 5 .8c2.9 0 5-1.8 5-4.8 0-5-4.8-8.4-10-8.4Z"
          fill="#fffaf7" />
      </svg>
      <span class="text-dark">Ikigai</span>
    </a>

    <!-- Botón hamburguesa para móviles -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMain"
      aria-controls="navMain" aria-label="Abrir menú de navegación">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Contenedor colapsable del menú -->
    <div class="collapse navbar-collapse" id="navMain">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 gap-lg-1">

        <!-- Mega-menú: Perros -->
        <li class="nav-item dropdown">
          <button class="nav-link dropdown-toggle fw-bold btn btn-link" type="button" data-bs-toggle="dropdown"
            aria-expanded="false">
            Perros
          </button>
          <div class="dropdown-menu mega-menu shadow border">
            <div class="row row-cols-2 g-3 flex-grow-1">
              <div class="col">
                <button type="button" class="dropdown-item" data-categoria="perros"
                  data-subcategoria="alimento">Alimento</button>
                <button type="button" class="dropdown-item" data-categoria="perros"
                  data-subcategoria="camas">Camas</button>
                <button type="button" class="dropdown-item" data-categoria="perros"
                  data-subcategoria="accesorios">Correas y arneses</button>
              </div>
              <div class="col">
                <button type="button" class="dropdown-item" data-categoria="perros"
                  data-subcategoria="higiene">Higiene</button>
                <button type="button" class="dropdown-item" data-categoria="perros"
                  data-subcategoria="juguetes">Juguetes</button>
                <button type="button" class="dropdown-item" data-categoria="perros" data-subcategoria="snacks">Snacks y
                  premios</button>
              </div>
            </div>
            <div class="mega-feature">
              <div class="mega-feature-badge"></div>
              <h3 class="h6 mb-1">Perros</h3>
              <p class="small text-body-secondary mb-2">Alimento, snacks y cuidados esenciales para tu perro.</p>
              <button type="button" class="btn btn-primary btn-sm rounded-pill w-100" data-categoria="perros"
                data-subcategoria="">Ver todo</button>
            </div>
          </div>
        </li>

        <!-- Mega-menú: Gatos -->
        <li class="nav-item dropdown">
          <button class="nav-link dropdown-toggle fw-bold btn btn-link" type="button" data-bs-toggle="dropdown"
            aria-expanded="false">
            🐈 Gatos
          </button>
          <div class="dropdown-menu mega-menu shadow border">
            <div class="row row-cols-2 g-3 flex-grow-1">
              <div class="col">
                <button type="button" class="dropdown-item" data-categoria="gatos"
                  data-subcategoria="alimento">Alimento</button>
                <button type="button" class="dropdown-item" data-categoria="gatos" data-subcategoria="higiene">Arena e
                  higiene</button>
                <button type="button" class="dropdown-item" data-categoria="gatos"
                  data-subcategoria="transporte">Transporte</button>
              </div>
              <div class="col">
                <button type="button" class="dropdown-item" data-categoria="gatos"
                  data-subcategoria="juguetes">Juguetes</button>
                <button type="button" class="dropdown-item" data-categoria="gatos"
                  data-subcategoria="snacks">Snacks</button>
                <button type="button" class="dropdown-item" data-categoria="gatos"
                  data-subcategoria="accesorios">Collares</button>
              </div>
            </div>
            <div class="mega-feature">
              <div class="mega-feature-badge"></div>
              <h3 class="h6 mb-1">Gatos</h3>
              <p class="small text-body-secondary mb-2">Todo para que tu gato explore, juegue y descanse.</p>
              <button type="button" class="btn btn-primary btn-sm rounded-pill w-100" data-categoria="gatos"
                data-subcategoria="">Ver todo</button>
            </div>
          </div>
        </li>
      </ul>

      <!-- Buscador dinámico -->
      <form class="d-flex me-2 mb-2 mb-lg-0" role="search" onsubmit="return false;">
        <input id="search-input" class="form-control rounded-pill" type="search"
          placeholder="Buscar productos, marcas..." aria-label="Buscar productos">
      </form>

      <!-- Disparador del carrito (Offcanvas) -->
      <button class="btn btn-dark rounded-circle cart-peek position-relative" id="cart-peek" type="button"
        data-bs-toggle="offcanvas" data-bs-target="#inventoryOffcanvas" aria-controls="inventoryOffcanvas"
        aria-label="Ver carrito de compras">
        <svg width="18" height="18" viewBox="0 0 24 24" aria-hidden="true">
          <path d="M3 5h2l2.4 12.2a2 2 0 0 0 2 1.6h7.4a2 2 0 0 0 2-1.6L21 8H6" stroke="currentColor" stroke-width="1.8"
            fill="none" stroke-linecap="round" stroke-linejoin="round" />
          <circle cx="9.5" cy="20.5" r="1.4" fill="currentColor" />
          <circle cx="17.5" cy="20.5" r="1.4" fill="currentColor" />
        </svg>
        <span class="badge rounded-pill bg-primary cart-peek-count position-absolute top-0 start-100 translate-middle"
          id="cart-peek-count">0</span>
      </button>
    </div>
  </div>
</header>