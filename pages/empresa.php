<?php
require_once '../config/database.php';

// Consultar datos de la tabla empresa
$query = $pdo->query("SELECT * FROM empresa LIMIT 1");
$empresa = $query->fetch(PDO::FETCH_ASSOC);
?>
<?php include 'includes/navbar.php' ?>
<div class="pagina-encabezado bg-concrete">
    <div class="">
        <h1>Acerca de Nosotros</h1>
        <p>Conoce mejor nuestra historia y nuestra pasión.</p>
    </div>
</div>
<section class=" bg-concrete-50 ">
    <div class="nosotros container-xl">

        <div class="nosotros__historia">
            <div class="nosotros__historia__logo">
                <img src="assets/imagenes/logos/logo_color.png" alt="">
            </div>
            <div class="">
                <h2>Nuestra Hitoria</h2>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolorum consequuntur voluptatem tempora earum quia provident, aut assumenda nobis nam deserunt explicabo ea necessitatibus distinctio, pariatur hic quam saepe repudiandae sequi?</p>
            </div>
        </div>
    
        <div class="nosotros__declaracion">
            <div class="nosotros__declaracion__mision">
                <h2>Misión</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam facilis voluptatum culpa a tempore quibusdam enim nemo laborum ipsa nihil tempora aut tenetur, sequi odio at facere consequuntur, perferendis aliquid.</p>
            </div>
            <div class="nosotros__declaracion__vision">
                <h2>Visión</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio perferendis similique tenetur, deserunt aut ipsam! Consequuntur est nobis voluptate nisi facilis debitis, aperiam sit maxime saepe ratione, quis praesentium libero!</p>
            </div>
        </div>
    </div>
    
    
</section>

<?php include 'includes/footer.php' ?>


