<?php
// Conexión a MongoDB usando solo la extensión nativa de PHP (sin Composer)

// Configuración desde variables de entorno
$mongoUri = getenv('MONGODB_URI') ?: 'mongodb://localhost:27017';
$dbName = getenv('DB_NAME') ?: 'leveling_dungeon';
$collectionName = getenv('COLLECTION_NAME') ?: 'rankings';

try {
    // Crear manager usando la extensión MongoDB nativa
    $manager = new MongoDB\Driver\Manager($mongoUri);
    
    // Probar la conexión con un ping
    $command = new MongoDB\Driver\Command(['ping' => 1]);
    $result = $manager->executeCommand('admin', $command);
    
    // Si llegamos aquí, la conexión es exitosa
    $dbConnected = true;
    
} catch (Exception $e) {
    $dbConnected = false;
    $dbError = $e->getMessage();
}

// Función helper para obtener rankings
function getRankings($manager, $dbName, $collectionName, $limit = null, $sortField = 'time', $sortOrder = 1, $filter = []) {
    $options = [];
    
    if (!empty($filter)) {
        // Para búsquedas por texto
        if (isset($filter['search'])) {
            $searchTerm = $filter['search'];
            unset($filter['search']);
            // Crear un filtro regex para búsqueda por nick
            $filter['nick'] = new MongoDB\BSON\Regex($searchTerm, 'i');
        }
    }
    
    if ($sortField) {
        $options['sort'] = [$sortField => $sortOrder];
    }
    
    if ($limit) {
        $options['limit'] = $limit;
    }
    
    if (isset($filter['skip'])) {
        $options['skip'] = $filter['skip'];
        unset($filter['skip']);
    }
    
    $query = new MongoDB\Driver\Query($filter, $options);
    $cursor = $manager->executeQuery("$dbName.$collectionName", $query);
    return $cursor->toArray();
}

// Función helper para contar documentos
function countDocuments($manager, $dbName, $collectionName, $filter = []) {
    if (isset($filter['search'])) {
        $searchTerm = $filter['search'];
        unset($filter['search']);
        $filter['nick'] = new MongoDB\BSON\Regex($searchTerm, 'i');
    }
    
    $command = new MongoDB\Driver\Command([
        'count' => $collectionName,
        'query' => $filter
    ]);
    
    try {
        $result = $manager->executeCommand($dbName, $command);
        $stats = $result->toArray();
        return $stats[0]->n;
    } catch (Exception $e) {
        return 0;
    }
}
?>