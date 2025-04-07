<?php
// Establecer variables para la cabecera
$pageTitle = "Sobre Nosotros";
$pageHeader = "Nuestro Equipo";
$pageSubheader = "Conoce a la persona detrás de Leveling Dungeon";

// Incluir el encabezado
include 'includes/header.php';
?>

<section class="mb-5 about-section">
    <div class="row align-items-center">
        <div class="col-lg-6 mb-4 mb-lg-0">
            <img src="assets/img/me.png" alt="Nuestro equipo" class="team-img img-fluid">
        </div>
        <div class="col-lg-6">
            <h2 class="mb-4">Quienes somos.</h2>
            <p class="lead">Ni idea que poner</p>
            <p>Escribir algo</p>
            <p>Tengo que ajustar el tamaño de la imagen</p>
            <div class="mt-4">
                <a href="#" class="btn btn-primary me-2">
                    <i class="fas fa-envelope me-2"></i>Contactar
                </a>
                <a href="#" class="btn btn-outline-primary">
                    <i class="fab fa-github me-2"></i>GitHub
                </a>
            </div>
        </div>
    </div>
</section>

<section class="my-5">
    <h2 class="text-center mb-5">Mis objetivos</h2>
    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card h-100 feature-card">
                <div class="card-body text-center">
                    <i class="fas fa-lightbulb feature-icon text-warning"></i>
                    <h3 class="card-title">Innovación Creativa</h3>
                    <p class="card-text">Busco aplicar mis conocimientos técnicos para desarrollar soluciones creativas que combinen funcionalidad con una experiencia de usuario atractiva e intuitiva.</p>
                </div>
            </div>
        </div>
        
        <div class="col-md-4 mb-4">
            <div class="card h-100 feature-card">
                <div class="card-body text-center">
                    <i class="fas fa-code feature-icon text-primary"></i>
                    <h3 class="card-title">Crecimiento Técnico</h3>
                    <p class="card-text">A través de este proyecto he expandido mis habilidades en desarrollo web, bases de datos y despliegue, preparándome para enfrentar retos más complejos en el futuro.</p>
                </div>
            </div>
        </div>
        
        <div class="col-md-4 mb-4">
            <div class="card h-100 feature-card">
                <div class="card-body text-center">
                    <i class="fas fa-rocket feature-icon text-success"></i>
                    <h3 class="card-title">Desarrollo Continuo</h3>
                    <p class="card-text">Mi meta es mantener un ciclo de aprendizaje constante, incorporando nuevas tecnologías y metodologías para seguir mejorando tanto personal como profesionalmente.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>