<!--
  includes/header.php
  Navbar de Bootstrap (navbar, navbar-expand-lg, dropdown). El
  mega-menú de Perros/Gatos es un .dropdown-menu ensanchado vía
  CSS (ver assets/css/componentes/_header.css). Los links de
  categoría/subcategoría no navegan: quedan escuchados por
  assets/js/modulos/Catalogo.js, que vuelve a pedir el listado a
  la API vía AJAX (data-categoria / data-subcategoria).
-->
<header class="site-navbar navbar navbar-expand-lg sticky-top border-bottom py-2">
  <div class="container-xl">

    <a class="navbar-brand d-flex align-items-center gap-2 text-primary fw-bold" href="index.php" id="brand-reset">
      <svg viewBox="0 0 48 48" width="32" height="32" aria-hidden="true">
        <circle cx="24" cy="24" r="22" fill="currentColor"/>
        <path d="M16 20c1.7 0 3-1.8 3-4s-1.3-4-3-4-3 1.8-3 4 1.3 4 3 4Zm16 0c1.7 0 3-1.8 3-4s-1.3-4-3-4-3 1.8-3 4 1.3 4 3 4ZM10 27c1.4 0 2.5-1.6 2.5-3.5S11.4 20 10 20s-2.5 1.6-2.5 3.5S8.6 27 10 27Zm28 0c1.4 0 2.5-1.6 2.5-3.5S39.4 20 38 20s-2.5 1.6-2.5 3.5S36.6 27 38 27ZM24 24c-5.2 0-10 3.4-10 8.4 0 3 2.1 4.8 5 4.8 1.8 0 2.7-.8 5-.8s3.2.8 5 .8c2.9 0 5-1.8 5-4.8 0-5-4.8-8.4-10-8.4Z" fill="#fffaf7"/>
      </svg>
      <span class="text-dark">Ikigai</span>
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMain" aria-controls="navMain" aria-label="Abrir menú">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navMain">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 gap-lg-1">

        <li class="nav-item dropdown">
          <button class="nav-link dropdown-toggle fw-bold btn btn-link" data-bs-toggle="dropdown" aria-expanded="false">
            🐾 Perros
          </button>
          <div class="dropdown-menu mega-menu shadow border">
            <div class="row row-cols-2 g-3 flex-grow-1">
              <div class="col">
                <a class="dropdown-item" href="#" data-categoria="perros" data-subcategoria="alimento">Alimento</a>
                <a class="dropdown-item" href="#" data-categoria="perros" data-subcategoria="camas">Camas</a>
                <a class="dropdown-item" href="#" data-categoria="perros" data-subcategoria="accesorios">Correas y arneses</a>
              </div>
              <div class="col">
                <a class="dropdown-item" href="#" data-categoria="perros" data-subcategoria="higiene">Higiene y bienestar</a>
                <a class="dropdown-item" href="#" data-categoria="perros" data-subcategoria="juguetes">Juguetes</a>
                <a class="dropdown-item" href="#" data-categoria="perros" data-subcategoria="snacks">Snacks y premios</a>
              </div>
            </div>
            <div class="mega-feature">
              <div class="mega-feature-badge">🐾</div>
              <h3 class="h6">Perros</h3>
              <p class="small text-body-secondary">Alimento, snacks y cuidados esenciales para tu perro.</p>
              <a href="#" class="btn btn-primary btn-sm rounded-pill" data-categoria="perros" data-subcategoria="">Ver todo</a>
            </div>
          </div>
        </li>

        <li class="nav-item dropdown">
          <button class="nav-link dropdown-toggle fw-bold btn btn-link" data-bs-toggle="dropdown" aria-expanded="false">
            🐈 Gatos
          </button>
          <div class="dropdown-menu mega-menu shadow border">
            <div class="row row-cols-2 g-3 flex-grow-1">
              <div class="col">
                <a class="dropdown-item" href="#" data-categoria="gatos" data-subcategoria="alimento">Alimento</a>
                <a class="dropdown-item" href="#" data-categoria="gatos" data-subcategoria="higiene">Arena e higiene</a>
                <a class="dropdown-item" href="#" data-categoria="gatos" data-subcategoria="transporte">Transporte</a>
              </div>
              <div class="col">
                <a class="dropdown-item" href="#" data-categoria="gatos" data-subcategoria="juguetes">Juguetes y rascadores</a>
                <a class="dropdown-item" href="#" data-categoria="gatos" data-subcategoria="snacks">Snacks</a>
                <a class="dropdown-item" href="#" data-categoria="gatos" data-subcategoria="accesorios">Collares</a>
              </div>
            </div>
            <div class="mega-feature">
              <div class="mega-feature-badge">🐈</div>
              <h3 class="h6">Gatos</h3>
              <p class="small text-body-secondary">Todo para que tu gato explore, juegue y descanse.</p>
              <a href="#" class="btn btn-primary btn-sm rounded-pill" data-categoria="gatos" data-subcategoria="">Ver todo</a>
            </div>
          </div>
        </li>

        <li class="nav-item">
          <a class="nav-link fw-bold text-primary" href="#" data-categoria="ofertas" data-subcategoria="">🏷️ Ofertas</a>
        </li>
      </ul>

      <form class="d-flex me-2" role="search" onsubmit="return false;">
        <input id="search-input" class="form-control rounded-pill" type="search" placeholder="Buscar productos, marcas...">
      </form>

      <button class="btn btn-dark rounded-circle cart-peek" id="cart-peek" type="button"
              data-bs-toggle="offcanvas" data-bs-target="#inventoryOffcanvas" aria-controls="inventoryOffcanvas"
              aria-label="Ver carrito">
        <svg width="18" height="18" viewBox="0 0 24 24" aria-hidden="true"><path d="M3 5h2l2.4 12.2a2 2 0 0 0 2 1.6h7.4a2 2 0 0 0 2-1.6L21 8H6" stroke="currentColor" stroke-width="1.8" fill="none" stroke-linecap="round" stroke-linejoin="round"/><circle cx="9.5" cy="20.5" r="1.4" fill="currentColor"/><circle cx="17.5" cy="20.5" r="1.4" fill="currentColor"/></svg>
        <span class="badge rounded-pill bg-primary cart-peek-count" id="cart-peek-count">0</span>
      </button>
    </div>
  </div>
</header>