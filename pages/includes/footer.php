<?php 
    $query_contacto = $pdo->query("SELECT * FROM contacto LIMIT 1");
    $contacto = $query_contacto->fetch(PDO::FETCH_ASSOC);

    $query_portada = $pdo->query("SELECT * FROM portada LIMIT 1");
    $portada = $query_portada->fetch(PDO::FETCH_ASSOC);
?>
<footer>
    <!-- footer de la empresa -->
    <section>
        <div class="footer_empresa">
            <div class="footer_empresa__logo">
                <img src="<?php echo ($portada['logo_blanco'] ?? '') ?>" alt="">
            </div>
            <div class="footer_empresa__nosotros">
                <div class="">
                    <h4>Sobre Nosotros</h4>
                    <div class="footer-info">
                        <div class="footer-info__item"><i class="fas fa-map-marker-alt"></i><?php echo ($contacto['direccion'] ?? '') ?></div>
                        <div class="footer-info__item"><i class="fas fa-envelope "></i><?php echo ($contacto['correo_electronico'] ?? '') ?></div>
                        <div class="footer-info__item">
                            <i class="fas fa-mobile-alt"></i><?php echo ($contacto['telefono1'] ?? '') ?>
                            <?php 
                            if($contacto['telefono2'] != ''){
                                echo ('| '.$contacto['telefono2'] ?? '');
                                }
                            ?>
                        </div>

                    </div>
                </div>

            </div>
            <div class="">
                <div class="">
                    <h4>Síguenos</h4>
                    <div class="footer_empresa__redes">
                        <a target="_blank" href="<?php echo ($contacto['facebook'] ?? '') ?>"><i class="fab fa-facebook"></i></a>
                        <a target="_blank" href="<?php echo ($contacto['instagram'] ?? '') ?>"><i class="fab fa-instagram"></i></a>
                        <a target="_blank" href="<?php echo ($contacto['tiktok'] ?? '') ?>"><i class="fab fa-tiktok"></i></a>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- footer gobierno regional -->

    <section>
        <div class="footer-gob fondo-blanco">

            <div class="footer-gob__logos">
                <img class="logo_mypes" src="public/assets/imagenes/logos/logo_mypes_color.png" alt="logo proyecto mypes">
                <img class="footer-gob__logos__gore" src="public/assets/imagenes/logos/logo_gerepro_ultimo.png" alt="Gobierno Regional Cusco">
                <img class="logo_gerepro" src="public/assets/imagenes/logos/hagamos_historia_rojo.png" alt="logo GEREPRO">
            </div>
            <div class="footer-gob__logos_phone">
                <img class="footer-gob__logos__gore" src="public/assets/imagenes/logos/logo_gerepro_ultimo.png" alt="Gobierno Regional Cusco">
                <img class="logo_hagamos_historia" src="public/assets/imagenes/logos/hagamos_historia_rojo.png" alt="logo GEREPRO">
                <img class="logo_mypes" src="public/assets/imagenes/logos/logo_mypes_color.png" alt="logo proyecto mypes">
            </div>
            <div class="footer-gob__copy">
                © 2024 MYPEs Digitales - Todos los Derechos Reservados.
            </div>

        </div>
    </section>
</footer>
<a href="https://wa.me/+51950314016" class="whatsapp-float" target="_blank">
    <i class="fab fa-whatsapp"></i>
</a>

</body>

</html>