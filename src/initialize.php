<?php
require_once 'config.php';
require_once 'Database.php';

// Establish database connection
$db = new Database($dbConfig['host'], $dbConfig['username'], $dbConfig['password'], $dbConfig['database']);

if ($db->getConnectionError()) {
    die("Connection failed: " . $db->getConnectionError());
}

function executeSqlFile($filename, $db) {
    // Read SQL file
    $sql = file_get_contents($filename);
    
    // Split SQL statements
    $queries = explode(';', $sql);
    
    // Execute each SQL statement
    foreach ($queries as $query) {
        $query = trim($query);
        if (!empty($query)) {
            $db->executeQuery($query);
        }
    }
}

$sqlFile = '../sql/schema.sql';

executeSqlFile($sqlFile, $db);

echo "Database initialized successfully!";
?>
