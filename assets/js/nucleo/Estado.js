/**
 * nucleo/Estado.js
 * Estado global de la aplicación. Patrón pub/sub simple: los
 * módulos se suscriben con Estado.subscribe(fn) y son notificados
 * en cada Estado.setState(patch).
 *
 * El carrito se persiste en localStorage porque, a diferencia de
 * la versión anterior (todo en una sola página), ahora navegamos
 * entre index.php y product.php con recarga completa — sin esto,
 * el carrito se perdería cada vez que el usuario ve el detalle de
 * un producto.
 */

