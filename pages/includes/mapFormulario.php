<?php
$query_contacto = $pdo->query("SELECT * FROM contacto");
$contacto = $query_contacto->fetch(PDO::FETCH_ASSOC);
?>
<div class="contacto__info  container-xl">
    <div class="contacto__info__mapa ratio ratio-1x1">
        <?php echo ($contacto['mapa'] ?? '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3879.1718264298793!2d-71.96603425652692!3d-13.525044512131613!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x916dd5d6b1bb822f%3A0xf159767e176be009!2sGEREPRO%20-%20Gerencia%20Regional%20de%20Producci%C3%B3n.!5e0!3m2!1ses!2spe!4v1732542086915!5m2!1ses!2spe" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>') ?>
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