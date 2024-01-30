<?php
require_once 'config.php';
require_once 'Database.php';

// Establish database connection
$db = new Database($dbConfig['host'], $dbConfig['username'], $dbConfig['password'], $dbConfig['database']);

if ($db->getConnectionError()) {
    die("Connection failed: " . $db->getConnectionError());
}
?>
