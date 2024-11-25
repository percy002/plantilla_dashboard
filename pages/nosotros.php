<?php
require_once '../config/database.php';

// Consultar datos de la tabla empresa
$query = $pdo->query("SELECT * FROM empresa LIMIT 1");
$empresa = $query->fetch(PDO::FETCH_ASSOC);

$query = $pdo->query("SELECT * FROM portada LIMIT 1");
$portada = $query->fetch(PDO::FETCH_ASSOC);
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
                <img src="<?php echo ($portada['logo_color'] ?? '') ?>" alt="">
            </div>
            <div class="">
                <h2>Nuestra Historia</h2>
                <p><?php echo ($empresa['historia'] ?? '') ?></p>
            </div>
        </div>
    
        <div class="nosotros__declaracion">
            <div class="nosotros__declaracion__mision">
                <h2>Misión</h2>
                <p><?php echo ($empresa['mision'] ?? '') ?></p>
            </div>
            <div class="nosotros__declaracion__vision">
                <h2>Visión</h2>
                <p><?php echo ($empresa['vision' ] ?? '') ?></p>
            </div>
        </div>
    </div>
    
    
</section>

<?php include 'includes/footer.php' ?>


