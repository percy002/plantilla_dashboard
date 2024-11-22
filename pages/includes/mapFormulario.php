<div class="contacto__info  container-xl">
    <div class="contacto__info__mapa ratio ratio-1x1">
    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1630.9799568716774!2d-71.95904476278548!3d-13.526634047953767!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x916dd53a28296a3d%3A0x88277758f95cd163!2sHielos%20Point%20Cusco!5e0!3m2!1ses-419!2spe!4v1728481947818!5m2!1ses-419!2spe" width="500" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <div class="contacto__info__formulario">
        <div class="formulario">
            <h2>Mensaje</h2>
            <div class="separador"></div>
            <div action="">
                <div class="" style="padding: 20px 0;">
                    <label for="nombres">Nombres</label>
                    <input id="nombres" type="text">
                </div>

                <div class="" style="padding: 20px 0;">
                    <label for="email">Correo Electrónico</label>
                    <input type="text" name="email" id="email">
                </div>

                <div class="" style="padding: 20px 0;">
                    <label for="ensamje">Mensaje</label>
                    <textarea name="mensaje" id="mensaje"></textarea>
                </div>

                <button class="submit" id="enviar_correo" style="padding: 20px 0;">
                    Enviar
                </button>


            </div>

        </div>
    </div>
</div>
<script type="module">
    function abrirCorreo() {
        const nombres = document.getElementById('nombres').value;
        const email = document.getElementById('email').value;
        const mensaje = document.getElementById('mensaje').value;

        const mailtoLink = `mailto:info@hotmail.com?subject=Mensaje de ${nombres}&body=${encodeURIComponent(mensaje)}%0A%0ADe: ${email}`;

        window.location.href = mailtoLink;
        return false;
    }

    document.getElementById('enviar_correo').addEventListener('click', abrirCorreo);
</script>
