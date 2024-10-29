document.addEventListener("DOMContentLoaded", function () {
  new Glide("#glide", {
    type: "carousel", // Tipo de carrusel
    startAt: 0, // Comienza en el primer elemento
    perView: 3, // Número de elementos visibles
    breakpoints: {
      800: {
        perView: 1, // Muestra 1 elemento en pantallas pequeñas
      },
      1200: {
        perView: 2, // Muestra 2 elementos en pantallas medianas
      },
    },
  }).mount();
});