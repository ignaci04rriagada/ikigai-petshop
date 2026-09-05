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
<!-- 1. Librería jQuery 4.0 (CDN) -->
<script src="https://code.jquery.com/jquery-4.0.0.min.js"></script>
<!-- 2. Bootstrap 5.3.8-->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
<!-- 3. Script propio con Cache Busting -->
<?php 
    $js_file = 'assets/js/main.js';
    $js_version = file_exists($js_file) ? filemtime($js_file) : '1.0';
?>
<script type="module" src="<?= $js_file ?>?v=<?= $js_version ?>"></script>
</body>

</html>
</body>

</html>