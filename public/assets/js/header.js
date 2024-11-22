// Escuchar el evento de desplazamiento en la ventana
window.addEventListener('scroll', function() {
    // Obtener el elemento navbar por su clase
    var navbar = document.querySelector('.navbar');
    // Verificar si el desplazamiento vertical es mayor a 50px
    if (window.scrollY > 50) {
        navbar.classList.add('fixed-top');
        navbar.classList.remove('py-4');
        navbar.classList.add('py-1');
    } else {
        navbar.classList.remove('fixed-top');
        navbar.classList.remove('py-1');
        navbar.classList.add('py-2');
    }
});