<?php
/**
 * ==============================================================================
 * PROYECTO: Ikigai Tienda de Mascotas
 * ARCHIVO: includes/footer.php
 * ROL: Pie de Página y Carga de Scripts
 * ------------------------------------------------------------------------------
 * DESCRIPCIÓN:
 * - Renderiza la información institucional, redes sociales y derechos de autor.
 * - Incluye el cierre de las etiquetas </body> y </html>.
 * - Carga los archivos JavaScript principales (assets/js/main.js) antes del cierre
 *   del body para no bloquear el renderizado visual de la página.
 * ==============================================================================
 */
?>
<footer class="site-footer">
  <div class="footer-inner">
    <div class="footer-brand">
      <span class="logo-text">Ikigai</span>
      <p>Calidad, confianza y amor por las mascotas.</p>
    </div>
    <div class="footer-col">
      <h4>Navegación</h4>
      <ul><li>Inicio</li><li>Perros</li><li>Gatos</li><li>Ofertas</li></ul>
    </div>
    <div class="footer-col">
      <h4>Servicios</h4>
      <ul><li>Envíos</li><li>Cambios y devoluciones</li><li>Preguntas frecuentes</li></ul>
    </div>
    <div class="footer-col">
      <h4>Contacto</h4>
      <ul><li>hola@ikigaimascotas.cl</li><li>+56 9 0000 0000</li></ul>
    </div>
  </div>
  <p class="footer-legal">© 2026 Ikigai Tienda de Mascotas. Todos los derechos reservados.</p>
</footer>



<div class="toast" id="toast" role="status" aria-live="polite"></div>
<!-- jQuery 4.0.0-->
<script
  src="https://code.jquery.com/jquery-4.0.0.min.js"
  integrity="sha256-OaVG6prZf4v69dPg6PhVattBXkcOWQB62pdZ3ORyrao="
  crossorigin="anonymous"></script>
<!-- Bootstrap 5.3.8 -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
<!-- Script local -->
<script type="module" src="assets/js/main.js"></script>
</body>
</html>