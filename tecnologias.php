
<?php
// Establecer variables para la cabecera
$pageTitle = "Tecnologías";
$pageHeader = "Tecnologías Utilizadas";
$pageSubheader = "Las herramientas que hacen posible nuestro juego y sitio web";

// Incluir el encabezado
include 'includes/header.php';
?>

<section class="mb-5">
    <div class="card">
        <div class="card-body p-4">
            <p class="lead">
                <i class="fas fa-code me-2 text-primary"></i>
                En Leveling Dungeon hemos querido utilizar las mejores y más modernas tecnologías para proporcionar una experiencia óptima. 
                A continuación te presentamos las principales tecnologías que utilizamos tanto para el desarrollo del juego como para esta web.
            </p>
        </div>
    </div>
</section>

<!-- Tecnologías del Juego -->
<section class="mb-5">
    <h2 class="mb-4">Motor y Desarrollo del Juego</h2>
    <div class="row">
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="tech-card">
                <img src="assets/img/tech/Godot.png" alt="Godot" class="tech-logo">
                <h4>Godot</h4>
                <p>Motor principal para el desarrollo del juego, permitiendo crear un videojuego mezclando C# y GDScript.</p>
            </div>
        </div>
        
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="tech-card">
                <img src="assets/img/tech/cSharp.png" alt="C#" class="tech-logo">
                <h4>C#</h4>
                <p>Lenguaje de programación utilizado para implementar toda la lógica del juego.</p>
            </div>
        </div>
        
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="tech-card">
                <img src="assets/img/tech/GDScript.png" alt="GDScript" class="tech-logo">
                <h4>GDScript</h4>
                <p>Lenguaje de programación utilizado para implementar la conexión del Juego a la API.</p>
            </div>
        </div>
        
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="tech-card">
                <img src="assets/img/tech/ichio.png" alt="itch.io" class="tech-logo">
                <h4>itch.io</h4>
                <p>Plataforma para obtener recursos gráficos y assets de calidad que dan vida visual al juego.</p>
            </div>
        </div>
    </div>
</section>

<!-- Tecnologías del Servidor y Backend -->
<section class="mb-5">
    <h2 class="mb-4">Infraestructura y Backend</h2>
    <div class="row">
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="tech-card">
                <img src="assets/img/tech/php.png" alt="PHP" class="tech-logo">
                <h4>PHP</h4>
                <p>Lenguaje de programación del lado del servidor para esta web.</p>
            </div>
        </div>
        
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="tech-card">
                <img src="assets/img/tech/mongo.png" alt="MongoDB" class="tech-logo">
                <h4>MongoDB Atlas</h4>
                <p>Base de datos NoSQL en la nube para almacenar todos los datos de rankings.</p>
            </div>
        </div>
        
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="tech-card">
                <img src="assets/img/tech/docker.png" alt="Docker" class="tech-logo">
                <h4>Docker</h4>
                <p>Contenedores que asegura el funcionamiento consistente de la aplicación en cualquier entorno de despliegue.</p>
            </div>
        </div>
        
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="tech-card">
                <img src="assets/img/tech/render.png" alt="Render" class="tech-logo">
                <h4>Render</h4>
                <p>Plataforma en la nube para alojar nuestra web, nuestra API y servicios backend.</p>
            </div>
        </div>
    </div>
</section>

<!-- Tecnologías Frontend -->
<section class="mb-5">
    <h2 class="mb-4">Frontend y Experiencia Web</h2>
    <div class="row">
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="tech-card">
                <img src="assets/img/tech/html5.png" alt="HTML5" class="tech-logo">
                <h4>HTML5</h4>
                <p>Estándar para estructurar el contenido de nuestra web.</p>
            </div>
        </div>
        
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="tech-card">
                <img src="assets/img/tech/css3.png" alt="CSS3" class="tech-logo">
                <h4>CSS3</h4>
                <p>Lenguaje de estilo para dar formato visual al sitio web.</p>
            </div>
        </div>
        
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="tech-card">
                <img src="assets/img/tech/javascript.png" alt="JavaScript" class="tech-logo">
                <h4>JavaScript</h4>
                <p>Lenguaje de programación para la interactividad en el navegador.</p>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="tech-card">
                <img src="assets/img/tech/boostrap.png" alt="Bootstrap" class="tech-logo">
                <h4>Bootstrap</h4>
                <p>Framework CSS para crear diseños responsive y modernos.</p>
            </div>
        </div>
    </div>
</section>


<?php include 'includes/footer.php'; ?>