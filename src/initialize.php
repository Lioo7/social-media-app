<?php
require_once 'databases/db_connection.php';

// Execute SQL file using Database class method
function executeSqlFile($filename, $db) {
    $db->executeSqlFile($filename);
}

// Path to the SQL file
$sqlFile = __DIR__ . '/../sql/schema.sql';

// Execute SQL file
executeSqlFile($sqlFile, $db);

echo "Database initialized successfully!";

// Fetch the users from the jsonplaceholder
require_once 'fetch_users.php';

// Fetch the posts from the jsonplaceholder
require_once 'fetch_posts.php';
?>
