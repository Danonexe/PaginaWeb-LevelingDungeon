<?php
// Obtener el nombre de archivo actual para resaltar el elemento de menú activo
$currentPage = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($pageTitle) ? $pageTitle . ' - Leveling Dungeon' : 'Leveling Dungeon'; ?></title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome para iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Estilos personalizados -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <!-- Barra de navegación -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="index.php">
                <img src="assets/img/logoJuego2.png" alt="Leveling Dungeon" class="navbar-logo" height="40">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($currentPage == 'index.php') ? 'active' : ''; ?>" href="index.php">
                            <i class="fas fa-home me-1"></i>Inicio
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($currentPage == 'juego.php') ? 'active' : ''; ?>" href="juego.php">
                            <i class="fas fa-gamepad me-1"></i>Juego
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($currentPage == 'ranking.php') ? 'active' : ''; ?>" href="ranking.php">
                            <i class="fas fa-trophy me-1"></i>Rankings
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($currentPage == 'sobre-nosotros.php') ? 'active' : ''; ?>" href="sobre-nosotros.php">
                            <i class="fas fa-users me-1"></i>Sobre Nosotros
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($currentPage == 'tecnologias.php') ? 'active' : ''; ?>" href="tecnologias.php">
                            <i class="fas fa-code me-1"></i>Tecnologías
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contenido principal -->
    <main class="container py-4"><?php if (isset($pageHeader)): ?>
        <header class="text-center mb-5">
            <h1><?php echo $pageHeader; ?></h1>
            <?php if (isset($pageSubheader)): ?>
                <p class="lead text-muted"><?php echo $pageSubheader; ?></p>
            <?php endif; ?>
        </header>
    <?php endif; ?>