<?php include 'includes/navbar.php' ?>


<section>
    <!-- Seccion Carrusel -->
    <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="5000">
                <img src="assets/imagenes/carrusel/carrucel_imagen1.png" class="d-block w-100" alt="">
            </div>
            <div class="carousel-item" data-bs-interval="5000">
                <img src="assets/imagenes/carrusel/carrucel_imagen2.png" class="d-block w-100" alt="">
            </div>
            <div class="carousel-item" data-bs-interval="5000">
                <img src="assets/imagenes/carrusel/carrucel_imagen3.png" class="d-block w-100" alt="">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>
<!-- Seccion Historia -->
<section class="bg-concrete-50">
    <div class="historia container-xl">
        <div class="historia__contenido">
            <h2>Nos Presentamos</h2>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Necessitatibus voluptatibus eaque est consequatur nisi expedita architecto ab odit molestias. Reprehenderit ipsa laboriosam tenetur repellendus explicabo earum dolorem ratione praesentium repellat.</p>
        </div>
        <div class="historia__logo">
            <img src="assets/imagenes/logos/logo_color.png" alt="">
        </div>
    </div>
</section>

<!-- Seccion Nuestros Servicios  -->
<section class="bg-servicio">
    <?php include 'includes/grupoServicios.php' ?>
</section>

<!-- Seccion Contacto -->
<section class="contacto  bg-concrete-50">
    <?php include 'includes/mapFormulario.php' ?>


</section>

<?php include 'includes/footer.php' ?>
<a href="https://wa.me/+51950314016" class="whatsapp-float" target="_blank">
    <i class="fab fa-whatsapp"></i>
</a>

</body>

</html>