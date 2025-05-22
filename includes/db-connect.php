<?php
// Cargar las variables de entorno
require_once __DIR__ . '/../vendor/autoload.php';

// Cargar las variables de entorno solo en desarrollo
if (file_exists(__DIR__ . '/../.env')) {
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
    $dotenv->load();
}

// Configuración de MongoDB Atlas
$mongoUri = getenv('MONGODB_URI');
$dbName = getenv('DB_NAME');
$collectionName = getenv('COLLECTION_NAME');

try {
    // Conexión a MongoDB Atlas
    $client = new MongoDB\Client($mongoUri);
    
    // Selecciona la base de datos y colección
    $database = $client->selectDatabase($dbName);
    $collection = $database->selectCollection($collectionName);
    
    // Variable para controlar si la conexión fue exitosa
    $dbConnected = true;
} catch (MongoDB\Driver\Exception\Exception $e) {
    // En caso de error
    $dbConnected = false;
    $dbError = $e->getMessage();
}
?>