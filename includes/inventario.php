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
