<?php include 'includes/navbar.php' ?>

<div class="pagina-encabezado bg-concrete">
    <div class="">
        <h1>Nuestros Servicios</h1>
        <p>Estamos comprometidos con la satisfacción y seguridad de nuestros clientes.</p>
    </div>
</div>

<section class="bg-concrete-50">
    <div class="container-xl">
        <div class="servicio-detalle">
            <div class="servicio-detalle__card">
                <div class="servicio-detalle__card__imagen">
                    <a href="">
                        <img id="imagen" class="" src="assets/imagenes/servicios/servicio_imagen1.png" alt="">
                    </a>
                </div>
                <div class="servicio-detalle__card__descripcion">
                    <h4 class="servicio__card__titulo"></h4>
                    <h5 id="precio"></h5>
                    <div class="separador"></div>
                    <div class="descripcion" id="descripcion"></div>
                    <div class="servicio-detalle__card__buttons" id="buAgregar">
                        <button class="buAgregar" onclick="agregarProducto('servicio1')">Agregar</button>
                        <button type="button" class="buWhatsapp " onclick="comprarServicio()"><i class="fa-brands fa-whatsapp"></i> Whatsapp</button>

                    </div>
                </div>
            </div>

        </div>
</section>
<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        const servicioData = localStorage.getItem('servicioData');
        if (servicioData) {
            const servicioDataJson = JSON.parse(servicioData);

            const servicioTitle = document.querySelector('.servicio__card__titulo');
            const precio = document.getElementById('precio');
            const descripcion = document.getElementById('descripcion');
            const imagenElement = document.getElementById('imagen');

            const descripcionElement = document.querySelector('.servicio-detalle');            
            
            descripcionElement.id = servicioDataJson.servicioId;
            servicioTitle.textContent = servicioDataJson.title;
            precio.textContent = servicioDataJson.precio;
            descripcion.innerHTML = servicioDataJson.descripcionExtensa;
            imagenElement.src = `${servicioDataJson.imagen}`

            // cambiar parametros de la funcion del boton
            const buttonElement = document.querySelector('.buAgregar');
            buttonElement.setAttribute('onclick', `agregarProducto('${servicioDataJson.servicioId}')`);


        }
    });
</script>

<?php include 'includes/footer.php' ?>