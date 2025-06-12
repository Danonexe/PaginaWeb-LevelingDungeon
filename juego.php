<?php
// Establecer variables para la cabecera
$pageTitle = "El Juego";
$pageHeader = "Leveling Dungeon";
$pageSubheader = "Escapar de la mazmorra nunca fue tan emocionante";

// Incluir el encabezado
include 'includes/header.php';
?>

<!-- Banner del juego -->
<section class="game-banner mb-5">
    <div class="row align-items-center">
        <div class="col-lg-6 mb-4 mb-lg-0">
            <img src="assets/img/juego2.gif" alt="Leveling Dungeon Screenshot" class="img-fluid rounded shadow">
        </div>
        <div class="col-lg-6">
            <h2 class="mb-3">Sobre el juego</h2>
            <p class="lead">Leveling Dungeon es un juego de acción y aventura donde cada segundo cuenta en tu carrera por escapar de una mazmorra llena de peligros.</p>
            <p>Tu objetivo es simple: escapa lo más rápido posible y con la mayor puntuación. Cada nivel superado aumenta tus habilidades, pero también los desafíos que enfrentarás.</p>
            <div class="mt-4">
                <a href="assets/downloads/LevelingDungeon.zip" download="LevelingDungeon.zip" class="btn btn-primary me-2">
                    <i class="fas fa-download me-2"></i>Descargar Juego
                </a>
                <a href="#requisitos" class="btn btn-outline-dark">
                    <i class="fas fa-laptop me-2"></i>Requisitos del Sistema
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Características del juego -->
<section class="mb-5">
    <h2 class="text-center mb-4">Características principales</h2>
    <div class="row g-4">
        <div class="col-md-6 col-lg-3">
            <div class="card h-100 feature-card">
                <div class="card-body text-center">
                    <i class="fas fa-clock feature-icon"></i>
                    <h3 class="card-title h5">Contrarreloj</h3>
                    <p class="card-text">Cada segundo cuenta. Compite contra ti mismo y contra otros jugadores para lograr el mejor tiempo de escape.</p>
                </div>
            </div>
        </div>
        
        <div class="col-md-6 col-lg-3">
            <div class="card h-100 feature-card">
                <div class="card-body text-center">
                    <i class="fas fa-dice-d20 feature-icon"></i>
                    <h3 class="card-title h5">Niveles únicos</h3>
                    <p class="card-text">La mazmorra ha sido cuidadosamente diseñada con múltiples rutas y desafíos que te pondrán a prueba en cada recorrido.</p>
                </div>
            </div>
        </div>
        
        <div class="col-md-6 col-lg-3">
            <div class="card h-100 feature-card">
                <div class="card-body text-center">
                    <i class="fas fa-level-up-alt feature-icon"></i>
                    <h3 class="card-title h5">Sistema de progresión</h3>
                    <p class="card-text">Sube de nivel y desbloquea nuevas habilidades mientras avanzas por la mazmorra.</p>
                </div>
            </div>
        </div>
        
        <div class="col-md-6 col-lg-3">
            <div class="card h-100 feature-card">
                <div class="card-body text-center">
                    <i class="fas fa-globe feature-icon"></i>
                    <h3 class="card-title h5">Competición global</h3>
                    <p class="card-text">Compite contra jugadores de todo el mundo y sube en el ranking mundial.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Galería de imágenes -->
<section class="mb-5">
    <h2 class="text-center mb-4">Galería</h2>
    <div class="row g-3">
        <div class="col-md-4 mb-3">
            <img src="assets/img/game-1.jpg" alt="Gameplay 1" class="img-fluid rounded shadow" style="height: 250px; width: 100%; object-fit: cover;">
        </div>
        <div class="col-md-4 mb-3">
            <img src="assets/img/game-2.jpg" alt="Gameplay 2" class="img-fluid rounded shadow" style="height: 250px; width: 100%; object-fit: cover;">
        </div>
        <div class="col-md-4 mb-3">
            <img src="assets/img/game-3.jpg" alt="Gameplay 3" class="img-fluid rounded shadow" style="height: 250px; width: 100%; object-fit: cover;">
        </div>
    </div>
</section>



<!-- Cómo jugar -->
<section class="mb-5 bg-light p-4 rounded">
    <h2 class="text-center mb-4">Cómo jugar</h2>
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <h3 class="h4 card-title text-center mb-4">Controles básicos</h3>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="d-flex align-items-center p-3 border rounded">
                                <span class="badge bg-dark fs-5 me-3 px-3 py-2">W</span> 
                                <span class="fw-bold">Mover hacia arriba</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-center p-3 border rounded">
                                <span class="badge bg-dark fs-5 me-3 px-3 py-2">A</span> 
                                <span class="fw-bold">Mover hacia la izquierda</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-center p-3 border rounded">
                                <span class="badge bg-dark fs-5 me-3 px-3 py-2">S</span> 
                                <span class="fw-bold">Mover hacia abajo</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-center p-3 border rounded">
                                <span class="badge bg-dark fs-5 me-3 px-3 py-2">D</span> 
                                <span class="fw-bold">Mover hacia la derecha</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-center p-3 border rounded">
                                <span class="badge bg-dark fs-5 me-3 px-3 py-2">E</span> 
                                <span class="fw-bold">Interactuar con objetos</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-center p-3 border rounded">
                                <span class="badge bg-dark fs-5 me-3 px-3 py-2">SPACE</span> 
                                <span class="fw-bold">Atacar</span>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4 p-3 bg-warning bg-opacity-10 border border-warning rounded">
                        <h5 class="text-warning mb-2">
                            <i class="fas fa-lightbulb me-2"></i>Consejo
                        </h5>
                        <p class="mb-0">Mantén presionadas las teclas de movimiento para desplazarte de forma continua y fluida por la mazmorra.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Historia del juego -->
<section class="mb-5 bg-gradient-dark py-5 rounded">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="mb-3">Historia</h2>
        </div>
        
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="mb-4 p-4 border-start border-4 border-danger bg-white bg-opacity-90 rounded">
                    <p class="mb-0 text-dark">
                        Eres un aventurero experimentado que, durante una exploración rutinaria, has caído accidentalmente en las profundidades de una antigua mazmorra olvidada. El suelo se desplomó bajo tus pies y ahora te encuentras atrapado en un laberinto subterráneo lleno de peligros ancestrales.
                    </p>
                </div>
                
                <div class="mb-4 p-4 border-start border-4 border-warning bg-white bg-opacity-90 rounded">
                    <p class="mb-0 text-dark">
                        Las paredes húmedas y los pasillos oscuros albergan criaturas hostiles que han permanecido dormidas durante siglos. Goblins, Slimes y otras abominaciones acechan en cada rincón, esperando a cualquier intruso que ose perturbar su descanso eterno.
                    </p>
                </div>
                
                <div class="mb-4 p-4 border-start border-4 border-info bg-white bg-opacity-90 rounded">
                    <p class="mb-0 text-dark">
                        Con cada batalla que libres y cada desafío que superes, tu experiencia aumentará y tus habilidades se fortalecerán. Deberás subir de nivel estratégicamente, mejorando tu fuerza y resistencia para enfrentar enemigos cada vez más poderosos en los niveles más profundos de la mazmorra.
                    </p>
                </div>
                
                <div class="p-4 border-start border-4 border-success bg-white bg-opacity-90 rounded">
                    <p class="text-center mb-0 text-dark">
                       Tu misión es clara: sobrevive, evoluciona y encuentra la salida antes de que la mazmorra te consuma para siempre.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Requisitos del sistema -->
<section id="requisitos" class="mb-5">
    <h2 class="text-center mb-4">Requisitos del sistema</h2>
    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-header bg-success text-white">
                    <h3 class="h5 mb-0">Requisitos mínimos</h3>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled mb-0">
                        <li class="mb-2"><strong>Sistema:</strong> Windows 7/8/10</li>
                        <li class="mb-2"><strong>Procesador:</strong> Intel Core i3 / AMD Ryzen 3</li>
                        <li class="mb-2"><strong>Memoria:</strong> 4 GB RAM</li>
                        <li class="mb-2"><strong>Gráficos:</strong> NVIDIA GeForce GTX 750 / AMD Radeon R7 260</li>
                        <li class="mb-2"><strong>DirectX:</strong> Versión 11</li>
                        <li class="mb-2"><strong>Almacenamiento:</strong> 2 GB de espacio disponible</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-header bg-primary text-white">
                    <h3 class="h5 mb-0">Requisitos recomendados</h3>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled mb-0">
                        <li class="mb-2"><strong>Sistema:</strong> Windows 10 (64 bits)</li>
                        <li class="mb-2"><strong>Procesador:</strong> Intel Core i5 / AMD Ryzen 5</li>
                        <li class="mb-2"><strong>Memoria:</strong> 8 GB RAM</li>
                        <li class="mb-2"><strong>Gráficos:</strong> NVIDIA GeForce GTX 1060 / AMD Radeon RX 580</li>
                        <li class="mb-2"><strong>DirectX:</strong> Versión 12</li>
                        <li class="mb-2"><strong>Almacenamiento:</strong> 4 GB de espacio disponible (SSD recomendado)</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ -->
<section class="mb-5">
    <h2 class="text-center mb-4">Preguntas frecuentes</h2>
    <div class="accordion" id="accordionFAQ">
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                    ¿El juego es gratuito?
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionFAQ">
                <div class="accordion-body">
                    Sí, Leveling Dungeon es completamente gratuito para jugar. No hay compras dentro del juego ni contenido premium.
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    ¿Se puede jugar sin conexión a internet?
                </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionFAQ">
                <div class="accordion-body">
                    Sí, puedes jugar sin conexión a internet en modo local. Sin embargo, necesitarás conexión para subir tus puntuaciones al ranking mundial.
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    ¿Con qué frecuencia se actualiza el juego?
                </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionFAQ">
                <div class="accordion-body">
                    Seguiremos publicando actualizaciones importantes, con nuevos niveles, características y mejoras de rendimiento. También hay parches menores para corregir errores cada vez que es necesario.
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingFour">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                    ¿Cómo puedo reportar un bug o problema?
                </button>
            </h2>
            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionFAQ">
                <div class="accordion-body">
                    Puedes reportar problemas enviando un correo a <a href="#">soporte@levelingdungeon.com</a>. Incluye capturas de pantalla y una descripción detallada del problema para ayudarnos a solucionarlo más rápido.
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>