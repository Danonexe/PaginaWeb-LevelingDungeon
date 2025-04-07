<?php
// Establecer variables para la cabecera
$pageTitle = "Rankings";
$pageHeader = "Rankings Mundiales";
$pageSubheader = "Los jugadores más rápidos y con mejor puntuación";

// Incluir el encabezado
include 'includes/header.php';

// Incluir conexión a la base de datos
require_once 'includes/db-connect.php';
?>

<section class="mb-5">
    <div class="card">
        <div class="card-body p-4">
            <p class="lead">
                <i class="fas fa-info-circle me-2 text-primary"></i>
                Aquí puedes ver los mejores tiempos registrados por jugadores de todo el mundo. 
                El ranking está ordenado por el tiempo más rápido en completar el juego. ¡Compite y trata de alcanzar la cima!
            </p>
        </div>
    </div>
</section>

<!-- Filtros (opcional) -->
<section class="mb-4">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title mb-3">Filtrar Rankings</h5>
            <form method="GET" class="row g-3">
                <div class="col-md-6">
                    <label for="search" class="form-label">Buscar por jugador</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="search" name="search" placeholder="Nombre del jugador" value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
                        <button class="btn btn-outline-secondary" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="sort" class="form-label">Ordenar por</label>
                    <select class="form-select" id="sort" name="sort" onchange="this.form.submit()">
                        <option value="time" <?php echo (!isset($_GET['sort']) || $_GET['sort'] == 'time') ? 'selected' : ''; ?>>Mejor tiempo</option>
                        <option value="score" <?php echo (isset($_GET['sort']) && $_GET['sort'] == 'score') ? 'selected' : ''; ?>>Puntuación más alta</option>
                        <option value="date" <?php echo (isset($_GET['sort']) && $_GET['sort'] == 'date') ? 'selected' : ''; ?>>Más reciente</option>
                    </select>
                </div>
                <div class="col-md-2 d-flex align-items-end">
                    <a href="ranking.php" class="btn btn-outline-secondary w-100">Restablecer</a>
                </div>
            </form>
        </div>
    </div>
</section>

<!-- Tabla de Rankings -->
<section>
    <?php
    // Mostrar mensaje de error si hay un problema con la conexión
    if (!$dbConnected) {
        echo '<div class="alert alert-danger" role="alert">
                <i class="fas fa-exclamation-triangle me-2"></i>
                No se pudo conectar a la base de datos. Por favor, inténtelo más tarde.
              </div>';
    } else {
        try {
            // Preparar los filtros de búsqueda
            $filter = [];
            if (isset($_GET['search']) && !empty($_GET['search'])) {
                $search = $_GET['search'];
                // Búsqueda por nombre de jugador (usando expresión regular para hacer búsqueda parcial)
                $filter['nick'] = ['$regex' => $search, '$options' => 'i'];
            }
            
            // Determinar el campo de ordenación
            $sortField = 'time';
            $sortOrder = 1; // 1 = ascendente, -1 = descendente
            
            if (isset($_GET['sort'])) {
                switch ($_GET['sort']) {
                    case 'score':
                        $sortField = 'score';
                        $sortOrder = -1; // Mayor puntuación primero
                        break;
                    case 'date':
                        $sortField = 'date';
                        $sortOrder = -1; // Más reciente primero
                        break;
                    default:
                        $sortField = 'time';
                        $sortOrder = 1; // Menor tiempo primero
                }
            }
            
            // Obtener los rankings con paginación
            $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
            $limit = 10; // Número de resultados por página
            $skip = ($page - 1) * $limit;
            
            // Contar el total de registros para la paginación
            $totalRecords = $collection->countDocuments($filter);
            $totalPages = ceil($totalRecords / $limit);
            
            // Obtener los registros para esta página
            $cursor = $collection->find(
                $filter, 
                [
                    'sort' => [$sortField => $sortOrder],
                    'skip' => $skip,
                    'limit' => $limit
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
                    $position = $skip + $index + 1;
                    echo '<tr>
                            <td>' . $position . '</td>
                            <td>' . htmlspecialchars($ranking->nick) . '</td>
                            <td>' . htmlspecialchars($ranking->score) . '</td>
                            <td>' . htmlspecialchars($ranking->time) . ' seg</td>
                            <td>' . htmlspecialchars($ranking->date) . '</td>
                          </tr>';
                }
                
                echo '</tbody></table></div>';
                
                // Paginación
                if ($totalPages > 1) {
                    echo '<nav aria-label="Paginación de rankings" class="mt-4">
                            <ul class="pagination justify-content-center">';
                    
                    // Botón "Anterior"
                    $prevPage = max(1, $page - 1);
                    echo '<li class="page-item ' . ($page == 1 ? 'disabled' : '') . '">
                            <a class="page-link" href="?page=' . $prevPage . 
                            (isset($_GET['search']) ? '&search=' . htmlspecialchars($_GET['search']) : '') . 
                            (isset($_GET['sort']) ? '&sort=' . htmlspecialchars($_GET['sort']) : '') . 
                            '">Anterior</a>
                          </li>';
                    
                    // Números de página
                    $startPage = max(1, $page - 2);
                    $endPage = min($startPage + 4, $totalPages);
                    
                    for ($i = $startPage; $i <= $endPage; $i++) {
                        echo '<li class="page-item ' . ($i == $page ? 'active' : '') . '">
                                <a class="page-link" href="?page=' . $i . 
                                (isset($_GET['search']) ? '&search=' . htmlspecialchars($_GET['search']) : '') . 
                                (isset($_GET['sort']) ? '&sort=' . htmlspecialchars($_GET['sort']) : '') . 
                                '">' . $i . '</a>
                              </li>';
                    }
                    
                    // Botón "Siguiente"
                    $nextPage = min($totalPages, $page + 1);
                    echo '<li class="page-item ' . ($page == $totalPages ? 'disabled' : '') . '">
                            <a class="page-link" href="?page=' . $nextPage . 
                            (isset($_GET['search']) ? '&search=' . htmlspecialchars($_GET['search']) : '') . 
                            (isset($_GET['sort']) ? '&sort=' . htmlspecialchars($_GET['sort']) : '') . 
                            '">Siguiente</a>
                          </li>';
                    
                    echo '</ul></nav>';
                }
                
            } else {
                echo '<div class="alert alert-info" role="alert">
                        <i class="fas fa-info-circle me-2"></i>
                        No se encontraron resultados para tu búsqueda.
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
</section>

<?php include 'includes/footer.php'; ?>