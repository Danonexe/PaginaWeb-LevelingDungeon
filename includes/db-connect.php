<?php
// Conexión a MongoDB Atlas usando Data API (REST)

// Configuración desde variables de entorno
$apiKey = getenv('MONGODB_API_KEY');
$dataApiUrl = getenv('MONGODB_DATA_API_URL'); // https://data.mongodb-api.com/app/data-xxxxx/endpoint/data/v1
$dataSource = getenv('MONGODB_DATA_SOURCE'); // Tu cluster name
$database = getenv('DB_NAME') ?: 'leveling_dungeon';
$collection = getenv('COLLECTION_NAME') ?: 'rankings';

$dbConnected = false;
$dbError = '';

// Verificar que tenemos las credenciales necesarias
if (!$apiKey || !$dataApiUrl || !$dataSource) {
    $dbError = 'Faltan credenciales de API: ' . 
               (!$apiKey ? 'API_KEY ' : '') . 
               (!$dataApiUrl ? 'DATA_API_URL ' : '') . 
               (!$dataSource ? 'DATA_SOURCE' : '');
} else {
    $dbConnected = true;
}

// Función para hacer requests a MongoDB Data API
function mongoApiRequest($endpoint, $data = []) {
    global $apiKey, $dataApiUrl;
    
    $url = $dataApiUrl . '/action/' . $endpoint;
    
    $payload = json_encode($data);
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 30);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
        'Access-Control-Request-Headers: *',
        'api-key: ' . $apiKey,
    ]);
    
    $result = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $curlError = curl_error($ch);
    curl_close($ch);
    
    if ($curlError) {
        throw new Exception("cURL error: $curlError");
    }
    
    if ($httpCode === 200) {
        $decoded = json_decode($result, true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new Exception("JSON decode error: " . json_last_error_msg());
        }
        return $decoded;
    } else {
        throw new Exception("API request failed: HTTP $httpCode - $result");
    }
}

// Función para buscar rankings (versión simple)
function findRankings($limit = null, $sortField = 'time', $sortOrder = 1) {
    global $dataSource, $database, $collection;
    
    $data = [
        'dataSource' => $dataSource,
        'database' => $database,
        'collection' => $collection,
        'filter' => (object)[], // filtro vacío
    ];
    
    if ($sortField) {
        $data['sort'] = [$sortField => $sortOrder];
    }
    
    if ($limit) {
        $data['limit'] = $limit;
    }
    
    $result = mongoApiRequest('find', $data);
    return $result['documents'];
}

// Función para buscar rankings con filtros avanzados (para ranking.php)
function findRankingsWithFilter($filter = [], $sortField = 'time', $sortOrder = 1, $limit = null, $skip = 0) {
    global $dataSource, $database, $collection;
    
    $data = [
        'dataSource' => $dataSource,
        'database' => $database,
        'collection' => $collection,
        'filter' => empty($filter) ? (object)[] : $filter,
    ];
    
    if ($sortField) {
        $data['sort'] = [$sortField => $sortOrder];
    }
    
    if ($limit) {
        $data['limit'] = $limit;
    }
    
    if ($skip > 0) {
        $data['skip'] = $skip;
    }
    
    $result = mongoApiRequest('find', $data);
    return $result['documents'];
}

// Función para contar documentos
function countRankings($filter = []) {
    global $dataSource, $database, $collection;
    
    // Si no hay filtro, usamos estimatedDocumentCount que es más rápido
    if (empty($filter)) {
        try {
            $data = [
                'dataSource' => $dataSource,
                'database' => $database,
                'collection' => $collection
            ];
            
            $result = mongoApiRequest('estimatedDocumentCount', $data);
            return $result['count'];
        } catch (Exception $e) {
            // Si falla, usamos el método de agregación como fallback
        }
    }
    
    // Usar agregación para contar con filtros
    $data = [
        'dataSource' => $dataSource,
        'database' => $database,
        'collection' => $collection,
        'pipeline' => [
            ['$match' => empty($filter) ? (object)[] : $filter],
            ['$count' => 'total']
        ]
    ];
    
    $result = mongoApiRequest('aggregate', $data);
    return isset($result['documents'][0]['total']) ? $result['documents'][0]['total'] : 0;
}
?>