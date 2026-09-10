/**
 * Servicio API para comunicarse con los endpoints en PHP.
 */
export async function fetchProductos(params = {}) {
  try {
    const query = new URLSearchParams(params).toString();
    const url = `api/productos.php${query ? `?${query}` : ""}`;
    const res = await fetch(url);
    if (!res.ok) throw new Error("HTTP " + res.status);
    return await res.json();
  } catch (err) {
    console.error("Error al obtener productos desde API:", err);
    return [];
  }
}

export async function fetchProductoPorId(id) {
  try {
    const res = await fetch(`api/productos.php?id=${encodeURIComponent(id)}`);
    if (!res.ok) throw new Error("HTTP " + res.status);
    return await res.json();
  } catch (err) {
    console.error(`Error al obtener producto ${id}:`, err);
    return null;
  }
}

export async function fetchCategorias() {
  try {
    const res = await fetch("api/categorias.php");
    if (!res.ok) throw new Error("HTTP " + res.status);
    return await res.json();
  } catch (err) {
    console.error("Error al obtener categorías:", err);
    return [];
  }
}