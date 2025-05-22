<?php
// Establecer título de la página
$pageTitle = "Inicio";
// No incluimos header aquí para poder mostrar el hero section antes
?>

<?php include 'includes/header.php'; ?>

<!-- Hero Section -->
<section class="hero-section text-center">
    <div class="container">
        <div class="logo-container mb-4">
            <img src="assets/img/logoJuego2.png" alt="Leveling Dungeon" class="img-fluid game-logo">
        </div>
        <p class="lead mb-5">La mazmorra te espera. Compite contra jugadores de todo el mundo y demuestra tu habilidad.</p>
        <a href="#" class="btn btn-primary btn-lg me-3">
            <i class="fas fa-download me-2"></i>Descargar Juego
        </a>
        <a href="ranking.php" class="btn btn-outline-light btn-lg">
            <i class="fas fa-trophy me-2"></i>Ver Rankings
        </a>
    </div>
</section>

<!-- Características del juego -->
<section class="mt-5">
    <div class="container">
        <h2 class="text-center mb-5">Características Principales</h2>
        
        <div class="row">
            <div class="col-md-4">
                <div class="card feature-card">
                    <div class="card-body text-center">
                        <i class="fas fa-bolt feature-icon"></i>
                        <h3 class="card-title">Rápido y Adictivo</h3>
                        <p class="card-text">Partidas rápidas que pondrán a prueba tus reflejos y estrategia para conseguir el mejor tiempo.</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card feature-card">
                    <div class="card-body text-center">
                        <i class="fas fa-users feature-icon"></i>
                        <h3 class="card-title">Comunidad Global</h3>
                        <p class="card-text">Compite contra jugadores de todo el mundo y escala en las clasificaciones mundiales.</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card feature-card">
                    <div class="card-body text-center">
                        <i class="fas fa-chart-line feature-icon"></i>
                        <h3 class="card-title">Sistema de Rankings</h3>
                        <p class="card-text">Seguimiento de tus mejores tiempos y comparativa con los mejores jugadores del mundo.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Últimos Rankings (Vista previa) -->
<section class="mt-5">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Últimos Rankings</h2>
            <a href="ranking.php" class="btn btn-outline-primary">Ver Todos</a>
        </div>
        
        <?php
        // Incluir conexión a la base de datos
        require_once 'includes/db-connect.php';
        
        // Mostrar mensaje de error si hay un problema con la conexión
        if (!$dbConnected) {
            echo '<div class="alert alert-danger" role="alert">
                    <i class="fas fa-exclamation-triangle me-2"></i>
                    No se pudo conectar a la base de datos. Por favor, inténtelo más tarde.
                  </div>';
        } else {
            try {
                // Obtener solo los 5 mejores tiempos
                $cursor = $collection->find(
                    [], 
                    [
                        'sort' => ['time' => 1], // Ordenar por tiempo ascendente (menor es mejor)
                        'limit' => 5
                    ]
                );
                
                $rankings = $cursor->toArray();
                
                if (count($rankings) > 0) {
                    echo '<div class="table-responsive">
                            <table class="table table-striped ranking-table">
                                <thead>
                                    <tr>
                                        <th>Posición</th>
                                        <th>Jugador</th>
                                        <th>Puntuación</th>
                                        <th>Tiempo</th>
                                        <th>Fecha</th>
                                    </tr>
                                </thead>
                                <tbody>';
                                
                    foreach ($rankings as $index => $ranking) {
                        echo '<tr>
                                <td>' . ($index + 1) . '</td>
                                <td>' . htmlspecialchars($ranking->nick) . '</td>
                                <td>' . htmlspecialchars($ranking->score) . '</td>
                                <td>' . htmlspecialchars($ranking->time) . ' seg</td>
                                <td>' . htmlspecialchars($ranking->date) . '</td>
                              </tr>';
                    }
                    
                    echo '</tbody></table></div>';
                } else {
                    echo '<div class="alert alert-info" role="alert">
                            <i class="fas fa-info-circle me-2"></i>
                            No hay rankings disponibles en este momento.
                          </div>';
                }
            } catch (Exception $e) {
                echo '<div class="alert alert-danger" role="alert">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        Error al obtener rankings: ' . $e->getMessage() . '
                      </div>';
            }
        }
        ?>
    </div>
</section>

<!-- Llamada a la acción -->
<section class="mt-5 bg-primary-dark text-white p-5 rounded">
    <div class="container text-center">
        <h2 class="mb-4">¿Listo para el desafío?</h2>
        <p class="lead mb-4">Descarga ahora el Leveling Dungeon y compite por el primer puesto en nuestro ranking mundial.</p>
        <a href="#" class="btn btn-light btn-lg">
            <i class="fas fa-download me-2"></i>Descargar Ahora
        </a>
    </div>
</section>

<?php include 'includes/footer.php'; ?>